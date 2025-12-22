# Data Model: Force Password Update on First Login

## User Model Changes
The existing User model will be enhanced with a new field to support the password update functionality.

**Fields:**
- id: int (primary key)
- name: string (user's name)
- email: string (user's email, unique)
- password: string (hashed password)
- role_id: int (role identifier, 1 = admin)
- must_change_password: boolean (flag to indicate if user must update password on next login)
- created_at: timestamp
- updated_at: timestamp

**Validation Rules:**
- must_change_password: boolean, default false
- When updated to false, it means the user has completed the required password change

## Password Update Form Fields
These fields will be part of the form submission but not stored directly in the database:

- current_password: string (required for verification, but only for password update flow)
- new_password: string (required, validated per spec requirements)
- new_password_confirmation: string (required, must match new_password)

## Relationships
- The User model maintains existing relationships with other entities in the system
- No new relationships are created for this feature