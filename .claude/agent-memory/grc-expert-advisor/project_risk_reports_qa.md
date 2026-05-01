---
name: Risk Reports QA Findings (2026-05-01)
description: QA audit of Risk Register, Risk Status Report, and Risk Dashboard — critical bugs, broken routes, hardcoded values, mislabelled fields
type: project
---

Risk register, risk status, and dashboard reports audited on 2026-05-01.

**Why:** Systematic QA of Phase 5 reporting layer to identify defects before stakeholder demo.

**How to apply:** Use these findings to prioritize fixes. Critical items will cause 500 errors in production.

## Critical Findings

- PDF export for Risk Register calls view `process/18-Reporting/2-MISReporting/11-RiskRegisterPDF` which does NOT exist (only in `_Unused/`). Any click of the PDF button throws a ViewNotFoundException. Additionally the PDF template itself has all table body rows commented out with `--}}` — it is a structural skeleton.
- `RCDBController::index()` and `show()` call views `process/18-Reporting/3-Dashboard/5-RiskComplianceDashboard` and `5-RiskOwnerDashboard` — these do NOT exist outside `_Unused/`. Routes `/risk-complaince-dashboard` and `/risk-owner/{owner}` throw 500 errors.
- Routes `/control-vs-risk-dashboard` and `/risk-vs-asset-dashboard` reference `DashboardController` which is commented out inside a block comment in routes/web.php (lines 107-128). These routes will throw a class-not-found error on load.
- `RCDBController::riskControls()` has a hardcoded `->where('r.risk_id', 'RSK-001')` in the `$controlDetails` query — the route parameter `$risk` is resolved but ignored. Every risk detail request returns only RSK-001's controls.
- Risk Register query uses INNER JOINs on `risk_master_table_vs_category_table`, `risk_master_table_vs_threat_agent_table`, `risk_vs_control_table`, and `risk_inherent_table`. Any risk missing a category, threat agent, control mapping, or inherent record is silently excluded from the register.

## High Findings

- Risk Status view (line 69) labels `$controlsCount->not_implemented_controls` as "Partially Implemented" — a copy-paste error. "Not Implemented" count is mislabelled.
- Risk Register view uses `@forelse` at line 80 but closes with `@endforeach` at line 127 instead of `@endforelse`. The empty-state `@empty` block is therefore never rendered.
- `risk_inherent_score` (computed inherent risk rating) and `rad.risk_score` (residual risk score) are selected in the query but never rendered in the web view — columns 12 and 22 show raw likelihood/impact but no derived score. The "Inherent Risk Rating" column shows `risk_appetite_name` (a label) not a numeric score.
- Excel export maps column N as empty with comment "Risk Score from finding" — `rad.risk_score` is available in `$data` but intentionally left blank.
- `RiskStatusController` main query uses INNER JOIN on `risk_vs_control_table` — risks not yet linked to a control are silently excluded from the status report.
- Risk Register PDF template (in `_Unused`) has `$organizationData` referenced but not passed in `compact('riskRegister')` — would throw undefined variable error even if view existed.
- Risk appetite color highlighting is commented out in both the web view and PDF template for "Inherent Risk Rating" and "Residual Risk Rating" columns — lost visual risk heat-map communication.
- Dashboard charts (DomainRisk, SubdomainRisk, OwnerRisk) use Chart.js 2.x API (`_datasetIndex`, `_index`, `getElementAtEvent`) which is deprecated in Chart.js 3+. Drill-down click handlers will silently fail if Chart.js was upgraded.

## Medium Findings

- Risk register filter `evalutionDate` filters by `risk_assessment_start_date <= evalutionDate` but the column exists on `ra` (master) not `rad` (details). After a LEFT JOIN the date could be NULL, silently including unfiltered rows.
- `riskSubdomain` chart links drill down to `/risk-owners-compliance/{subdomainId}` which renders `4-OwnerRiskDashboard` — that view has the chart onClick handler commented out entirely, breaking the drill-down chain.
- Risk Register has no pagination; the query returns all rows with GROUP_CONCAT HTML concatenation. Large datasets risk PHP memory exhaustion (the PCRE backtrack limit workaround for the PDF confirms this is a known concern).
- No export/PDF button exists for the Risk Status report.
- `risk_name` is NOT selected in the Risk Register main query — the filter dropdown works (separate Risk model query) but the register table only shows `risk_id` in the identifier column, not the name.

## ISO/NIST Gaps

- Residual risk score (likelihood x impact after controls) is selected but never displayed — ISO 27005:2022 §8.4 requires residual risk to be documented and compared against risk criteria.
- Risk treatment status shown in the register is the control implementation status, not the treatment plan status — these are distinct concepts per ISO 27005 §8.6.
- No risk acceptance status field displayed (whether risk is formally accepted, pending acceptance, or rejected).
