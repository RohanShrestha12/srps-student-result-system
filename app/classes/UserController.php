<?php
require_once 'DB.php';

class UserController {
    private $conn;

    public function __construct() {
        // Use the static singleton connection
        $this->conn = DB::getConnection();
    }
public function getAdmins() {
    $stmt = $this->conn->prepare("SELECT * FROM users where role='admin'");
    $stmt->execute();
    return $stmt->get_result();
}
    public function getTotalAdmins() {
        $stmt = $this->conn->prepare("SELECT COUNT(*) AS total FROM users WHERE role='admin'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc()['total'];
    }

    public function getAdminById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id=? AND role='admin'");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function addAdmin($name, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, 'admin')");
        $stmt->bind_param("sss", $name, $email, $hashedPassword);
        return $stmt->execute();
    }

    public function updateAdmin($id, $name, $email) {
        $stmt = $this->conn->prepare("UPDATE users SET name = ?, email = ? WHERE id = ? AND role='admin'");
        $stmt->bind_param("ssi", $name, $email, $id);
        return $stmt->execute();
    }

    public function deleteAdmin($id) {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id = ? AND role='admin'");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>

    