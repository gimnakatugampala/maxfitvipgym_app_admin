<?php
require '../includes/db_connect.php';


$id = $_GET['id'] ?? null;

if (!$id) {
    echo json_encode(["status" => "error", "message" => "Missing ID"]);
    exit;
}

$stmt = $conn->prepare("SELECT * FROM work_schedule WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$schedule = $stmt->get_result()->fetch_assoc();

$details = [];
$detailStmt = $conn->prepare("SELECT * FROM workout_schedule_details WHERE work_schedule_id = ?");
$detailStmt->bind_param("i", $id);
$detailStmt->execute();
$detailResult = $detailStmt->get_result();

while ($row = $detailResult->fetch_assoc()) {
    $details[] = $row;
}

echo json_encode([
    "status" => "success",
    "schedule" => $schedule,
    "details" => $details
]);
?>