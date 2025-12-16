# Implementation Plan: Welcome Form Persistence

**Branch**: `001-form-persistence` | **Date**: 2025-12-16 | **Spec**: [spec.md](./spec.md)
**Input**: Feature specification from `specs/001-form-persistence/spec.md`

## Summary

This plan outlines the implementation of database persistence for the contact form on the `welcome.blade.php` page. The technical approach involves creating a new database table `leads`, a corresponding `Lead` Eloquent model, a `LeadController` to handle form submission, and a `StoreLeadRequest` class for validation. The frontend will be updated to use an AJAX request (via Axios) to submit the form data to a new web route, providing asynchronous feedback to the user.

## Technical Context

**Language/Version**: PHP 8.0.2+ (Laravel 9.19)
**Primary Dependencies**: Laravel Framework, Eloquent ORM, Axios
**Storage**: MySQL (table: `leads`)
**Testing**: PHPUnit
**Target Platform**: Web (Laravel Application)
**Project Type**: Web Application
**Performance Goals**: Form submission response (success or validation failure) in < 2 seconds.
**Constraints**: Must use existing project conventions (MVC, Eloquent, Form Requests). No changes to frontend UI/design.
**Scale/Scope**: Low-traffic internal/marketing site form. The `leads` table is expected to grow at a moderate pace.

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

- **PSR-4 Autoloading**: ✅ The plan adheres to PSR-4 for all new classes (Model, Controller, Request).
- **Eloquent ORM**: ✅ The plan exclusively uses Eloquent for database interaction.
- **Mass Assignment (`$guarded = []`)**: ✅ The `Lead` model will use `$fillable` as a safer alternative, which is also a common practice.
- **Naming Conventions**: ✅ The plan follows snake_case for the table (`leads`) and PascalCase for the Model (`Lead`) and Controller (`LeadController`).
- **Fat Controllers**: ⚠️ The controller will be kept lean by moving validation logic into a Form Request class, adhering to best practices. This deviates positively from the "Fat controllers pattern" noted in the constitution.
- **AJAX with Axios**: ✅ The plan uses Axios for the frontend AJAX request, which is an existing dependency.
- **No Hardcoded SQL**: ✅ The plan uses Eloquent, avoiding raw SQL queries.

**Result**: The plan is compliant with the project's constitution.

## Project Structure

### Documentation (this feature)

```text
specs/001-form-persistence/
├── plan.md              # This file
├── data-model.md        # Data schema for the 'leads' table
├── quickstart.md        # Step-by-step guide for developers
└── checklists/
    └── requirements.md  # Spec quality checklist
```

### Source Code (repository root)

The implementation will create or modify the following files within the existing Laravel project structure.

```text
app/
├── Http/
│   ├── Controllers/
│   │   └── LeadController.php      # New: Handles form submission logic
│   └── Requests/
│       └── StoreLeadRequest.php    # New: Handles validation for the form
├── Models/
│   └── Lead.php                    # New: Eloquent model for the 'leads' table
└── ...
database/
├── migrations/
│   └── [timestamp]_create_leads_table.php # New: Migration to create the 'leads' table
└── ...
resources/
├── views/
│   └── welcome.blade.php           # Modified: Update JavaScript for AJAX submission
└── ...
routes/
├── web.php                         # Modified: Add route for form submission
└── ...
```

**Structure Decision**: The plan follows the standard Laravel project structure, which is appropriate for this web application. New classes are placed in their conventional directories (`app/Http/Controllers`, `app/Models`, etc.).

## Complexity Tracking

> **Fill ONLY if Constitution Check has violations that must be justified**

| Violation | Why Needed | Simpler Alternative Rejected Because |
|-----------|------------|-------------------------------------|
| N/A       | N/A        | N/A                                 |