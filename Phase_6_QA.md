# Phase 5 — Risk Assessment QA Audit Report
**Eagle Eye GRC System | Laravel 9 | Date: 2026-04-28**

---

## Executive Summary

The Risk Assessment module (Phase 5) has a functional skeleton — master creation, finding entry, and a control-status display all exist — but contains a cluster of confirmed bugs, a dead business-rule implementation, three data integrity gaps, and zero standards alignment for the verification/validation distinction. None of the three core business rules stated by the product owner are fully enforced. The module is not production-safe in its current state without targeted fixes.

---

## Flow Walkthrough

| Step | Route | Controller Method | Status |
|---|---|---|---|
| 1. List assessments | `GET /risk-assessments` | `index()` | Works — minor UX variable name confusion (`$controlAssessment` in Blade loop) |
| 2. Create master | `GET/POST /risk-assessments/create` | `create()` / `store()` | Works with bugs (see below) |
| 3. Edit master | `GET/PUT /risk-assessments/{id}/edit` | `edit()` / `update()` | Works |
| 4. View master | `GET /risk-assessments/{id}` | `show()` | Works structurally; findings table shows blank status (BUG-01) |
| 5. Create finding | `GET /risk-assessment-findings/create/{id}` | `create()` / `store()` | Works — AJAX control lookup functional |
| 6. Edit finding | `GET /risk-assessment-findings/{id}/edit` | `edit()` | Broken risk filter logic (BUG-06) |
| 7. View finding | `GET /risk-assessment-findings/{id}` | `show()` | Works |
| 8. Delete assessment | `DELETE /risk-assessments/{id}` | `destroy()` | Works, cascades to findings |
| 9. Risk status overview | `GET /risk-status` | `RiskStatusController::index()` | Partially works — status counts always zero (BUG-02) |

---

## Bugs Found

### Critical

**BUG-01 — Status column always blank**
- `resources/views/process/assessments/risk-assessments/show.blade.php:102`
- Renders `$finding->risk_implementation_status` — column does not exist
- Real column name: `implementation_status`
- Every status cell in the findings table renders empty

**BUG-02 — Closed risk counts always zero system-wide**
- Form stores `"Open"` / `"Close"` (title-case)
- `app/Http/Controllers/RiskStatusController.php:85` queries `"closed"` / `"open"` (lowercase)
- `app/Http/Controllers/OCDController.php:507` queries `"Close"` (mixed-case)
- Three locations — zero agreement — all closed-risk counts = 0 on every dashboard and summary

**BUG-03 — `RiskAssessmentFinding` model has wrong primary key**
- `app/Models/RiskAssessmentFinding.php:15-16`
- Sets `protected $primaryKey = 'risk_assessment_id'` with `$incrementing = false`
- `risk_assessment_id` is a foreign key, not a row identity
- `find()`, `update()`, and route-model-binding silently operate on the wrong record or the first matching record in a group
- Controllers use `RiskAssessmentDetail` (safe), but this model is a latent trap for any future code that imports it

**BUG-04 — Auto-close logic computed but never delivered — feature is dead code**
- `app/Http/Controllers/RiskAssessmentController.php:253-255`
- `get_control_by_risk()` correctly computes whether all controls are implemented and sets `$status = "Close"`
- The three lines that inject this status into the AJAX response are commented out
- Business rule "if all controls are implemented, risk is closed" exists but never fires

---

### High

**BUG-05 — Wrong view file at `risk-assessment-findings/index.blade.php`**
- `resources/views/process/assessments/risk-assessment-findings/index.blade.php`
- Contains Control Assessment index content (`@section('title', 'Control Assessments Summary')`, references `route('control-assessments.index')`)
- Currently unreachable because the index route is excluded, but dangerous if re-enabled

**BUG-06 — Edit method risk filter is self-contradicting**
- `app/Http/Controllers/RiskAssessmentFindingController.php:82-90`
- Left-join applies `where rad.risk_finding_id = :current` AND `whereNot risk_finding_id = :current` simultaneously — mutually exclusive
- Result: no rows match the join; `whereNull` passes everything; all risks shown instead of filtered set

**BUG-07 — Due date fields: HTML `required` vs server `nullable` mismatch**
- `resources/views/process/assessments/risk-assessment-findings/create.blade.php:159,177`
- `corrective_action_due_date` and `preventive_action_due_date` are HTML `required` but server validates both as `nullable`
- Browser blocks submission without dates; direct API call bypasses entirely

**BUG-08 — `risk_assessment_end_date` same HTML/server mismatch**
- `resources/views/process/assessments/risk-assessments/create.blade.php:48`
- HTML `required`, server `nullable` — same pattern as BUG-07

---

### Medium

**BUG-09 — `risk_assessment_against` validated and displayed but no form input**
- Validated as `nullable` in controller; displayed in `show.blade.php:64`; absent from `create.blade.php`
- Field is always NULL — always shows `—` on detail page

**BUG-10 — `maturity_level` validated but no form input**
- `app/Http/Controllers/RiskAssessmentFindingController.php:46,107` validates `maturity_level` as `nullable`
- No dropdown or input in `create.blade.php` — field always NULL

**BUG-11 — `risk_appetite_color` stores text label on edit, hex on new record**
- `resources/views/process/assessments/risk-assessment-findings/create.blade.php:108`
- Hidden field pre-populated from `$riskAssessmentFinding?->risk_appetite` (text like `"High"`) on edit
- JS on line 259 sets hex `"#FF0000"` during fresh interaction
- Stored value is inconsistent between new and edited records

**BUG-12 — Risk Status page silently hides risks with no mapped controls**
- `app/Http/Controllers/RiskStatusController.php:47`
- `->join('risk_vs_control_table as rvc', ...)` is an INNER JOIN
- Any risk with no entries in `risk_vs_control_table` is invisible on the status page
- Misleading: unmitigated open risks appear as if they do not exist

**BUG-13 — Stored XSS in Risk Status view**
- `resources/views/process/risk-identification/risk-status/index.blade.php:111-113`
- `{!! $row->controls !!}`, `{!! $row->control_status !!}`, `{!! $row->control_owner !!}` render raw `GROUP_CONCAT` output
- If control names or owner names contain `<script>` or `<img onerror=...>`, stored XSS executes

---

### Low

**BUG-14 — No `canWrite`/`canDelete` authorization guards in risk assessment controllers**
- `ControlAssessmentController` calls `abort_unless(auth()->user()->canWrite(), 403)` explicitly
- `RiskAssessmentController` and `RiskAssessmentFindingController` do not — inconsistent with established pattern

**BUG-15 — Loop variable wrong name in index view**
- `resources/views/process/assessments/risk-assessments/index.blade.php:47`
- `@forelse ($riskAssessments as $controlAssessment)` — loop variable name is wrong, misleads readers

**BUG-16 — `risk-control` POST route has no name**
- `routes/web.php:343`
- AJAX call in Blade uses hardcoded URL `/risk-control` — breaks silently if URL ever changes
- Named equivalent `risk-controls.show` at line 542 exists for comparison

**BUG-17 — `RiskAssessment::findings()` uses custom business ID as both FK and local key (non-standard)**
- `app/Models/RiskAssessment.php:16`
- `$this->hasMany(RiskAssessmentDetail::class, 'risk_assessment_id', 'risk_assessment_id')`
- Works correctly while `risk_assessment_id` is unique, but is non-standard — document the intent

---

## Business Rule Compliance

| Business Rule | Enforced? | Evidence |
|---|---|---|
| Risk Assessment is prerequisite for Control Assessment | **No** | `ControlAssessmentController::store()` has no check that any `RiskAssessment` exists |
| All controls implemented → risk is Closed | **No** | Logic computed in `get_control_by_risk()` but delivery code is commented out (lines 253-255) |
| Verification = internal, Validation = 3rd party | **Not modeled** | No `verified_by`, `validated_by`, `verification_date`, or `validation_date` fields on either model |
| Status options: Open, Closed, Not Applicable | **Partial** | Form offers only `Open` / `Close` — `"Not Applicable"` absent from finding status dropdown entirely |

---

## Standards Gaps (ISO 27005:2022 / NIST SP 800-37)

| Gap | Standard | Detail |
|---|---|---|
| No structured threat-scenario capture | ISO 27005 Cl. 8.3 | Finding links one risk via free text — no asset FK, no threat agent FK |
| Risk appetite thresholds hardcoded in JS | ISO 27005 Cl. 8.4 | Should reference `risk_appetite_table`; threshold changes require a code deploy |
| No residual risk calculation | ISO 27005 Cl. 8.5 | No `residual_likelihood`, `residual_impact`, `residual_score` fields anywhere |
| No treatment plan status tracking | ISO 27001 Cl. 6.1.3 | `risk_treatment_id` FK exists but no planned date, owner, or completion date at treatment level |
| No audit trail (`created_by`, timestamps) | NIST RMF Task P-14 | `$timestamps = false` on both models — zero record of who assessed when |
| Risk status monitoring incomplete | ISO 27001 Cl. 9.1 | Excludes risks with no controls; no trend, no filter by owner/dept, no export |

---

## Improvement Suggestions

### High — Fix before any user-facing release

1. **Fix field name** — `risk_implementation_status` → `implementation_status` in `show.blade.php:102` (1-line change; unblocks core status display)

2. **Standardize status values** — pick one casing: `"Open"` / `"Closed"` / `"Not Applicable"` (title-case, past-tense "Closed"). Update: form dropdown, `RiskStatusController` SQL strings, `OCDController` SQL strings, `RCDBController`, and all chart data sources. Add `"Not Applicable"` to the dropdown (product owner requirement).

3. **Re-enable auto-close suggestion** — uncomment lines 253-255 in `RiskAssessmentController::get_control_by_risk()`. Business logic is already correct; only the AJAX response delivery is disabled. Wire the returned hidden input value to pre-select the `implementation_status` dropdown via JS.

4. **Fix due date HTML/server mismatch** — remove `required` attribute from `corrective_action_due_date` and `preventive_action_due_date` in `create.blade.php:159,177`, OR add `required|date` to server validation to match the HTML.

5. **Fix `risk_assessment_end_date` mismatch** — remove HTML `required` or change server validation from `nullable` to `required|date|after_or_equal:risk_assessment_start_date`.

6. **Add Control Assessment prerequisite guard** — in `ControlAssessmentController::store()`, add `abort_unless(RiskAssessment::exists(), 422, 'A risk assessment must exist before creating a control assessment.')`.

### Medium — Fix in next sprint

7. **Add `risk_assessment_against` input** to create/edit form, or remove it from validation and the show view entirely.

8. **Add `maturity_level` dropdown** (suggested values: 1–5: Initial, Developing, Defined, Managed, Optimizing) to finding create/edit form, or remove it from validation.

9. **Fix `risk_appetite_color` inconsistency** — drop the stored column; compute color client-side from `risk_appetite` text on display, so create and edit are always consistent.

10. **INNER JOIN → LEFT JOIN** in `RiskStatusController.php:47` so risks with no mapped controls appear as unmitigated open risks rather than being invisible.

11. **Escape XSS vectors** in `risk-status/index.blade.php:111-113` — replace `{!! $row->controls !!}`, `{!! $row->control_status !!}`, `{!! $row->control_owner !!}` with `{{ }}` or `{!! e(nl2br($row->controls)) !!}` if HTML line-breaks are needed.

12. **Fix self-contradicting edit filter** in `RiskAssessmentFindingController::edit()` — replace the mutually-exclusive join conditions with a `whereNotIn` or `whereHas` subquery that excludes risks already assigned to other findings in the same assessment.

13. **Add `canWrite`/`canDelete` guards** to `RiskAssessmentController::store()`, `update()`, `destroy()` and `RiskAssessmentFindingController::store()`, `update()`, `destroy()` to match the control assessment authorization pattern.

14. **Name the `risk-control` POST route** at `routes/web.php:343` and update the hardcoded `/risk-control` URL in the Blade script block to use `route()`.

### Low — Backlog / future phases

15. **Add `created_by` / `assessed_by` fields** to `risk_assessment_master_table` and `risk_assessment_details_table` via migration, auto-populated from `auth()->id()` in store methods — minimum viable audit trail for ISO 27001 Clause 9.1 and NIST RMF Task P-14.

16. **Add `verified_by` / `validated_by` fields** to the finding record to model the internal verification / 3rd-party validation distinction stated in business rules. Reference the `auditor_table` or `owner_table`.

17. **Move risk appetite thresholds** from hardcoded JS constants to `risk_appetite_table` — fetch via API or Blade-inlined JSON so threshold changes do not require a code deploy.

18. **Add residual risk fields** (`residual_likelihood`, `residual_impact`, `residual_score`) to the finding record to enable before/after comparison and comply with ISO 27005 Clause 8.5.

19. **Delete or fix `RiskAssessmentFinding` model** — unused, wrong PK (`risk_assessment_id` is a FK not a row ID), dangerous latent bug for any future import.

20. **Rename loop variable** `$controlAssessment` → `$riskAssessment` in `risk-assessments/index.blade.php:47`.

---

## Quick Wins (< 30 min each, high visibility)

| Fix | File | Effort |
|---|---|---|
| `risk_implementation_status` → `implementation_status` | `show.blade.php:102` | 1 line |
| Add `"Not Applicable"` to status dropdown | `create.blade.php:77` | 1 line |
| Remove HTML `required` from corrective/preventive due dates | `create.blade.php:159,177` | 2 attributes |
| Add route name to `risk-control` POST endpoint | `routes/web.php:343` | 1 line |
| Rename loop variable `$controlAssessment` → `$riskAssessment` | `risk-assessments/index.blade.php:47` | 1 word |
| Escape `{!! !!}` outputs in risk-status view | `risk-status/index.blade.php:111-113` | 3 lines |

---

## Summary

**17 bugs confirmed. 3 core business rules unimplemented. 1 stored XSS. Zero audit trail.**

Highest-impact single fix: **BUG-02** (standardize status string casing) — corrects all closed-risk counts across dashboards, status page, and OCD controller simultaneously.

Fastest business value unlock: **BUG-04** (uncomment auto-close in `get_control_by_risk()`) — the logic is already correct; only the UI delivery is disabled. Re-enables the core feature with zero logic changes.
