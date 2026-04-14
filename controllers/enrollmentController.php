<?php
session_start();
require_once __DIR__ . "/../models/Enrollment.php";

$enrollment = new Enrollment();

// ENROLL
if (isset($_POST['enroll'])) {

    $enrollment->enroll(
        $_POST['student_id'],
        $_POST['course_id']
    );

    header("Location: ../views/enrollments/index.php");
    exit;
}

// DELETE
if (isset($_GET['delete'])) {

    $enrollment->delete($_GET['delete']);

    header("Location: ../views/enrollments/index.php");
    exit;
}