<?php
require '../includes/db_connect.php';

$id = $_POST['id'];
$name = $_POST['name'];
$type = $_POST['workout_type'];
$video_urls = $_POST['video_urls'];

$imagePath = '';

if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    $targetDir = "../uploads/";
    $filename = time() . "_" . basename($_FILES["image"]["name"]);
    $targetFile = $targetDir . $filename;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        $imagePath = $filename;
    }
}

// Update workout info
if ($imagePath != '') {
    $stmt = $conn->prepare("UPDATE workouts SET name=?, workout_type=?, image=? WHERE id=?");
    $stmt->bind_param("sisi", $name, $type, $imagePath, $id);
} else {
    $stmt = $conn->prepare("UPDATE workouts SET name=?, workout_type=? WHERE id=?");
    $stmt->bind_param("sii", $name, $type, $id);
}
$stmt->execute();

// Clear existing videos
$conn->query("DELETE FROM workout_videos WHERE workout_id = $id");

// Insert new video URLs
foreach ($video_urls as $url) {
    $stmt = $conn->prepare("INSERT INTO workout_videos (workout_id, url) VALUES (?, ?)");
    $stmt->bind_param("is", $id, $url);
    $stmt->execute();
}

echo json_encode(['success' => true]);
?>
