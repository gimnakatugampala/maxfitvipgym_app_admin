<?php
require '../includes/db_connect.php';
header('Content-Type: application/json');

$sql = "SELECT id, name, workout_type_id, img FROM workout WHERE 1";
$result = $conn->query($sql);

$workouts = [];
while ($row = $result->fetch_assoc()) {
    $workouts[] = [
        'id' => $row['id'],
        'name' => $row['name'],
        'type' => $row['workout_type_id'] == 1 ? 'sets' : 'time',
        'image' => '../' . $row['img']
    ];
}

echo json_encode(['success' => true, 'workouts' => $workouts]);
?>
