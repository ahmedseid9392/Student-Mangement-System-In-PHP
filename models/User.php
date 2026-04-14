<?php
require_once __DIR__ . "/../config/database.php";

class User {

    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function findByUsername($username) {
        $sql = "SELECT * FROM users WHERE username = :username LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['username' => $username]);
        return $stmt->fetch();
    }
}