# Phase 3 QA Report: Best Practices Based Control Assessments

**Total Issues Found: 13**
**Date:** 2026-04-22

---

## CRITICAL BUGS (Fix First — These Show Wrong Data)

### BUG-P3-01: Show Page Displays Wrong Field for Remarks
**File:** `resources/views/process/assessments/control-assessment-findings/show.blade.php` line 56
**Problem:** Shows `control_maturity_justification` in Remarks row
**Effect:** Assessor reads maturity justification text where remarks should appear
**Fix:** Change to `{{ $controlAssessmentFinding->remarks ?? '—' }}`

---

### BUG-P3-02: AJAX Query Uses INNER JOIN — Hides Valid Evidence
**File:** `app/Http/Controllers/ControlAssessmentFindingController.php` lines 140–147
**Problem:** `get_evidence_by_conroller()` starts from `evidence_vs_artifact_table` and JOINs evidence. Evidence with no artifacts produces no rows — invisible to assessor.
**Effect:** Assessor may incorrectly rate a control as "Not Implemented" because evidence is hidden
**Fix:** Restructure query — start from `evidence_table`, LEFT JOIN artifacts:
```php
DB::table('evidence_table AS ev')
    ->join('evidence_vs_control_table AS evc', 'ev.evidence_id', '=', 'evc.evidence_id')
    ->leftJoin('evidence_vs_artifact_table AS eva', 'ev.evidence_id', '=', 'eva.evidence_id')
    ->leftJoin('artifact_table AS at', 'eva.artifact_id', '=', 'at.artifact_id')
    ->where('evc.control_id', '=', $controlId)
```

---

## SECURITY ISSUES

### SEC-P3-01: XSS in Evidence Panel — HTML Built Without Escaping
**File:** `app/Http/Controllers/ControlAssessmentFindingController.php` lines 150–178
**Problem:** Raw HTML built from DB values — `$row->evidence_name`, `$row->id` injected directly into string
**Effect:** Stored XSS — malicious evidence name executes script in assessor's browser
**Fix:** Wrap all DB values in `e()`:
```php
$html .= "<td>..." . e($row->evidence_name) . "...</td>";
```

---

### SEC-P3-02: AJAX Endpoint Input Not Validated
**File:** `app/Http/Controllers/ControlAssessmentFindingController.php` line 141
**Problem:** `$request->selectedValue` used raw in `->where()` — no type/length validation
**Fix:**
```php
$request->validate(['selectedValue' => 'required|string|max:50']);
$controlId = $request->input('selectedValue');
```

---

### SEC-P3-03: No Authorization on Assessment Access
**File:** `app/Http/Controllers/ControlAssessmentController.php` lines 59, 98, 119, 128
**Problem:** `show`, `edit`, `update`, `destroy` accept any `ControlAssessment` via route model binding — no ownership check
**Effect:** Any authenticated user can view/edit/delete any assessment
**Fix:** Add policy or manual auth check — at minimum: `abort_unless(auth()->id() === $controlAssessment->created_by, 403)`

---

## LOGIC ERRORS

### LOGIC-P3-01: Evidence Snapshot Not Recorded (Broken Audit Trail)
**File:** `app/Http/Controllers/ControlAssessmentFindingController.php` store/update
**Problem:** Finding stores `control_id` only. Evidence panel is a live query — if Phase 2 evidence is later deleted or unlinked, the finding loses its evidence backing with no historical record.
**Standard:** ISO 27001 Clause 9.1 requires retaining evidence of what was reviewed
**Fix:** On store/update, save shown evidence IDs to `assessment_finding_vs_evidence_table` pivot

---

### LOGIC-P3-02: Date Validation Missing on Assessment
**File:** `app/Http/Controllers/ControlAssessmentController.php` store/update validation
**Problem:** `control_assessment_end_date` not validated to be after start date
**Effect:** Assessment can have end date before start date — nonsensical data
**Fix:** Add to FormRequest:
```php
'control_assessment_end_date' => 'required|date|after:control_assessment_start_date',
```

---

### LOGIC-P3-03: Duplicate Finding Possible via Race Condition
**File:** `app/Http/Controllers/ControlAssessmentFindingController.php` store()
**Problem:** UI filters assessed controls client-side, but no DB unique constraint on `(control_assessment_id, control_id)`. Concurrent submits create duplicates.
**Fix:** Migration adding unique constraint + controller validation:
```php
'control_id' => 'required|unique:control_assessment_details_table,control_id,NULL,id,control_assessment_id,' . $controlAssessment->id,
```

---

### LOGIC-P3-04: Corrective/Preventive Action Due Dates Not Validated
**File:** `app/Http/Controllers/ControlAssessmentFindingController.php` (FormRequest)
**Problem:** Due dates for corrective/preventive actions can be set in the past
**Fix:**
```php
'corrective_action_due_date'  => 'nullable|date|after_or_equal:today',
'preventive_action_due_date'  => 'nullable|date|after_or_equal:today',
```

---

## MISSING FEATURES

### MISS-P3-01: No Compliance Score / Completion Dashboard
**File:** `resources/views/process/assessments/control-assessments/show.blade.php`
**Problem:** No visibility into "X of Y controls assessed", breakdown by status
**Effect:** Management cannot track progress or compliance posture
**Fix:** Add stats block — total controls in best practice, assessed count, breakdown by `control_implementation_status`

---

### MISS-P3-03: Maturity Levels Show Numbers Only
**Files:** All views displaying `control_maturity_level`
**Problem:** Raw integer (1–5) shown — no human label
**Standard labels:** 1=Initial, 2=Repeatable, 3=Defined, 4=Managed, 5=Optimized
**Fix:** Blade helper or array map in view:
```php
@php $maturityLabels = [1=>'Initial',2=>'Repeatable',3=>'Defined',4=>'Managed',5=>'Optimized']; @endphp
{{ $maturityLabels[$finding->control_maturity_level] ?? $finding->control_maturity_level }}
```

---

### MISS-P3-04: No PDF Export for Assessment Report
**Problem:** No way to export assessment + findings for management/auditors
**Fix:** Add PDF route + controller method + blade template using mPDF (same pattern as Phase 2 evidence PDF)

---

### MISS-P3-05: AJAX Endpoint Typo
**File:** `routes/web.php` line 330, `ControlAssessmentFindingController.php` line 135
**Problem:** Route `/evidence-conroller/` and method `get_evidence_by_conroller` — "controller" misspelled
**Fix:** Rename route to `/evidence-controller/` and method to `get_evidence_by_control`

---

## UI/UX ISSUES

### UI-P3-03: No Back Button to Parent Assessment
**File:** `resources/views/process/assessments/control-assessment-findings/show.blade.php`
**Problem:** No link back to parent assessment from finding show page
**Fix:** Add link: `route('control-assessments.show', $controlAssessmentFinding->control_assessment_id)`

---

## RECOMMENDED FIX ORDER

| Priority | Issue | Effort | Impact |
|----------|-------|--------|--------|
| 1 | BUG-P3-01 — Wrong remarks field | 5 min | Critical display bug |
| 2 | SEC-P3-01 — XSS in HTML builder | 15 min | Critical security |
| 3 | SEC-P3-02 — AJAX input validation | 10 min | High security |
| 4 | BUG-P3-02 — LEFT JOIN for evidence | 10 min | High — hides data |
| 5 | LOGIC-P3-02 — Date ordering validation | 10 min | Medium |
| 6 | LOGIC-P3-03 — Unique constraint on finding | 30 min | Medium |
| 7 | LOGIC-P3-04 — Due date past validation | 10 min | Medium |
| 8 | LOGIC-P3-01 — Evidence snapshot pivot | 2 hrs | High audit trail |
| 9 | ALIGN-05 — Risk auto-flag on control fail | 1 hr | High cross-phase |
| 10 | MISS-P3-01 — Compliance score dashboard | 1 hr | Medium UX |
| 11 | MISS-P3-03 — Maturity level labels | 15 min | Low |
| 12 | MISS-P3-04 — PDF export | 3 hrs | Medium |
| 13 | UI-P3-03 — Back button | 5 min | Low UX |

---

## Human Verification Steps

### Step 1 — Create a Control Assessment
1. Go to **Control Assessments** → **Add Control Assessment**
2. Fill: ID, Name, Dates (set End Date BEFORE Start Date)
3. **Verify:** Validation error shown for invalid date order — if no error → LOGIC-P3-02 confirmed
4. Fix dates. Select Best Practice, Location, Auditor, Classification. Submit.
5. **Verify:** Redirected to Assessment Show page

### Step 2 — Add a Finding
1. From Assessment show page, click **Add Finding**
2. **Verify:** Only controls under selected Best Practice shown — parent controls NOT listed
3. Select a control
4. **Verify:** Evidence panel populates via AJAX — if blank despite Phase 2 evidence → BUG-P3-02
5. Click an artifact link — **Verify:** file opens/downloads
6. Select Implementation Status = "Not Implemented"
7. Set corrective action due date in the PAST — **Verify:** system rejects it — if saves → LOGIC-P3-04
8. Submit — **Verify:** Finding appears on Assessment Show page

### Step 3 — Verify Show Page
1. Click the finding
2. **Verify:** "Remarks" shows remarks text, not maturity justification — if wrong → BUG-P3-01
3. **Verify:** Back/breadcrumb link to parent Assessment exists — if missing → UI-P3-03

### Step 4 — Test Duplicate Prevention
1. Add Finding again
2. **Verify:** Previously assessed control NOT in dropdown — if it appears → LOGIC-P3-03

### Step 5 — Test Evidence Without Artifacts
1. In Phase 2, create Evidence with NO Artifact attached. Link to a control.
2. In Phase 3, create Finding for that same control.
3. **Verify:** Artifact-less evidence APPEARS in panel — if not → BUG-P3-02 confirmed

### Step 6 — Test XSS
1. In Phase 2, create Evidence named `<b>TestBold</b>`
2. In Phase 3, select that control in findings create
3. **Verify:** Panel shows literal text `<b>TestBold</b>` — if bold text renders → SEC-P3-01 confirmed

### Step 7 — Compliance Dashboard
1. Return to Assessment Show after 2–3 findings
2. **Verify:** "X of Y controls assessed" visible — if not → MISS-P3-01
3. **Verify:** Status uses color badges — if plain text → UI-P3-04
