<?php
require '../includes/db_connect.php';

header('Content-Type: application/json');

$sql = "
    SELECT 
        ws.id,
        ws.title,
        COUNT(DISTINCT CASE WHEN wsd.is_rest_day = 1 THEN wsd.day_id END) AS rest_days,
        COUNT(DISTINCT CASE WHEN wsd.is_rest_day = 0 THEN wsd.day_id END) AS workout_days
    FROM work_schedule ws
    LEFT JOIN workout_schedule_details wsd ON ws.id = wsd.schedule_id
    GROUP BY ws.id, ws.title
    ORDER BY ws.id DESC
";


$result = $conn->query($sql);

$schedules = [];
while ($row = $result->fetch_assoc()) {
    $schedules[] = $row;
}

echo json_encode(['success' => true, 'data' => $schedules]);
?>
