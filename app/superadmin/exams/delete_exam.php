<?php 
require_once __DIR__ . '/../../classes/DB.php';
require_once __DIR__ . '/../../classes/ExamController.php';
require_once __DIR__ . '/../../classes/Auth.php';
ob_start();

Auth::requireLogin();

$examController = new ExamController();
$errors = [];

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if ($examController->deleteExam($id)) {
        $_SESSION['exam_success'] = 'Exam deleted successfully!';
        header("Location: manage_exams.php");
        exit;
    } else {
        $_SESSION['exam_errors'] = 'Failed to delete exam';
        header("Location: manage_exams.php");
        exit;
    }
} else {
    header("Location: manage_exams.php?error=Invalid exam ID");
}
