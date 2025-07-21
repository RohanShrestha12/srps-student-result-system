<div class="max-w-7xl mx-auto p-6 space-y-8">

  <!-- Add Exam Form (full width) -->
  <div class="bg-white p-6 rounded shadow max-w-full">
    <h2 class="text-xl font-semibold mb-6">Add New Exam</h2>
    <!-- Success Message for Add Form -->
<?php if (isset($_SESSION['form_success'])): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
        <?= htmlspecialchars($_SESSION['form_success']) ?>
    </div>
    <?php unset($_SESSION['form_success']); ?>
<?php endif; ?>

<!-- Error Messages for Add Form -->
<?php if (isset($_SESSION['form_errors']) && count($_SESSION['form_errors']) > 0): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6" role="alert">
        <ul class="list-disc list-inside">
            <?php foreach ($_SESSION['form_errors'] as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php unset($_SESSION['form_errors']); ?>
<?php endif; ?>

    <form method="POST" action="add_exam_process.php" class="grid grid-cols-2 gap-6">

      <div>
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Exam Name</label>
        <input type="text" name="name" id="name" required
               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
               value="<?= htmlspecialchars($_SESSION['formData']['name'] ?? '') ?>">
      </div>

      <div>
        <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type</label>
        <?php $currentType = $exam['type'] ?? ''; ?>
<select name="type" required class="w-full border p-2 rounded">
    <option value="terminal" <?= $currentType === 'terminal' ? 'selected' : '' ?>>Terminal</option>
    <option value="test" <?= $currentType === 'test' ? 'selected' : '' ?>>Test</option>
</select>

      </div>

      <div>
        <label for="academic_year" class="block text-sm font-medium text-gray-700 mb-1">Academic Year</label>
        <input type="text" name="academic_year" id="academic_year" required
               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
               value="<?= htmlspecialchars($_SESSION['formData']['academic_year'] ?? '') ?>">
      </div>

      <div>
        <label for="exam_date" class="block text-sm font-medium text-gray-700 mb-1">Exam Date</label>
        <input type="date" name="exam_date" id="exam_date" required
               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
               value="<?= htmlspecialchars($_SESSION['formData']['exam_date'] ?? '') ?>">
      </div>

      <div>
        <label for="class" class="block text-sm font-medium text-gray-700 mb-1">Class</label>
          <?php $currentClass = $exam['class'] ?? ''; ?>
<select name="class" required class="w-full border p-2 rounded">
    <option value="11" <?= $currentType === '11' ? 'selected' : '' ?>>11</option>
    <option value="12" <?= $currentType === '12' ? 'selected' : '' ?>>12</option>
</select>
      </div>

      <div class="flex items-end">
        <button type="submit"
                class="w-full bg-blue-600 text-white rounded px-4 py-2 hover:bg-blue-700 transition">
          Add Exam
        </button>
      </div>

    </form>
  </div>

  <!-- Exams List (full width below form) -->
  <div class="bg-white p-6 rounded shadow max-w-full overflow-x-auto">
    <h2 class="text-xl font-semibold mb-6">Exams List</h2>
    <!-- Success Message for Manage Exams -->
<?php if (isset($_SESSION['exam_success'])): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
        <?= htmlspecialchars($_SESSION['exam_success']) ?>
    </div>
    <?php unset($_SESSION['exam_success']); ?>
<?php endif; ?>

<!-- Error Messages for Manage Exams -->
<?php if (isset($_SESSION['exam_errors']) && count($_SESSION['exam_errors']) > 0): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6" role="alert">
        <ul class="list-disc list-inside">
            <?php foreach ($_SESSION['exam_errors'] as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php unset($_SESSION['exam_errors']); ?>
<?php endif; ?>

    <table class="min-w-full table-auto border-collapse border border-gray-300">
      <thead>
        <tr class="bg-gray-100">
          <th class="border border-gray-300 px-4 py-2">ID</th>
          <th class="border border-gray-300 px-4 py-2">Name</th>
          <th class="border border-gray-300 px-4 py-2">Type</th>
          <th class="border border-gray-300 px-4 py-2">Academic Year</th>
          <th class="border border-gray-300 px-4 py-2">Exam Date</th>
          <th class="border border-gray-300 px-4 py-2">Class</th>
          <th class="border border-gray-300 px-4 py-2">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($result as $exam): ?>
          <tr>
            <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($exam['id']) ?></td>
            <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($exam['name']) ?></td>
            <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars(ucfirst($exam['type'])) ?></td>
            <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($exam['academic_year']) ?></td>
            <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($exam['exam_date']) ?></td>
            <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($exam['class']) ?></td>
            <td>
            <a href="/srps/app/superadmin/exams/edit_exam.php?id=<?= htmlspecialchars($exam['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
            <a href="/srps/app/superadmin/exams/delete_exam.php?id=<?= htmlspecialchars($exam['id']) ?>" onclick="return confirm('Are you sure you want to delete this exam?');" class="btn btn-sm btn-danger">Delete</a>
          </td>
          </tr>
        <?php endforeach; ?>
        <?php if (empty($exam)): ?>
          <tr>
            <td colspan="7" class="text-center p-4 text-gray-500">No exams found.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

</div>
