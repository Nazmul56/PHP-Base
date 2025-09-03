<?php
/**
 * Simple API Test Script
 * Run this script to test your Laravel API endpoints
 */

$baseUrl = 'http://localhost:8000/api';

echo "🚀 Testing Laravel API Endpoints\n";
echo "================================\n\n";

// Test 1: Register a new user
echo "1. Testing User Registration...\n";
$registerData = [
    'name' => 'Test User',
    'email' => 'test@example.com',
    'password' => 'password123',
    'password_confirmation' => 'password123'
];

$response = makeRequest($baseUrl . '/register', 'POST', $registerData);
$responseData = json_decode($response, true);

if (isset($responseData['success']) && $responseData['success']) {
    echo "✅ Registration successful!\n";
    $token = $responseData['data']['token'];
    echo "Token: " . substr($token, 0, 20) . "...\n\n";
} else {
    echo "❌ Registration failed: " . ($responseData['message'] ?? 'Unknown error') . "\n\n";
    exit;
}

// Test 2: Login
echo "2. Testing User Login...\n";
$loginData = [
    'email' => 'test@example.com',
    'password' => 'password123'
];

$response = makeRequest($baseUrl . '/login', 'POST', $loginData);
$responseData = json_decode($response, true);

if (isset($responseData['success']) && $responseData['success']) {
    echo "✅ Login successful!\n";
    $token = $responseData['data']['token'];
    echo "Token: " . substr($token, 0, 20) . "...\n\n";
} else {
    echo "❌ Login failed: " . ($responseData['message'] ?? 'Unknown error') . "\n\n";
}

// Test 3: Get Profile (Protected endpoint)
echo "3. Testing Get Profile (Protected)...\n";
$response = makeRequest($baseUrl . '/profile', 'GET', [], $token);
$responseData = json_decode($response, true);

if (isset($responseData['success']) && $responseData['success']) {
    echo "✅ Profile retrieved successfully!\n";
    echo "User: " . $responseData['data']['name'] . " (" . $responseData['data']['email'] . ")\n\n";
} else {
    echo "❌ Profile retrieval failed: " . ($responseData['message'] ?? 'Unknown error') . "\n\n";
}

// Test 4: Update Profile
echo "4. Testing Update Profile...\n";
$updateData = [
    'name' => 'Updated Test User',
    'email' => 'updated@example.com'
];

$response = makeRequest($baseUrl . '/profile', 'PUT', $updateData, $token);
$responseData = json_decode($response, true);

if (isset($responseData['success']) && $responseData['success']) {
    echo "✅ Profile updated successfully!\n";
    echo "New name: " . $responseData['data']['name'] . "\n\n";
} else {
    echo "❌ Profile update failed: " . ($responseData['message'] ?? 'Unknown error') . "\n\n";
}

// Test 5: List Users
echo "5. Testing List Users...\n";
$response = makeRequest($baseUrl . '/users', 'GET', [], $token);
$responseData = json_decode($response, true);

if (isset($responseData['success']) && $responseData['success']) {
    echo "✅ Users listed successfully!\n";
    echo "Total users: " . $responseData['data']['total'] . "\n\n";
} else {
    echo "❌ Users listing failed: " . ($responseData['message'] ?? 'Unknown error') . "\n\n";
}

// Test 6: Logout
echo "6. Testing Logout...\n";
$response = makeRequest($baseUrl . '/logout', 'POST', [], $token);
$responseData = json_decode($response, true);

if (isset($responseData['success']) && $responseData['success']) {
    echo "✅ Logout successful!\n\n";
} else {
    echo "❌ Logout failed: " . ($responseData['message'] ?? 'Unknown error') . "\n\n";
}

echo "🎉 API Testing Complete!\n";

/**
 * Helper function to make HTTP requests
 */
function makeRequest($url, $method, $data = [], $token = null) {
    $ch = curl_init();
    
    $headers = ['Content-Type: application/json'];
    if ($token) {
        $headers[] = 'Authorization: Bearer ' . $token;
    }
    
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    
    if ($method === 'POST' || $method === 'PUT') {
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    }
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    if (curl_error($ch)) {
        echo "cURL Error: " . curl_error($ch) . "\n";
    }
    
    curl_close($ch);
    
    echo "HTTP Status: " . $httpCode . "\n";
    
    return $response;
}
