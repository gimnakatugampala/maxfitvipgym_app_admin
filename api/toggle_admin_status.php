<?php
include '../includes/db_connect.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $status = intval($_POST['status']); // 0 or 1

    if (!in_array($status, [0, 1])) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid status.']);
        exit;
    }

    $stmt = $conn->prepare("UPDATE users SET is_active = ? WHERE id = ?");
    $stmt->bind_param("ii", $status, $id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
?>
