# Nationalities CRUD Module - Usage Instructions

## Overview
The Nationalities CRUD module allows super administrators to manage nationality options that can be associated with HR experts in the system.

## Features
- Create, Read, Update, and Delete nationalities
- Integration with HR Expert records
- Soft deletes for data integrity
- Validation for unique nationality names

## Access
- Only Super Admin users can access the nationality management features
- Access the module via the "Manage Nationalities" menu item in the sidebar

## Basic Operations

### 1. Create a New Nationality
1. Navigate to "Manage Nationalities" in the sidebar
2. Click "Add Nationality" button
3. Enter the nationality name in the form
4. Click "Save" to create the nationality

### 2. View All Nationalities
1. Navigate to "Manage Nationalities" in the sidebar
2. All nationalities will be displayed in a paginated table
3. Use pagination controls to navigate through multiple pages

### 3. Edit a Nationality
1. Navigate to "Manage Nationalities" in the sidebar
2. Click the "Edit" icon for the nationality you want to modify
3. Update the nationality name in the form
4. Click "Save" to update the nationality

### 4. Delete a Nationality
1. Navigate to "Manage Nationalities" in the sidebar
2. Click the "Delete" icon for the nationality you want to remove
3. Confirm the deletion when prompted
4. Note: A nationality cannot be deleted if it is associated with any HR expert

## Integration with HR Experts
- Nationalities can be selected when managing HR expert records
- The HR expert filtering page now pulls nationality options from the nationalities table
- Both the old nationality column and new nationality_id foreign key are supported for backward compatibility

## Important Notes
- Nationality names must be unique
- Deleted nationalities are soft deleted (marked as deleted but not permanently removed)
- Only Super Admin users have access to these features