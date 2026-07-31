---
name: risk-assessment-completion-criteria
description: Analysis of how risk assessment "completed" status is determined in Eagle Eye — current logic, gaps, and recommended gates
metadata:
  type: project
---

# Risk Assessment Completion Criteria — Eagle Eye

## Current Implementation (as of 2026-05-13)

There is NO `status` column on `risk_assessment_master_table`. Status is entirely derived at query time.

**"Completed" definition (current):**
- findings_count > 0 AND all findings have `implementation_status = 'Close'`

**"In-Progress" definition (current):**
- findings_count = 0 OR any finding has `implementation_status != 'Close'`

This logic is duplicated in three places:
1. `RiskAssessmentController::index()` — SQL WHERE clauses for filter
2. `index.blade.php` — inline ternary for status badge rendering
3. `show.blade.php` — progress bar / "Complete" badge

Finding `implementation_status` values: `'Open'` and `'Close'` (binary, set manually by user).

## Key Gaps (GRC Perspective)

- No minimum finding count guard — an assessment with 1 finding closed is "completed"
- No end date enforcement — completed even if `risk_assessment_end_date` is null or in the future
- No risk treatment coverage check — findings can be "Close" without a risk treatment assigned
- No required fields gate — `risk_likelihood`, `risk_impact`, `risk_score` are required on store/update but there is no re-validation gate before completion
- No explicit "mark complete" action — status flips silently when the last finding is closed
- Replicate action only shown when completed — this is the only UI consequence of completed status

## Recommended Completion Gates (ISO 27005 / NIST aligned)

1. findings_count >= 1 (at least one risk identified)
2. All findings have `implementation_status = 'Close'`
3. Every finding has `risk_treatment_id` set (not null)
4. `risk_assessment_end_date` is not null (assessment period formally closed)
5. (Optional/future) All high-risk findings (risk_score above threshold) have corrective_action set

**Why:** ISO 27005:2022 §8.6 requires that each identified risk has a treatment option selected before the assessment output is considered complete. NIST SP 800-30 Rev.1 §3.4 similarly requires risk response decisions documented per identified risk.
