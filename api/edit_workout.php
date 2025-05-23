<?php
include '../includes/db_connect.php';

$workout = null;
$workout_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($workout_id > 0) {
    $sql = "SELECT w.*, wt.name AS workout_type_name FROM workout w
            LEFT JOIN workout_type wt ON w.workout_type_id = wt.id
            WHERE w.id = $workout_id";
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows > 0) {
        $workout = $result->fetch_assoc();
    } else {
        echo "<script>alert('Workout not found'); window.location.href='workout_list.php';</script>";
        exit;
    }
}
?>
