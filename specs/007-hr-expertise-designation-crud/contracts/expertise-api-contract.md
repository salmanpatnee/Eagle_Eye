# API Contract: Expertise Management

## Overview
This document defines the API contracts for the Expertise management module, following RESTful patterns consistent with other HR modules in the CISO 360 GRC System.

## Base Path
`/expertises` (or as defined in routes)

## Endpoints

### 1. List Expertises
- **Path**: `/expertises`
- **Method**: `GET`
- **Description**: Retrieve a paginated list of expertises
- **Authentication**: Required (authenticated user)
- **Authorization**: Super Admin or Admin role

#### Request
- **Query Parameters**:
  - `page` (optional, integer): Page number for pagination (default: 1)
  - `search` (optional, string): Search term to filter expertises by title

#### Response
- **Success Response**:
  - **Code**: 200 OK
  - **Content**:
    ```json
    {
      "data": [
        {
          "id": 1,
          "expertise_title": "Cybersecurity"
        },
        {
          "id": 2,
          "expertise_title": "Risk Management"
        }
      ],
      "links": {
        "first": "/expertises?page=1",
        "last": "/expertises?page=3",
        "prev": null,
        "next": "/expertises?page=2"
      },
      "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 3,
        "path": "/expertises",
        "per_page": 20,
        "to": 20,
        "total": 45
      }
    }
    ```

### 2. Get Single Expertise
- **Path**: `/expertises/{id}`
- **Method**: `GET`
- **Description**: Retrieve a single expertise by ID
- **Authentication**: Required (authenticated user)
- **Authorization**: Super Admin or Admin role

#### Request
- **Path Parameters**:
  - `id` (integer): Expertise ID

#### Response
- **Success Response**:
  - **Code**: 200 OK
  - **Content**:
    ```json
    {
      "id": 1,
      "expertise_title": "Cybersecurity"
    }
    ```

- **Error Response**:
  - **Code**: 404 Not Found
  - **Content**: When expertise doesn't exist

### 3. Create Expertise
- **Path**: `/expertises`
- **Method**: `POST`
- **Description**: Create a new expertise
- **Authentication**: Required (authenticated user)
- **Authorization**: Super Admin or Admin role

#### Request
- **Headers**:
  - `Content-Type`: `application/json`
  - `X-CSRF-TOKEN`: [CSRF token]
  
- **Body**:
  ```json
  {
    "expertise_title": "Cloud Security"
  }
  ```

#### Response
- **Success Response**:
  - **Code**: 201 Created
  - **Content**:
    ```json
    {
      "message": "Expertise created successfully",
      "data": {
        "id": 3,
        "expertise_title": "Cloud Security"
      }
    }
    ```

- **Error Response**:
  - **Code**: 422 Validation Error
  - **Content**: When validation fails

### 4. Update Expertise
- **Path**: `/expertises/{id}`
- **Method**: `PUT` or `PATCH`
- **Description**: Update an existing expertise
- **Authentication**: Required (authenticated user)
- **Authorization**: Super Admin or Admin role

#### Request
- **Path Parameters**:
  - `id` (integer): Expertise ID
  
- **Headers**:
  - `Content-Type`: `application/json`
  - `X-CSRF-TOKEN`: [CSRF token]
  
- **Body**:
  ```json
  {
    "expertise_title": "Updated Cybersecurity"
  }
  ```

#### Response
- **Success Response**:
  - **Code**: 200 OK
  - **Content**:
    ```json
    {
      "message": "Expertise updated successfully",
      "data": {
        "id": 1,
        "expertise_title": "Updated Cybersecurity"
      }
    }
    ```

- **Error Response**:
  - **Code**: 404 Not Found
  - **Content**: When expertise doesn't exist
  - **Code**: 422 Validation Error
  - **Content**: When validation fails

### 5. Delete Expertise
- **Path**: `/expertises/{id}`
- **Method**: `DELETE`
- **Description**: Delete an existing expertise
- **Authentication**: Required (authenticated user)
- **Authorization**: Super Admin or Admin role

#### Request
- **Path Parameters**:
  - `id` (integer): Expertise ID
  
- **Headers**:
  - `X-CSRF-TOKEN`: [CSRF token]

#### Response
- **Success Response**:
  - **Code**: 200 OK
  - **Content**:
    ```json
    {
      "message": "Expertise deleted successfully"
    }
    ```

- **Error Response**:
  - **Code**: 404 Not Found
  - **Content**: When expertise doesn't exist
  - **Code**: 400 Bad Request
  - **Content**: When expertise is referenced by other records and cannot be deleted