# API Contract: Designation Management

## Overview
This document defines the API contracts for the Designation management module, following RESTful patterns consistent with other HR modules in the CISO 360 GRC System.

## Base Path
`/designations` (or as defined in routes)

## Endpoints

### 1. List Designations
- **Path**: `/designations`
- **Method**: `GET`
- **Description**: Retrieve a paginated list of designations
- **Authentication**: Required (authenticated user)
- **Authorization**: Super Admin or Admin role

#### Request
- **Query Parameters**:
  - `page` (optional, integer): Page number for pagination (default: 1)
  - `search` (optional, string): Search term to filter designations by name

#### Response
- **Success Response**:
  - **Code**: 200 OK
  - **Content**:
    ```json
    {
      "data": [
        {
          "id": 1,
          "designation_id": "MGR",
          "designation_name": "Manager"
        },
        {
          "id": 2,
          "designation_id": "DEV",
          "designation_name": "Developer"
        }
      ],
      "links": {
        "first": "/designations?page=1",
        "last": "/designations?page=3",
        "prev": null,
        "next": "/designations?page=2"
      },
      "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 3,
        "path": "/designations",
        "per_page": 20,
        "to": 20,
        "total": 45
      }
    }
    ```

### 2. Get Single Designation
- **Path**: `/designations/{id}`
- **Method**: `GET`
- **Description**: Retrieve a single designation by ID
- **Authentication**: Required (authenticated user)
- **Authorization**: Super Admin or Admin role

#### Request
- **Path Parameters**:
  - `id` (integer): Designation ID

#### Response
- **Success Response**:
  - **Code**: 200 OK
  - **Content**:
    ```json
    {
      "id": 1,
      "designation_id": "MGR",
      "designation_name": "Manager"
    }
    ```

- **Error Response**:
  - **Code**: 404 Not Found
  - **Content**: When designation doesn't exist

### 3. Create Designation
- **Path**: `/designations`
- **Method**: `POST`
- **Description**: Create a new designation
- **Authentication**: Required (authenticated user)
- **Authorization**: Super Admin or Admin role

#### Request
- **Headers**:
  - `Content-Type`: `application/json`
  - `X-CSRF-TOKEN`: [CSRF token]
  
- **Body**:
  ```json
  {
    "designation_id": "ANL",
    "designation_name": "Analyst"
  }
  ```

#### Response
- **Success Response**:
  - **Code**: 201 Created
  - **Content**:
    ```json
    {
      "message": "Designation created successfully",
      "data": {
        "id": 3,
        "designation_id": "ANL",
        "designation_name": "Analyst"
      }
    }
    ```

- **Error Response**:
  - **Code**: 422 Validation Error
  - **Content**: When validation fails

### 4. Update Designation
- **Path**: `/designations/{id}`
- **Method**: `PUT` or `PATCH`
- **Description**: Update an existing designation
- **Authentication**: Required (authenticated user)
- **Authorization**: Super Admin or Admin role

#### Request
- **Path Parameters**:
  - `id` (integer): Designation ID
  
- **Headers**:
  - `Content-Type`: `application/json`
  - `X-CSRF-TOKEN`: [CSRF token]
  
- **Body**:
  ```json
  {
    "designation_id": "SRMGR",
    "designation_name": "Senior Manager"
  }
  ```

#### Response
- **Success Response**:
  - **Code**: 200 OK
  - **Content**:
    ```json
    {
      "message": "Designation updated successfully",
      "data": {
        "id": 1,
        "designation_id": "SRMGR",
        "designation_name": "Senior Manager"
      }
    }
    ```

- **Error Response**:
  - **Code**: 404 Not Found
  - **Content**: When designation doesn't exist
  - **Code**: 422 Validation Error
  - **Content**: When validation fails

### 5. Delete Designation
- **Path**: `/designations/{id}`
- **Method**: `DELETE`
- **Description**: Delete an existing designation
- **Authentication**: Required (authenticated user)
- **Authorization**: Super Admin or Admin role

#### Request
- **Path Parameters**:
  - `id` (integer): Designation ID
  
- **Headers**:
  - `X-CSRF-TOKEN`: [CSRF token]

#### Response
- **Success Response**:
  - **Code**: 200 OK
  - **Content**:
    ```json
    {
      "message": "Designation deleted successfully"
    }
    ```

- **Error Response**:
  - **Code**: 404 Not Found
  - **Content**: When designation doesn't exist
  - **Code**: 400 Bad Request
  - **Content**: When designation is referenced by other records and cannot be deleted