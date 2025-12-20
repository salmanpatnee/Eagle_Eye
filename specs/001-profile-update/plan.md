# Implementation Plan: Profile Update for Non-Admin Users

**Branch**: `001-profile-update` | **Date**: 2025-12-20 | **Spec**: [spec link](spec.md)
**Input**: Feature specification from `/specs/001-profile-update/spec.md`

**Note**: This template is filled in by the `/sp.plan` command. See `.specify/templates/commands/plan.md` for the execution workflow.

## Summary

This feature implements profile update functionality for non-admin users. The implementation will leverage the existing UserController.php and create.blade.php templates, with modifications to restrict non-admin users from editing email and role fields. The feature will add an "Update Profile" option to the user dropdown menu in the navigation bar, allowing non-admin users to access their profile update page.

## Technical Context

**Language/Version**: PHP 8.0.2, Laravel 9
**Primary Dependencies**: Laravel Framework, Sanctum for authentication, Tailwind CSS for styling
**Storage**: MySQL database with existing User model
**Testing**: PHPUnit for backend tests
**Target Platform**: Web application
**Project Type**: Web application with backend API
**Performance Goals**: Standard web application performance requirements
**Constraints**: Must preserve existing functionality for admin users; non-admin users cannot edit email or role fields
**Scale/Scope**: Individual user profile updates, no specific scalability constraints beyond standard web app requirements

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

Based on the existing project structure and practices seen in the codebase:

- **Fat Controllers**: ⚠️ The UserController already has multiple responsibilities in a single class, which is consistent with the existing project patterns. We will maintain this approach for consistency while considering the feature requirements.
- **Authorization**: The project uses role-based access control, which will be leveraged for this feature using Laravel's authorization capabilities.
- **Existing Architecture**: The project follows Laravel conventions and uses the existing User model and UserController, which we will extend appropriately.
- **Validation**: The project uses Laravel's built-in validation, which we will continue to use.

**Result**: The plan is compliant with the project's existing architecture and patterns.

## Project Structure

### Documentation (this feature)

```text
specs/001-profile-update/
├── plan.md              # This file (/sp.plan command output)
├── research.md          # Phase 0 output (/sp.plan command)
├── data-model.md        # Phase 1 output (/sp.plan command)
├── quickstart.md        # Phase 1 output (/sp.plan command)
├── contracts/           # Phase 1 output (/sp.plan command)
└── tasks.md             # Phase 2 output (/sp.tasks command - NOT created by /sp.plan)
```

### Source Code (repository root)
# Web application (existing structure)
C:\Users\salmanabdul.ghani\Herd\ciso-360\
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── UserController.php      # Modified to support profile updates
│   └── Models/
│       ├── User.php
│       └── UserRole.php
├── resources/
│   ├── views/
│   │   ├── process/
│   │   │   └── initial-setup/
│   │   │       └── users/
│   │   │           └── create.blade.php   # Modified to restrict fields for non-admins
│   │   └── partials/
│   │       └── nav-ciso.blade.php         # Modified to add update profile link
│   └── layouts/
│       └── ciso.blade.php
├── routes/
│   └── web.php                          # Contains user route definitions
└── tests/
    └── Feature/
        └── User/
            └── ProfileUpdateTest.php     # New test file

**Structure Decision**: The feature will leverage existing Laravel MVC structure with modifications to the UserController, the user form view, and navigation template. A new profile update route will be added alongside existing user routes.

## Complexity Tracking

> **Fill ONLY if Constitution Check has violations that must be justified**

| Violation | Why Needed | Simpler Alternative Rejected Because |
|-----------|------------|-------------------------------------|
| [N/A] | [N/A] | [N/A] |
