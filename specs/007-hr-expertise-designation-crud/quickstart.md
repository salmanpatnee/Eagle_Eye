# Quickstart Guide: HR Expertise and Designation CRUD Interface

## Overview
This guide provides a quick overview of the HR Expertise and Designation CRUD module implementation, following the same design and components as the existing Industries and Nationalities modules.

## File Structure

### Controllers
- `app/Http/Controllers/ExpertiseController.php`
  - Handles CRUD operations for Expertise entities
  - Follows same patterns as IndustryController and NationalityController
- `app/Http/Controllers/DesignationController.php`
  - Handles CRUD operations for Designation entities
  - Follows same patterns as IndustryController and NationalityController

### Models
- `app/Models/Experties.php` (existing)
  - Existing model for Expertise entity
  - References `hr_expertise_table`
- `app/Models/Designation.php` (new)
  - New model for Designation entity
  - References `hr_designation_table`

### Request Validation
- `app/Http/Requests/ExpertiseRequest.php` (new)
  - Form request for Expertise validation
  - Handles validation for create and update operations
- `app/Http/Requests/DesignationRequest.php` (new)
  - Form request for Designation validation
  - Handles validation for create and update operations

### Database Migrations
- `database/migrations/xxxx_xx_xx_create_hr_designation_table.php`
  - Creates hr_designation_table with id, designation_id, designation_name columns
- `database/migrations/xxxx_xx_xx_add_designation_id_to_hr_expert_master_table.php`
  - Adds designation_id column to hr_expert_master_table
  - Maintains existing designation column for backward compatibility

### Views
- `resources/views/process/hr/experties/index.blade.php`
  - Displays all Expertise records in table format
- `resources/views/process/hr/experties/create.blade.php`
  - Form for creating and editing Expertise records
- `resources/views/process/hr/experties/show.blade.php`
  - Displays details of a single Expertise record
- `resources/views/process/hr/designations/index.blade.php`
  - Displays all Designation records in table format
- `resources/views/process/hr/designations/create.blade.php`
  - Form for creating and editing Designation records
- `resources/views/process/hr/designations/show.blade.php`
  - Displays details of a single Designation record

### Routes
- `routes/web.php`
  - Resource routes for expertises and designations
  - Proper route naming conventions

### Sidebar Navigation
- `resources/views/partials/sidebar-menus/experties.blade.php`
  - Sidebar menu item for Expertise management
- `resources/views/partials/sidebar-menus/designations.blade.php`
  - Sidebar menu item for Designation management

## Implementation Steps

### 1. Create Database Migrations
```bash
php artisan make:migration create_hr_designation_table
php artisan make:migration add_designation_id_to_hr_expert_master_table
```

### 2. Create Models
- Designation model with proper configuration
- Update relationships as needed

### 3. Create Controllers
- ExpertiseController with standard CRUD methods
- DesignationController with standard CRUD methods

### 4. Create Request Validation Classes
- ExpertiseRequest for validation logic
- DesignationRequest for validation logic

### 5. Create Views
- Index, create, and show views for both entities
- Use same x-components as existing modules

### 6. Add Routes
- Resource routes in web.php with appropriate middleware

### 7. Add Sidebar Menu Items
- Create blade files for sidebar navigation

## Key Features

### Expertise Module
- Full CRUD functionality for managing expertise options
- Uses existing hr_expertise_table and Experties model
- Consistent UI with other HR modules
- Proper validation and error handling

### Designation Module
- Full CRUD functionality for managing designation options
- New hr_designation_table with proper relationships
- Maintains backward compatibility with existing designation column
- Consistent UI with other HR modules
- Proper validation and error handling

## Validation Rules

### Expertise
- expertise_title: required, string, max:255, unique

### Designation
- designation_id: required, string, max:255, unique
- designation_name: required, string, max:255

## Security Considerations
- All routes protected with authentication middleware
- Authorization checks for CRUD operations
- Proper validation to prevent mass assignment vulnerabilities
- CSRF protection on all forms