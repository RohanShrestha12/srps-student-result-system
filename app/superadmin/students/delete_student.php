<?php 
require_once __DIR__ . '/../../classes/DB.php';
require_once __DIR__ . '/../../classes/StudentController.php';
require_once __DIR__ . '/../../classes/Auth.php';
ob_start();

Auth::requireLogin();

$studentController = new StudentController();
$errors = [];

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if ($studentController->deleteStudent($id)) {
        $_SESSION['student_success'] = 'Student deleted successfully!';
        header("Location: manage_students.php");
        exit;
    } else {
        $_SESSION['student_errors'] = 'Failed to delete student';
        header("Location: manage_students.php");
        exit;
    }
} else {
    header("Location: manage_students.php?error=Invalid student ID");
}
