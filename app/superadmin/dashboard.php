<?php
require_once __DIR__ . '/../classes/Auth.php';
require_once __DIR__ . '/../classes/DB.php';
require_once __DIR__ . '/../classes/StudentController.php';

Auth::requireLogin();

// For example, if you want to fetch dashboard stats dynamically, do it here
// $studentController = new StudentController();
// $stats = ... (get stats from DB)

// Set content file path
$content = __DIR__ . '/views/dashboard_view.php'; // Adjust path as needed

// Optional: Pass active page to highlight sidebar
$activePage = 'dashboard';

include __DIR__ . '/layout.php';

