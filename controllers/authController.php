<?php
session_start();

require_once __DIR__ . "/../models/User.php";

$userModel = new User();

// LOGIN
if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = $userModel->findByUsername($username);

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
       $_SESSION['role'] = $user['role'];
        header("Location: ../public/dashboard.php");
        exit;

    } else {
        $_SESSION['error'] = "Invalid username or password";
        header("Location: ../views/auth/login.php");
        exit;
    }
}

// LOGOUT
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ../public/dashboard.php");
    exit;
}