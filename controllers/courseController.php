<?php
session_start();
require_once __DIR__ . "/../models/Course.php";

$course = new Course();

// CREATE
if (isset($_POST['add_course'])) {

    $course->create(
        $_POST['course_name'],
        $_POST['course_code']
    );

    header("Location: ../views/courses/index.php");
    exit;
}

// UPDATE
if (isset($_POST['update_course'])) {

    $course->update(
        $_POST['id'],
        $_POST['course_name'],
        $_POST['course_code']
    );

    header("Location: ../views/courses/index.php");
    exit;
}

// DELETE
if (isset($_GET['delete'])) {

    $course->delete($_GET['delete']);

    header("Location: ../views/courses/index.php");
    exit;
}