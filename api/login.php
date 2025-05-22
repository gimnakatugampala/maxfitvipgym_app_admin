<?php
session_start();
header('Content-Type: application/json');

// Database config
include '../includes/db_connect.php';

$email = trim($_POST['email']);
$password = trim($_POST['password']);

if (empty($email) || empty($password)) {
    echo json_encode(['success' => false, 'message' => 'All fields are required']);
    exit;
}

$stmt = $conn->prepare("SELECT id, full_name, password, is_active FROM users WHERE email = ?");
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    if ($row['is_active'] == 0) {
        echo json_encode(['success' => false, 'message' => 'Your account is deactivated.']);
    } elseif (password_verify($password, $row['password'])) {
        // ✅ Set session variables
        $_SESSION['admin_id'] = $row['id'];
        $_SESSION['admin_name'] = $row['full_name'];

        // ✅ Log only user_id into user_sessions table
        $log = $conn->prepare("INSERT INTO user_sessions (user_id) VALUES (?)");
        $log->bind_param('i', $row['id']);
        if ($log->execute()) {
            echo json_encode(['success' => true, 'message' => 'Login successful']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Login successful, but failed to log session']);
        }
        $log->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Incorrect password']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Admin not found']);
}

$stmt->close();
$conn->close();
