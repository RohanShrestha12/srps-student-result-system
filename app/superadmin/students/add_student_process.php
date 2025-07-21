<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../../classes/DB.php';
require_once __DIR__ . '/../../classes/StudentController.php';

$controller = new StudentController();
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $roll_no = trim($_POST['roll_no'] ?? '');
    $class = trim($_POST['class'] ?? '');
    $batch = trim($_POST['batch'] ?? '');
    $department = trim($_POST['department'] ?? '');
    $gender = trim($_POST['gender'] ?? '');

    if (empty($name)) $errors[] = 'Name is required.';
    if (empty($roll_no)) $errors[] = 'Roll number is required.';
    if (empty($class)) $errors[] = 'Class is required.';
    if (empty($batch)) $errors[] = 'Batch is required.';
    if (empty($department)) $errors[] = 'Department is required.';
    if (empty($gender)) $errors[] = 'Gender is required.';

    $_SESSION['formData'] = [
        'name' => $name,
        'roll_no' => $roll_no,
        'class' => $class,
        'batch' => $batch,
        'department' => $department,
        'gender' => $gender,
    ];

    if (empty($errors)) {
        if ($controller->addStudent($name, $roll_no, $class, $batch, $department, $gender)) {
            $_SESSION['form_success'] = 'Student added successfully!';
            unset($_SESSION['formData']);
        } else {
            $errors[] = 'Failed to add student. Please try again.';
        }
    }

    if (!empty($errors)) {
        $_SESSION['form_errors'] = $errors;
    }
}

header('Location: /srps/app/superadmin/students/manage_students.php');
exit;