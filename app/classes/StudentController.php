<?php
require_once 'DB.php';

class StudentController {
    private $conn;

    public function __construct() {
        // Use the static singleton connection
        $this->conn = DB::getConnection();
    }
public function getStudents() {
    $stmt = $this->conn->prepare("SELECT * FROM students");
    $stmt->execute();
    return $stmt->get_result();
}


    public function getStudentsLimited($limit = 100) {
        $stmt = $this->conn->prepare("SELECT * FROM students LIMIT ?");
        $stmt->bind_param("i", $limit);
        $stmt->execute();
        return $stmt->get_result();
    }

   public function addStudent($name, $roll_no, $class, $batch, $department, $gender) {
    $stmt = $this->conn->prepare("INSERT INTO students ( name, roll_no, class, batch, department, gender) VALUES (?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        return false;
    }
    $stmt->bind_param("ssssss", $name, $roll_no, $class, $batch, $department, $gender);
    return $stmt->execute();
}

    public function updateStudent($id, $name, $roll_no, $class, $batch, $department, $gender) {
        $stmt = $this->conn->prepare("UPDATE students SET name=?, roll_no=?, class=?, batch=?, department=?, gender=? WHERE id=?");
        $stmt->bind_param("ssssssi", $name, $roll_no, $class, $batch, $department, $gender, $id);
        return $stmt->execute();
    }

    public function deleteStudent($id) {
        $stmt = $this->conn->prepare("DELETE FROM students WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
