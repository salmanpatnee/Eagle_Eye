# Implementation Plan: [FEATURE]

**Branch**: `[###-feature-name]` | **Date**: [DATE] | **Spec**: [link]
**Input**: Feature specification from `/specs/[###-feature-name]/spec.md`

**Note**: This template is filled in by the `/sp.plan` command. See `.specify/templates/commands/plan.md` for the execution workflow.

## Summary

Implementation of a CRUD interface for managing industry records in the hr_industry_table with fields: industry_id, industry_name, and sector (nullable). The interface will follow the same layout and user experience as the existing nationality CRUD functionality, with navigation added to the main sidebar.

## Technical Context

**Language/Version**: PHP 8.0.2+, Laravel Framework 9.x
**Primary Dependencies**: Laravel Eloquent ORM, Tailwind CSS (TailAdmin theme), Vite 4.0
**Storage**: MySQL database with existing hr_industry_table
**Testing**: PHPUnit 9.5.10+
**Target Platform**: Web application (server-rendered views with Blade templates)
**Project Type**: Web application with existing Laravel structure
**Performance Goals**: Standard web application response times (<200ms p95), compatible with existing pagination (20 items per page)
**Constraints**: Must follow existing code patterns and conventions, integrate with current authentication/authorization system
**Scale/Scope**: Designed for enterprise use with typical user counts and data volumes

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

Based on the project constitution, this implementation follows the established patterns of the existing Laravel application. The CRUD interface will be implemented following the same architectural patterns as the nationality management feature, ensuring consistency with the existing codebase.

## Project Structure

### Documentation (this feature)

```text
specs/[###-feature]/
├── plan.md              # This file (/sp.plan command output)
├── research.md          # Phase 0 output (/sp.plan command)
├── data-model.md        # Phase 1 output (/sp.plan command)
├── quickstart.md        # Phase 1 output (/sp.plan command)
├── contracts/           # Phase 1 output (/sp.plan command)
└── tasks.md             # Phase 2 output (/sp.tasks command - NOT created by /sp.plan)
```

### Source Code (repository root)
<!--
  ACTION REQUIRED: Replace the placeholder tree below with the concrete layout
  for this feature. Delete unused options and expand the chosen structure with
  real paths (e.g., apps/admin, packages/something). The delivered plan must
  not include Option labels.
-->

```text
# [REMOVE IF UNUSED] Option 1: Single project (DEFAULT)
src/
├── models/
├── services/
├── cli/
└── lib/

tests/
├── contract/
├── integration/
└── unit/

# [REMOVE IF UNUSED] Option 2: Web application (when "frontend" + "backend" detected)
backend/
├── src/
│   ├── models/
│   ├── services/
│   └── api/
└── tests/

frontend/
├── src/
│   ├── components/
│   ├── pages/
│   └── services/
└── tests/

# [REMOVE IF UNUSED] Option 3: Mobile + API (when "iOS/Android" detected)
api/
└── [same as backend above]

ios/ or android/
└── [platform-specific structure: feature modules, UI flows, platform tests]
```

**Structure Decision**: [Document the selected structure and reference the real
directories captured above]

## Complexity Tracking

> **Fill ONLY if Constitution Check has violations that must be justified**

| Violation | Why Needed | Simpler Alternative Rejected Because |
|-----------|------------|-------------------------------------|
| [e.g., 4th project] | [current need] | [why 3 projects insufficient] |
| [e.g., Repository pattern] | [specific problem] | [why direct DB access insufficient] |
