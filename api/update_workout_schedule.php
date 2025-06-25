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
    $updateStmt = $conn->prepare("UPDATE work_schedule SET title = ?, updated_at = NOW() WHERE id = ?");
    $updateStmt->bind_param("si", $title, $schedule_id);
    $updateStmt->execute();
    $updateStmt->close();

    // Delete existing details
    $deleteStmt = $conn->prepare("DELETE FROM workout_schedule_details WHERE schedule_id = ?");
    $deleteStmt->bind_param("i", $schedule_id);
    $deleteStmt->execute();
    $deleteStmt->close();

    // Prepare insert statement
    $insertStmt = $conn->prepare("INSERT INTO workout_schedule_details (
        schedule_id, day_id, workout_id, order_index,
        set_no, rep_no, duration_minutes, is_rest_day
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    $addedDays = [];

    foreach ($schedule as $dayData) {
        $dayName  = $dayData['day'] ?? null;
        $dayId    = $dayMap[$dayName] ?? null;
        $workouts = $dayData['workouts'] ?? [];

        if (!$dayId || in_array($dayId, $addedDays)) continue;
        $addedDays[] = $dayId;

        if (empty($workouts)) {
            // Insert rest day with empty/null values
            $workout_id       = null;
            $order_index      = null;
            $set_no           = null;
            $rep_no           = null;
            $duration_minutes = null;
            $is_rest_day      = 1;

            $insertStmt->bind_param(
                "iiiisssi",
                $schedule_id,
                $dayId,
                $workout_id,
                $order_index,
                $set_no,
                $rep_no,
                $duration_minutes,
                $is_rest_day
            );
            $insertStmt->execute();
        } else {
            $order_index = 1;
            foreach ($workouts as $w) {
                if (!isset($w['workout_id'])) {
                    // Try to lookup workout_id by name if missing
                    $name = $w['name'] ?? null;
                    if ($name) {
                        $stmt = $conn->prepare("SELECT id FROM workout WHERE name = ? LIMIT 1");
                        $stmt->bind_param("s", $name);
                        $stmt->execute();
                        $stmt->bind_result($resolved_id);
                        if ($stmt->fetch()) {
                            $w['workout_id'] = $resolved_id;
                        }
                        $stmt->close();
                    }
                }

                if (!isset($w['workout_id'])) {
                    throw new Exception("Missing workout_id for day: $dayName, order: $order_index");
                }

                $workout_id = intval($w['workout_id']);
                $isTimeBased = isset($w['duration']) && $w['duration'] !== "" && intval($w['duration']) > 0;

                $set_no           = $isTimeBased ? null : ((isset($w['sets']) && $w['sets'] !== "") ? $w['sets'] : null);
                $rep_no           = $isTimeBased ? null : ((isset($w['reps']) && $w['reps'] !== "") ? $w['reps'] : null);
                $duration_minutes = $isTimeBased ? $w['duration'] : null;
                $is_rest_day      = 0;

                $insertStmt->bind_param(
                    "iiiisssi",
                    $schedule_id,
                    $dayId,
                    $workout_id,
                    $order_index,
                    $set_no,
                    $rep_no,
                    $duration_minutes,
                    $is_rest_day
                );
                $insertStmt->execute();
                $order_index++;
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
