# Quickstart: Profile Update for Non-Admin Users

## Overview
This guide explains how to implement and test the profile update feature for non-admin users.

## Implementation Steps

### 1. Update User Controller
Modify `app/Http/Controllers/UserController.php` to add authorization checks and profile update endpoint:

1. Add a new `editProfile` method that only allows users to edit their own profile
2. Update the `update` method to restrict fields for non-admin users
3. Modify the existing `edit` method to maintain admin functionality

### 2. Add Profile Update Route
In `routes/web.php`, add:
```php
Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
```

### 3. Update Navigation
Modify `resources/views/partials/nav-ciso.blade.php` to add the profile update link:
- Add "Update Profile" link in the user dropdown for all users
- Ensure it points to the new profile update route

### 4. Create Profile Update View
Create a new view `resources/views/profile/edit.blade.php` that:
- Extends the appropriate layout
- Contains the profile update form
- Conditionally hides email and role fields for non-admins
- Uses the same form components as the existing user form

## Testing

### Manual Testing Steps
1. Log in as a non-admin user
2. Click on the user dropdown menu
3. Select "Update Profile"
4. Verify that the email and role fields are disabled/hidden
5. Update other fields (first name, last name, etc.)
6. Verify that changes are saved correctly
7. Verify that email and role fields remain unchanged

### Authorization Tests
1. Ensure non-admin users cannot access other users' profile edit pages
2. Ensure non-admin users cannot update other users' profile information
3. Verify admin users retain full functionality

## Files to Modify
- `app/Http/Controllers/UserController.php` - Add profile update methods
- `resources/views/partials/nav-ciso.blade.php` - Add profile update link
- `resources/views/profile/edit.blade.php` - Create new view (or modify existing view)

## Files to Review
- `app/Models/User.php` - Ensure model methods are appropriate
- `routes/web.php` - Add new routes
- `tests/Feature/User/ProfileUpdateTest.php` - Add new tests