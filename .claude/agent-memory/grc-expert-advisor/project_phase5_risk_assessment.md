---
name: Phase 5 Risk Assessment QA Findings
description: Key structural facts and confirmed bugs from QA audit of Phase 5 Risk Assessment module (2026-04-28)
type: project
---

Phase 5 (Risk Assessment) was QA-audited in full read-only mode on 2026-04-28.

**Why:** Product owner requested comprehensive QA before fixing or expanding the module.

**Key confirmed facts:**

- Two models map to the same table (`risk_assessment_details_table`): `RiskAssessmentDetail` (no custom PK, used by controller) and `RiskAssessmentFinding` (sets `$primaryKey = 'risk_assessment_id'` with `$incrementing = false` — this is a bug; it maps an FK column as the PK).
- Risk status stored as `implementation_status` column in `risk_assessment_details_table`. The show view (`risk-assessments/show.blade.php:102`) references the non-existent field `$finding->risk_implementation_status` — always renders blank.
- Status values are inconsistent across the system: form stores `"Open"/"Close"`, `RiskStatusController` queries for `"closed"/"open"` (lowercase), dashboard `OCDController` queries for `"Close"` (mixed case) — counts will always be 0 for closed risks in the status summary.
- Auto-close logic in `get_control_by_risk()` (RiskAssessmentController) computes a suggested status from control implementation but does NOT write it to DB and the UI code that would inject it into the form is commented out — the feature is dead.
- Risk Assessment `end_date` is `nullable` in validation but `required` in HTML — front-end/back-end mismatch.
- Corrective/preventive action `due_date` fields are HTML `required` but `nullable` in server validation — bypass possible via API.
- `risk_assessment_against` field is validated and displayed but has no input in the create/edit form — can never be populated.
- `risk_appetite_color` hidden field stores the same text value as `risk_appetite` (not an actual color hex) — misleading field name.
- `maturity_level` is validated but has no UI input field in the finding form — always NULL.
- No `abort_unless(auth()->user()->canWrite())` guards in `RiskAssessmentController` or `RiskAssessmentFindingController` — role-4 (Viewer) is blocked only by the `block.mutation` middleware at HTTP method level, not at action level.
- No prerequisite enforcement: Control Assessment can be created with zero Risk Assessments in the system.
- Risk Status page (`RiskStatusController`) uses INNER JOIN on `risk_vs_control_table` — risks with no mapped controls are silently excluded from the status view.
- `{!! $row->controls !!}`, `{!! $row->control_status !!}`, `{!! $row->control_owner !!}` in risk-status/index.blade.php are unescaped HTML from GROUP_CONCAT — XSS risk if control names contain user input.
- `risk-assessment-findings/index.blade.php` is actually the Control Assessment index view (wrong file content — shows control assessments with control assessment routes).
- The `edit()` method in RiskAssessmentFindingController has a logically broken left-join filter (applies two contradictory conditions on `risk_finding_id`) — on edit, the risk dropdown will likely show all risks instead of the intended filtered set.

**How to apply:** Use these facts when planning fixes for Phase 5. Do not re-read these files for the same facts — trust this summary for planning but re-verify before coding.
