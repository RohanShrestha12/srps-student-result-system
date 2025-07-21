<?php
require_once __DIR__ . '/../../classes/DB.php';
require_once __DIR__ . '/../../classes/Auth.php';
require_once __DIR__ . '/../../classes/StudentController.php';


Auth::requireLogin();

$controller = new StudentController();
$students = $controller->getStudents();

$content = __DIR__ . '/../views/students_view.php'; 
$activePage = 'manage_students';

include __DIR__ . '/../layout.php';
