<?php
session_start();

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

use \Firebase\JWT\JWT;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// For testing purposes, comment out user_id session check
// if (!isset($_SESSION['user_id'])) {
//     http_response_code(403);
//     echo json_encode(['error' => 'Unauthorized']);
//     exit;
// }

$secretApiKey = 'sk_dev_4oLJSBeKQJF8n3tCiEnqkC8f9mMM2gBhlIMIVZImq98FqiTNa_-SIsps6EMaQuG0';
$userId = $_GET['user_id'] ?? 'test_user';
$roomId = $_POST['room_id'] ?? 'my-room';

$payload = [
    'userId' => $userId,
    'room' => $roomId,
    'exp' => time() + 3600,
];

$jwt = JWT::encode($payload, $secretApiKey, 'HS256');

echo json_encode([
    'userId' => $userId,
    'room' => $roomId,
    'token' => $jwt,
]);
