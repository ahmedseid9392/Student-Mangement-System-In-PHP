<?php
session_start();
require_once __DIR__ . "/../models/Student.php";

$student = new Student();

// CREATE
if (isset($_POST['add_student'])) {

    $student->create(
        $_POST['name'],
        $_POST['email'],
        $_POST['phone']
    );

    header("Location: ../views/students/index.php");
    exit;
}

// UPDATE
if (isset($_POST['update_student'])) {

    $student->update(
        $_POST['id'],
        $_POST['name'],
        $_POST['email'],
        $_POST['phone']
    );

    header("Location: ../views/students/index.php");
    exit;
}

// DELETE
if (isset($_GET['delete'])) {

    $student->delete($_GET['delete']);

    header("Location: ../views/students/index.php");
    exit;
}