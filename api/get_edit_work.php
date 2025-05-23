<?php
require '../includes/db_connect.php'; // Your DB connection

$id = $_GET['id'] ?? 0;
if ($id == 0) {
    echo json_encode(['error' => 'Workout ID missing']);
    exit;
}

// Get workout info
$stmt = $conn->prepare("SELECT * FROM workouts WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$workout = $stmt->get_result()->fetch_assoc();

// Get workout videos
// $video_stmt = $conn->prepare("SELECT * FROM workout_videos WHERE workout_id = ?");
// $video_stmt->bind_param("i", $id);
// $video_stmt->execute();
// $videos = $video_stmt->get_result()->fetch_all(MYSQLI_ASSOC);

echo json_encode(['workout' => $workout, 'videos' => []]);
?>
