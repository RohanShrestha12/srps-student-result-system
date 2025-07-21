<?php
require_once 'DB.php';

class StudentController {
    private $conn;

    public function __construct() {
        // Use the static singleton connection
        $this->conn = DB::getConnection();
    }
public function getStudents() {
    $stmt = $this->conn->prepare(" SELECT students.*, departments.name AS department_name 
        FROM students 
        LEFT JOIN departments ON students.department_id = departments.id");
    $stmt->execute();
    return $stmt->get_result();
}

    public function getTotalStudents() {
        $stmt = $this->conn->prepare("SELECT COUNT(*) AS total FROM students");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc()['total'];
    }
public function getDepartments() {
    $stmt = $this->conn->prepare("SELECT * FROM departments");
    $stmt->execute();
    return $stmt->get_result();
}

    public function getStudentById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM students WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

public function getStudentDepartment($name) {
        $stmt = $this->conn->prepare("SELECT * FROM students WHERE department_id=(SELECT id FROM departments WHERE name=?)");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function getStudentsLimited($limit = 100) {
        $stmt = $this->conn->prepare("SELECT * FROM students LIMIT ?");
        $stmt->bind_param("i", $limit);
        $stmt->execute();
        return $stmt->get_result();
    }

  public function addStudent($name, $roll_no, $class, $batch, $department_id, $gender, $status)
{
    $stmt = $this->conn->prepare("INSERT INTO students (name, roll_no, class, batch, department_id, gender, status) VALUES (?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        return false; // Or log error
    }

    $stmt->bind_param("ssssiss", $name, $roll_no, $class, $batch, $department_id, $gender, $status);
    $result = $stmt->execute();
    $stmt->close();

    return $result;
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
