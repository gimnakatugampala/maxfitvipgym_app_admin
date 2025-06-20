<?php
require '../includes/db_connect.php';

header('Content-Type: application/json');

// Validate ID
$id = $_POST['id'] ?? 0;
if (!$id) {
    echo json_encode(['success' => false, 'message' => 'Invalid workout ID']);
    exit;
}

$name = $_POST['name'] ?? '';
$workoutType = $_POST['workout_type'] ?? '';
$videoUrls = $_POST['video_urls'] ?? [];

// Handle image upload
$imagePath = '';
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $uploadDir = '../uploads/workouts/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $filename = time() . '_' . basename($_FILES['image']['name']);
    $targetFile = $uploadDir . $filename;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        $imagePath = 'uploads/workouts/' . $filename;
    }
}

// 1. Update workout table
if ($imagePath) {
    $stmt = $conn->prepare("UPDATE workout SET name = ?, workout_type_id = ?, img = ? WHERE id = ?");
    $stmt->bind_param("sisi", $name, $workoutType, $imagePath, $id);
} else {
    $stmt = $conn->prepare("UPDATE workout SET name = ?, workout_type_id = ? WHERE id = ?");
    $stmt->bind_param("sii", $name, $workoutType, $id);
}

if (!$stmt->execute()) {
    echo json_encode(['success' => false, 'message' => 'Workout update failed']);
    exit;
}

// 2. Delete old workout videos
$conn->query("DELETE FROM workout_video WHERE workout_id = " . intval($id));

// 3. Insert new video URLs
if (!empty($videoUrls)) {
    $insertStmt = $conn->prepare("INSERT INTO workout_video (video, workout_id) VALUES (?, ?)");
    foreach ($videoUrls as $url) {
        $url = trim($url);
        if (empty($url)) continue;

        // ✅ Add this validation here:
        if (!preg_match('/(youtube\.com\/watch\?v=|youtu\.be\/)/', $url)) {
            continue; // Skip non-YouTube URLs
        }

        $insertStmt->bind_param("si", $url, $id);
        $insertStmt->execute();
    }
}


echo json_encode(['success' => true]);
?>
