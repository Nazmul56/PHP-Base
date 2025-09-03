# Laravel API Documentation

## Base URL
```
http://localhost:8000/api
```

## Authentication Endpoints

### 1. User Registration
**POST** `/api/register`

**Request Body:**
```json
{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123"
}
```

**Response:**
```json
{
    "success": true,
    "message": "User registered successfully",
    "data": {
        "user": {
            "id": 1,
            "name": "John Doe",
            "email": "john@example.com",
            "created_at": "2025-09-01T10:00:00.000000Z",
            "updated_at": "2025-09-01T10:00:00.000000Z"
        },
        "token": "1|abc123...",
        "token_type": "Bearer"
    }
}
```

### 2. User Login
**POST** `/api/login`

**Request Body:**
```json
{
    "email": "john@example.com",
    "password": "password123"
}
```

**Response:**
```json
{
    "success": true,
    "message": "Login successful",
    "data": {
        "user": {
            "id": 1,
            "name": "John Doe",
            "email": "john@example.com"
        },
        "token": "2|def456...",
        "token_type": "Bearer"
    }
}
```

### 3. User Logout
**POST** `/api/logout`

**Headers:**
```
Authorization: Bearer {your_token}
```

**Response:**
```json
{
    "success": true,
    "message": "Successfully logged out"
}
```

## Protected Endpoints

All endpoints below require authentication. Include the token in the Authorization header:
```
Authorization: Bearer {your_token}
```

### 4. Get User Profile
**GET** `/api/profile`

**Response:**
```json
{
    "success": true,
    "data": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com"
    }
}
```

### 5. Update User Profile
**PUT** `/api/profile`

**Request Body:**
```json
{
    "name": "John Smith",
    "email": "johnsmith@example.com"
}
```

**Response:**
```json
{
    "success": true,
    "message": "Profile updated successfully",
    "data": {
        "id": 1,
        "name": "John Smith",
        "email": "johnsmith@example.com"
    }
}
```

### 6. List All Users
**GET** `/api/users`

**Response:**
```json
{
    "success": true,
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "name": "John Doe",
                "email": "john@example.com"
            }
        ],
        "per_page": 10,
        "total": 1
    }
}
```

### 7. Get Specific User
**GET** `/api/users/{id}`

**Response:**
```json
{
    "success": true,
    "data": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com"
    }
}
```

### 8. Create New User
**POST** `/api/users`

**Request Body:**
```json
{
    "name": "Jane Doe",
    "email": "jane@example.com",
    "password": "password123"
}
```

### 9. Update User
**PUT** `/api/users/{id}`

**Request Body:**
```json
{
    "name": "Jane Smith",
    "email": "janesmith@example.com"
}
```

### 10. Delete User
**DELETE** `/api/users/{id}`

## Testing the API

### Using cURL

**Register a user:**
```bash
curl -X POST http://localhost:8000/api/register \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Test User",
    "email": "test@example.com",
    "password": "password123",
    "password_confirmation": "password123"
  }'
```

**Login:**
```bash
curl -X POST http://localhost:8000/api/login \
  -H "Content-Type: application/json" \
  -d '{
    "email": "test@example.com",
    "password": "password123"
  }'
```

**Get profile (with token):**
```bash
curl -X GET http://localhost:8000/api/profile \
  -H "Authorization: Bearer YOUR_TOKEN_HERE"
```

### Using Postman

1. Set base URL: `http://localhost:8000/api`
2. For protected endpoints, add header: `Authorization: Bearer {token}`
3. Set Content-Type: `application/json`

## Error Responses

**Validation Error (422):**
```json
{
    "success": false,
    "message": "Validation failed",
    "errors": {
        "email": ["The email field is required."],
        "password": ["The password field is required."]
    }
}
```

**Unauthorized (401):**
```json
{
    "success": false,
    "message": "Invalid credentials"
}
```

**Not Found (404):**
```json
{
    "message": "No query results for model [App\\Models\\User] 999"
}
```

## Notes

- All API responses follow a consistent format with `success`, `message`, and `data` fields
- Passwords are automatically hashed before storage
- Tokens are generated using Laravel Sanctum
- The API uses JSON for all requests and responses
- Protected endpoints require a valid Bearer token in the Authorization header
