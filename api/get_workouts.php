<?php
// header('Content-Type: application/json');
include '../includes/db_connect.php';

$sql = "SELECT 
            w.id AS workout_id, 
            w.name, 
            w.img, 
            wt.workout_type AS workout_type_name
        FROM workout w
        LEFT JOIN workout_type wt ON w.workout_type_id = wt.id
        ORDER BY w.created_date DESC";

$result = $conn->query($sql);

if (!$result) {
    echo json_encode(['success' => false, 'error' => $conn->error]);
    exit;
}

$workouts = [];

while ($row = $result->fetch_assoc()) {
    $workouts[] = [
        'id' => $row['workout_id'],
        'name' => $row['name'],
        'img' => !empty($row['img']) ? $row['img'] : 'img/profile_small.jpg',
        'workout_type_name' => $row['workout_type_name'] ?? 'Unknown',
    ];
}

echo json_encode([
    'success' => true,
    'data' => $workouts
]);
