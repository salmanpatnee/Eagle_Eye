# Tasks: Data Import Engine for Many-to-Many Relationships

**Input**: Design documents from `/specs/001-m2m-data-import/`
**Prerequisites**: plan.md (required), spec.md (required for user stories)

**Tests**: The current specification does not explicitly request generating test tasks as part of the implementation plan. Tests will be implied as part of each task's completion for quality assurance.

**Organization**: Tasks are grouped by user story to enable independent implementation and testing of each story.

## Format: `[ID] [P?] [Story] Description`

- **[P]**: Can run in parallel (different files, no dependencies)
- **[Story]**: Which user story this task belongs to (e.g., US1, US2, US3)
- Include exact file paths in descriptions

## Path Conventions

- **Web app**: `backend/src/`, `frontend/src/` (relative to project root)

---

## Phase 1: Setup (Shared Infrastructure)

**Purpose**: Project initialization and basic structure for the import feature.

- [ ] T001 Create `specs/001-m2m-data-import/tasks.md` (this file)
- [ ] T002 Configure `.env` variables for import feature (e.g., max file size, import queue)
- [ ] T003 Install `maatwebsite/excel` package for Laravel in `composer.json`
- [ ] T004 Run `php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider" --tag=config`
- [ ] T005 [P] Add necessary frontend dependencies for file upload (e.g., Alpine.js in `package.json` if used, otherwise vanilla JS)
- [ ] T006 [P] Configure initial routing for import management in `routes/web.php` (e.g., `/admin/imports`)

---

## Phase 2: Foundational (Blocking Prerequisites)

**Purpose**: Core infrastructure that MUST be complete before ANY user story can be implemented. This includes the database configuration for mappings and basic security.

**⚠️ CRITICAL**: No user story work can begin until this phase is complete

- [ ] T007 Create database migration for `import_mappings` table (FR-010) in `database/migrations/*_create_import_mappings_table.php`
- [ ] T008 Create `ImportMapping` model (FR-010) in `app/Models/ImportMapping.php`
- [ ] T009 Implement basic web interface for configuring `ImportMapping` (FR-010) in `resources/views/admin/import-manager/mapping-configuration.blade.php`
- [ ] T010 Create backend controller for `ImportMapping` management (FR-010) in `app/Http/Controllers/Admin/ImportMappingController.php`
- [ ] T011 Implement basic RBAC for mapping configuration (NFR-SEC-002) in `app/Http/Middleware/VerifyImportAccess.php` and `routes/web.php`
- [ ] T012 Configure logging for import operations (FR-007, NFR-SEC-004) in `config/logging.php`

**Checkpoint**: Foundation ready - user story implementation can now begin in parallel

---

## Phase 3: User Story 1 - Upload and Process Relationships (Priority: P1) 🎯 MVP

**Goal**: Enable administrators to upload a spreadsheet and have the system process the relationships into pivot tables.

**Independent Test**: An administrator can upload a valid spreadsheet file, and the system correctly parses, validates, and inserts the relationships into the configured pivot table without manual intervention. A confirmation message is displayed.

### Implementation for User Story 1

- [ ] T013 [US1] Create file upload HTML/Blade partial (FR-001) in `resources/views/components/file-upload.blade.php`
- [ ] T014 [US1] Integrate `file-upload.blade.php` into `resources/views/admin/import-manager/index.blade.php` and add necessary JavaScript for interactivity in `public/js/import-manager/index.js`
- [ ] T015 [US1] Create backend controller action for file upload (FR-001) in `app/Http/Controllers/Admin/ImportController.php`
- [ ] T016 [US1] Create form request for file upload validation (FR-001) in `app/Http/Requests/ImportFileUploadRequest.php`
- [ ] T017 [US1] Implement basic Excel/CSV file parsing service using `maatwebsite/excel` (FR-002) in `app/Services/SpreadsheetParserService.php`
- [ ] T018 [US1] Create a Laravel Job for background import processing (FR-011, Edge Case: Large files) in `app/Jobs/ProcessImportJob.php`
- [ ] T019 [US1] Implement initial validation logic for entity existence (FR-003) in `app/Services/ImportValidatorService.php`
- [ ] T020 [US1] Implement relationship insertion logic (FR-004) in `app/Services/RelationshipImporterService.php`
- [ ] T021 [US1] Connect `ProcessImportJob` to use `SpreadsheetParserService`, `ImportValidatorService`, and `RelationshipImporterService`
- [ ] T022 [US1] Update `ImportController` to dispatch `ProcessImportJob` and return a confirmation (FR-006)

**Checkpoint**: User Story 1 should be fully functional and testable independently

---

## Phase 4: User Story 2 - Handle Invalid Data (Priority: P2)

**Goal**: Ensure the system gracefully handles invalid data in import files, provides clear feedback, and maintains data integrity.

**Independent Test**: An administrator uploads a spreadsheet with invalid entity IDs or malformed relationship data. The system identifies these errors, logs them, skips invalid entries, and provides an import summary detailing the issues, without corrupting valid data.

### Implementation for User Story 2

- [ ] T023 [US2] Enhance `SpreadsheetParserService` to identify and report malformed relationship data (FR-002, Edge Case: Malformed IDs)
- [ ] T024 [US2] Enhance `ImportValidatorService` to accumulate and report all invalid entity IDs (FR-003, FR-005)
- [ ] T025 [US2] Implement transactional integrity within `RelationshipImporterService` for each row/relationship (FR-009)
- [ ] T026 [US2] Create a mechanism to store import errors/skipped entries (FR-005, FR-007) (e.g., a new `ImportError` model or JSON column in `ImportJob` model)
- [ ] T027 [US2] Update `ProcessImportJob` to use enhanced services and store detailed errors
- [ ] T028 [US2] Update `ImportController` and `resources/views/admin/import-manager/index.blade.php` to display summary of import, including errors (FR-006) with necessary JavaScript.

**Checkpoint**: User Stories 1 AND 2 should both work independently

---

## Phase 5: User Story 3 - View Import Status and Logs (Priority: P3)

**Goal**: Provide administrators with a transparent view of past import jobs, their status, and detailed error logs.

**Independent Test**: An administrator can access an import history page that lists all past import jobs with their status, and can view detailed logs for any specific job, including errors and skipped entries.

### Implementation for User Story 3

- [ ] T029 [US3] Create database migration for `import_jobs` table to store history (FR-008, FR-007) in `database/migrations/*_create_import_jobs_table.php`
- [ ] T030 [US3] Create `ImportJob` model (FR-008) in `app/Models/ImportJob.php`
- [ ] T031 [US3] Update `ProcessImportJob` to create and update `ImportJob` records with status, summary, and error details (FR-007)
- [ ] T032 [US3] Create backend controller action to retrieve a list of import jobs (FR-008) in `app/Http/Controllers/Admin/ImportHistoryController.php`
- [ ] T033 [US3] Create backend controller action to retrieve detailed logs for a specific import job (FR-008) in `app/Http/Controllers/Admin/ImportHistoryController.php`
- [ ] T034 [US3] Develop frontend UI to display import job history (FR-008) in `resources/views/admin/import-manager/import-history.blade.php` and add necessary JavaScript.
- [ ] T035 [US3] Develop frontend UI to display detailed import job logs (FR-008) in `resources/views/admin/import-manager/import-log-detail.blade.php` and add necessary JavaScript.

**Checkpoint**: All user stories should now be independently functional

---

## Phase 6: Polish & Cross-Cutting Concerns

**Purpose**: Improvements that affect multiple user stories, ensuring robust, secure, and performant operation.

- [ ] T036 Code cleanup and refactoring for import-related services and controllers
- [ ] T037 Implement data sanitization/masking if sensitive data is identified (NFR-SEC-003)
- [ ] T038 Conduct performance testing for large import files (SC-001)
- [ ] T039 Implement comprehensive audit trails for all import activities (NFR-SEC-004)
- [ ] T040 Review and harden security configurations for import endpoints (NFR-SEC-001)
- [ ] T041 Update user documentation for the import feature, including spreadsheet format and mapping configuration.

---

## Dependencies & Execution Order

### Phase Dependencies

-   **Setup (Phase 1)**: No dependencies - can start immediately
-   **Foundational (Phase 2)**: Depends on Setup completion - BLOCKS all user stories
-   **User Stories (Phase 3+)**: All depend on Foundational phase completion
    -   User stories can then proceed in parallel (if staffed)
    -   Or sequentially in priority order (P1 → P2 → P3)
-   **Polish (Final Phase)**: Depends on all desired user stories being complete

### User Story Dependencies

-   **User Story 1 (P1)**: Can start after Foundational (Phase 2) - No dependencies on other stories
-   **User Story 2 (P2)**: Can start after Foundational (Phase 2) - Integrates with US1 for error reporting and transactional integrity.
-   **User Story 3 (P3)**: Can start after Foundational (Phase 2) - Leverages components from US1 and US2 for history and logging.

### Within Each User Story

-   Models/Migrations before services
-   Services before controllers
-   Backend implementation before frontend integration
-   Core feature implementation before error handling/logging enhancements within a story
-   Story complete before moving to next priority

### Parallel Opportunities

-   All Setup tasks marked [P] can run in parallel.
-   Once Foundational phase completes, User Stories 1, 2, and 3 can technically begin development in parallel *if* developers coordinate on shared service interfaces and model definitions. However, for a single developer, a sequential approach is recommended.
-   Within each User Story phase, tasks marked [P] (e.g., frontend components and some backend setup) can run in parallel.
-   Backend controller actions and corresponding frontend UI components for a given feature can be developed in parallel.

---

## Parallel Example: User Story 1

```bash
# Frontend development (parallelizable with some backend tasks)
Task: "T013 [US1] Create file upload HTML/Blade partial (FR-001) in resources/views/components/file-upload.blade.php"
Task: "T014 [US1] Integrate file-upload.blade.php into resources/views/admin/import-manager/index.blade.php and add necessary JavaScript for interactivity in public/js/import-manager/index.js"

# Backend setup (parallelizable with frontend development)
Task: "T015 [US1] Create backend controller action for file upload (FR-001) in app/Http/Controllers/Admin/ImportController.php"
Task: "T016 [US1] Create form request for file upload validation (FR-001) in app/Http/Requests/ImportFileUploadRequest.php"
```

---

## Implementation Strategy

### MVP First (User Story 1 Only)

1.  Complete Phase 1: Setup
2.  Complete Phase 2: Foundational (CRITICAL - blocks all stories)
3.  Complete Phase 3: User Story 1
4.  **STOP and VALIDATE**: Test User Story 1 independently
5.  Deploy/demo if ready

### Incremental Delivery

1.  Complete Setup + Foundational → Foundation ready
2.  Add User Story 1 → Test independently → Deploy/Demo (MVP!)
3.  Add User Story 2 → Test independently → Deploy/Demo
4.  Add User Story 3 → Test independently → Deploy/Demo
5.  Each story adds value without breaking previous stories

### Parallel Team Strategy

With multiple developers:

1.  Team completes Setup + Foundational together
2.  Once Foundational is done:
    -   Developer A: User Story 1
    -   Developer B: User Story 2
    -   Developer C: User Story 3
3.  Stories complete and integrate independently

---

## Notes

-   [P] tasks = different files, no dependencies
-   [Story] label maps task to specific user story for traceability
-   Each user story should be independently completable and testable
-   Verify tests fail before implementing
-   Commit after each task or logical group
-   Stop at any checkpoint to validate story independently
-   Avoid: vague tasks, same file conflicts, cross-story dependencies that break independence
