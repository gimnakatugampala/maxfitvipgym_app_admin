<?php
include '../includes/db_connect.php';

header('Content-Type: application/json');

$sql = "SELECT id, full_name, email, created_at, is_active FROM users";
$result = $conn->query($sql);

$admins = [];

while ($row = $result->fetch_assoc()) {
    $admins[] = $row;
}

echo json_encode($admins);
$conn->close();
?>
