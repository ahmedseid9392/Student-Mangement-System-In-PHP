<?php
$host = "sql207.infinityfree.com"; // provided by InfinityFree
$dbname = "if0_41660343_sms_project";
$username = "if0_41660343";
$password = "Kq027O1R8ve";

try {
    $conn = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $username,
        $password
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}