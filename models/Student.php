<?php
require_once __DIR__ . "/../config/database.php";

class Student {

    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    // CREATE
    public function create($name, $email, $phone) {
        $sql = "INSERT INTO students (name, email, phone) 
                VALUES (:name, :email, :phone)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            'name' => $name,
            'email' => $email,
            'phone' => $phone
        ]);
    }

    // READ ALL
    public function getAll() {
        $sql = "SELECT * FROM students ORDER BY id DESC";
        return $this->conn->query($sql)->fetchAll();
    }

    // READ ONE
    public function getById($id) {
        $sql = "SELECT * FROM students WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // UPDATE
    public function update($id, $name, $email, $phone) {
        $sql = "UPDATE students 
                SET name=:name, email=:email, phone=:phone 
                WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'phone' => $phone
        ]);
    }

    // DELETE
    public function delete($id) {
        $sql = "DELETE FROM students WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    //search
    public function search($keyword) {
    $sql = "SELECT * FROM students 
            WHERE name LIKE :kw 
            OR email LIKE :kw 
            OR phone LIKE :kw
            ORDER BY id DESC";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
        'kw' => "%$keyword%"
    ]);

    return $stmt->fetchAll();
}
}