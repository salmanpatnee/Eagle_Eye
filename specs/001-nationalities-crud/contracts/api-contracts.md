# API Contracts: Nationalities CRUD

## Overview
This document defines the API contracts for the Nationalities CRUD module, following RESTful patterns consistent with other resource controllers in the application.

Note: Implementation will follow the same design and components as the existing Users module, with views located in resources/views/process/hr/nationalities. Tests will be skipped as per requirements, and the existing nationality column in HR Expert table will be maintained for backward compatibility.

## Endpoints

### GET /nationalities
**Description**: Retrieve a paginated list of all nationalities
**Authentication**: Super Admin required
**Response**:
- 200 OK: Returns paginated list of nationalities
- 401 Unauthorized: If not authenticated
- 403 Forbidden: If not Super Admin

### GET /nationalities/create
**Description**: Show the form for creating a new nationality
**Authentication**: Super Admin required
**Response**:
- 200 OK: Returns the create nationality form
- 401 Unauthorized: If not authenticated
- 403 Forbidden: If not Super Admin

### POST /nationalities
**Description**: Store a newly created nationality in the database
**Authentication**: Super Admin required
**Request Body**:
- name (string, required): The name of the nationality
**Response**:
- 201 Created: Nationality created successfully, redirects to index
- 400 Bad Request: Validation errors
- 401 Unauthorized: If not authenticated
- 403 Forbidden: If not Super Admin

### GET /nationalities/{nationality}
**Description**: Display the specified nationality
**Authentication**: Super Admin required
**Response**:
- 200 OK: Returns the nationality details
- 401 Unauthorized: If not authenticated
- 403 Forbidden: If not Super Admin
- 404 Not Found: If nationality doesn't exist

### GET /nationalities/{nationality}/edit
**Description**: Show the form for editing the specified nationality
**Authentication**: Super Admin required
**Response**:
- 200 OK: Returns the edit nationality form
- 401 Unauthorized: If not authenticated
- 403 Forbidden: If not Super Admin
- 404 Not Found: If nationality doesn't exist

### PUT /nationalities/{nationality}
**Description**: Update the specified nationality in the database
**Authentication**: Super Admin required
**Request Body**:
- name (string, required): The updated name of the nationality
**Response**:
- 200 OK: Nationality updated successfully, redirects to index
- 400 Bad Request: Validation errors
- 401 Unauthorized: If not authenticated
- 403 Forbidden: If not Super Admin
- 404 Not Found: If nationality doesn't exist

### DELETE /nationalities/{nationality}
**Description**: Remove the specified nationality from the database
**Authentication**: Super Admin required
**Response**:
- 200 OK: Nationality deleted successfully, redirects to index
- 401 Unauthorized: If not authenticated
- 403 Forbidden: If not Super Admin
- 404 Not Found: If nationality doesn't exist
- 422 Unprocessable Entity: If nationality is referenced by HR experts

## Request/Response Examples

### Create Nationality Request
```
POST /nationalities
Content-Type: application/x-www-form-urlencoded

name=American
```

### Create Nationality Response (Success)
```
HTTP/1.1 302 Found
Location: /nationalities
```

### Get Nationalities Response
```
HTTP/1.1 200 OK
Content-Type: text/html

{
  "data": [
    {
      "id": 1,
      "name": "American",
      "created_at": "2023-01-01T00:00:00.000000Z",
      "updated_at": "2023-01-01T00:00:00.000000Z"
    }
  ],
  "links": {
    "first": "/nationalities?page=1",
    "last": "/nationalities?page=1",
    "prev": null,
    "next": null
  },
  "meta": {
    "current_page": 1,
    "from": 1,
    "last_page": 1,
    "links": [...],
    "path": "/nationalities",
    "per_page": 20,
    "to": 1,
    "total": 1
  }
}
```