# Phase 6 QA — Risk Reports
**Eagle Eye GRC System | Laravel 9 | Date: 2026-05-01**
**Scope:** Risk Register, Risk Status Report, Risk Dashboard
**Method:** Static code analysis — routes, controllers, views, PDF templates
**Branch:** qa/phase-5

---

## Executive Summary

| Severity | Count |
|---|---|
| CRITICAL | 7 |
| HIGH | 7 |
| MEDIUM | 5 |
| LOW | 3 |
| **Total** | **22** |

Three entire features are completely non-functional in production: Risk Register PDF export, Risk Compliance Dashboard, Risk Owner Dashboard. One hardcoded bug (`RSK-001`) silently serves wrong control data to users with no visible indication. The Risk Register silently excludes incomplete risks, violating ISO 27005 §8.3 completeness requirements.

---

## Section 1: Risk Register (`/risk-register`)

**Route:** `GET /risk-register` → `RiskRegisterController@index`
**View:** `resources/views/process/risk-identification/risk-register/index.blade.php`
**Controller:** `app/Http/Controllers/RiskRegisterController.php`

---

### [CRITICAL] PDF Export Throws ViewNotFoundException

**File:** `RiskRegisterController.php:155,164`

Controller constructs `$path = "process/18-Reporting/2-MISReporting"` then calls `view("{$path}/11-RiskRegisterPDF", ...)`. That view path does not exist under `resources/views/process/`. File `11-RiskRegisterPDF.blade.php` only exists inside `resources/views/_Unused/18-Reporting/2-MISReporting/`. Any user clicking PDF download receives `ViewNotFoundException` — 500 error.

---

### [CRITICAL] PDF Template Body Entirely Commented Out

**File:** `_Unused/18-Reporting/2-MISReporting/11-RiskRegisterPDF.blade.php:408,411`

Even if the view path were corrected, the PDF template is a broken skeleton. The entire `<thead>` rows and the loop over `$riskRegister` are inside a Blade comment (`{{-- ... --}}`). Rendered PDF would contain only a title header and an empty `<table>` — no risk data whatsoever.

---

### [CRITICAL] Silent Exclusion of Risks Without Complete Relationships

**File:** `RiskRegisterController.php:18-30`

Main query uses `->join()` (INNER JOIN) on five pivot/lookup tables:
- `risk_master_table_vs_category_table` — requires a category
- `risk_master_table_vs_threat_agent_table` — requires a threat agent
- `risk_inherent_table` — requires an inherent record
- `risk_vs_control_table` — requires at least one mapped control
- `control_master_table` and `owner_table` for that control

Any risk missing any one of these relationships is silently omitted from the register. ISO 27005:2022 §8.3 requires all identified risks to be documented. A register that hides incomplete risks creates a false picture of the risk landscape — an audit finding in itself.

---

### [HIGH] `@forelse` Opened but `@endforeach` Used — Empty State Never Renders

**File:** `risk-register/index.blade.php:80,127`

Line 80 opens `@forelse ($riskRegister as $row)`. Line 127 closes with `@endforeach`. Blade's `@forelse` must close with `@endforelse` and an `@empty` block between them. When register returns zero rows after filtering, table body is silently blank — no "no results" message shown.

---

### [HIGH] Inherent and Residual Risk Scores Selected but Never Rendered

**File:** `RiskRegisterController.php:55,74` / `index.blade.php` (entire file)

Query selects `ri.risk_inherent_score` and `rad.risk_score`. Neither is rendered in the web view. Column "Inherent Risk Rating" renders `$row->risk_appetite_name` (qualitative label only). Column "Residual Risk Rating" renders `$row->risk_appetite` (appetite label only). Calculated scores (`likelihood × impact`) exist in the data payload but are invisible.

ISO 27005 §8.4 gap: risk evaluation requires risk levels determined and compared against risk criteria using defined scoring. Displaying only the appetite label without the underlying score obscures how the rating was derived.

---

### [HIGH] Risk Score Blank in Excel Export

**File:** `RiskRegisterController.php:219`

Column `N` in Excel export mapped to `''` with comment `// Empty column Risk Score from finding`. The `rad.risk_score` field is available in `$data` collection but intentionally left blank. Excel template has a "Risk Score" column that is always empty on export.

---

### [HIGH] Risk Appetite Color Highlighting Commented Out

**File:** `index.blade.php:106,118`

Two cells that should render with color-coded backgrounds (`appetite_color` for inherent risk, `risk_appetite_color` for residual risk) are commented out. Data is fetched correctly. The visual heat-map — primary UX mechanism for conveying risk severity at a glance — is suppressed in both web view and PDF template (line 407).

---

### [MEDIUM] No PDF Export Button in Web View

**File:** `index.blade.php:7`

View exposes only Excel export button (`x-action.excel-button`). Controller has PDF branch triggered by `?pdf` query parameter but no button appends this parameter. PDF path is entirely inaccessible from the browser (and broken when reached anyway — see CRITICAL above).

---

### [MEDIUM] `risk_name` Not Selected in Register Query

**File:** `RiskRegisterController.php:44-91`

Register query does not select `r.risk_name`. "Risk Identifier" column renders only `$row->risk_id` (e.g., "RSK-005"). Filter dropdown shows risk names correctly via a separate query, but the register table itself does not display human-readable names. Auditors rely on names, not identifier codes alone.

---

### [MEDIUM] Date Filter Column Ambiguity

**File:** `RiskRegisterController.php:108-110`

`evalutionDate` filter calls `->WhereDate('risk_assessment_start_date', '<=', $evalutionDate)` without a table alias. Query joins both `risk_assessment_master_table as ra` (which has `risk_assessment_start_date`) and `risk_assessment_details_table as rad`. MySQL may resolve ambiguously — filter behavior is unpredictable and may silently include/exclude rows incorrectly.

---

### [LOW] Typo in Filter Parameter Name

**File:** `RiskRegisterController.php:145` / `index.blade.php:27`

Parameter named `evalutionDate` (missing 'a' in "evaluation") throughout controller and view. Minor naming inconsistency, does not break functionality.

---

### [LOW] No Pagination

Query returns all matching rows in a single unbounded result. The `ini_set("pcre.backtrack_limit", "5000000")` already present in the PDF branch suggests prior memory issues. Large risk registers will cause slow page loads and potential timeouts.

---

## Section 2: Risk Status Report (`/risk-status`)

**Route:** `GET /risk-status` → `RiskStatusController@index`
**View:** `resources/views/process/risk-identification/risk-status/index.blade.php`
**Controller:** `app/Http/Controllers/RiskStatusController.php`

---

### [HIGH] "Not Implemented" Control Count Mislabelled as "Partially Implemented"

**File:** `risk-status/index.blade.php:69`

Control Status Summary widget:
- Line 59: label "Partially Implemented" → `$controlsCount->partially_implemented_controls` ✓ correct
- Line 69: label "Partially Implemented" → `$controlsCount->not_implemented_controls` ✗ copy-paste error

"Not Implemented" count is displayed under the "Partially Implemented" label. The "Not Implemented" row is entirely absent from the UI. This directly misrepresents control implementation posture to any reader of this report.

---

### [HIGH] Risks Without Control Mappings Excluded from Status Report

**File:** `RiskStatusController.php:47`

Main status query uses `->join('risk_vs_control_table as rvc', ...)` — INNER JOIN. Risks not yet linked to any control are silently omitted from the status table and KPI counts. However `$risksCount` summary widget (lines 68-97) uses a separate query against `risk_master_table` directly, producing a different denominator. A risk can appear in "Total Risks" count but be invisible in the status table — contradicting the summary figures.

---

### [HIGH] No Filter, Sort, or Export Capability

**File:** `risk-status/index.blade.php` (entire file)

Action wrapper is empty (`<x-table.action-wrapper title="Risk Status"></x-table.action-wrapper>`). No filter by risk owner, no filter by status, no date range, no export (PDF or Excel). ISO 27001:2022 Clause 9.1 and ISO 27005:2022 §9 require monitoring and reporting outputs to be reviewable and communicable.

---

### [MEDIUM] Unassessed Risks Show Blank Status — Indistinguishable from Open

**File:** `RiskStatusController.php:34,36`

Risks without an assessment record have `COALESCE(..., 'Not Assessed')` for assessment/finding names. The `implementation_status` field will be `NULL` for these rows — rendered as a blank cell. No visual indicator distinguishes "Open" from "never assessed," which are very different compliance states.

---

### [MEDIUM] `implementation_status` Conflates Finding Status with Treatment Status

**File:** `risk-status/index.blade.php:87` / `RiskStatusController.php:37,63`

Column header is "Risk Status"; value is `rad.implementation_status`. DB values are `"Open"` and `"Close"` (not "Closed" — spelling inconsistency across the system). Users expect treatment disposition (Mitigated, Accepted, Transferred, Avoided), not a binary open/close flag. ISO 27005 treats these as distinct concepts.

---

## Section 3: Risk Dashboard

Multiple dashboard surfaces covered below.

---

### [CRITICAL] `/risk-complaince-dashboard` and `/risk-owner/{owner}` Throw 500 Errors

**File:** `RCDBController.php:48,101` / `routes/web.php:541-545`

`RCDBController::index()` calls `view('process/18-Reporting/3-Dashboard/5-RiskComplianceDashboard', ...)`.
`RCDBController::show()` calls `view('process/18-Reporting/3-Dashboard/5-RiskOwnerDashboard', ...)`.

Neither directory nor these view files exist under `resources/views/process/`. Files only exist in `_Unused/Dashboard/`. Both routes are registered, but hitting either URL throws `ViewNotFoundException`. Risk Compliance Dashboard and Risk Owner drill-down are completely broken.

---

### [CRITICAL] `/control-vs-risk-dashboard` and `/risk-vs-asset-dashboard` Reference Commented-Out Controller

**File:** `routes/web.php:107-128,799-801`

Lines 107-128 open a block comment (`/*`) that includes imports for `DashboardController`, `MainDashboardController`, and others — dead code. Lines 799-801 reference `DashboardController::class` for routes including `controlRisksReport` and `riskAssetsReport`. Since `DashboardController` is not imported, PHP throws a class resolution error when these routes are hit. `DashboardController` only exists in `app/Http/Controllers/_Unused/`.

---

### [CRITICAL] Hardcoded `RSK-001` in `RCDBController::riskControls()`

**File:** `RCDBController.php:178`

`riskControls()` receives route-model-bound `Risk $risk`. The `$controlDetails` query correctly builds using `$risk->risk_id` for counts — but line 178 uses `->where('r.risk_id', 'RSK-001')` instead of `->where('r.risk_id', $risk->risk_id)`. Every request to `/risk-controls/{any_risk_id}` returns RSK-001's control details regardless of which risk was requested. Users are shown controls belonging to the wrong risk with no indication.

---

### [HIGH] Drill-Down Chain Broken at Owner Level

**File:** `4-SubdomainRiskDashboard.blade.php:100` / `4-OwnerCustodiansRiskDashboard.blade.php:140-150`

Intended drill-down: Domain → Subdomain → Owner → Individual Risk. Subdomain chart correctly links to `/risk-owners-compliance/{subdomainId}` on click. However `4-OwnerRiskDashboard` has its `onClick` handler entirely commented out (lines 140-149). Drill-down from "Owners Risk Status" chart to individual owner detail page is non-functional. Users reach the owner chart but cannot click through.

---

### [HIGH] Dashboard Uses Chart.js v2 API — Incompatible with Chart.js 3+

**File:** `4-DomainRiskDashboard.blade.php`, `4-SubdomainRiskDashboard.blade.php`, `4-OwnerRiskDashboard.blade.php`, `5-RiskControlDashboard.blade.php`

All dashboard charts use Chart.js 2.x API patterns removed in Chart.js 3.0:
- `elements[0]._datasetIndex` and `elements[0]._index`
- `chartBar.getElementAtEvent(event)`
- `scales.yAxes`/`scales.xAxes` array format
- `legend.labels.fontColor` and `fontSize` under `legend`

If project has upgraded Chart.js to v3+, all click-based drill-down interactions silently fail — no error thrown, no navigation occurs.

---

### [HIGH] Risk Control Dashboard Table Empty on Load — No Server-Side Fallback

**File:** `5-RiskControlDashboard.blade.php:32-36`

`<x-table.tbody id="table_body">` is rendered empty on page load. Data only populated via AJAX when a chart bar is clicked. If JavaScript fails or Chart.js is misconfigured, user sees a page with a chart and permanently empty table. `$controlDetails` is computed in the controller but never passed to or used by the Blade view — it exists only for the potential AJAX response (though the method returns a view, not JSON, for non-AJAX requests).

---

### [MEDIUM] Route URL Has Typo

**File:** `routes/web.php:542`

Route is `GET /risk-complaince-dashboard` ("complaince" not "compliance"). Named route is `risk-compliance.index`. Any hardcoded links using the URL path string will silently differ from the route name.

---

### [MEDIUM] `_Unused` Dashboard Views Use Legacy Full-Page Layout

**File:** `_Unused/Dashboard/5-RiskComplianceDashboard.blade.php:1-136`

These views use old standalone HTML layout (full `<html>`, `<head>`, custom CSS from `asset('/css/...')`, boxicons CDN) rather than `@extends('layouts.app-full')`. If moved out of `_Unused` to fix the 500 error, they would render without application navigation, sidebar, and Tailwind styling — visually broken.

---

### [MEDIUM] Domain Dashboard Lumps "Not Assessed" into "Open" Count

**File:** `OCDController.php:506-508`

`riskDomain()` query counts open risks as `implementation_status = 'Open' OR IS NULL`. Unassessed risks appear identical in the chart to risks actively being remediated. Domain chart should distinguish "Open", "Closed", and "Not Assessed" as separate series.

---

### [LOW] Dashboard Page Titles Incorrect on All Sub-Views

**File:** `4-DomainRiskDashboard.blade.php:2`, `4-SubdomainRiskDashboard.blade.php:2`, `4-OwnerRiskDashboard.blade.php:2`

All three views set `@section('title', 'Overall Compliance Dashboard')`. Browser tab and any breadcrumb reading from this section shows "Overall Compliance Dashboard" regardless of which specific drill-down view the user is on.

---

### [LOW] Typo in PDF Template Column Header

**File:** `_Unused/18-Reporting/2-MISReporting/11-RiskRegisterPDF.blade.php:398`

Column header reads "Overall residaul risk rating" — should be "residual." Visible in printed/exported documents.

---

## ISO 27005 / NIST Alignment

| Requirement | Status | Notes |
|---|---|---|
| ISO 27005 §8.3 — All identified risks documented | **FAIL** | INNER JOINs silently exclude incomplete risks |
| ISO 27005 §8.4 — Risk level determined and compared to criteria | **PARTIAL** | Scores selected in query, not displayed; appetite label shown instead |
| ISO 27005 §8.6 — Risk treatment tracked | **PARTIAL** | Control implementation status shown, not treatment plan status |
| ISO 27005 §9 — Risk monitoring and review | **PARTIAL** | No filter/export on status report; key counts mislabelled |
| ISO 27001:2022 Clause 6.1.2 — Risk register integrity | **FAIL** | Register excludes risks silently; PDF export broken |
| NIST SP 800-37 RMF Step 4 — Assess controls | **PARTIAL** | Control status displayed but incorrect count labelling |

---

## Priority Fix Order

| Priority | Finding | File | Impact |
|---|---|---|---|
| 1 | Hardcoded `RSK-001` | `RCDBController.php:178` | Wrong data served silently to all users |
| 2 | Risk Compliance + Owner Dashboard 500 | `RCDBController.php:48,101` | Entire dashboard routes broken |
| 3 | `DashboardController` import commented out | `routes/web.php:107-128` | Risk-vs-control and risk-vs-asset routes broken |
| 4 | Risk Register PDF view path wrong | `RiskRegisterController.php:155` | PDF export broken |
| 5 | PDF template body commented out | `11-RiskRegisterPDF.blade.php:408` | PDF renders empty even if path fixed |
| 6 | "Partially Implemented" label bug | `risk-status/index.blade.php:69` | Misrepresents control posture in status report |
| 7 | INNER JOINs exclude incomplete risks | `RiskRegisterController.php:18-30` | ISO 27005 §8.3 compliance failure |
| 8 | Risk scores not rendered | `index.blade.php` | Scores computed but invisible to users |
| 9 | `@forelse`/`@endforeach` mismatch | `risk-register/index.blade.php:80,127` | Empty state never shown |
| 10 | Risk appetite color cells commented out | `index.blade.php:106,118` | Heat-map UX suppressed |
| 11 | Owner drill-down `onClick` commented out | `4-OwnerCustodiansRiskDashboard.blade.php:140-149` | Drill-down chain broken at owner level |
| 12 | Chart.js v2 API in v3+ environment | Multiple dashboard views | All chart click interactions silently fail |
