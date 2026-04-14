<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../views/auth/login.php");
    exit;
}

// OPTIONAL: restrict student-only pages later
function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}