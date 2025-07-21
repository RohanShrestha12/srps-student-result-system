<?php
$activePage = $activePage ?? '';
?>
<aside class="w-72 transition-all duration-300 bg-white shadow-md flex flex-col h-screen overflow-y-auto">

  <div class="p-6 text-center border-b">
    <h2 class="text-xl font-bold text-blue-700">Admin Panel</h2>
  </div>

  <nav class="p-4 flex flex-col space-y-2">
    <a href="/srps/app/superadmin/dashboard.php" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-blue-100 font-medium text-gray-800 <?= $activePage === 'dashboard' ? 'bg-blue-100 font-semibold text-blue-700' : '' ?>">
      📊 Dashboard
    </a>
    <a href="/srps/app/superadmin/students/manage_students.php" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-blue-100 text-gray-800 <?= $activePage === 'manage_students' ? 'bg-blue-100 font-semibold text-blue-700' : '' ?>">
      🎓 Manage Students
    </a>
    <a href="/srps/app/superadmin/exams/manage_exams.php" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-blue-100 text-gray-800 <?= $activePage === 'manage_exams' ? 'bg-blue-100 font-semibold text-blue-700' : '' ?>">
      📝 Manage Exams
    </a>
    <a href="/srps/app/superadmin/subjects/manage_subjects.php" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-blue-100 text-gray-800 <?= $activePage === 'manage_subjects' ? 'bg-blue-100 font-semibold text-blue-700' : '' ?>">
  📚 Manage Subjects
</a>

    <a href="enter_results.php" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-blue-100 text-gray-800 <?= $activePage === 'enter_results' ? 'bg-blue-100 font-semibold text-blue-700' : '' ?>">
      📥 Enter Results
    </a>
    <a href="predict_performance.php" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-blue-100 text-gray-800 <?= $activePage === 'predict_performance' ? 'bg-blue-100 font-semibold text-blue-700' : '' ?>">
      📈 Predict Performance
    </a>
    <a href="user_management.php" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-blue-100 text-gray-800 <?= $activePage === 'user_management' ? 'bg-blue-100 font-semibold text-blue-700' : '' ?>">
      👥 User Management
    </a>
    <a href="settings.php" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-blue-100 text-gray-800 <?= $activePage === 'settings' ? 'bg-blue-100 font-semibold text-blue-700' : '' ?>">
      ⚙️ Settings
    </a>
  </nav>

</aside>
