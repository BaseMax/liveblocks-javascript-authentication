<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

$secretApiKey = 'sk_dev_4oLJSBeKQJF8n3tCiEnqkC8f9mMM2gBhlIMIVZImq98FqiTNa_-SIsps6EMaQuG0';
$userId = $_SESSION['user_id'];
$roomId = $_POST['room_id'] ?? 'my-room';

$payload = [
    'userId' => $userId,
    'room' => $roomId,
];

$signature = hash_hmac('sha256', json_encode($payload), $secretApiKey);

echo json_encode([
    'userId' => $userId,
    'room' => $roomId,
    'token' => $signature,
]);
