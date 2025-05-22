<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_unset();
    session_destroy();
    echo json_encode(['status' => 'success', 'message' => 'Logged out successfully']);
    exit();
}

http_response_code(405); // Method Not Allowed
echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
exit();
