<?php
header('Content-Type: application/json');
include '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $workoutType = $_POST['workout_type'] ?? '';
    $videos = $_POST['video_urls'] ?? [];

    if (empty($name) || empty($workoutType)) {
        echo json_encode(["success" => false, "message" => "Workout name and type are required."]);
        exit;
    }

    $imgPath = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $uploadDir = "../uploads/workouts/";
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $fileName = time() . '_' . basename($_FILES["image"]["name"]);
        $targetFile = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $imgPath = "uploads/workouts/" . $fileName;
        } else {
            echo json_encode(["success" => false, "message" => "Image upload failed."]);
            exit;
        }
    }

    $code = uniqid('W_');
    $stmt = $conn->prepare("INSERT INTO workout (code, name, img, workout_type_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $code, $name, $imgPath, $workoutType);

    if (!$stmt->execute()) {
        echo json_encode(["success" => false, "message" => "Workout insert failed."]);
        exit;
    }

    $workoutId = $stmt->insert_id;

    $videoStmt = $conn->prepare("INSERT INTO workout_video (video, workout_id) VALUES (?, ?)");
    foreach ($videos as $videoUrl) {
        $trimmed = trim($videoUrl);
        if (!empty($trimmed)) {
            $videoStmt->bind_param("si", $trimmed, $workoutId);
            $videoStmt->execute();
        }
    }

    echo json_encode(["success" => true, "workout_id" => $workoutId, "message" => "Workout saved successfully."]);
    exit;
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}
?>
