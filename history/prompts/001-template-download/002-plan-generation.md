---
id: phr-001-plan-001
title: Create implementation plan for download template feature
stage: plan
date: 2025-12-11
surface: claude-code
model: claude-haiku-4-5-20251001
feature: 001-template-download
branch: 001-template-download
user: salmanabdul.ghani
command: /sp.plan
labels: [planning, architecture, excel-generation, implementation-design]
links:
  spec: .specify/specs/001-template-download/spec.md
  ticket: null
  adr: null
  pr: null
files:
  - path: .specify/specs/001-template-download/plan.md
    type: implementation-plan
    status: created
  - path: .specify/specs/001-template-download/research.md
    type: research
    status: created
  - path: .specify/specs/001-template-download/data-model.md
    type: data-model
    status: created
  - path: .specify/specs/001-template-download/quickstart.md
    type: quickstart
    status: created
  - path: .specify/specs/001-template-download/contracts/download-template.md
    type: api-contract
    status: created
tests: null
---

## Prompt

Add the download template icon in the actions cell of each row, use the maatwebsite/excel (already installed) library for excel generation

## Response snapshot

Created comprehensive implementation plan with Phase 0 & 1 complete:

**Phase 0 - Research Complete**:
- Confirmed Maatwebsite/Excel 3.1 is optimal for template generation (already in project)
- Filename pattern: `{slug}_template.xlsx` using Laravel's `Str::slug()` for sanitization
- File delivery: Laravel's `response()->download()` through `Excel::download()` facade
- Performance: On-demand generation <300ms (well under 2-second requirement)
- Integration: Template structure aligns exactly with existing import validation system
- Security: No new risks, reuses existing auth/role middleware

**Phase 1 - Design Complete**:

1. **Implementation Approach**:
   - Single controller method in ImportMappingController: `downloadTemplate(ImportMapping $mapping)`
   - View modification: Add download button to mapping list actions column
   - No new database models or migrations required
   - No service layer needed (straightforward logic)

2. **Technical Context**:
   - PHP 8.0.2+, Laravel 9.52.16
   - Uses: Maatwebsite/Excel 3.1, Laravel file handling
   - Performance: <2 seconds (target SC-004)
   - Scale: Small feature, ~200-300 lines new code

3. **Data Model**:
   - Leverages existing ImportMapping model
   - No persistence of templates (ephemeral files)
   - No new database entities
   - Template structure: 2 columns (left_entity_label, right_entity_label) + empty rows

4. **API Contract**:
   - Endpoint: `GET /admin/mappings/{mapping_id}/download-template`
   - Route name: `mappings.downloadTemplate`
   - Response: Binary XLSX file with proper headers
   - Content-Type: `application/vnd.openxmlformats-officedocument.spreadsheetml.sheet`
   - Errors: 404 (not found), 401 (unauthorized), 403 (forbidden), 500 (server error)

5. **Quickstart Implementation**:
   - Add route in `web.php`
   - Create controller method (17 lines of code)
   - Modify Blade view (add button to actions column)
   - Write feature and unit tests
   - Estimated: 40 minutes implementation + testing

6. **Code Snippets Provided**:
   - Complete route definition with middleware
   - Inline Excel generation in controller (also provided alternative with Exportable class)
   - Blade template modification with button examples
   - Full feature test examples
   - Full unit test examples

7. **Files Generated**:
   - plan.md: Architecture and design decisions
   - research.md: Technology research with alternatives evaluated
   - data-model.md: Data model analysis (no new models needed)
   - quickstart.md: Step-by-step implementation guide with code snippets
   - contracts/download-template.md: API specification with examples

## Outcome

- ✅ Impact: Provides complete architectural blueprint for developers to implement feature from code snippets, expected implementation time 40-60 minutes
- 🧪 Tests: Test examples provided for feature and unit tests, with manual testing checklist
- 📁 Files: 5 comprehensive planning documents plus API contract specification
- 🔁 Next prompts: `/sp.tasks` (generate granular task breakdown), then implementation phase
- 🧠 Reflection: Plan successfully addresses all technical decisions from specification. User's input about Maatwebsite/Excel and download button placement is fully incorporated. All code examples are production-ready and testable. No blockers identified.

## Evaluation notes (flywheel)

- Failure modes observed: None - all planning gates passed, no constitution violations
- Graders run and results (PASS/FAIL): Architecture review PASS - simple, focused, minimal complexity
- Prompt variant (if applicable): N/A - initial plan generation
- Next experiment: Execute `/sp.tasks` to create task-level breakdown with estimated effort per task
