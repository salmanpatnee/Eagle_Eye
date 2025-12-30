# Implementation Tasks: Nationalities CRUD

**Feature**: Nationalities CRUD  
**Branch**: `001-nationalities-crud`  
**Spec**: [spec.md](spec.md)  
**Plan**: [plan.md](plan.md)  

## Implementation Strategy

**MVP Scope**: Implement User Story 1 (Admin Creates Nationality) with basic CRUD functionality for nationalities, including database table, model, controller, and views following the same design as the User module.

**Delivery Approach**: Incremental delivery following user story priorities (P1, P2, P3...), with each story being independently testable.

## Dependencies

User stories dependencies:
- US1 (P1) → No dependencies
- US2 (P1) → Depends on US1 (requires basic CRUD functionality)
- US3 (P2) → Depends on US1 (requires basic CRUD functionality)
- US4 (P2) → Depends on US1 (requires basic CRUD functionality)
- US5 (P3) → Depends on US1, US2, US3, US4 (requires full CRUD and foreign key relationship)

## Parallel Execution Examples

Per user story:
- **US1**: Database migration, Model, Controller, Views can be developed in parallel by different developers
- **US2**: Index view and pagination can be developed in parallel with other stories' components
- **US3**: Update functionality can be developed in parallel with delete functionality
- **US4**: Delete functionality can be developed in parallel with update functionality
- **US5**: Foreign key relationship implementation can be developed in parallel with UI components

---

## Phase 1: Setup

- [x] T001 Create database migration for nationalities table with id, name, timestamps, and soft deletes
- [x] T002 Create Nationality model with fillable fields and soft deletes trait
- [x] T003 Create NationalityController with basic CRUD methods

## Phase 2: Foundational

- [x] T004 Add resource routes for nationalities in web.php with superadmin middleware
- [x] T005 Create nationalities views directory structure under resources/views/process/hr/nationalities
- [x] T006 Create sidebar menu item for nationalities following the same pattern as users

## Phase 3: [US1] Admin Creates Nationality

**Goal**: Enable admin users to create new nationalities in the system

**Independent Test**: Can be fully tested by navigating to the nationalities management page, clicking "Add New Nationality", filling in the nationality details, and verifying the nationality is saved and displayed in the list.

**Tasks**:

- [x] T007 [P] [US1] Create nationality migration with proper fields and constraints
- [x] T008 [P] [US1] Implement Nationality model with fillable fields and soft deletes
- [x] T009 [P] [US1] Add store method to NationalityController with validation
- [x] T010 [P] [US1] Create create.blade.php view in resources/views/process/hr/nationalities following User module pattern
- [x] T011 [US1] Run migration to create nationalities table
- [x] T012 [US1] Test nationality creation functionality

## Phase 4: [US2] Admin Views Nationalities

**Goal**: Enable admin users to view all nationalities

**Independent Test**: Can be fully tested by navigating to the nationalities management page and verifying that all nationalities are displayed in a table format.

**Tasks**:

- [x] T013 [P] [US2] Implement index method in NationalityController
- [x] T014 [P] [US2] Create index.blade.php view in resources/views/process/hr/nationalities following User module pattern
- [x] T015 [US2] Add pagination to nationality listing
- [x] T016 [US2] Test nationality listing functionality

## Phase 5: [US3] Admin Updates Nationality

**Goal**: Enable admin users to update existing nationalities

**Independent Test**: Can be fully tested by selecting an existing nationality, editing its details, saving the changes, and verifying the updated information is reflected in the system.

**Tasks**:

- [x] T017 [P] [US3] Implement edit method in NationalityController
- [x] T018 [P] [US3] Implement update method in NationalityController with validation
- [x] T019 [P] [US3] Enhance create.blade.php to handle both create and edit operations
- [x] T020 [US3] Test nationality update functionality

## Phase 6: [US4] Admin Deletes Nationality

**Goal**: Enable admin users to delete nationalities that are no longer needed

**Independent Test**: Can be fully tested by selecting an existing nationality and deleting it, with appropriate confirmation to prevent accidental deletion.

**Tasks**:

- [x] T021 [P] [US4] Implement destroy method in NationalityController with soft delete
- [x] T022 [P] [US4] Add delete confirmation to index view
- [x] T023 [P] [US4] Add validation to prevent deletion of referenced nationalities
- [x] T024 [US4] Test nationality deletion functionality with referential integrity check

## Phase 7: [US5] HR Expert Master Table Uses Nationality ID

**Goal**: Update HR Expert Master Table to reference nationalities via foreign key instead of storing nationality text directly

**Independent Test**: Can be fully tested by verifying that the HR expert records reference nationalities by ID rather than storing nationality text directly.

**Tasks**:

- [x] T025 [P] [US5] Create migration to add nationality_id foreign key to hr_expert_master_table (keep existing nationality column for backward compatibility)
- [x] T026 [P] [US5] Update HR Expert model to include nationality relationship
- [x] T027 [P] [US5] Update HR Expert forms to include nationality dropdown alongside existing nationality column
- [x] T028 [P] [US5] Update HR Expert controller to handle both nationality_id and existing nationality column
- [x] T029 [US5] Test HR Expert form with nationality dropdown
- [x] T030 [US5] Test that nationality names display correctly in HR Expert records

## Phase 8: Polish & Cross-Cutting Concerns

- [x] T031 Add proper validation messages for nationality name uniqueness
- [x] T032 Add authorization checks to ensure only super admins can manage nationalities
- [x] T033 Add proper error handling for all nationality operations
- [x] T034 Update sidebar navigation to include the new "Manage Nationalities" menu item
- [x] T035 Test complete workflow from nationality creation to HR Expert association
- [x] T036 Update documentation with usage instructions