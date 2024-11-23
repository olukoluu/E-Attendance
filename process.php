<?php
session_start();
include_once('connect.php');

if (isset($_GET["course_id"]) && isset($_GET["week"])){
    $sql = "SELECT s.first_name, s.last_name, s.matric_number FROM students_bio_data AS s LEFT JOIN attendance AS a ON a.student_id = s.matric_number WHERE a.course_id = ? AND week = ?;
    ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $_GET["course_id"], $_GET["week"]);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);

    echo json_encode($row);
}