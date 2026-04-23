# NCA / SAMA Regulatory Report Validation

**Date:** 2026-04-22  
**Branch:** qa/phase-4  
**Scope:** NCA (ECC 2018, ECC 2024, CSCC, CCC, TCC, OSMACC, DCC) and SAMA CSF regulatory reports — controllers, views, helpers, Excel export.

---

## Executive Summary

8 frameworks, 3 controllers, ~1,500 lines of report logic examined. Found **1 critical bug** causing wrong data in reports, **3 medium bugs** affecting output correctness, and **4 low-severity code quality issues**.

The most impactful issue is the SAMA `controls.blade.php` pattern where the first sub-control of every parent-with-children block renders the parent's description instead of its own. This affects ~30 controls across the full SAMA report.

---

## Design Note: Assessment ID Behaviour

The `$controlAssessmentId` parameter is **intentionally not used** as a data filter. All `getReport()` queries use `MAX(id)` globally per control to show the **latest compliance posture**, which is the correct approach for regulatory reports. The assessment ID flows through for display context (report title, action button URL params) only.

---

## Critical Bugs

### ~~Bug 1~~: `show()` routes 5 of 8 frameworks to ECC-2024 — FALSE POSITIVE

**File:** `app/Http/Controllers/RegulatoryReportController.php` — lines 51–70

**Status: Not a bug.** Original analysis incorrectly assumed all frameworks flow through `show()`. They do not.

**Actual routing:** CSCC, TCC, OSMACC, and DCC are never submitted through the create form. The `nca/index.blade.php` index page links each framework directly via `<x-report-card>` components that point straight to their named routes (`cscc-regulatory-report.show`, `tcc-regulatory-report.show`, etc.), completely bypassing `show()`.

`show()` is only reachable from the create form at `/regulatory-report`, which is exclusively linked for **ECC-2018** and **CCC-2020** (no other framework has a "Generate Report" button that posts to `show()`).

**The `else` branch is intentional:** ECC-2018 v2 submits `best_practice=NCA-ECC-2018&version=v2`. This fails the `$version === 'v1'` check and falls through to the `else` branch → `ecc-2024-regulatory-report.show`. This is the correct routing for ECC-2018 version 2 (which shares the ECC-2024 report format).

No fix required.

---

### Bug 2: SAMA controls.blade.php — first sub-control uses parent's description

**File:** `resources/views/process/reporting/sama/controls.blade.php`

**Affected lines (sample):** 40–47, 85–91, 120–128, 140–147, 175–183, and ~25 more parent-with-children blocks throughout the file.

**Pattern:**
```blade
@if ($control->control_id == 'SAMA-CSF-3.1.1.4')
    @php $status = getParentStatus($report, 'SAMA-CSF-3.1.1.4.'); @endphp
    <x-main-control id="3.1.1.4" details="{{ $control->control_description }}" ... :status="$status" />

    {{-- BUG: $control here is the PARENT (3.1.1.4), not the child (3.1.1.4.A) --}}
    <x-sub-control id="3.1.1.4.A" details="{{ $control->control_description }}" ... :control="$control" />
@endif
```

**Root cause:** When the `@foreach` loop reaches the parent control (`3.1.1.4`), both the parent row and the first child row (`.A`) are rendered inside the same `@if` block. The `$control` variable at this point holds the parent record. Child `.A`'s description should come from its own record when the loop reaches `SAMA-CSF-3.1.1.4.A`, not from the parent.

All subsequent children (`.B`, `.C`, ...) are correct because they each have their own `@if` block.

**Impact:** Every `3.x.x.x.A` sub-control in the SAMA report displays the parent's description text. Approximately 30 controls are affected. The status is also incorrect for `.A` controls — they inherit the parent's `:control` prop instead of their own assessment data.

**Fix:** Split the `.A` sub-control into its own `@if` block, matching the pattern used by all other children:
```blade
{{-- Before (wrong): --}}
@if ($control->control_id == 'SAMA-CSF-3.1.1.4')
    @php $status = getParentStatus($report, 'SAMA-CSF-3.1.1.4.'); @endphp
    <x-main-control id="3.1.1.4" ... :status="$status" />
    <x-sub-control id="3.1.1.4.A" details="{{ $control->control_description }}" ... :control="$control" />
@endif

{{-- After (correct): --}}
@if ($control->control_id == 'SAMA-CSF-3.1.1.4')
    @php $status = getParentStatus($report, 'SAMA-CSF-3.1.1.4.'); @endphp
    <x-main-control id="3.1.1.4" ... :status="$status" />
@endif
@if ($control->control_id == 'SAMA-CSF-3.1.1.4.A')
    <x-sub-control id="3.1.1.4.A" details="{{ $control->control_description }}" ... :control="$control" />
@endif
```
This fix must be applied to every parent-with-children block in the file (~30 occurrences).

---

## Medium Bugs

### Bug 3: `getParentStatus()` maps "Not Applicable" to "Implemented"

**File:** `app/helpers.php` — lines 9–14, 33

**Code:**
```php
$statusLevels = [
    'Not Implemented'     => 1,
    'Partially Implemented' => 2,
    'Implemented'         => 3,
    // 'Not Applicable' is missing
];

$minLevel = $statuses->map(fn($status) => $statusLevels[$status] ?? 3)->min();
//                                                                     ^^^
//                                         fallback 3 = "Implemented" level
```

**Root cause:** `Not Applicable` has no entry in `$statusLevels`. The `?? 3` fallback assigns it the highest compliance level (Implemented). When child controls are marked "Not Applicable", the parent rollup reports higher compliance than is warranted.

**Impact:** Parent controls appear more compliant than they are. Affects all SAMA and NCA reports that use `getParentStatus()` and Excel export (line 1216, 1225).

**Fix:** Decide on the business rule for "Not Applicable" and apply it consistently. Options:
- **Exclude from rollup** (most common GRC practice): skip N/A controls when computing the minimum
- **Treat as its own level** between "Not Implemented" and "Partially Implemented"

Recommended fix (exclude from rollup):
```php
$filteredStatuses = $statuses->reject(fn($s) => $s === 'Not Applicable');

if ($filteredStatuses->isEmpty()) {
    return $formatted
        ? "<p><span>لاينطبق</span><br><span>Not Applicable</span></p>"
        : "لاينطبق - Not Applicable";
}

$minLevel = $filteredStatuses->map(fn($status) => $statusLevels[$status] ?? 1)->min();
```

---

### Bug 4: `getParentStatus()` ignore list uses IDs without `SAMA-CSF-` prefix

**File:** `resources/views/process/reporting/sama/controls.blade.php` — line 283

**Code:**
```blade
$status = getParentStatus(
    $report,
    'SAMA-CSF-3.1.4.1.',
    true,
    '3.1.4.1.C,3.1.4.2,3.1.4.2.C,3.1.4.3,3.1.4.4,3.1.4.4.A,3.1.4.4.E,3.1.4.4.G,3.1.4.4.I,3.1.4.6',
);
```

**Root cause:** `getParentStatus()` does `in_array($item->control_id, $ignore)`. The actual `control_id` values in `$report` are prefixed: `SAMA-CSF-3.1.4.1.C`, `SAMA-CSF-3.1.4.2`, etc. The ignore strings have no prefix, so `in_array` always returns false. No controls are ever excluded.

**Impact:** Parent status for `3.1.4.1` and similar controls silently includes controls that were meant to be excluded from the calculation, producing incorrect rollup scores.

**Fix:** Add the full prefix to all IDs in the ignore string:
```blade
'SAMA-CSF-3.1.4.1.C,SAMA-CSF-3.1.4.2,SAMA-CSF-3.1.4.2.C,...'
```
Or update `getParentStatus()` to accept bare IDs and prepend the pattern's common prefix internally.

---

### Bug 5: `generatePdf()` return value discarded — response bypasses Laravel pipeline

**File:** `app/Http/Controllers/RegulatoryReportController.php` — lines 72–84, 86–99, and all similar PDF blocks; `generatePdf()` lines 205–227.

**Code:**
```php
// In ecc(), ecc_2024(), cscc(), etc.:
if (request()->has('pdf')) {
    $this->generatePdf($path, $report, 'NCA-ECC-Report.pdf');  // return value ignored
}

// In generatePdf():
return response($mpdf->Output($reportName, 'D'))
    ->header('Content-Type', 'application/pdf')
    ->header('Content-Disposition', 'attachment; filename="..."');
```

**Root cause:** `generatePdf()` returns a proper Laravel `Response` object, but none of the callers `return` it. The PDF download works only because `mPDF::Output('D')` writes HTTP headers and body directly to PHP's output buffer, bypassing Laravel's response pipeline. The constructed `response()` object is created and immediately garbage-collected.

**Impact:** Laravel after-response middleware (logging, session saving, CORS headers, etc.) may not fire correctly for PDF requests. The code is also misleading — it looks like a proper response is being built but it's actually bypassed.

**Fix:** Return the response from all callers:
```php
if (request()->has('pdf')) {
    return $this->generatePdf($path, $report, 'NCA-ECC-Report.pdf');
}
```
Apply to: `ecc()`, `ecc_2024()`, `cscc()`, `ccc()`, `tcc()`, `osmacc()`, `dcc()`, `sama()`.

---

## Low Severity / Code Quality

### Issue 6: Dead code in `RegulatoryExcelReportController`

**File:** `app/Http/Controllers/RegulatoryExcelReportController.php` — line 1284

```php
return response()->download($outputFilePath)->deleteFileAfterSend(true);  // line 1282

return response()->json(['message' => 'File updated successfully.']);  // line 1284 — unreachable
```

**Fix:** Remove line 1284.

---

### Issue 7: ECC 2018 blade uses hardcoded descriptions

**File:** `resources/views/process/reporting/nca/ecc/index.blade.php`

**Pattern:** Control descriptions and Arabic text are hardcoded as string literals in the blade file rather than using `$control->control_description` and `$control->control_description_ar` from the database (as SAMA and ECC-2024 views do).

**Impact:** If control descriptions are updated in the database, ECC 2018 reports will not reflect the changes. Creates a maintenance burden — two sources of truth for the same data.

**Fix:** Replace hardcoded strings with `{{ $control->control_description }}` and `{{ $control->control_description_ar }}` throughout `ecc/index.blade.php` and `ecc/pdf.blade.php`, matching the pattern used in SAMA and other framework views.

---

### Issue 8: Redundant eager load in `RegulatorySummaryReportController`

**File:** `app/Http/Controllers/RegulatorySummaryReportController.php` — lines 86–105 (repeated in all 6 framework methods)

```php
$bestPractice = BestPractice::with('domains.subDomains.controls.owner')->find($bestPracticeId);
// ...
$controls = $bestPractice->controls;
$controls->load('owner');  // owner already loaded via the with() above
```

**Fix:** Remove `$controls->load('owner')`. The `owner` relation is already in the eager load chain.

---

### Issue 9: No guard on missing `controlAssessmentId`

**File:** `app/Http/Controllers/RegulatoryReportController.php` — all framework methods (e.g., lines 73–84)

If the `controlAssessmentId` query param is missing (e.g., user hits the URL directly), the report renders with all controls defaulting to "Not Implemented" with no indication that no assessment was selected. This could be misread as a legitimate report.

**Fix:** Add an early validation check:
```php
$controlAssessmentId = request('controlAssessmentId');
abort_if(empty($controlAssessmentId), 400, 'controlAssessmentId is required.');
```

---

### Issue 10: Typo in SAMA Excel headers array

**File:** `app/Http/Controllers/RegulatoryExcelReportController.php` — line 1087

```php
'D' => 'complaince_level_main',  // typo: "complaince"
'F' => 'complaince_level_sub',   // typo: "complaince"
```

The column key string is not used for data access (data comes from `$rowData->status`), so this is functionally harmless. But it would confuse anyone debugging the Excel mapping logic.

**Fix:** Rename to `'compliance_level_main'` and `'compliance_level_sub'`.

---

## Summary Table

| # | Severity | Description | File | Lines |
|---|----------|-------------|------|-------|
| 1 | ~~Critical~~ **False Positive** | `show()` only used by ECC-2018 & CCC-2020; `else` branch is intentional ECC v2 path | `RegulatoryReportController.php` | 51–70 |
| 2 | Critical | SAMA first sub-control renders parent's description | `sama/controls.blade.php` | ~30 locations |
| 3 | Medium | `Not Applicable` treated as Implemented in parent rollup | `app/helpers.php` | 9–33 |
| 4 | Medium | Ignore list missing `SAMA-CSF-` prefix — never fires | `sama/controls.blade.php` | 283 |
| 5 | Medium | `generatePdf()` return value discarded | `RegulatoryReportController.php` | 79, 94, 107, etc. |
| 6 | Low | Dead unreachable code | `RegulatoryExcelReportController.php` | 1284 |
| 7 | Low | ECC 2018 uses hardcoded descriptions vs DB | `ecc/index.blade.php` | throughout |
| 8 | Low | Redundant `$controls->load('owner')` in summary controller | `RegulatorySummaryReportController.php` | 103 (×6) |
| 9 | Low | No validation on missing `controlAssessmentId` | `RegulatoryReportController.php` | all methods |
| 10 | Low | Typo `complaince` in SAMA Excel headers | `RegulatoryExcelReportController.php` | 1087 |

---

## Improvements

### 1. Unified `getReport()` method
`RegulatoryReportController::getReport()` and `RegulatoryExcelReportController::getReport()` are identical (copy-paste). Extract into a shared service class or trait.

### 2. SAMA controls.blade.php — eliminate O(n²) iteration
The file runs `@foreach ($report as $control)` independently for every sub-domain section (currently ~35 separate loops over the full collection). For large assessments this is O(n × sections). Fix: group/key the report collection by `control_id` before the view renders, then do direct lookups:
```php
// In controller:
$reportByControlId = $report->keyBy('control_id');
// In view:
@if ($ctrl = $reportByControlId->get('SAMA-CSF-3.1.1.4'))
    ...
@endif
```

### 3. `getParentStatus()` — replace with a proper status priority enum
Current string comparisons are fragile. A PHP enum or constant class for compliance status would make the priority logic type-safe and extensible.

### 4. SAMA Excel row mapping — consider data-driven approach
The `$parentControlMap` in `RegulatoryExcelReportController` (lines 1126–1208) hardcodes ~60 row-to-controlId mappings. If the Excel template changes row layout, every mapping must be updated manually. Consider embedding control IDs directly in the Excel template cells or deriving row positions from the ordered data iteration rather than hardcoding.

### 5. Validation on `$cloudControlType` for CCC
`ccc()` and `getReport()` accept `$cloudControlType` from user input and use it directly in `WHERE c.control_cloud = ?`. While parameterised (safe from injection), there is no validation that it's one of `['csp', 'cst']`. An unexpected value returns an empty report with no error.
