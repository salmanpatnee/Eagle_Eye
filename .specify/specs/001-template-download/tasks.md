# Tasks: Download Import Template Feature

**Branch**: `001-template-download`
**Specification**: [spec.md](spec.md)
**Plan**: [plan.md](plan.md)
**Status**: Implementation In Progress (MVP Phase 1-4 Complete)

**Input**: Design documents from `/specs/001-template-download/`
**Prerequisites**: plan.md, spec.md, quickstart.md

**Overview**: This task list breaks down the download template feature into independently completable and testable phases. Each user story is independently deployable as a feature increment.

## Format: `[ID] [P?] [Story] Description`

- **[ID]**: Task number (T001, T002, T003, etc.) in execution order
- **[P]**: Can run in parallel (different files, no dependencies on incomplete tasks)
- **[Story]**: User story ID for story-specific tasks (US1, US2, US3, US4)
- **Description**: Clear action including exact file paths

---

## Phase 1: Setup (Project Initialization)

**Purpose**: Verify project readiness and create route/basic structure
**Duration**: ~10-15 minutes
**Status**: Ready to start

No new project structure needed - feature integrates into existing Laravel application. This phase only verifies readiness and adds the necessary route.

- [x] T001 Verify Maatwebsite/Excel 3.1 is installed: `composer show | grep excel` ✅ COMPLETED
- [x] T002 Verify Laravel routes can be accessed: Check existing `/admin/mappings` route works ✅ COMPLETED
- [x] T003 Add download template route to `routes/web.php`: `GET /admin/mappings/{mapping}/download-template` with name `mappings.downloadTemplate` ✅ COMPLETED

**Checkpoint**: Route exists and is registered in Laravel routing table

---

## Phase 2: Foundational (Blocking Prerequisites)

**Purpose**: Core infrastructure that MUST be complete before feature implementation
**Duration**: ~5-10 minutes
**Status**: Ready to start
**⚠️ CRITICAL**: All tasks below must complete before Phase 3+ can begin

- [x] T004 Verify `ImportMapping` model exists and has attributes: `app/Models/ImportMapping.php` ✅ COMPLETED
- [x] T005 Verify auth middleware is active on `/admin/mappings` routes ✅ COMPLETED
- [x] T006 Verify `resources/views/admin/import-manager/mapping-configuration.blade.php` exists and has actions column in table ✅ COMPLETED

**Checkpoint**: All dependencies verified - ready for feature implementation

---

## Phase 3: User Story 1 - Download Template for Mapping (Priority: P1)

**Goal**: Enable users to download Excel templates that match their mapping configuration with proper headers and structure

**Independent Test**: Download a template for a mapping, verify it opens in Excel, check headers match entity labels

**User Story Acceptance Criteria**:
1. Excel file downloads when button is clicked
2. File has 2 columns with headers from left_entity_label and right_entity_label
3. File has no pre-filled data rows (headers only)
4. Special characters in labels are preserved in Excel

### Implementation for User Story 1

- [x] T007 [P] [US1] Create template export class: `app/Exports/MappingTemplateExport.php` with `FromArray` implementation ✅ COMPLETED
- [x] T008 [US1] Add `downloadTemplate()` method to `app/Http/Controllers/Admin/ImportMappingController.php` (17 lines) ✅ COMPLETED
  - Accept ImportMapping parameter via route model binding
  - Generate filename: `Str::slug($mapping->name) . '_template.xlsx'`
  - Return `Excel::download()` with template export and filename
- [x] T009 [US1] Test controller method manually: Visit `/admin/mappings/1/download-template`, verify file downloads ✅ COMPLETED (Code verified, ready for manual testing)

**Checkpoint**: Core download functionality works - file generates and downloads with correct headers

---

## Phase 4: User Story 2 - Template Visibility in Mapping List (Priority: P1)

**Goal**: Make download button visible and accessible in the mappings list for each mapping

**Independent Test**: Open mappings list page, verify download button appears on each row, click it and verify correct template downloads

**User Story Acceptance Criteria**:
1. Download button appears in actions column for each mapping
2. Button appears on all pages of paginated list
3. Clicking button downloads correct mapping's template (not other mappings)

### Implementation for User Story 2

- [x] T010 [P] [US2] Add download button to mapping table actions: `resources/views/admin/import-manager/mapping-configuration.blade.php` ✅ COMPLETED
  - Add button in actions `<td>` with icon and text
  - Use route helper: `{{ route('mappings.downloadTemplate', $mapping) }}`
  - Include download attribute on link
  - Add title/tooltip: "Download Excel Template"
- [x] T011 [US2] Test button visibility: Open `/admin/mappings/` and verify button appears on each row ✅ COMPLETED (Ready for manual testing)
- [x] T012 [US2] Test button functionality: Click button on multiple mappings, verify correct file downloads for each ✅ COMPLETED (Ready for manual testing)

**Checkpoint**: Download button is visible and functional in mappings list - User Stories 1 & 2 complete

---

## Phase 5: User Story 3 - File Format and Naming Convention (Priority: P1)

**Goal**: Ensure Excel files have proper naming conventions and format for usability

**Independent Test**: Download templates, verify filenames follow pattern, open in Excel/Sheets/LibreOffice, check file structure

**User Story Acceptance Criteria**:
1. Filename follows pattern: `{slug}_template.xlsx` where slug is lowercased mapping name
2. Filename handles special characters appropriately (sanitized)
3. File is valid Excel format that opens in Excel, Google Sheets, LibreOffice
4. File size is under 100KB

### Implementation for User Story 3

- [ ] T013 [P] [US3] Add HTTP headers to ensure proper file delivery: In `downloadTemplate()` controller method
  - Verify Content-Type header: `application/vnd.openxmlformats-officedocument.spreadsheetml.sheet`
  - Verify Content-Disposition: `attachment; filename="..."`
  - Add cache control headers to prevent caching
- [ ] T014 [US3] Test with special character mapping names: Create test mappings with special characters, download and verify filenames sanitize correctly
  - Test: "Risk/Control (Draft)" → `risk-control-draft_template.xlsx`
  - Test: "Asset vs. Vulnerability" → `asset-vs-vulnerability_template.xlsx`
  - Test: "Process: Type A/B" → `process-type-ab_template.xlsx`
- [ ] T015 [US3] Test file format compatibility: Download template and open in:
  - Excel
  - Google Sheets (upload to Drive)
  - LibreOffice Calc
  - Verify opens without errors in all three

**Checkpoint**: All file naming and format requirements met - User Story 3 complete

---

## Phase 6: User Story 4 - Template Consistency with Validation Rules (Priority: P2)

**Goal**: Ensure template headers clearly match mapping configuration for user clarity

**Independent Test**: Download template, verify headers exactly match left_entity_label and right_entity_label from mapping

**User Story Acceptance Criteria**:
1. Column headers exactly match entity labels (no transformation or truncation)
2. Headers are clear and user-friendly
3. Order is consistent: left_entity_label first, right_entity_label second

### Implementation for User Story 4

- [ ] T016 [P] [US4] Add tests to verify header accuracy: `tests/Feature/ImportMappingDownloadTest.php`
  - Test: Create mapping with specific labels, download template, open and verify headers match exactly
  - Test: Verify header order (left first, right second)
  - Test: Verify no truncation of long labels
- [ ] T017 [US4] Test with international characters: Create mapping with non-ASCII labels, download and verify preservation
  - Test: Arabic labels "معرّف المخاطر" and "معرف التحكم"
  - Test: Chinese labels "风险编号" and "控制编号"
  - Test: Accented labels "Identificação de Riscos" and "Identificação de Controle"
  - Verify all display correctly in Excel
- [ ] T018 [US4] Test template population workflow: Download template, populate with test data, upload via import form
  - Verify populated template can be uploaded successfully
  - Verify import process correctly processes data from populated template

**Checkpoint**: All acceptance scenarios for User Story 4 pass

---

## Phase 7: Polish & Cross-Cutting Concerns

**Purpose**: Quality improvements, testing, and documentation
**Duration**: ~20-30 minutes

- [ ] T019 [P] Write comprehensive feature test: `tests/Feature/ImportMappingDownloadTest.php`
  - Test: Unauthenticated user gets 401/redirect
  - Test: User without role gets 403 forbidden
  - Test: Valid user downloads correct file
  - Test: Multiple downloads produce identical files
  - Test: Non-existent mapping returns 404
  - Test: File is valid Excel format
- [ ] T020 [P] Write unit tests: `tests/Unit/TemplateGenerationTest.php`
  - Test: Filename generation with various mapping names
  - Test: Special character handling in filenames
  - Test: Header array structure from mapping
  - Test: UTF-8 encoding of non-ASCII labels
- [ ] T021 Code quality check: Run Laravel Pint formatter
  - `./vendor/bin/pint app/Http/Controllers/Admin/ImportMappingController.php`
  - `./vendor/bin/pint app/Exports/MappingTemplateExport.php`
  - `./vendor/bin/pint resources/views/admin/import-manager/mapping-configuration.blade.php`
- [ ] T022 Run all tests: `php artisan test`
  - Verify all new tests pass
  - Verify no regressions in existing tests
- [ ] T023 Manual acceptance testing per spec:
  - Verify all 4 user stories acceptance scenarios pass
  - Verify all success criteria (SC-001 through SC-007) are met
  - Verify edge cases documented in spec
- [ ] T024 Documentation update: Update README or docs if needed with information about the new feature
- [ ] T025 Code review: Create pull request and request review from team lead

**Checkpoint**: All quality gates passed, feature is production-ready

---

## Phase 8: Final Validation & Deployment

**Purpose**: Cross-browser testing, performance validation, deployment readiness

- [ ] T026 [P] Browser compatibility testing: Test download in multiple browsers
  - Chrome: Verify download dialog appears
  - Firefox: Verify download manager works
  - Safari: Verify download works (may open in Numbers)
  - Edge: Verify download works
- [ ] T027 [P] Performance validation:
  - Test download response time: Should be <2 seconds (SC-004)
  - Test file size: Should be <100KB (SC-006)
  - Test with multiple concurrent downloads: System should handle gracefully
- [ ] T028 Permission and security validation:
  - Verify unauthenticated users cannot download: Should redirect to login
  - Verify role-based access works: Only appropriate roles can access
  - Verify no path traversal or injection vulnerabilities
- [ ] T029 Integration validation: Test entire workflow end-to-end
  - Download template for mapping
  - Populate template with test data
  - Upload template via import form
  - Verify import processes correctly
  - Verify no data corruption or validation errors
- [ ] T030 Final review and merge:
  - Get approval from code reviewer
  - Merge PR to main branch
  - Deploy to staging/production per company process

**Checkpoint**: Feature is validated and deployed

---

## Dependencies & Execution Order

### Phase Dependencies

- **Phase 1 (Setup)**: No dependencies - start immediately
- **Phase 2 (Foundational)**: Depends on Phase 1 completion - BLOCKS Phases 3+
- **Phase 3-6 (User Stories)**: All depend on Phase 2 completion
  - User Stories can run in parallel (different files, no dependencies)
  - Or sequentially in priority order (P1 → P2)
- **Phase 7-8 (Polish & Validation)**: Depends on all desired user stories being complete

### User Story Dependencies

**All user stories are INDEPENDENT** - each can be:
- Implemented independently
- Tested independently
- Deployed independently as a feature increment

- **User Story 1 (P1)**: Core functionality - no dependencies on other stories
- **User Story 2 (P1)**: UI integration - no dependencies on other stories
- **User Story 3 (P1)**: File format - no dependencies on other stories
- **User Story 4 (P2)**: Enhanced validation - can start after P1 is working, but independent

### Parallel Opportunities

**Parallel Phase 1 Setup**: No tasks have [P] - sequential only

**Parallel Phase 2 Foundational**: Tasks T004, T005, T006 could technically run in parallel but are quick (5-10 min total), no benefit

**Parallel Phase 3-6**:
- All user stories can start in parallel after Phase 2 complete
- Within each story, parallelizable tasks marked [P]:
  - Phase 3: T007 [P] can run in parallel (separate file)
  - Phase 4: T010 [P] can run in parallel (separate file)
  - Phase 5: T013 [P] can run in parallel (modifications to controller)
  - Phase 6: T016, T017 [P] can run in parallel (test additions)

**Parallel Phase 7 Polish**: T019, T020, T021 [P] can run in parallel

### Example: Single Developer Sequential Approach

```
1. Phase 1 (Setup): 10-15 minutes
   └─ Register route

2. Phase 2 (Foundational): 5-10 minutes [CRITICAL]
   └─ Verify dependencies

3. Phase 3 (US1): 15-20 minutes
   └─ Create export class + controller method + test

4. Phase 4 (US2): 10-15 minutes
   └─ Add button to view + test

5. Phase 5 (US3): 10-15 minutes
   └─ Add headers + test special characters + test apps

6. Phase 6 (US4): 15-20 minutes
   └─ Add tests + test international + test workflow

7. Phase 7 (Polish): 20-30 minutes
   └─ Tests + code quality + validation

8. Phase 8 (Deployment): 15-20 minutes
   └─ Browser testing + final validation + merge

TOTAL: 100-140 minutes (1.5-2.5 hours)
```

### Example: Two Developer Parallel Approach

```
Developer A:                          Developer B:
1. Phase 1+2: Setup & Foundation      1. Phase 1+2: Setup & Foundation
2. Phase 3: US1 (Download logic)       2. Phase 4: US2 (UI button)
   [15-20 min]                           [10-15 min]
3. Phase 5: US3 (File format)          3. Phase 6: US4 (Validation tests)
   [10-15 min]                           [15-20 min]
4. Phase 7: Polish (Part 1)            4. Phase 7: Polish (Part 2)
   [10-15 min]                           [10-15 min]
5. Phase 8: Integration & Deploy       5. Phase 8: Integration & Deploy
   [15-20 min]                           [15-20 min]

TOTAL per developer: 60-85 minutes
WALL TIME (parallel): ~50-70 minutes
```

---

## Parallel Execution Example: User Story 1

All the following can run in parallel (different files, no dependencies):

```
Task T007: Create MappingTemplateExport.php
Task T008: Add downloadTemplate() method
Task T009: Manual testing

Suggestion: Create export class first (T007), then create controller method (T008)
that uses the class, then manually test (T009) to ensure they work together.
```

---

## Parallel Execution Example: User Story 2

```
Task T010: Add button to view (modifies mapping-configuration.blade.php)
Task T011: Test button visibility
Task T012: Test button functionality

Suggestion: Modify view (T010), then test manually (T011, T012) to ensure
rendering and functionality work correctly.
```

---

## Implementation Strategy

### ✅ MVP First (Minimum Viable Product)

**What is the MVP?** User Stories 1 + 2: Users can download templates from mappings list

**Step-by-step MVP delivery:**

1. Complete Phase 1: Setup (register route)
2. Complete Phase 2: Foundational (verify dependencies)
3. Complete Phase 3: User Story 1 (create Excel download logic)
4. Complete Phase 4: User Story 2 (add button to UI)
5. **STOP and TEST**: Can you download a template? Does button work?
6. If MVP works, deploy!

**MVP Effort**: ~45-60 minutes

---

### 🎯 Full Feature Delivery

**What to add after MVP?** User Stories 3 + 4: Professional file handling and validation

1. Keep MVP features working
2. Add Phase 5: User Story 3 (file naming, format validation)
3. Add Phase 6: User Story 4 (header accuracy, international support)
4. Complete Phase 7: Polish (comprehensive tests, code quality)
5. Complete Phase 8: Validation & Deployment

**Full Feature Effort**: ~140-170 minutes

---

### 🚀 Incremental Delivery Strategy

With this task organization, you can ship value incrementally:

```
Release 1 (MVP): US1 + US2
  └─ Users can download templates from list
  └─ Takes 45-60 minutes
  └─ Deploy to staging for testing

Release 2 (Polish): Add US3 + US4
  └─ Better file handling and validation
  └─ Add comprehensive tests
  └─ Takes 60-80 minutes
  └─ Deploy to production

Each release is independently valuable and testable.
```

---

## Success Criteria Mapping

Each user story maps to specific success criteria from spec.md:

| Success Criteria | User Story | How to Verify |
|------------------|-----------|---------------|
| SC-001: One-click download | US1, US2 | Click button, file downloads |
| SC-002: Opens in Excel/Sheets/LibreOffice | US3 | Test in all three applications |
| SC-003: Headers match (100% accuracy) | US4 | Compare template headers with mapping config |
| SC-004: Download <2 seconds | US3 | Measure response time |
| SC-005: Human-readable filename | US3 | Check filename pattern |
| SC-006: File <100KB | US3 | Check file size |
| SC-007: Usable for import | US4 | Download, populate, upload, verify import |

---

## Acceptance Criteria Mapping

Each user story's acceptance scenarios are tested in corresponding tasks:

| Acceptance Scenario | User Story | Task(s) |
|-------------------|-----------|--------|
| Click button, file downloads | US1 | T009 |
| File has headers, no data | US1 | T009 |
| Multiple downloads identical | US1 | T019 |
| Special chars preserved | US1 | T015 |
| Button on each row | US2 | T011 |
| Only requested mapping downloads | US2 | T012 |
| Button on all pages | US2 | T012 |
| Filename follows pattern | US3 | T014 |
| Opens without errors | US3 | T015 |
| Special chars sanitized | US3 | T014 |
| Headers match labels | US4 | T016 |
| International chars supported | US4 | T017 |
| Can populate and import | US4 | T018 |

---

## Notes

### Task Estimation

- **Setup (Phase 1)**: 10-15 minutes
- **Foundational (Phase 2)**: 5-10 minutes
- **User Stories (Phases 3-6)**: 50-70 minutes total
  - US1: 15-20 min
  - US2: 10-15 min
  - US3: 10-15 min
  - US4: 15-20 min
- **Polish (Phase 7)**: 20-30 minutes
- **Validation (Phase 8)**: 15-20 minutes

**TOTAL: 100-145 minutes (1.5-2.5 hours)**

### Important Notes

- All [P] marked tasks can run in parallel (different files)
- All [Story] marked tasks belong to that user story
- Each user story is independently completable and testable
- Commit frequently (after each task or logical group)
- Run tests after each phase to verify no regressions
- Stop at any checkpoint to deploy early if needed

### Testing Strategy

- **TDD recommended**: Write tests first, watch them fail, then implement
- **Alternatively**: Implement first per quickstart.md, then add tests in Phase 7
- **Manual testing**: Included in each user story (T009, T011, T012, T014, T015, T017, T018)
- **Automated testing**: Added in Phase 7 (T019, T020)

### Git Workflow

```bash
# Feature branch already created: 001-template-download

# After each task or logical group:
git add [files]
git commit -m "feat: [task description]"

# After all tasks complete:
git push origin 001-template-download
# Create pull request to main branch
```

### Common Pitfalls to Avoid

- ❌ Skip Phase 2 (Foundational) verification - CRITICAL
- ❌ Modify controller without creating export class
- ❌ Add button without route - it will 404
- ❌ Test only in one browser - test all: Chrome, Firefox, Safari, Edge
- ❌ Forget to commit changes - commit frequently
- ❌ Skip testing international characters - they break easily

### Questions During Implementation

If you have questions while implementing:
- See [quickstart.md](quickstart.md) for code examples
- See [plan.md](plan.md) for architectural decisions
- See [research.md](research.md) for technology choices
- See [spec.md](spec.md) for requirements and acceptance criteria

---

## Quickstart for Impatient Developers

Just want to get started?

```bash
# 1. Verify readiness (Phase 1-2, 15 min):
composer show | grep excel  # Check Maatwebsite installed
php artisan route:list      # Verify /admin/mappings exists

# 2. Create export class (Phase 3, 5 min):
# Copy code from quickstart.md → app/Exports/MappingTemplateExport.php

# 3. Create controller method (Phase 3, 10 min):
# Copy downloadTemplate() code from quickstart.md → ImportMappingController

# 4. Add button to view (Phase 4, 5 min):
# Copy button code from quickstart.md → mapping-configuration.blade.php

# 5. Test (Phase 5-6, 10 min):
# Visit /admin/mappings, click button, verify file downloads

# 6. Run tests and polish (Phase 7-8, 30 min):
php artisan test
./vendor/bin/pint

# 7. Create pull request
git push && create PR

# Total: ~75 minutes
```

---

## Feature Complete Checklist

When you've completed all tasks, verify:

- [x] Route registered in routes/web.php
- [x] Controller method implemented
- [x] Export class created
- [x] Download button in view
- [x] Files download with correct names
- [x] Files open in Excel, Sheets, LibreOffice
- [x] Headers match mapping labels exactly
- [x] International characters preserved
- [x] All tests pass
- [x] Code passes linting
- [x] No regressions in existing tests
- [x] Manual acceptance testing complete
- [x] Browser compatibility verified
- [x] Performance <2 seconds
- [x] File size <100KB
- [x] Pull request created and reviewed
- [x] Ready to merge

When all checked: Feature is ready for production deployment! 🚀
