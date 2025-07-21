<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../../classes/DB.php';
require_once __DIR__ . '/../../classes/ExamController.php';

$controller = new ExamController();
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $type = trim($_POST['type'] ?? '');
    $academic_year = trim($_POST['academic_year'] ?? '');
    $exam_date = trim($_POST['exam_date'] ?? '');
    $class = trim($_POST['class'] ?? '');
    

    if (empty($name)) $errors[] = 'Name is required.';
    if (empty($type)) $errors[] = 'Type is required.';
    if (empty($academic_year)) $errors[] = 'Academic year is required.';
    if (empty($exam_date)) $errors[] = 'Exam date is required.';
    if (empty($class)) $errors[] = 'Class is required.';
   
   

    $_SESSION['formData'] = [
        'name' => $name,
        'type' => $type,
        'academic_year' => $academic_year,
        'exam_date' => $exam_date,
        'class' => $class,
    ];

    if (empty($errors)) {
        if ($controller->addExam($name, $type, $academic_year, $exam_date, $class)) {
            $_SESSION['form_success'] = 'Exam added successfully!';
            unset($_SESSION['formData']);
        } else {
            $errors[] = 'Failed to add exam. Please try again.';
        }
    }

    if (!empty($errors)) {
        $_SESSION['form_errors'] = $errors;
    }
}

header('Location: /srps/app/superadmin/exams/manage_exams.php');
exit;