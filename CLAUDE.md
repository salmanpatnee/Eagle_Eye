# Eagle Eye GRC System

## Development Rules

- **Simplicity first.** Every change must be as small as possible. Impact only necessary code.
- **No lazy fixes.** Find root cause. No temporary patches. You are a senior developer.
- **No introduced bugs.** Changes must not break unrelated functionality.

## Project

Eagle Eye — Laravel 9 GRC app. Risk assessment, audit management, control evaluation, asset tracking, compliance reporting.

- **URL**: `http://grc.test/` | **DB**: `eagle_eye_may` (MySQL)
- **Stack**: PHP 8+, Laravel 9, Tailwind CSS, Vite, ApexCharts, mPDF, Maatwebsite/Excel

## Critical Gotchas

- **Custom PKs**: Models use `risk_id`, `asset_id` etc — not always `id`
- **No timestamps**: Many models have `public $timestamps = false`
- **Pivot tables**: Named `table1_vs_table2_table`
- **Mass assignment**: Models use `$guarded = []` — validate request data carefully
- **Unused code**: Archived in `_Unused/` dirs — do not delete, just ignore
- **Views**: `resources/views/process/` for main features, `resources/views/pdf/` for PDF templates

## Common Commands

```bash
npm run dev                    # Vite hot reload
php artisan cache:clear        # Clear all caches
php artisan migrate            # Run migrations
php artisan migrate:fresh --seed  # Reset + seed DB
php artisan tinker             # REPL
./vendor/bin/pint              # Format PHP code
```

## AI Sub-Agents

**GRC advisory**: When exploring the codebase for context, planning new features, or adding functionality related to risk, audit, controls, assets, or compliance — **always use `grc-expert-advisor` sub-agent** via Agent tool with `subagent_type: "grc-expert-advisor"` to get standards-aligned guidance before designing or implementing.

**Report design**: When asked to design/create/generate any GRC report (risk, audit, control effectiveness, compliance summaries, executive dashboards, PDF templates) — **always use `grc-report-designer` sub-agent** via Agent tool with `subagent_type: "grc-report-designer"`.

> Full reference (directory structure, conventions, all commands): see `AGENTS.md`
