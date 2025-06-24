<?php
require '../includes/db_connect.php';
header("Content-Type: application/json");

// Read and decode JSON input
$data = json_decode(file_get_contents("php://input"), true);

// Validate input
if (!isset($data['schedule_id'], $data['title'], $data['schedule'])) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Missing required fields'
    ]);
    exit;
}

$schedule_id = intval($data['schedule_id']);
$title       = $conn->real_escape_string($data['title']);
$schedule    = $data['schedule'];

// Map day names to day IDs
$dayMap = [
    "Monday"    => 1,
    "Tuesday"   => 2,
    "Wednesday" => 3,
    "Thursday"  => 4,
    "Friday"    => 5,
    "Saturday"  => 6,
    "Sunday"    => 7
];

$conn->begin_transaction();

try {
    // Update schedule title
    $updateStmt = $conn->prepare("
        UPDATE work_schedule
        SET title = ?, updated_at = NOW()
        WHERE id = ?
    ");
    $updateStmt->bind_param("si", $title, $schedule_id);
    $updateStmt->execute();
    $updateStmt->close();

    // Delete existing details
    $deleteStmt = $conn->prepare("DELETE FROM workout_schedule_details WHERE schedule_id = ?");
    $deleteStmt->bind_param("i", $schedule_id);
    $deleteStmt->execute();
    $deleteStmt->close();

    // Prepare insert statement
    $insertStmt = $conn->prepare("
        INSERT INTO workout_schedule_details (
            schedule_id, day_id, workout_id, order_index,
            set_no, rep_no, duration_minutes, is_rest_day
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    ");

    foreach ($schedule as $dayData) {
        $dayName  = $dayData['day'];
        $dayId    = $dayMap[$dayName] ?? null;
        $workouts = $dayData['workouts'];

        if (!$dayId) continue;

        if (empty($workouts)) {
            // Insert rest day
            $insertStmt->bind_param(
                "iiiisssi",
                $schedule_id,
                $dayId,
                $null = null,
                $null = null,
                $empty = "",
                $empty,
                $empty,
                $isRest = 1
            );
            $insertStmt->execute();
        } else {
            $order = 0;
            foreach ($workouts as $w) {
                $workout_id = isset($w['workout_id']) ? intval($w['workout_id']) : null;
                $sets       = isset($w['sets']) ? $w['sets'] : "";
                $reps       = isset($w['reps']) ? $w['reps'] : "";
                $duration   = isset($w['duration']) ? $w['duration'] : "";

                $insertStmt->bind_param(
                    "iiiisssi",
                    $schedule_id,
                    $dayId,
                    $workout_id,
                    $order,
                    $sets,
                    $reps,
                    $duration,
                    $isRest = 0
                );
                $insertStmt->execute();
                $order++;
            }
        }
    }

    $insertStmt->close();
    $conn->commit();

    echo json_encode([
        'status' => 'success',
        'message' => 'Schedule updated successfully'
    ]);

} catch (Exception $e) {
    $conn->rollback();
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}

$conn->close();
?>
