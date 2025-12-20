# API Contract: Profile Update for Non-Admin Users

## Overview
This contract defines the API endpoints for the profile update feature, specifically for non-admin users who need to update their own profile information.

## Endpoints

### GET /profile/edit
**Purpose**: Load the profile update form for the currently authenticated user
**Authorization**: User must be authenticated
**Access**: Only accessible by the authenticated user for their own profile

#### Request
```
GET /profile/edit
Headers:
  Authorization: Bearer {token} (if using API auth)
  X-CSRF-TOKEN: {token} (if using session auth)
```

#### Response
- `200 OK`: Successfully loaded the profile edit form
- `401 Unauthorized`: User not authenticated
- `403 Forbidden`: User attempting to access another user's profile

### PUT /profile
**Purpose**: Update the currently authenticated user's profile information
**Authorization**: User must be authenticated
**Access**: Only accessible by the authenticated user for their own profile

#### Request
```
PUT /profile
Content-Type: application/x-www-form-urlencoded or multipart/form-data
Headers:
  Authorization: Bearer {token} (if using API auth)
  X-CSRF-TOKEN: {token} (if using session auth)

Body:
  first_name: string (required)
  last_name: string (required)
  username: string (required)
  password: string (optional)
```

#### Response
- `302 Found` or `303 See Other`: Successfully updated profile, redirect to profile page or dashboard
- `401 Unauthorized`: User not authenticated
- `403 Forbidden`: User attempting to update another user's profile
- `422 Unprocessable Entity`: Validation errors occurred

#### Validation Rules
- `first_name`: required, string, max:255
- `last_name`: required, string, max:255
- `username`: required, min:3, max:255, unique:users,username (excluding current user)
- `password`: optional, min:7, max:255 when provided

## Authorization Rules

### User Access
- A user can only update their own profile
- Non-admin users cannot update their email or role
- Admin users retain full profile update capabilities

### Field Restrictions
For non-admin users:
- Email field is read-only (not accepted in update request)
- Role field is read-only (not accepted in update request)
- Other fields follow standard validation rules

## Error Responses

### 403 Forbidden
```json
{
  "message": "You are not authorized to perform this action"
}
```

### 422 Validation Errors
```json
{
  "message": "The given data was invalid.",
  "errors": {
    "first_name": [
      "The first name field is required."
    ],
    "username": [
      "The username has already been taken."
    ]
  }
}
```

## Session Behavior
When using Laravel sessions:
- On successful update, redirect with success message: "Profile updated successfully"
- On validation failure, redirect back to form with error messages
- On authorization failure, redirect to dashboard with error message