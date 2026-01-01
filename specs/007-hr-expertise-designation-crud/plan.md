# Implementation Plan: HR Expertise and Designation CRUD Interface

**Branch**: `007-hr-expertise-designation-crud` | **Date**: 2025-12-31 | **Spec**: [specs/007-hr-expertise-designation-crud/spec.md](./spec.md)
**Input**: Feature specification from `/specs/007-hr-expertise-designation-crud/spec.md`

**Note**: This template is filled in by the `/sp.plan` command. See `.specify/templates/commands/plan.md` for the execution workflow.

## Summary

This plan implements complete CRUD interfaces for managing HR Expertise and Designation entities in the CISO 360 GRC System. The implementation follows the same architectural pattern as existing Industries and Nationalities modules, ensuring consistency across the application. The Expertise module will use the existing hr_expertise_table and model, while the Designation module will require a new hr_designation_table and model. Both modules will include RESTful routes, controllers, views, and sidebar navigation following established patterns.

## Technical Context

**Language/Version**: PHP 8.0.2, Laravel 9.x
**Primary Dependencies**: Laravel Framework, Tailwind CSS (TailAdmin theme), MySQL database
**Storage**: MySQL database with existing hr_expertise_table and new hr_designation_table
**Testing**: PHPUnit for backend testing
**Target Platform**: Web application running on Laravel Herd
**Project Type**: Web application with backend API and frontend views
**Performance Goals**: CRUD operations complete in under 30 seconds each, interface loads within 3 seconds
**Constraints**: Must maintain backward compatibility with existing designation column in hr_expert_master_table
**Scale/Scope**: HR management module for authorized users, expected to handle hundreds of records

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

- [x] All code follows Laravel 9 conventions and CISO 360 project standards
- [x] Database schema changes maintain referential integrity
- [x] Authentication and authorization follow existing role-based access control
- [x] UI/UX maintains consistency with existing modules
- [x] Form validation and error handling follow established patterns
- [x] Mass assignment vulnerabilities are addressed with proper model configuration

## Phase 0: Research Complete
- [x] Analyzed existing Industries and Nationalities modules
- [x] Identified architectural patterns for controllers, models, views, and routes
- [x] Resolved all "NEEDS CLARIFICATION" items
- [x] Created research.md with findings

## Phase 1: Design Complete
- [x] Created data-model.md with entity definitions
- [x] Generated API contracts for Expertise and Designation entities
- [x] Created quickstart.md guide
- [x] Updated agent context with new technology
- [x] All design artifacts generated

## Project Structure

### Documentation (this feature)

```text
specs/007-hr-expertise-designation-crud/
├── plan.md              # This file (/sp.plan command output)
├── research.md          # Phase 0 output (/sp.plan command)
├── data-model.md        # Phase 1 output (/sp.plan command)
├── quickstart.md        # Phase 1 output (/sp.plan command)
├── contracts/           # Phase 1 output (/sp.plan command)
└── tasks.md             # Phase 2 output (/sp.tasks command - NOT created by /sp.plan)
```

### Source Code (repository root)

```text
# Web application structure
app/
├── Http/
│   ├── Controllers/
│   │   ├── ExpertiseController.php      # New controller for Expertise CRUD
│   │   └── DesignationController.php    # New controller for Designation CRUD
│   └── Requests/
│       ├── ExpertiseRequest.php         # New request validation for Expertise
│       └── DesignationRequest.php       # New request validation for Designation
├── Models/
│   ├── Experties.php                    # Existing model for Expertise
│   ├── HRExperties.php                  # Existing model for Expertise
│   └── Designation.php                  # New model for Designation
└── Console/
    └── Commands/
        └── [if needed for data migration]

database/
├── migrations/
│   ├── [timestamp]_create_hr_designation_table.php    # New migration for Designation table
│   └── [timestamp]_add_designation_id_to_hr_expert_master_table.php  # Migration to add foreign key

resources/
├── views/
│   ├── process/hr/experties/            # New views for Expertise module
│   │   ├── index.blade.php
│   │   ├── create.blade.php
│   │   └── show.blade.php
│   ├── process/hr/designations/         # New views for Designation module
│   │   ├── index.blade.php
│   │   ├── create.blade.php
│   │   └── show.blade.php
│   └── partials/
│       └── sidebar-menus/
│           ├── expertises.blade.php     # New sidebar menu for Expertise
│           └── designations.blade.php   # New sidebar menu for Designation
└── lang/
    └── [if new language files needed]

routes/
└── web.php                              # Routes added for Expertise and Designation modules

public/
└── storage/                             # For file uploads if needed
```

**Structure Decision**: Following the existing web application structure with Laravel conventions. The Expertise module will use existing models and tables, while the Designation module will require new models, tables, and migrations. All views and controllers will follow the same patterns as Industries and Nationalities modules.

## Complexity Tracking

> **Fill ONLY if Constitution Check has violations that must be justified**

| Violation | Why Needed | Simpler Alternative Rejected Because |
|-----------|------------|-------------------------------------|
| [N/A] | [N/A] | [N/A] |
