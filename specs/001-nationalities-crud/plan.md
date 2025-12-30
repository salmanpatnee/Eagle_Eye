# Implementation Plan: [FEATURE]

**Branch**: `[###-feature-name]` | **Date**: [DATE] | **Spec**: [link]
**Input**: Feature specification from `/specs/[###-feature-name]/spec.md`

**Note**: This template is filled in by the `/sp.plan` command. See `.specify/templates/commands/plan.md` for the execution workflow.

## Summary

Implement a nationalities CRUD module following the same design and components as the existing Users module. This includes creating a nationalities database table with ID and name columns, implementing full CRUD operations (create, read, update, delete) with soft deletes, and adding a "Manage Nationalities" menu item to the sidebar. The implementation will follow existing patterns in the codebase, using the same layout, forms, and components as the User module.

## Technical Context

**Language/Version**: PHP 8.0+, Laravel 9
**Primary Dependencies**: Laravel Framework, MySQL database, Tailwind CSS, Vite
**Storage**: MySQL database with Eloquent ORM
**Testing**: PHPUnit for backend, Laravel Dusk for browser testing
**Target Platform**: Web application (Laravel-based)
**Project Type**: Web application with backend API and frontend views
**Performance Goals**: Page load under 3 seconds, CRUD operations under 1 second
**Constraints**: Must follow existing code patterns and use same components as User module
**Scale/Scope**: Single feature module for managing nationalities, following existing architecture

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

Based on the project constitution (which appears to be a template), the following checks apply:

- **Test-First (NON-NEGOTIABLE)**: Tests will be skipped as per requirements, but the implementation will follow existing patterns
- **Library-First**: The feature follows the existing Laravel MVC pattern rather than creating a separate library
- **Integration Testing**: Integration tests will be skipped as per requirements, but foreign key relationship between nationalities and HR experts will be implemented
- **Observability**: The implementation will follow existing logging patterns in the application

## Project Structure

### Documentation (this feature)

```text
specs/001-nationalities-crud/
├── plan.md              # This file (/sp.plan command output)
├── research.md          # Phase 0 output (/sp.plan command)
├── data-model.md        # Phase 1 output (/sp.plan command)
├── quickstart.md        # Phase 1 output (/sp.plan command)
├── contracts/           # Phase 1 output (/sp.plan command)
└── tasks.md             # Phase 2 output (/sp.tasks command - NOT created by /sp.plan)
```

### Source Code (repository root)

```text
# Web application structure (Laravel-based)
app/
├── Http/
│   └── Controllers/
│       └── NationalityController.php
├── Models/
│   └── Nationality.php
database/
└── migrations/
    └── create_nationalities_table.php
resources/
└── views/
    └── process/
        └── hr/
            └── nationalities/
                ├── index.blade.php
                ├── create.blade.php
                └── show.blade.php
routes/
└── web.php (modified to add nationality routes)
resources/
└── views/
    └── partials/
        └── sidebar-menus/
            └── nationalities.blade.php
```

**Structure Decision**: This is a web application following the existing Laravel MVC pattern. The implementation will follow the same structure as other modules in the application, particularly the User module, to maintain consistency.

## Complexity Tracking

> **Fill ONLY if Constitution Check has violations that must be justified**

| Violation | Why Needed | Simpler Alternative Rejected Because |
|-----------|------------|-------------------------------------|
| [N/A] | [No violations identified] | [N/A] |
