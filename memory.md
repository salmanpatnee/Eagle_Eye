# Memory — Risks Without Controls Feature

Last updated: 2026-08-18

## What was built

New GRC gap-analysis view: **Risks Without Controls**, on branch `fix/minor-bugs` (pushed, commit `11febd5`).

- `app/Http/Controllers/RiskTreatmentController.php` — added `risksWithoutControls()` method. Query: `Risk::doesntHave('controls')->with(['owner','group','inherent'])`, left-joined to `risk_inherent_table` and sorted `orderByDesc('risk_inherent_table.risk_inherent_score')` (highest exposure first). No filters — shows all matching risks, paginated 20/page.
- `resources/views/process/risk-identification/risk-treatment/risks-without-controls.blade.php` — new view, table columns: S.No, Risk ID (link to `risks.show`), Risk Name, Owner (`owner->owner_name`), Risk Group, Inherent Score.
- `routes/web.php` — added `GET risk-treatment/risks-without-controls` → `risks-without-controls.index`, inside the existing `risk-treatment` prefix group.
- `resources/views/partials/sidebar-menus/risks.blade.php` — added sidebar nav entry.
- Cross-linked as a third action button on the existing `risk-vs-control.blade.php` and `control-vs-risk.blade.php` pages for discoverability.

## Decisions made

- v1 scope deliberately limited to: (1) sort by inherent risk score descending, (2) show owner as a visible column. User explicitly rejected an owner filter dropdown ("It should show all without any filter") — so the page always shows the full unfiltered list, no query params.
- Reused the exact pre-existing pattern/conventions from `RiskTreatmentController@riskVsControl` (table components, action-wrapper buttons, route naming under the `risk-treatment` prefix) rather than inventing new structure.
- Deferred richer ideas (control-effectiveness gap detection, dashboard KPI tile, export, inline "link control" action) — discussed but not built; could be v2 if requested.

## Problems solved

- `Owner` model quirk: `Risk::owner()` is `belongsTo(Owner::class, 'owner_id', 'owner_role_id')` — i.e. `Risk.owner_id` matches `Owner.owner_role_id`, NOT `Owner`'s own PK (`owner_id`). This is pre-existing, intentional-looking (if odd) app convention — matched it rather than "fixing" it, consistent with how `RiskIdentificationController` already does `Owner::select('owner_role_id', 'owner_name')`.
- Verified `doesntHave('controls')` correctness after user reported "not showing any controls": confirmed via tinker that `risk_vs_control_table` (891 rows) covers all 55 risks in the dev DB (`eagle_eye`) by `risk_id` string match — collations match (`utf8mb4_general_ci` both sides), no join bug. The empty result set is accurate: every risk in this dev DB currently has ≥1 control. Not a bug.
- Rendering the view standalone via tinker needs `View::share('errors', new \Illuminate\Support\ViewErrorBag)` first — `x-form.select`/`x-form.error` components expect the `$errors` bag normally injected by the web middleware group; irrelevant outside real HTTP requests, not a bug in this feature.

## Current state

- Feature is complete, formatted (`vendor/bin/pint` passed), committed, and pushed to `origin/fix/minor-bugs`.
- No automated test written (per standing memory: don't add tests unless explicitly asked).
- Not yet manually verified in-browser (Herd site `grc.test`) because current dev DB has zero risks without controls to display — verified instead via tinker render + query cross-checks.

## Next session starts with

Nothing pending — feature shipped. If picking this back up:
- If user wants to actually see the page populated, seed/temporarily unlink a risk's pivot rows in `risk_vs_control_table` to test the UI with real rows.
- If user wants v2 enhancements, revisit the ideas list discussed earlier (control-effectiveness distinction, dashboard KPI tile, export, inline "link control" action) — consider looping in `grc-expert-advisor` subagent per CLAUDE.md convention for GRC feature design.

## Open questions

- None outstanding. Unrelated: user separately asked for a `migrate --path` command for 4 landing-sections migrations (`2026_08_06_105116`, `2026_08_06_111132`, `2026_08_06_120000`, `2026_08_07_100000`) — all already applied on this machine's `eagle_eye` DB; command was given for use on environments where they haven't run yet.
