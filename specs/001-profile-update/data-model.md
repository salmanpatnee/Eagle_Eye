# Data Model: Profile Update for Non-Admin Users

## User Entity

The feature uses the existing `User` model with the following attributes:

### Attributes
- `id` (integer, primary key) - Unique identifier for the user
- `first_name` (string) - User's first name (editable by non-admins)
- `last_name` (string) - User's last name (editable by non-admins)  
- `username` (string) - User's username (editable by non-admins)
- `email` (string) - User's email address (read-only for non-admins)
- `password` (string) - Hashed password (editable by non-admins when provided)
- `role_id` (integer, foreign key) - Reference to UserRole (read-only for non-admins)
- `created_at` (timestamp) - Record creation timestamp
- `updated_at` (timestamp) - Record last update timestamp

### Relationships
- `User` belongs to `UserRole` (via role_id)

### Validation Rules

#### For Admin Users
- `first_name`: required, string, max:255
- `last_name`: required, string, max:255
- `username`: required, min:3, max:255, unique:users,username
- `email`: required, email, max:255, unique:users,email
- `password`: required when creating, optional when updating
- `role_id`: required

#### For Non-Admin Users
- `first_name`: required, string, max:255
- `last_name`: required, string, max:255
- `username`: required, min:3, max:255, unique:users,username (excluding current user's record)
- `email`: Not accepted in input (field will be restricted in UI)
- `password`: optional, when provided must be min:7, max:255
- `role_id`: Not accepted in input (field will be restricted in UI)

### Business Rules
1. A user can only update their own profile information
2. Non-admin users cannot change their email address
3. Non-admin users cannot change their role
4. Email uniqueness validation must ignore the current user's own email during update
5. Username uniqueness validation must ignore the current user's own username during update