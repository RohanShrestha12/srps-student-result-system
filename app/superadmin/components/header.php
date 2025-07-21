<?php
// Ensure session is available and Auth class is included
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../../classes/Auth.php';

// Get the current user's data
$user = Auth::user();
$username = $user['username'] ?? 'Guest'; // Fallback to 'Guest' if username is not set
?>

<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-full mx-auto px-6 py-4 flex items-center justify-between">
        <h1 class="text-xl font-bold text-blue-800">Super Admin Dashboard</h1>
        <div class="flex items-center space-x-4">
            <span class="text-gray-600">Welcome, <?= htmlspecialchars($username) ?></span>
<a href="/srps/app/logout.php" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">Logout</a>        </div>
    </div>
</header>