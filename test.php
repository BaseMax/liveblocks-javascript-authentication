<?php
header('Content-Type: application/json');

// Your secret API key from Liveblocks dashboard (not the public key)
$secretApiKey = 'sk_prod_your_secret_api_key';

// Fetch the user's credentials (use a session, database, etc. to manage users)
$userId = 'user-123'; // Replace this with your actual user authentication logic
$roomId = 'my-room'; // The room the user is trying to access

if (!$userId || !$roomId) {
    // If there's no user or room specified, deny access
    http_response_code(403);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

// Prepare the payload for signing
$payload = [
    'userId' => $userId,
    'room' => $roomId,
];

// Generate the signature using HMAC with SHA256
$signature = hash_hmac('sha256', json_encode($payload), $secretApiKey);

// Send the signed response back to the client
echo json_encode([
    'userId' => $userId,
    'room' => $roomId,
    'token' => $signature,
]);
