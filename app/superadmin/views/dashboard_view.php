
<h1 class="text-4xl font-bold mb-6 text-blue-800">Welcome, Super Admin</h1>
<div class="row g-4 mb-6">
  <div class="col-md-3">
    <div class="bg-white p-5 rounded shadow text-center border-t-4 border-blue-600">
      <h2 class="text-lg font-semibold mb-2">Total Students</h2>
      <p class="text-4xl text-blue-600 font-bold"><?php echo $controller->getTotalStudents(); ?></p>
    </div>
  </div>
  <div class="col-md-3">
    <div class="bg-white p-5 rounded shadow text-center border-t-4 border-green-600">
      <h2 class="text-lg font-semibold mb-2">Exams Held</h2>
      <p class="text-4xl text-green-600 font-bold"><?php echo $exams->getTotalExams(); ?></p>
    </div>
  </div>
  <div class="col-md-3">
    <div class="bg-white p-5 rounded shadow text-center border-t-4 border-purple-600">
      <h2 class="text-lg font-semibold mb-2">Predictions Done</h2>
      <p class="text-4xl text-purple-600 font-bold">0</p>
    </div>
  </div>
  <div class="col-md-3">
    <div class="bg-white p-5 rounded shadow text-center border-t-4 border-yellow-500">
      <h2 class="text-lg font-semibold mb-2">Admins</h2>
      <p class="text-4xl text-yellow-600 font-bold"><?php echo $adminController->getTotalAdmins(); ?></p>
    </div>
  </div>
</div>
<div class="bg-white rounded shadow p-6">
  <h3 class="text-2xl font-semibold mb-4 text-gray-700">Quick Actions</h3>
  <div class="flex flex-wrap gap-4">
    <button class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700">Add Student</button>
    <button class="bg-green-600 text-white px-6 py-3 rounded hover:bg-green-700">Add Exam</button>
    <button class="bg-purple-600 text-white px-6 py-3 rounded hover:bg-purple-700">Predict Performance</button>
    <button class="bg-yellow-500 text-white px-6 py-3 rounded hover:bg-yellow-600">Manage Users</button>
  </div>
</div>
