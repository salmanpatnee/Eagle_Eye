# Feature Specification: Profile Update for Non-Admin Users

**Feature Branch**: `001-profile-update`
**Created**: 2025-12-20
**Status**: Draft
**Input**: User description: "Non admin users can update their profile, when they logged in they can see an option of update profile in the dropdown where logged out button is placed, when they click on it they will be redirect to a page where their info is visible from their they can update profile details but they cant change their email. they update profile page would be the user edit form which is already implemented here resources\\views\\process\\initial-setup\\users\\create.blade.php and using app\\Http\\Controllers\\UserController.php"

## Clarifications

### Session 2025-12-20

- Q: What authentication system should be used for profile updates? → A: Use existing Laravel Sanctum authentication system (tokens/sessions) for profile updates
- Q: Who can view and edit profile information? → A: Users can only view/edit their own profile information
- Q: How should validation errors be displayed to users? → A: Redirect back to form with specific field error messages
- Q: Which profile fields can non-admin users edit? → A: Non-admin users can only edit a limited set of profile fields (excluding email, role, and other admin-only fields)
- Q: What authorization approach should be used for profile updates? → A: Maintain existing role-based access control with defined permissions for each role

## User Scenarios & Testing *(mandatory)*

### User Story 1 - View and Update Profile Information (Priority: P1)

As a non-admin user who is logged in to the system, I want to be able to update my profile information from a dedicated page so that I can keep my personal details current without needing admin intervention.

**Why this priority**: This is the core functionality requested by the feature - allowing non-admin users to update their own profile information.

**Independent Test**: Non-admin users can access their profile page through the dropdown menu and successfully update their profile details (excluding email) without encountering permission errors.

**Acceptance Scenarios**:

1. **Given** a logged-in non-admin user, **When** they click on "Update Profile" in the dropdown menu, **Then** they are redirected to the profile update page showing their current information.
2. **Given** a non-admin user is on the profile update page, **When** they modify their profile details (name, phone, etc.) and save, **Then** the changes are saved and reflected in their profile.
3. **Given** a non-admin user is on the profile update page, **When** they attempt to change their email address, **Then** the email field is disabled or changes are rejected with an appropriate error message.

---

### User Story 2 - Access Profile Update from Navigation (Priority: P2)

As a non-admin user, I want to easily access the profile update page from the application's main navigation area (in the dropdown near logout) so that I can quickly find the functionality when needed.

**Why this priority**: This addresses the specific UI placement mentioned in the requirements, ensuring users can easily find the feature.

**Independent Test**: The "Update Profile" option is visible and accessible to non-admin users in the dropdown menu near the logout button.

**Acceptance Scenarios**:

1. **Given** a logged-in non-admin user, **When** they open the user dropdown menu, **Then** they see an "Update Profile" option.
2. **Given** a logged-in non-admin user, **When** they click the "Update Profile" option, **Then** they are navigated to the correct profile update page.

---

### User Story 3 - Restrict Email and Role Changes (Priority: P3)

As a system administrator, I want to ensure that non-admin users cannot change their email address or role through the profile update page to maintain account integrity and security.

**Why this priority**: This addresses important security constraints mentioned in the requirements.

**Independent Test**: The email and role fields are either hidden, disabled, or any attempts to modify them are rejected with appropriate validation.

**Acceptance Scenarios**:

1. **Given** a non-admin user on the profile update page, **When** they view the form, **Then** the email and role fields are not modifiable or are not displayed.
2. **Given** a non-admin user attempting to update their email or role via direct API request, **When** they submit the request, **Then** the system rejects these changes.

---

### Edge Cases

- What happens when a non-admin user tries to access another user's profile update endpoint via direct URL manipulation?
- How does the system handle validation and saving when non-admin users update their profile with invalid data?
- What happens if a user's role is changed from non-admin to admin while they are on the profile update page?

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: System MUST allow non-admin users to access a profile update page via a dropdown menu option near the logout button.
- **FR-002**: System MUST display current user profile information on the update page for non-admin users.
- **FR-003**: System MUST allow non-admin users to modify their profile details (name, phone, department, etc.) except for their email address.
- **FR-004**: System MUST prevent non-admin users from changing their email address on the profile update page.
- **FR-005**: System MUST prevent non-admin users from changing their role on the profile update page.
- **FR-006**: System MUST save profile updates made by non-admin users and reflect them in the system.
- **FR-007**: System MUST restrict access to profile update functionality based on user roles (non-admin users only see their own update form).
- **FR-008**: System MUST validate profile update inputs according to existing validation rules when non-admin users submit changes.
- **FR-009**: System MUST preserve the existing user edit form functionality for admin users.
- **FR-010**: System MUST authenticate users via Laravel Sanctum before allowing access to profile update functionality.
- **FR-011**: System MUST ensure users can only view and edit their own profile information, with appropriate authorization checks.
- **FR-012**: System MUST redirect users back to the profile update form with specific field error messages when validation fails.
- **FR-013**: System MUST restrict non-admin users to editing only a limited set of profile fields (excluding email, role, and other admin-only fields).
- **FR-014**: System MUST maintain existing role-based access control with defined permissions for each role during profile updates.

### Key Entities *(include if feature involves data)*

- **User**: Represents a system user with personal details like name, email, phone, department, role, etc. Non-admin users can update certain fields, but email and role remain restricted.
- **UserProfileUpdatePage**: The web page/form where non-admin users can modify their personal information, with specific controls to restrict email and role modifications.

## Success Criteria *(mandatory)*

### Measurable Outcomes

- **SC-001**: 100% of non-admin users can access their profile update page through the designated dropdown menu.
- **SC-002**: Non-admin users can successfully update their profile information (excluding email) with a success rate of 95% or higher.
- **SC-003**: Zero unauthorized email changes occur through the profile update page by non-admin users.
- **SC-004**: Non-admin users can update their profile information within 2 minutes or less on average.