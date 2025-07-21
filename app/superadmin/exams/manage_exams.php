<?php
require_once __DIR__ . '/../../classes/DB.php';
require_once __DIR__ . '/../../classes/Auth.php';
require_once __DIR__ . '/../../classes/ExamController.php';


Auth::requireLogin();

$controller = new ExamController();
$result = $controller->getAllExams();  
$exam=$result->fetch_assoc();  

$content = 'views/exam_view.php';
$activePage = 'manage_exams';

include __DIR__ . '/../layout.php';