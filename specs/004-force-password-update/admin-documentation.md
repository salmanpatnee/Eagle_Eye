# Administrator Guide: Force Password Update Feature

## Overview
This guide explains how to configure the forced password update functionality for users in the CISO 360 GRC System.

## Setting the must_change_password Flag

### Method 1: Direct Database Update
You can set the `must_change_password` flag directly in the database:

```sql
-- For a specific user
UPDATE users SET must_change_password = 1 WHERE id = [USER_ID];

-- For multiple users (e.g., all non-admin users)
UPDATE users SET must_change_password = 1 WHERE role_id != 1;
```

### Method 2: Using Laravel Tinker
From the application root directory, run:

```bash
php artisan tinker
```

Then execute:

```php
// For a single user
$user = App\Models\User::find([USER_ID]);
$user->must_change_password = true;
$user->save();

// For multiple users
App\Models\User::where('role_id', '!=', 1)->update(['must_change_password' => true]);
```

### Method 3: Through Application Code
You can also set this flag programmatically in a custom script or through an admin interface:

```php
// Example: Set flag for a specific user
$user = \App\Models\User::find($userId);
$user->must_change_password = true;
$user->save();
```

## User Experience
- When a user with `must_change_password = true` logs in, they will be redirected to the profile update page
- They will see a mandatory password update form that they must complete before accessing other parts of the application
- Once they update their password, the `must_change_password` flag is automatically set to false
- Admin users (role_id = 1) are exempt from this requirement

## Password Requirements
When users update their password, it must meet the following requirements:
- At least 8 characters in length
- Contain at least one special character (!@#$%^&*()_+-=[]{}|;:,.<>?)
- Contain at least one number
- Match the confirmation field

## Security Logging
All password update attempts (successful and failed) are logged for security auditing purposes.