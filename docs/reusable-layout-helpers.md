# Reusable Role-Based Helper Functions

## Overview
This document explains how to use the reusable role-based helper functions in the CISO 360 GRC System.

## Available Helper Functions

### `getLayoutByRole(int|null $roleId = null, string $superAdminLayout = 'layouts.control', string $defaultLayout = 'layouts.app-full')`
Returns the appropriate layout based on the user's role ID.

#### Parameters
- `$roleId` (optional): The role ID to check. If not provided, defaults to the authenticated user's role ID.
- `$superAdminLayout` (optional): The layout to return for role ID 1 (SuperAdmin). Default is `'layouts.control'`.
- `$defaultLayout` (optional): The layout to return for other roles. Default is `'layouts.app-full'`.

#### Return Value
- Returns the specified `$superAdminLayout` if the role ID is 1 (SuperAdmin)
- Returns the specified `$defaultLayout` for all other roles

#### Usage Examples

##### In Blade Templates - Basic Usage
```blade
@extends(getLayoutByRole())
```

This will automatically select the appropriate layout based on the currently authenticated user's role.

##### With Specific Role ID
```blade
@extends(getLayoutByRole(1))
```

This will use the layout appropriate for role ID 1, regardless of the current user.

##### With Custom Layouts
```blade
@extends(getLayoutByRole(null, 'layouts.admin', 'layouts.user'))
```

This will return 'layouts.admin' for role ID 1 and 'layouts.user' for other roles.

### `hasRole(int $roleId)`
Check if the authenticated user has a specific role.

#### Parameters
- `$roleId`: The role ID to check.

#### Return Value
- Returns `true` if the authenticated user has the specified role ID, `false` otherwise.

#### Usage Examples

##### In Blade Templates
```blade
@if(hasRole(1))
    <!-- Content only visible to users with role ID 1 -->
@endif
```

### `getUserRoleId()`
Get the role ID of the authenticated user.

#### Return Value
- Returns the role ID of the authenticated user, or `null` if not authenticated.

#### Usage Examples

##### In Blade Templates
```blade
@if(getUserRoleId() === 1)
    <!-- Content only visible to users with role ID 1 -->
@endif
```

## Current Implementation

The helper functions are located in `app/helpers.php` and are automatically loaded by the Laravel autoloader.

## Files Using This Helper

- `resources/views/process/control-identification/controls/show.blade.php`

## Adding to New Files

To use these helpers in other blade files:

### For Layout Selection
Replace your existing `@extends` directive with:
```blade
@extends(getLayoutByRole())
```

### For Conditional Content
Use the helper functions in conditional statements:
```blade
@if(hasRole(1))
    <!-- Super admin content -->
@else
    <!-- Regular user content -->
@endif
```

This will ensure consistent role-based behavior across the application.