# Quickstart: HR Experts CRUD

## Prerequisites
*   Database migrated and seeded (Tables exist).
*   Models exist (`HumanResource`, `Industry`, `Nationality`, etc.).

## Setup
1.  **Checkout Branch**: `git checkout 008-hr-experts-crud`
2.  **Dependencies**: `composer install`, `npm install && npm run build` (if assets changed).

## Testing
1.  **Navigate**: Login as Admin -> Dashboard -> Sidebar -> "HR Experts".
2.  **Create**: Click "New HR Expert". Fill form. Submit. Verify redirect to list.
3.  **View**: Click "View" icon on a record. Verify details.
4.  **Edit**: Click "Edit" icon. Change details (e.g. add certification). Submit. Verify update.
5.  **Delete**: Click "Delete". Confirm. Verify removal.
6.  **Filter**: Use the top filters in Index view. Verify list updates.

## Key Files
*   `app/Http/Controllers/HumanResourceController.php` (Refactored)
*   `resources/views/process/hr/experts/index.blade.php`
*   `resources/views/process/hr/experts/create.blade.php`
*   `resources/views/partials/sidebar-menus/hr-experts.blade.php`
