<?php
require '../includes/db_connect.php';
header('Content-Type: application/json');

$id = $_GET['id'] ?? 0;
if (!$id) {
    echo json_encode(['error' => 'Missing ID']);
    exit;
}

$stmt = $conn->prepare("SELECT * FROM workout WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$workout = $stmt->get_result()->fetch_assoc();

if (!$workout) {
    echo json_encode(['error' => 'Workout not found']);
    exit;
}

// Map to expected keys for frontend
$mappedWorkout = [
    'name' => $workout['name'],
    'image' => $workout['img'], // map correctly
    'workout_type' => $workout['workout_type_id']
];

// Get videos
$video_stmt = $conn->prepare("SELECT video FROM workout_video WHERE workout_id = ? AND (is_deleted IS NULL OR is_deleted = 0)");
$video_stmt->bind_param("i", $id);
$video_stmt->execute();
$videosRaw = $video_stmt->get_result()->fetch_all(MYSQLI_ASSOC);

// Rename 'video' to 'url' to match JS
$videos = array_map(function($v) {
    return ['url' => $v['video']];
}, $videosRaw);

// Return JSON
echo json_encode(['workout' => $mappedWorkout, 'videos' => $videos]);
?>
