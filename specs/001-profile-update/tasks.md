# Implementation Tasks: Profile Update for Non-Admin Users

**Feature**: Profile Update for Non-Admin Users  
**Branch**: `001-profile-update`  
**Generated**: 2025-12-20

## Overview

This document outlines the implementation steps for allowing non-admin users to update their profile information. The feature will leverage existing components with modifications to restrict access to sensitive fields like email and role.

## Dependencies

The user stories have the following dependencies:
- User Story 1 (P1) must be completed before User Story 2 (P2) and User Story 3 (P3)
- User Story 2 (P2) and User Story 3 (P3) can be implemented in parallel once User Story 1 is complete

## Parallel Execution Examples

- T005-T008 can be done in parallel (different files: controller, routes, view, nav)
- T009 [US2] and T010 [US3] can be tested in parallel once T005-T008 are complete

## Implementation Strategy

Build an MVP that implements the core functionality (User Story 1), then add the navigation and security features. This approach allows for early testing and validation of the core functionality.

---

## Phase 1: Setup

- [x] T001 Create placeholder for profile update tests at tests/Feature/User/ProfileUpdateTest.php

## Phase 2: Foundational

- [x] T002 Define and verify the profile update routes in routes/web.php

## Phase 3: User Story 1 - View and Update Profile Information (Priority: P1)

As a non-admin user who is logged in to the system, I want to be able to update my profile information from a dedicated page so that I can keep my personal details current without needing admin intervention.

**Independent Test**: Non-admin users can access their profile page through the dropdown menu and successfully update their profile details (excluding email) without encountering permission errors.

- [x] T003 [P] [US1] Create profile edit method in app/Http/Controllers/UserController.php that allows users to edit only their own profile
- [x] T004 [P] [US1] Create profile update method in app/Http/Controllers/UserController.php that restricts fields for non-admin users
- [x] T005 [P] [US1] Add profile update route to routes/web.php (GET /profile/edit and PUT /profile)
- [x] T006 [P] [US1] Create profile edit view at resources/views/profile/edit.blade.php that extends the appropriate layout
- [x] T007 [P] [US1] Implement authorization checks to ensure users can only update their own profile
- [x] T008 [P] [US1] Ensure success message appears after profile update ("Profile updated successfully")
- [x] T009 [US1] Test that non-admin users can access their profile page and update allowed fields

## Phase 4: User Story 2 - Access Profile Update from Navigation (Priority: P2)

As a non-admin user, I want to easily access the profile update page from the application's main navigation area (in the dropdown near logout) so that I can quickly find the functionality when needed.

**Independent Test**: The "Update Profile" option is visible and accessible to non-admin users in the dropdown menu near the logout button.

- [x] T010 [P] [US2] Add "Update Profile" link to the user dropdown in resources/views/partials/nav-ciso.blade.php
- [x] T011 [US2] Test that the "Update Profile" link is visible in the user dropdown for all users

## Phase 5: User Story 3 - Restrict Email and Role Changes (Priority: P3)

As a system administrator, I want to ensure that non-admin users cannot change their email address or role through the profile update page to maintain account integrity and security.

**Independent Test**: The email and role fields are either hidden, disabled, or any attempts to modify them are rejected with appropriate validation.

- [x] T012 [P] [US3] Modify profile update form in resources/views/profile/edit.blade.php to conditionally hide email and role fields for non-admin users
- [x] T013 [P] [US3] Update input validation in UserController.php to reject email and role changes from non-admin users
- [x] T014 [P] [US3] Ensure validation errors are displayed properly when non-admin users attempt to submit email/role changes
- [x] T015 [US3] Test that non-admin users cannot update their email or role through the profile update form
- [x] T016 [US3] Test that admin users retain full editing capabilities

## Phase 6: Polish & Cross-Cutting Concerns

- [x] T017 Update profile edit view to maintain consistency with existing UI elements
- [x] T018 Add validation for non-admin users that matches the existing system requirements
- [x] T019 Test that user can only update their own profile (prevent other user profile access via URL manipulation)
- [x] T020 Document any changes to the public API or interfaces