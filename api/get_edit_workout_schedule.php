<?php
require '../includes/db_connect.php';
header('Content-Type: application/json');

$schedule_id = $_GET['id'] ?? null;
if (!$schedule_id) {
    echo json_encode(['success' => false, 'message' => 'Schedule ID is required']);
    exit;
}

// Get schedule info
$stmt = $conn->prepare("SELECT id, title FROM work_schedule WHERE id = ?");
$stmt->bind_param("i", $schedule_id);
$stmt->execute();
$result = $stmt->get_result();
$schedule = $result->fetch_assoc();

if (!$schedule) {
    echo json_encode(['success' => false, 'message' => 'Schedule not found']);
    exit;
}

// Get workouts and rest days
$stmt = $conn->prepare("
    SELECT d.day_id, d.workout_id, d.order_index, d.set_no, d.rep_no, d.duration_minutes, d.is_rest_day,
           w.name AS workout_name
    FROM workout_schedule_details d
    LEFT JOIN workouts w ON d.workout_id = w.id
    WHERE d.schedule_id = ?
    ORDER BY d.day_id, d.order_index
");


$stmt->bind_param("i", $schedule_id);
$stmt->execute();
$result = $stmt->get_result();

$schedule_details = [];
$rest_days = [];

while ($row = $result->fetch_assoc()) {
    $dayNames = ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
    $dayName = $dayNames[$row['day_id'] - 1];

    if ($row['is_rest_day'] == 1) {
        $rest_days[] = $dayName;
    } else {
      $schedule_details[$dayName][] = [
    'workout_id' => $row['workout_id'],
    'workout_name' => $row['workout_name'],
    'order_index' => $row['order_index'],
    'sets' => $row['set_no'],
    'reps' => $row['rep_no'],
    'duration_minutes' => $row['duration_minutes']
];

    }
}

echo json_encode([
    'success' => true,
    'schedule' => $schedule,
    'schedule_details' => $schedule_details,
    'rest_days' => $rest_days
]);
?>
