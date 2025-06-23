<?php
require '../includes/db_connect.php';
header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

$title = $data['title'] ?? null;
$schedule = $data['schedule'] ?? [];
$rest_days = $data['rest_days'] ?? [];

if (!$title || (empty($schedule) && empty($rest_days))) {
    echo json_encode(['success' => false, 'message' => 'Title or schedule missing']);
    exit;
}

// Insert into work_schedule
$stmt = $conn->prepare("INSERT INTO work_schedule (title, created_date, updated_at) VALUES (?, NOW(), NOW())");
$stmt->bind_param("s", $title);
$stmt->execute();
$schedule_id = $stmt->insert_id;
$stmt->close();

// Insert workouts and rest days into workout_schedule_details
$insertStmt = $conn->prepare("
    INSERT INTO workout_schedule_details (schedule_id, day_id, workout_id, order_index, set_no, rep_no, duration_minutes, is_rest_day)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)
");

// Helper for converting day name to ID
function getDayId($day) {
    return array_search($day, ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"]) + 1;
}

// Insert workout entries
foreach ($schedule as $day => $workouts) {
    $day_id = getDayId($day);
    $order = 0;

    foreach ($workouts as $w) {
        $order++;
        $workout_id = $w['workout_id'];
        $set_no = $w['sets'] ?? null;
        $rep_no = $w['reps'] ?? null;
        $duration = $w['duration_minutes'] ?? null;
        $is_rest_day = 0;

        $insertStmt->bind_param(
            "iiiisssi",
            $schedule_id,
            $day_id,
            $workout_id,
            $order,
            $set_no,
            $rep_no,
            $duration,
            $is_rest_day
        );
        $insertStmt->execute();
    }
}

// Insert rest days
// Insert rest days
foreach ($rest_days as $day) {
    $day_id = getDayId($day);
    $workout_id = null;
    $order = 0;
    $set_no = null;
    $rep_no = null;
    $duration = null;
    $is_rest_day = 1;

    $insertStmt->bind_param(
        "iiiisssi",
        $schedule_id,
        $day_id,
        $workout_id,
        $order,
        $set_no,
        $rep_no,
        $duration,
        $is_rest_day
    );
    $insertStmt->execute();
}


$insertStmt->close();

echo json_encode(['success' => true, 'schedule_id' => $schedule_id]);
?>
