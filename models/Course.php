<?php
require_once __DIR__ . "/../config/database.php";

class Course {

    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    // CREATE
    public function create($name, $code) {
        $sql = "INSERT INTO courses (course_name, course_code)
                VALUES (:name, :code)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            'name' => $name,
            'code' => $code
        ]);
    }

    // READ ALL
    public function getAll() {
        return $this->conn->query("SELECT * FROM courses ORDER BY id DESC")->fetchAll();
    }

    // READ ONE
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM courses WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // UPDATE
    public function update($id, $name, $code) {
        $sql = "UPDATE courses 
                SET course_name=:name, course_code=:code 
                WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'name' => $name,
            'code' => $code
        ]);
    }

    // DELETE
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM courses WHERE id=:id");
        return $stmt->execute(['id' => $id]);
    }

    //search 
    public function search($keyword) {
    $sql = "SELECT * FROM courses
            WHERE course_name LIKE :kw
            OR course_code LIKE :kw
            ORDER BY id DESC";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
        'kw' => "%$keyword%"
    ]);

    return $stmt->fetchAll();
}
}