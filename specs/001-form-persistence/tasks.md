# Tasks: Welcome Form Persistence

**Input**: Design documents from `specs/001-form-persistence/`
**Prerequisites**: plan.md, spec.md, data-model.md

## Format: `[ID] [P?] [Story] Description`

- **[P]**: Can run in parallel (different files, no dependencies)
- **[Story]**: Which user story this task belongs to (e.g., US1)

---

## Phase 1: Foundational (Blocking Prerequisites)

**Purpose**: Core data structure that MUST be complete before the application logic can be implemented.

**⚠️ CRITICAL**: No user story work can begin until this phase is complete.

- [X] T001 [P] Create the database migration for the `leads` table in a new file inside `database/migrations/`.
- [X] T002 [P] Create the `Lead` Eloquent model in `app/Models/Lead.php`.

**Checkpoint**: Foundation ready - user story implementation can now begin.

---

## Phase 2: User Story 1 - Submit Contact Inquiry (Priority: P1) 🎯 MVP

**Goal**: To capture user inquiries from the welcome page form and save them to the database, providing feedback to the user.

**Independent Test**: A user can navigate to the welcome page, fill out the contact form, submit it, and see a success message. The submitted data will appear as a new entry in the `leads` database table.

### Implementation for User Story 1

- [X] T003 [P] [US1] Create the `StoreLeadRequest` form request class in `app/Http/Requests/StoreLeadRequest.php` and define the validation rules.
- [X] T004 [P] [US1] Add a new `POST` route to `routes/web.php` for handling the contact form submission.
- [X] T005 [P] [US1] Create the `LeadController` in `app/Http/Controllers/LeadController.php`.
- [X] T006 [US1] Implement the `store` method in `app/Http/Controllers/LeadController.php` to validate the request and save the new lead. (Depends on T003, T005)
- [X] T007 [US1] Modify the JavaScript in `resources/views/welcome.blade.php` to submit the form via an AJAX request and handle the success/error responses. (Depends on T004, T006)

**Checkpoint**: At this point, User Story 1 should be fully functional and testable independently.

---

## Phase 3: Polish & Cross-Cutting Concerns

**Purpose**: Final validation and documentation checks.

- [X] T008 Run through the steps in `specs/001-form-persistence/quickstart.md` to ensure the developer setup and implementation flow are correct.

---

## Dependencies & Execution Order

### Phase Dependencies

- **Foundational (Phase 1)**: No dependencies - can start immediately.
- **User Story 1 (Phase 2)**: Depends on Foundational phase completion.
- **Polish (Phase 3)**: Depends on User Story 1 completion.

### Within Each Phase

- **Foundational**: T001 and T002 can be done in parallel.
- **User Story 1**:
  - T003, T004, and T005 can begin in parallel after the foundational phase.
  - T006 depends on T003 and T005.
  - T007 depends on T004 and T006.

## Implementation Strategy

### MVP First (User Story 1 Only)

1.  Complete Phase 1: Foundational (T001, T002).
2.  Complete Phase 2: User Story 1 (T003-T007).
3.  **STOP and VALIDATE**: Test User Story 1 independently by submitting the form on the website and verifying the data in the database.
4.  Complete Phase 3: Polish (T008).
5.  The feature is now ready for review.
