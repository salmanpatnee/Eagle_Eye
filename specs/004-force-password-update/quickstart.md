# Quickstart Guide: Force Password Update on First Login

## Overview
This guide will help you implement the functionality to force non-admin users to update their password on first login. The implementation uses an existing flag in the user table and modifies the existing profile routes and controller.

## Prerequisites
- Laravel 9.x application
- Existing authentication system with users table
- Existing UserController and profile routes
- Existing profile/edit.blade.php template

## Steps to Implement

### 1. Create Database Migration
Generate a migration to add the `must_change_password` column to the users table:
```bash
php artisan make:migration add_must_change_password_to_users_table
```

In the migration file:
```php
public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->boolean('must_change_password')->default(true);
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('must_change_password');
    });
}
```

### 2. Update User Model
Add the new field to the User model's fillable array:
```php
// In app/Models/User.php
protected $fillable = [
    'name',
    'email',
    'password',
    'role_id',
    'must_change_password'
];
```

### 3. Create Middleware (Optional but Recommended)
Generate middleware to check for password update requirement:
```bash
php artisan make:middleware MustChangePassword
```

### 4. Update UserController
Modify the existing profile update method to handle password validation and update when `must_change_password` is true.

### 5. Update Profile View
Modify the existing profile/edit.blade.php template to conditionally show the password update form based on the `must_change_password` flag.

### 6. Run Migration
Execute the migration to update the database:
```bash
php artisan migrate
```

## Testing
1. Create a new user with `must_change_password` set to true
2. Log in as the user
3. Verify that you're redirected to update the password
4. Try to access other parts of the application before updating - should redirect to profile
5. Update the password following the requirements
6. Verify that you can now access other parts of the application