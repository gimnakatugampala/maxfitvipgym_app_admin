<?php
require '../includes/db_connect.php';
header('Content-Type: application/json');

// Dynamically detect base URL
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];

// Base URL for images – pointing to uploads/workouts
$baseUploadsURL = $protocol . $host . '/maxfit_gym_admin/uploads/workouts/';

$schedule_id = $_GET['id'] ?? null;
if (!$schedule_id) {
    echo json_encode(['success' => false, 'message' => 'Schedule ID is required']);
    exit;
}

// Get schedule metadata
$stmt = $conn->prepare("SELECT id, title FROM work_schedule WHERE id = ?");
$stmt->bind_param("i", $schedule_id);
$stmt->execute();
$result = $stmt->get_result();
$schedule = $result->fetch_assoc();

if (!$schedule) {
    echo json_encode(['success' => false, 'message' => 'Schedule not found']);
    exit;
}

// Get workout details
$stmt = $conn->prepare("
    SELECT d.day_id, d.workout_id, d.order_index, d.set_no, d.rep_no, d.duration_minutes, d.is_rest_day,
           w.name AS workout_name, w.img AS workout_img
    FROM workout_schedule_details d
    LEFT JOIN workout w ON d.workout_id = w.id
    WHERE d.schedule_id = ?
    ORDER BY d.day_id, d.order_index
");

$stmt->bind_param("i", $schedule_id);
$stmt->execute();
$result = $stmt->get_result();

$schedule_details = [];
$rest_days = [];

$dayNames = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];

while ($row = $result->fetch_assoc()) {
    $dayName = $dayNames[$row['day_id'] - 1];

     // Build full image URL
    $image_url = null;
    if (!empty($row['workout_img'])) {
        $filename = basename($row['workout_img']); // In case full path is stored
        $image_url = $baseUploadsURL . $filename;
    }

    if ((int)$row['is_rest_day'] === 1) {
        $rest_days[] = $dayName;
    } else {
        $schedule_details[$dayName][] = [
            'workout_id' => $row['workout_id'],
            'workout_name' => $row['workout_name'] ?? 'Unnamed Workout',
            'order_index' => $row['order_index'],
            'sets' => $row['set_no'],
            'reps' => $row['rep_no'],
            'duration_minutes' => $row['duration_minutes'],
            'workout_img' => $image_url
        ];
    }
}

// Send proper JSON response
echo json_encode([
    'status' => 'success',
    'schedule' => $schedule,
    'details' => $schedule_details,
    'rest_days' => $rest_days
]);
