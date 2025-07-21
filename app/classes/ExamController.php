<?php
require_once __DIR__ . '/DB.php'; // adjust path as needed

class ExamController {
    private $conn;

    public function __construct() {
       $this->conn = DB::getConnection();
    
    }

    public function getAllExams() {
        $query = "SELECT * FROM exams ORDER BY exam_date DESC";
        $result = $this->conn->query($query);
        return $result;
    }

    public function getExamById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM exams WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function addExam($name, $type, $academic_year, $exam_date, $class) {
        $stmt = $this->conn->prepare("INSERT INTO exams (name, type, academic_year, exam_date, class) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $type, $academic_year, $exam_date, $class);
        return $stmt->execute();
    }

    public function updateExam($id, $name, $type, $academic_year, $exam_date, $class) {
        $stmt = $this->conn->prepare("UPDATE exams SET name = ?, type = ?, academic_year = ?, exam_date = ?, class = ? WHERE id = ?");
        $stmt->bind_param("sssssi", $name, $type, $academic_year, $exam_date, $class, $id);
        return $stmt->execute();
    }

    public function deleteExam($id) {
        $stmt = $this->conn->prepare("DELETE FROM exams WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
