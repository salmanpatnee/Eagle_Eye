# Phase 7 QA Report — Evidence vs Control & Control vs Evidence

**Date:** 2026-05-02
**Branch:** qa/phase-7
**Scope:** `ControlEvidenceController`, `control-vs-evidence.blade.php`, `evidence-vs-control.blade.php`, `EvidenceController`, `Evidence` model, `ControlMaster` model

---

## Summary

| Severity | Count |
|----------|-------|
| Critical | 2 |
| High | 5 |
| Medium / Logical | 3 |
| UI | 5 |
| **Total** | **15** |

---

## Critical Bugs

### 2. INNER JOINs on domain/subdomain silently exclude valid controls/evidence

**File:** `app/Http/Controllers/ControlEvidenceController.php:63-66` (controlVsEvidence), `:173-176` (evidenceVsControl)

Both queries use INNER JOIN on `control_master_table_vs_domain_table` and `control_master_table_vs_sub_domain_table`. Controls not assigned to any domain/subdomain are silently excluded even when no domain filter is applied. Same issue in `evidenceVsControl` — evidence whose linked controls have no domain mapping are excluded.

**Fix:** Change to LEFT JOINs. The `->when()` filter conditions already handle conditional WHERE clauses — the JOIN itself is the issue.

---

### 3. Wrong Arabic label on toggle button — both views

**Files:** `resources/views/process/control-vs-evidence.blade.php:14`, `resources/views/process/evidence-vs-control.blade.php:14`

Both views have:
```blade
label_ar="المخاطر مقابل الضوابط"
```
This translates to "Risks vs Controls". Should be:
```blade
label_ar="الأدلة مقابل الضوابط"
```
("Evidence vs Controls")

---

## High Bugs

### 4. `group_concat_max_len` set in `evidenceVsControl` only — missing from `controlVsEvidence`

**File:** `app/Http/Controllers/ControlEvidenceController.php:167` (evidenceVsControl only)

`controlVsEvidence()` has no `SET SESSION group_concat_max_len`. Controls with many linked evidences can silently truncate GROUP_CONCAT output with no error.

**Fix:** Add `DB::statement("SET SESSION group_concat_max_len = 1000000")` before the `controlVsEvidence` query, matching the pattern already used in `evidenceVsControl`.

---

### 5. `Evidence::categories()` withPivot typo

**File:** `app/Models/Evidence.php:39`

```php
->withPivot('evidence_id', 'evidence_id')
```

Second argument should be `'category_id'`. Pivot data for categories returns a duplicate `evidence_id` column instead of `category_id`.

---

### 6. Dead code in `EvidenceController::edit()` — complex JOIN discarded

**File:** `app/Http/Controllers/EvidenceController.php:142-148`

Lines 142–148 build a 5-table JOIN to fetch `$artifacts` with attachment details. Line 151 derives `$selectedArtifactIds` from it. Lines 167–169 then **overwrite** `$artifacts` with a plain `Artifact::select()` — the JOIN result is discarded.

The entire JOIN exists solely to `pluck()` IDs, which is massively over-engineered and dead after the overwrite.

**Fix:** Replace lines 142–158 with:
```php
$selectedArtifactIds = $evidence->artifacts()->pluck('artifact_table.artifact_id')->toArray();
```

---

### 7. `$owners` declared twice in `EvidenceController::edit()`

**File:** `app/Http/Controllers/EvidenceController.php:138`, `162`

`$owners` is fetched at line 138, then fetched again identically at line 162. The second assignment overwrites the first. Line 138 is dead code.

---

### 8. `ControlMaster` has no `evidences()` inverse relationship

**File:** `app/Models/ControlMaster.php`

`Evidence::controls()` (belongsToMany) is defined. No reverse `ControlMaster::evidences()` exists. The Control module cannot eager-load linked evidence — raw queries required everywhere.

**Fix:** Add to `ControlMaster`:
```php
public function evidences(): BelongsToMany
{
    return $this->belongsToMany(Evidence::class, 'evidence_vs_control_table', 'control_id', 'evidence_id');
}
```

---

## Medium / Logical Issues

### 9. Stale `$controlId` filter when best practice changes

**File:** `app/Http/Controllers/ControlEvidenceController.php:145-148`, `36-38`

When `$bestPracticeId` is empty, `$domainId` and `$subDomainId` reset to null (lines 36–38 and 145–147). But `$controlId` is **not** reset. A user switching best practice retains a stale `control_id` from the previous practice, producing empty results with no error.

**Fix:** Also reset `$controlId = null` when `$bestPracticeId` is empty.

---

### 10. HTML anchor tags generated inside SQL GROUP_CONCAT

**File:** `app/Http/Controllers/ControlEvidenceController.php:75-77`, `183-185`

Presentation logic (HTML `<a>` tags) is embedded in SQL GROUP_CONCAT expressions. This violates separation of concerns — the data is unusable outside the web view (Excel exports, API responses, and tests all receive raw HTML strings). PDF views render these anchors, which is functional but tightly couples URL structure to controller SQL.

**Status:** Acceptable given current app pattern; flagged as tech debt.

---

### 11. `controlVsEvidence` groupBy includes `b.sort_order` — potential duplicates

**File:** `app/Http/Controllers/ControlEvidenceController.php:89`

```php
->groupBy('c.id', 'c.control_id', 'c.control_name', 'b.sort_order')
```

Including `b.sort_order` in groupBy causes duplicate control rows if a control is linked to multiple best practices with different sort orders. The `evidenceVsControl` query has an analogous multi-join issue.

---

## UI Issues

### 16. PDF button renders with no href — clicking does nothing

**Files:** `resources/views/process/control-vs-evidence.blade.php:9`, `resources/views/process/evidence-vs-control.blade.php:10`

Both views call `<x-action.pdf-button :url="$pdfUrl" />` but neither controller passes `$pdfUrl`. The `pdf-button` component defaults `url` to `''` via `@props`, so `null` is passed → `$href = ''` → button renders without an `<a>` wrapper. The button appears on the page but clicking does nothing. PDF generation itself works at the `?pdf` URL param (controller lines 99, 204).

**Fix:** In each controller action, build:
```php
$pdfUrl = request()->fullUrl() . (str_contains(request()->fullUrl(), '?') ? '&' : '?') . 'pdf';
```
Then add `$pdfUrl` to the `compact()` call.

---

### 12. No pagination on either view

All controls/evidences are returned in a single unbounded query. At current data scale this is manageable; with 100+ controls each having multiple evidences the table becomes unmanageable.

---

### 13. Control Name has no link in `control-vs-evidence` view

**File:** `resources/views/process/control-vs-evidence.blade.php:65`

Control ID links to `controls.show` (lines 61–63). Control Name is plain text — no link. Inconsistent with `evidence-vs-control` where both ID and Name link to `evidences.show`.

**Fix:** Wrap Control Name in the same anchor as Control ID.

---

### 14. No "Clear Filters" / Reset button on either view

Both filter forms auto-submit on change. No way to reset all filters without manually selecting each dropdown individually. Consistent with other modules in the app but frequently needed.

---

### 15. Controls dropdown shows IDs only — no names

**File:** `resources/views/process/control-vs-evidence.blade.php:39-41`

```blade
:custom_data="$controlIds"
```

Plain array of IDs passed to `x-form.select`. Users cannot identify controls by name in the filter dropdown.

**Fix:** Pass structured collection with `control_id` and `control_name`; use `id_key`/`value_key` props on the component.

---

## Alignment with Base Modules

### Evidence module — ✅ Good

- `EvidenceController::store()` / `update()` correctly use `attach()` / `sync()` on `$evidence->controls()`.
- `EvidenceController::show()` eager-loads controls; links route to `controls.show`.
- `EvidenceController::destroy()` correctly detaches all pivot relations before deleting.

### Control module — ⚠️ Partial

- `ControlController` creates/updates controls but **never syncs evidence**. Evidence linking is unidirectional — driven from the Evidence side only.
- `controls.show` view does not display linked evidence. A user viewing a control has no visibility of supporting evidence.
- No `evidences()` relationship on `ControlMaster` model (see finding #8).

**Recommendation:** Add evidence listing to `controls.show` and add the inverse `evidences()` relationship.

### Filter ordering consistency — ⚠️ Inconsistent

- `controlVsEvidence` orders by best practice `sort_order` then parsed `control_id` segments — correct.
- `evidenceVsControl` orders by `evidence_name` only (line 200) — no control-based or practice-based ordering. Evidence position varies by name regardless of active filters.
