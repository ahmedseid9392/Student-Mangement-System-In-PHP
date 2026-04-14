<?php
require_once __DIR__ . "/../config/database.php";

class Enrollment {

    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    // ENROLL STUDENT
    public function enroll($student_id, $course_id) {
        $sql = "INSERT INTO enrollments (student_id, course_id)
                VALUES (:student_id, :course_id)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            'student_id' => $student_id,
            'course_id' => $course_id
        ]);
    }

    // GET ALL ENROLLMENTS (JOIN)
    public function getAll() {
        $sql = "SELECT e.id, s.name AS student_name, c.course_name
                FROM enrollments e
                JOIN students s ON e.student_id = s.id
                JOIN courses c ON e.course_id = c.id
                ORDER BY e.id DESC";

        return $this->conn->query($sql)->fetchAll();
    }

    // DELETE ENROLLMENT
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM enrollments WHERE id=:id");
        return $stmt->execute(['id' => $id]);
    }
}