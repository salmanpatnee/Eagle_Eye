# API Contract: Industry Management

## Overview
This document defines the API contracts for the industry management functionality. These endpoints will be used by the frontend to interact with the backend for CRUD operations on industry data.

## Base URL
`/api/industries` (or as defined in routes)

## Endpoints

### 1. List Industries
- **Method**: `GET`
- **Path**: `/industries`
- **Description**: Retrieve a paginated list of industries
- **Authentication**: Required
- **Authorization**: User must have industry management permissions

**Request Parameters**:
- `page` (optional, integer): Page number for pagination (default: 1)
- `per_page` (optional, integer): Number of items per page (default: 20)
- `search` (optional, string): Search term to filter industries by name or sector

**Response**:
```
{
  "data": [
    {
      "industry_id": 1,
      "industry_name": "Technology",
      "sector": "Information Technology"
    },
    {
      "industry_id": 2,
      "industry_name": "Healthcare",
      "sector": "Medical Services"
    }
  ],
  "links": {
    "first": "...",
    "last": "...",
    "prev": null,
    "next": "..."
  },
  "meta": {
    "current_page": 1,
    "from": 1,
    "last_page": 3,
    "path": "...",
    "per_page": 20,
    "to": 20,
    "total": 50
  }
}
```

### 2. Get Single Industry
- **Method**: `GET`
- **Path**: `/industries/{id}`
- **Description**: Retrieve a specific industry by ID
- **Authentication**: Required
- **Authorization**: User must have industry management permissions

**Path Parameters**:
- `id` (integer): The ID of the industry to retrieve

**Response**:
```
{
  "industry_id": 1,
  "industry_name": "Technology",
  "sector": "Information Technology"
}
```

### 3. Create Industry
- **Method**: `POST`
- **Path**: `/industries`
- **Description**: Create a new industry
- **Authentication**: Required
- **Authorization**: User must have industry management permissions

**Request Body**:
```
{
  "industry_name": "Manufacturing",
  "sector": "Industrial"
}
```

**Validation**:
- `industry_name` is required and must be unique
- `sector` is optional

**Response** (201 Created):
```
{
  "industry_id": 3,
  "industry_name": "Manufacturing",
  "sector": "Industrial"
}
```

**Error Response** (422 Unprocessable Entity):
```
{
  "message": "The given data was invalid.",
  "errors": {
    "industry_name": [
      "The industry name has already been taken."
    ]
  }
}
```

### 4. Update Industry
- **Method**: `PUT` or `PATCH`
- **Path**: `/industries/{id}`
- **Description**: Update an existing industry
- **Authentication**: Required
- **Authorization**: User must have industry management permissions

**Path Parameters**:
- `id` (integer): The ID of the industry to update

**Request Body**:
```
{
  "industry_name": "Updated Manufacturing",
  "sector": "Industrial"
}
```

**Response** (200 OK):
```
{
  "industry_id": 3,
  "industry_name": "Updated Manufacturing",
  "sector": "Industrial"
}
```

### 5. Delete Industry
- **Method**: `DELETE`
- **Path**: `/industries/{id}`
- **Description**: Delete an industry
- **Authentication**: Required
- **Authorization**: User must have industry management permissions

**Path Parameters**:
- `id` (integer): The ID of the industry to delete

**Response** (200 OK):
```
{
  "message": "Industry deleted successfully"
}
```

**Error Response** (409 Conflict) - if industry is referenced by other entities:
```
{
  "message": "Cannot delete industry as it is referenced by other records"
}
```

## Error Format
All error responses follow this format:
```
{
  "message": "Error message",
  "errors": {
    "field_name": [
      "Error details"
    ]
  }
}
```

## Authentication
All endpoints require a valid authentication token passed in the Authorization header:
`Authorization: Bearer {token}`

## Validation Rules
- Industry names must be unique
- Industry names are required and cannot be empty
- Sector field is optional
- All string fields are limited to 255 characters