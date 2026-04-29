# Eagle Eye GRC — Dashboard Module Review Report

**Date:** 2026-04-23
**Branch:** qa/phase-4
**Scope:** All dashboard sub-modules, drill-down charts, gaps, and improvement recommendations

---

## 1. Executive Summary

Eagle Eye currently ships three dashboards covering 24+ routes, 40+ charts, and 3–4 level drill-down chains. The main compliance dashboard (`/dashboard`) answers one core GRC question well: *"What is our compliance posture against NCA-ECC and SAMA?"*

However, the dashboards miss the other four pillars of operational GRC visibility:

| Pillar | Covered? |
|--------|----------|
| Compliance status (NCA-ECC / SAMA) | Yes — thorough |
| Risk posture & appetite | Partial — heatmap exists, no score, no breach alerts |
| Audit findings & lifecycle | No |
| Control effectiveness & evidence | Partial — charts exist, no coverage % |
| Operational (incidents, third-party, VA/PT) | Minimal — VA/PT only, siloed |

**Critical finding:** The dashboard answers compliance status (one of five GRC pillars) but misses operational GRC visibility required by ISO 27001:2022 Clause 9.1–9.3 and SAMA CSF management review obligations.

---

## 2. Current Dashboard Inventory

### 2.1 Organization Compliance Dashboard (OCDController)

- **File:** `app/Http/Controllers/OCDController.php` (1,075 lines)
- **Route:** `GET /dashboard` → `compliance-dashboard.index`
- **View:** `resources/views/process/reporting/dashboard/index.blade.php`
- **JS:** `public/js/compliance-dashboard.js`

**Charts present:**

| # | Chart | Type | Library |
|---|-------|------|---------|
| 1 | NCA-ECC compliance gauge | Gauge | Chart.js |
| 2 | SAMA compliance gauge | Gauge | Chart.js |
| 3 | ECC compliance pie | Pie | Chart.js |
| 4 | SAMA compliance pie | Pie | Chart.js |
| 5 | Asset distribution | Bar | Chart.js |
| 6 | Best practice compliance | Horizontal bar | Chart.js |
| 7 | Owner controls | Bar | Chart.js |
| 8 | Asset by technology | Doughnut | Chart.js |
| 9 | Evidence summary | Bar | Chart.js |
| 10 | Risk status | Pie | Chart.js |
| 11 | Risk vs. asset group | Grouped bar | Chart.js |
| 12 | Risk by technology | Bar | Chart.js |
| 13 | Control by technology | Bar | Chart.js |
| 14 | SAMA compliance by technology | Bar | Chart.js |
| 15 | SAMA maturity levels (1–5) | Stacked bar | Chart.js |
| 16 | Risk appetite heatmap | Matrix/heatmap | ApexCharts |

**Drill-down chain (4 levels):**
```
Best Practice Bar → Domain → Subdomain → Owner → Controls list
```
All drill-downs via jQuery AJAX. No Livewire.

**Export:** PDF (html2canvas + jsPDF), PPT (PresentationService).

---

### 2.2 Vulnerability / Penetration Test Dashboard (PenTestDashboardController)

- **File:** `app/Http/Controllers/PenTestDashboardController.php`
- **Route:** `GET /va-pen-test-dashboard`
- **View:** `resources/views/process/vulnerability-management/vulnerability-penetration-test-dashboard/`

**Charts present:**

| # | Chart | Type |
|---|-------|------|
| 1 | Finding status pie (Open-WIP / Open-Not Started / Closed) | Pie |
| 2 | Severity bar (Critical / High / Medium / Low) | Bar |

**Drill-down chain (3 levels):**
```
Status segment → Severity breakdown → Detailed records (with past-due filter)
```

**Notable:** Past-due filter already implemented. Not surfaced on main dashboard.

---

### 2.3 Risk Compliance Dashboard (RCDBController)

- **File:** `app/Http/Controllers/RCDBController.php`
- **Route:** `GET /risk-complaince-dashboard` *(typo — "complaince")*

**Drill-down chain (3 levels):**
```
Owner → Risk list → Controls per risk
```

**Notable:** Route name typo is present in both the route definition and any generated URLs/links — fix is low-risk and high-value.

---

## 3. Technical Architecture

### 3.1 Data Layer

```
OCDController / RCDBController / PenTestDashboardController
    └── ReportService (app/Services/ReportService.php)
            └── ReportRepository (app/Repositories/ReportRepository.php)
                    └── 15+ methods, complex multi-join Eloquent/raw queries
```

### 3.2 Chart Libraries

| Library | Where Used | Version |
|---------|-----------|---------|
| Chart.js | Main dashboard (all 15 original charts) | Mixed |
| ApexCharts | Risk appetite heatmap (partially introduced) | Mixed |

Two libraries doing the same job — technical debt, inconsistent rendering behavior, two CDN loads.

### 3.3 AJAX Drill-Down Pattern

All drill-downs follow the same jQuery pattern:

```javascript
chart.on('dataPointSelection', function(event, chartContext, config) {
    $.ajax({ url: '/dashboard/drill-down', data: { level, filter } })
     .done(function(data) { renderNextChart(data); });
});
```

No loading states, no error handling, no breadcrumb update on drill-down.

### 3.4 Caching

**None.** Every page load runs all queries fresh. `ReportRepository` methods execute raw SQL and multi-join Eloquent queries with no `Cache::remember()` wrapping. At scale (>500 assets, >10K risks) this will cause page timeouts.

### 3.5 Export

- PDF: html2canvas screenshot → jsPDF (client-side, captures rendered DOM)
- PPT: `PresentationService` (server-side, structured data)

---

## 4. Gap Analysis

### 4.1 Critical Gaps — Compliance Risk (ISO 27001 Clause 9.2 / SAMA CSF)

These gaps mean the system cannot demonstrate management review compliance.

| Gap | Standard Reference | Data Available? | Effort |
|-----|-------------------|----------------|--------|
| Audit Findings KPIs (open, overdue, avg close time) | ISO 27001 Cl. 9.2, 10.1 | Yes — `AuditFinding` model exists | Medium |
| KRI/KPI metric tiles with thresholds + RAG | ISO 27001 Cl. 9.1, SAMA CSF 3.2 | Yes — `KeyRiskIndicator` model exists | Medium |
| Risk appetite breach alerts | ISO 27001 Cl. 6.1.2 | Yes — heatmap data collected but unused | Low |

### 4.2 High Priority Gaps

| Gap | Standard Reference | Data Available? | Effort |
|-----|-------------------|----------------|--------|
| Evidence coverage % (valid / expired / missing) | ISO 27001 Cl. 9.1, 7.5 | Yes — `Evidence` model exists | Low |
| Incident tracking panel (MTTD, MTTR, open count) | ISO 27001 A.5.24–A.5.28 | Confirm `incidents` table exists | Medium |
| Third-party risk summary | ISO 27001 A.5.19–A.5.22 | `ThirdPartyController` exists | Medium |
| Compliance deadline calendar (RAG status) | ISO 27001 Cl. 9.3 | Partial — assessment dates exist | Medium |

### 4.3 Medium Priority Gaps

| Gap | Notes | Effort |
|-----|-------|--------|
| Overall risk posture score (0–100 composite) | No scoring formula defined yet | High |
| Overdue assessments count | Requires `due_date` field on assessments | Low |
| No caching on expensive queries | Performance risk at scale | Medium |
| Mixed chart libraries (Chart.js + ApexCharts) | Technical debt, two CDN loads | High (opportunistic) |
| No breadcrumb navigation in drill-downs | UX gap — user loses context at level 3–4 | Low |
| No "Back to Overview" button in drill-downs | UX gap — hard to exit drill-down state | Low |
| Route typo: `risk-complaince-dashboard` | Unprofessional, breaks URL consistency | Trivial |

---

## 5. GRC Expert Recommendations (Priority Ranked)

### Priority 1 — Within 30 days (compliance-critical)

#### A. Audit Findings KPI Panel

Addresses ISO 27001 Cl. 9.2 and 10.1 management review requirements.

**Implementation:**
- 4 KPI cards: Total Open / Overdue / Avg Days to Close / By Severity
- Stacked bar: Findings by Audit (status stacked: Open / In Review / Closed)
- Drill-down: Audit bar segment → filtered finding list with owner + due date

**Files to modify:**
- `app/Services/ReportService.php` — add `getAuditFindingKpis()` method
- `app/Http/Controllers/OCDController.php` — add AJAX endpoint `GET /dashboard/audit-kpis`
- `resources/views/process/reporting/dashboard/index.blade.php` — add panel section

**Query sketch:**
```php
// ReportService::getAuditFindingKpis()
[
    'total_open'    => AuditFinding::where('status', '!=', 'closed')->count(),
    'overdue'       => AuditFinding::where('due_date', '<', now())->where('status', '!=', 'closed')->count(),
    'avg_days_close' => AuditFinding::where('status', 'closed')->avg(DB::raw('DATEDIFF(closed_at, created_at)')),
]
```

---

#### B. KRI/KPI Metric Tiles

Addresses ISO 27001 Cl. 9.1 performance evaluation requirements.

**Implementation:**
- One tile per active KRI: current value / threshold / RAG color indicator / 7-point sparkline
- Chart type: ApexCharts bullet chart or KPI tile component
- Source: `KeyRiskIndicator` model — confirm `measurements` relationship exists

**Files to modify:**
- `app/Services/ReportService.php` — add `getActiveKriTiles()` method
- `app/Http/Controllers/OCDController.php` — pass KRI data to view
- `resources/views/process/reporting/dashboard/index.blade.php` — KRI tile grid

---

#### C. Risk Appetite Breach Alerts

Addresses ISO 27001 Cl. 6.1.2. **No new data required** — threshold comparison on existing heatmap data.

**Implementation:**
- Red dismissible banner when any risk exceeds appetite threshold
- Red cell overlay on existing heatmap cells that breach threshold
- Config: `config('grc.risk_appetite_threshold')` (per category if differentiated)

**Files to modify:**
- `config/grc.php` — add `risk_appetite_threshold` value (or per-category map)
- `resources/views/process/reporting/dashboard/index.blade.php` — Blade `@if` alert component
- `public/js/compliance-dashboard.js` — heatmap cell color override logic

---

### Priority 2 — Within 60 days

#### D. Evidence Coverage Widget

Addresses ISO 27001 Cl. 9.1 and 7.5.

**Implementation:**
- Donut: Valid Evidence / Expired Evidence / No Evidence (3 segments)
- Table: Top 10 controls with no evidence, sorted by risk rating
- Cache 15 min: `Cache::remember('evidence_coverage', 900, fn() => ...)`
- Invalidate via Eloquent observer on `Evidence` model `saved`/`deleted` hooks

---

#### E. Incident Tracking Panel

Addresses ISO 27001 A.5.24–A.5.28.

**Prerequisite:** Confirm `incidents` table/model exists (`php artisan tinker` → `\App\Models\Incident::count()`).

**Implementation:**
- KPI cards: Total (MTD) / Open / MTTD (mean time to detect) / MTTR (mean time to resolve)
- Monthly bar chart (last 6 months) by severity
- Drill-down: month bar → incident list with status + owner + age

---

#### F. Third-Party Risk Summary

Addresses ISO 27001 A.5.19–A.5.22. `ThirdPartyController` already exists — data layer likely available.

**Implementation:**
- Pie: Vendors by risk rating (Critical / High / Medium / Low)
- Stacked bar: Vendors by category × risk rating
- Drill-down: risk rating segment → vendor list + last assessment date + finding count

---

#### G. Compliance Calendar / Deadline RAG

Addresses ISO 27001 Cl. 9.3 management review scheduling.

**Implementation:**
- Sorted deadline list with RAG status:
  - Green: >30 days remaining
  - Amber: 8–30 days remaining
  - Red: <7 days remaining or overdue
- Data source: assessment due dates + audit plan scheduled dates

---

### Priority 3 — Within 90 days

#### H. Organizational Risk Posture Score

Addresses ISO 27001 Cl. 6.1.2 and 6.1.3. Composite 0–100 score.

**Proposed formula:**

| Component | Weight | Source |
|-----------|--------|--------|
| Control Implementation % | 35% | Controls implemented / total |
| Evidence Coverage % | 25% | Controls with valid evidence / total |
| Residual Risk Reduction | 20% | (Inherent − Residual) / Inherent |
| Audit Finding Closure Rate | 10% | Closed / total findings (rolling 90 days) |
| KRI Compliance Rate | 10% | KRIs within threshold / total active KRIs |

**Implementation:**
- Nightly Artisan command: `php artisan grc:calculate-posture-score`
- Writes to `posture_scores` table: `(date, score, component_json)`
- ApexCharts radial bar gauge on dashboard
- Trend arrow: current vs. last month

**Migration needed:**
```sql
CREATE TABLE posture_scores (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    score_date DATE NOT NULL,
    score DECIMAL(5,2) NOT NULL,
    components JSON,
    INDEX idx_score_date (score_date)
);
```

---

#### I. Dashboard Caching Layer

Prevents page timeouts at scale. No functional change — pure performance.

| Data | Cache TTL | Invalidation |
|------|-----------|-------------|
| Risk summary | 30 min | Risk `saved`/`deleted` observer |
| Control implementation stats | 15 min | Control `saved`/`deleted` observer |
| Evidence coverage | 15 min | Evidence `saved`/`deleted` observer |
| Audit KPIs | 10 min | AuditFinding `saved`/`deleted` observer |

All via `Cache::remember()` in `ReportService` methods. Redis recommended as cache driver.

---

#### J. Chart Library Consolidation

Eliminates dual CDN load and inconsistent behavior.

**Strategy:**
- All new widgets: ApexCharts only (already partially introduced)
- Existing Chart.js charts: migrate opportunistically during future feature work — not a wholesale refactor
- Document decision in `CLAUDE.md` under Technical Decisions

---

## 6. Quick Wins (< 2 hours each, low risk)

These can be implemented independently in any order:

| # | Task | File | Query/Change |
|---|------|------|-------------|
| 1 | Overdue findings KPI card | `OCDController.php`, dashboard view | `WHERE due_date < NOW() AND status != 'closed'` → red KPI card |
| 2 | Evidence coverage % | `ReportService.php`, dashboard view | Aggregate join on evidence + controls → single % + donut, cache 15 min |
| 3 | Risk appetite breach banner | `config/grc.php`, dashboard view | Threshold config + `@if` Blade alert on existing heatmap data |
| 4 | Breadcrumb navigation | `public/js/compliance-dashboard.js` | Update breadcrumb state array in jQuery drill-down handlers |
| 5 | Overdue VA/PT count KPI | `OCDController.php`, dashboard view | Surface existing past-due count from `PenTestDashboardController` as KPI card |
| 6 | Fix route name typo | `routes/web.php` | `risk-complaince-dashboard` → `risk-compliance-dashboard` + update all `route()` calls |

---

## 7. Recommended Dashboard Layout (Restructure)

Replace flat chart dump with collapsible sections. Preserves all existing charts — adds new panels.

```
┌──────────────────────────────────────────────────────────┐
│  [1] EXECUTIVE SUMMARY                           ▲ collapse│
│  Posture Score Gauge | Alert KPI Cards (4)                 │
├──────────────────────────────────────────────────────────┤
│  [2] COMPLIANCE STATUS                           ▲ collapse│
│  NCA-ECC Gauge | SAMA Gauge | ECC Pie | SAMA Pie           │
│  Best Practice Bar (drill-down) | Maturity Stacked Bar     │
├──────────────────────────────────────────────────────────┤
│  [3] RISK MANAGEMENT                             ▲ collapse│
│  Risk Appetite Heatmap | Breach Alert Banner               │
│  KRI/KPI Tiles | Risk Status Pie                           │
├──────────────────────────────────────────────────────────┤
│  [4] CONTROL EFFECTIVENESS                       ▲ collapse│
│  Control Implementation Chart | Evidence Coverage Donut    │
│  Top 10 Controls Without Evidence (table)                  │
├──────────────────────────────────────────────────────────┤
│  [5] AUDIT & FINDINGS                            ▲ collapse│
│  Findings KPI Cards (4) | Findings by Audit (stacked bar)  │
│  Compliance Deadline Calendar (RAG)                        │
├──────────────────────────────────────────────────────────┤
│  [6] OPERATIONAL                                 ▲ collapse│
│  Incidents Panel | Third-Party Risk | VA/PT Summary        │
└──────────────────────────────────────────────────────────┘
```

Section state (expanded/collapsed) persists to `localStorage` per user.

---

## 8. Standards Alignment Summary

| Gap / Feature | ISO 27001:2022 | SAMA CSF | NIST CSF 2.0 |
|---------------|---------------|----------|--------------|
| Audit KPIs | Cl. 9.2, 10.1 | Audit & Assessment | Identify / Respond |
| KRI/KPI tiles | Cl. 9.1, A.5.35 | Risk Management 3.2 | Identify |
| Risk appetite breach | Cl. 6.1.2, 5.3 | Risk Management | Identify |
| Evidence coverage | Cl. 9.1, 7.5 | All domains | Protect |
| Incident tracking | Cl. 6.1.2, A.5.24–5.28 | Cybersecurity Incident | Respond / Recover |
| Third-party risk | A.5.19–A.5.22 | Third Party Risk | Protect |
| Compliance deadlines | Cl. 9.3 | Compliance | Govern |
| Risk posture score | Cl. 6.1.2, 6.1.3 | Risk Assessment | Identify |
| Caching layer | — | — | Performance / availability |

---

## 9. Key Files Reference

| File | Purpose |
|------|---------|
| `app/Http/Controllers/OCDController.php` | Main dashboard controller (1,075 lines) |
| `app/Http/Controllers/PenTestDashboardController.php` | VA/Pen test dashboard controller |
| `app/Http/Controllers/RCDBController.php` | Risk compliance dashboard controller |
| `app/Services/ReportService.php` | Business logic layer for dashboard data |
| `app/Repositories/ReportRepository.php` | Data access layer, 15+ query methods |
| `resources/views/process/reporting/dashboard/index.blade.php` | Main dashboard Blade view |
| `resources/views/process/vulnerability-management/vulnerability-penetration-test-dashboard/` | VA/PT dashboard views |
| `public/js/compliance-dashboard.js` | Chart rendering + drill-down jQuery logic |

---

## 10. Implementation Checklist

### Immediate (this sprint)
- [ ] Fix route typo: `risk-complaince-dashboard` → `risk-compliance-dashboard`
- [ ] Add overdue findings KPI card (red)
- [ ] Add risk appetite breach banner (config-driven threshold)
- [ ] Add breadcrumb + "Back to Overview" to drill-down handlers
- [ ] Add evidence coverage % with 15-min cache

### 30-day milestone
- [ ] Audit Findings KPI Panel (4 cards + stacked bar + drill-down)
- [ ] KRI/KPI metric tiles (confirm `KeyRiskIndicator` measurements relationship)
- [ ] Overdue VA/PT count surfaced on main dashboard

### 60-day milestone
- [ ] Evidence Coverage Widget (donut + top-10 table + observer invalidation)
- [ ] Incident Tracking Panel (confirm model, then KPIs + bar chart)
- [ ] Third-Party Risk Summary (pie + stacked bar + drill-down)
- [ ] Compliance Deadline Calendar (RAG list)

### 90-day milestone
- [ ] Risk Posture Score (migration + Artisan command + gauge + trend arrow)
- [ ] Dashboard Caching Layer (all ReportService methods wrapped)
- [ ] Chart library consolidation decision documented in CLAUDE.md
- [ ] Dashboard layout restructure (collapsible sections + localStorage state)

---

*Report generated: 2026-04-23 | Branch: qa/phase-4 | Author: Eagle Eye GRC Review*
