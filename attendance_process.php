<?php
session_start();
include_once('connect.php');


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $course_id = $_POST['course_id'];
    $students_id = $_POST['studentsid'];
    $week = $_POST['week'];

    $sql = "INSERT INTO attendance (student_id, course_id, week) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    foreach($students_id as $student_id){
    $stmt->bind_param('iii', $student_id, $course_id, $week);
    $stmt->execute();
    }

    header("Location: attendance_courses.php");
}