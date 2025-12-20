# Research: Profile Update for Non-Admin Users

## Overview
This research document outlines the implementation approach for allowing non-admin users to update their profile information, based on the feature specification.

## Key Areas of Research

### 1. Current Implementation Analysis

**Existing Files:**
- `app/Http/Controllers/UserController.php` - Handles all user CRUD operations
- `resources/views/process/initial-setup/users/create.blade.php` - User creation/edit form
- `resources/views/partials/nav-ciso.blade.php` - Navigation bar with user dropdown

**Current Functionality:**
- The UserController's `edit()` and `update()` methods currently allow editing of all user fields
- The create.blade.php template is used for both creating and editing users
- The navigation includes a user dropdown with logout functionality

### 2. Authorization Strategy

**Requirements:**
- Non-admin users can only edit their own profile
- Non-admin users cannot edit email or role fields
- Admin users retain full editing capabilities

**Implementation Approach:**
- Modify the `edit()` and `update()` methods in UserController to check if current user can edit the target user
- Add conditional logic in the view to show/hide restricted fields based on user role
- Use Laravel's authorization features to ensure users can only update their own profile

### 3. Navigation Integration

**Current State:**
- Navigation dropdown is in `resources/views/partials/nav-ciso.blade.php`
- Contains user's name, role, email, and logout button
- Admin users also have access to "Admin Portal"

**Required Changes:**
- Add "Update Profile" option to dropdown for all users (not just admins)
- Link to profile update page (likely user/{id}/edit but restricted to current user)

### 4. Field Restrictions

**Fields Non-Admin Users Cannot Edit:**
- Email
- Role
- Potentially User ID or other admin-only fields

**Fields Non-Admin Users Can Edit:**
- First Name
- Last Name
- Username
- Password

### 5. Route Considerations

**Possibilities:**
1. Use existing `users/{id}/edit` route with authorization checks
2. Create dedicated `profile/edit` route that always refers to current user
3. Use both depending on user role

**Recommended Approach:** 
Use option 2 for non-admin users (dedicated profile route) and keep existing functionality for admin users to maintain separation of concerns.

## Implementation Strategy

### Phase 1: Backend Changes
1. Add authorization checks to `edit()` and `update()` methods
2. Create new route for user profile update
3. Modify validation rules for non-admin users

### Phase 2: Frontend Changes
1. Update the view to conditionally display restricted fields
2. Add profile update link to navigation

### Phase 3: Testing
1. Create tests for non-admin profile updates
2. Verify that admin functionality remains unchanged
3. Verify that field restrictions are enforced

## Potential Challenges

1. The existing `create.blade.php` template serves both create and edit functions, making conditional field display complex
2. Need to ensure that the current implementation doesn't allow direct URL access to edit other users' profiles
3. Password field has special handling that may need to be preserved for non-admin users