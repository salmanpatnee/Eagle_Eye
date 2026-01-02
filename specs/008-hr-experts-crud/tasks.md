# Tasks: HR Experts CRUD

**Feature Branch**: `008-hr-experts-crud`
**Spec**: `specs/008-hr-experts-crud/spec.md`
**Plan**: `specs/008-hr-experts-crud/plan.md`

## Implementation Strategy
- **MVP**: Complete User Stories 1 & 2 (List & Create) to establish the module.
- **Incremental**: Add Edit, Show, and Delete functionality sequentially.
- **Refactoring**: Transform existing `HumanResourceController` from single-action to full resource controller.
- **Consistency**: Strictly match UI/UX of "Industries" module.

## Dependencies

1.  **Setup** (Phase 1)
2.  **Foundational** (Phase 2) -> Unlocks all User Stories
3.  **US1** (View List) -> Independent
4.  **US2** (Create) -> Independent
5.  **US3** (Edit) -> Depends on US2 (reuses form)
6.  **US4** (Show) -> Independent
7.  **US5** (Delete) -> Independent

## Phase 1: Setup

- [x] T001 Create directory structure for views in `resources/views/process/hr/experts/`
- [x] T002 Create sidebar menu partial in `resources/views/partials/sidebar-menus/hr-experts.blade.php` with link to `hr-experts.index`
- [x] T003 Update sidebar main file `resources/views/partials/sidebar.blade.php` to include `hr-experts` menu item

## Phase 2: Foundational

- [x] T004 Update `routes/web.php` to replace `hr-expert.index` with `Route::resource('hr-experts', ...)`
- [x] T005 Refactor `app/Http/Controllers/HumanResourceController.php` to basic Resource Controller structure (empty methods)

## Phase 3: User Story 1 - View HR Experts List (P1)

**Goal**: Admins can view a paginated, filterable list of HR Experts.
**Test**: Visit `/hr-experts`, verify table loads with data and filters work.

- [x] T006 [US1] Implement `index` method in `app/Http/Controllers/HumanResourceController.php` with filtering logic (migrated from old invoke method)
- [x] T007 [US1] Create `resources/views/process/hr/experts/index.blade.php` using `<x-table.table>` components

## Phase 4: User Story 2 - Add New HR Expert (P1)

**Goal**: Admins can add new experts with all relationships (Designation, Industry, etc.).
**Test**: Submit form, verify record in DB and pivot tables.

- [x] T008 [US2] Implement `create` method in `app/Http/Controllers/HumanResourceController.php` (fetch dropdown data: industries, orgs, nationalities, designations)
- [x] T009 [US2] Implement `store` method in `app/Http/Controllers/HumanResourceController.php` (validation, create model, sync certifications/experties)
- [x] T010 [US2] Create `resources/views/process/hr/experts/create.blade.php` using `<x-form.*>` components

## Phase 5: User Story 3 - Edit HR Expert (P2)

**Goal**: Admins can update existing expert details.
**Test**: Edit record, change values, verify updates persist.

- [x] T011 [US3] Implement `edit` method in `app/Http/Controllers/HumanResourceController.php` (load model & pivot data)
- [x] T012 [US3] Implement `update` method in `app/Http/Controllers/HumanResourceController.php` (validate, update model, sync relations)
- [x] T013 [US3] Update `resources/views/process/hr/experts/create.blade.php` to handle edit mode (populate values, correct form action)

## Phase 6: User Story 4 - View Expert Details (P3)

**Goal**: Read-only detailed view of an expert.
**Test**: Click view icon, see all details including pivots.

- [x] T014 [US4] Implement `show` method in `app/Http/Controllers/HumanResourceController.php` (eager load relations)
- [x] T015 [US4] Create `resources/views/process/hr/experts/show.blade.php` using `<x-info-*>` components

## Phase 7: User Story 5 - Delete HR Expert (P3)

**Goal**: Remove experts from system.
**Test**: Delete record, confirm it's gone from list and DB.

- [x] T016 [US5] Implement `destroy` method in `app/Http/Controllers/HumanResourceController.php` (delete record)

## Phase 8: Polish

- [x] T017 Verify UI consistency (colors, spacing, icons) matches "Industries" module exactly
- [x] T018 Remove deprecated view `resources/views/ciso/people/index.blade.php`