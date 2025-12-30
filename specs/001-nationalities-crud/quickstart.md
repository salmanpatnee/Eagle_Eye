# Quickstart Guide: Nationalities CRUD

## Overview
This guide provides a quick overview of the Nationalities CRUD module implementation, following the same design and components as the existing Users module.

## Files Created/Modified

### 1. Database Migration
- `database/migrations/xxxx_xx_xx_create_nationalities_table.php`
  - Creates nationalities table with id, name, timestamps, and soft deletes

### 2. Model
- `app/Models/Nationality.php`
  - Defines the Nationality model with fillable fields and relationships

### 3. Controller
- `app/Http/Controllers/NationalityController.php`
  - Implements full CRUD operations following the same pattern as UserController

### 4. Views
- `resources/views/process/hr/nationalities/index.blade.php`
- `resources/views/process/hr/nationalities/create.blade.php`
- `resources/views/process/hr/nationalities/show.blade.php`

### 5. Routes
- Added to `routes/web.php`
  - Resource routes for nationalities with appropriate middleware

### 6. Sidebar Menu
- `resources/views/partials/sidebar-menus/nationalities.blade.php`
  - Menu item for "Manage Nationalities"

## Key Features
- Full CRUD operations (Create, Read, Update, Delete)
- Soft deletes for data integrity
- Validation for unique nationality names
- Integration with existing layout and components
- Consistent styling with the Users module
- Foreign key relationship with HR Expert table

## Access
- Available to Super Admin users only
- Accessible via "Manage Nationalities" in the sidebar
- URL: `/nationalities` (index), `/nationalities/create`, etc.