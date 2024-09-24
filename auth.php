<?php
session_start();

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
	http_response_code(200);
	exit;
}

// if (!isset($_SESSION['user_id'])) {
// 	http_response_code(403);
// 	echo json_encode(['error' => 'Unauthorized']);
// 	exit;
// }

$secretApiKey = 'sk_dev_4oLJSBeKQJF8n3tCiEnqkC8f9mMM2gBhlIMIVZImq98FqiTNa_-SIsps6EMaQuG0';
$userId = $_GET['user_id'];
$roomId = $_POST['room_id'] ?? 'my-room';

$payload = [
	'userId' => $userId,
	'room' => $roomId,
];

$signature = hash_hmac('sha256', json_encode(value: $payload), $secretApiKey);

echo json_encode([
	'userId' => $userId,
	'room' => $roomId,
	'token' => $signature,
]);
