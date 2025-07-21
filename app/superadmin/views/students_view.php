
<div class="max-w-4xl mx-auto bg-white rounded-xl shadow-md mt-0 p-3 space-y-6">
    <h2 class="text-3xl font-semibold mb-3 text-center text-gray-800">Add New Student</h2>

    <!-- Success Message -->
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

    <!-- Form -->
    <form method="POST" action="/srps/app/superadmin/students/add_student_process.php" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" required
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                value="<?= isset($_SESSION['formData']['name']) ? htmlspecialchars($_SESSION['formData']['name']) : '' ?>">
        </div>
        <div>
            <label for="roll_no" class="block text-sm font-medium text-gray-700">Roll Number</label>
            <input type="text" name="roll_no" id="roll_no" required
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                value="<?= isset($_SESSION['formData']['roll_no']) ? htmlspecialchars($_SESSION['formData']['roll_no']) : '' ?>">
        </div>
        <div>
            <label for="class" class="block text-sm font-medium text-gray-700">Class</label>
            <select name="class" id="class" required
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="">Select Class</option>
                <option value="11" <?= (isset($_SESSION['formData']['class']) && $_SESSION['formData']['class'] === '11') ? 'selected' : '' ?>>11</option>
                <option value="12" <?= (isset($_SESSION['formData']['class']) && $_SESSION['formData']['class'] === '12') ? 'selected' : '' ?>>12</option>
            </select>
        </div>
        <div>
            <label for="batch" class="block text-sm font-medium text-gray-700">Batch</label>
            <input type="text" name="batch" id="batch" required
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                value="<?= isset($_SESSION['formData']['batch']) ? htmlspecialchars($_SESSION['formData']['batch']) : '' ?>">
        </div>
        <div>
            <label for="department_id" class="block text-sm font-medium text-gray-700">Department</label>
            <select name="department_id" id="department_id" required
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="">Select Department</option>
                <?php
                // Fetch departments from the database
                $departments = $controller->getDepartments();
                while ($row = $departments->fetch_assoc()): ?>
                    <option value="<?= htmlspecialchars($row['id']) ?>" <?= (isset($_SESSION['formData']['department_id']) && $_SESSION['formData']['department_id'] == $row['id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($row['name']) ?>
                    </option>
                <?php endwhile; ?>
                    
            </select>
        </div>
         

        <div>
            <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
            <select name="gender" id="gender" required
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="">Select Gender</option>
                <option value="Male" <?= (isset($_SESSION['formData']['gender']) && $_SESSION['formData']['gender'] === 'Male') ? 'selected' : '' ?>>Male</option>
                <option value="Female" <?= (isset($_SESSION['formData']['gender']) && $_SESSION['formData']['gender'] === 'Female') ? 'selected' : '' ?>>Female</option>
                <option value="Other" <?= (isset($_SESSION['formData']['gender']) && $_SESSION['formData']['gender'] === 'Other') ? 'selected' : '' ?>>Other</option>
            </select>
        </div>
        <div>
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" id="status"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="active" <?= (isset($_SESSION['formData']['status']) && $_SESSION['formData']['status'] === 'active') ? 'selected' : '' ?>>Active</option>
                <option value="inactive" <?= (isset($_SESSION['formData']['status']) && $_SESSION['formData']['status'] === 'inactive') ? 'selected' : '' ?>>Inactive</option>
            </select>
        </div>
        <div class="md:col-span-2 text-center">
            <button type="submit" class="inline-block w-full md:w-auto bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition duration-200">
                Add Student
            </button>
        </div>
    </form>
</div>



<!-- Student List Table -->
<div class="max-w-4xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-3 text-center">Manage Students</h2>
    <?php if (isset($_SESSION['student_success'])): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
        <?= htmlspecialchars($_SESSION['student_success']) ?>
    </div>
    <?php unset($_SESSION['student_success']); ?>
<?php endif; ?>

<!-- Error Messages for Manage Students -->
<?php if (isset($_SESSION['student_errors']) && count($_SESSION['student_errors']) > 0): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6" role="alert">
        <ul class="list-disc list-inside">
            <?php foreach ($_SESSION['student_errors'] as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php unset($_SESSION['student_errors']); ?>
<?php endif; ?>
    <?php if ($students && $students->num_rows > 0): ?>
        <table class="table table-bordered table-striped w-full">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Roll No</th>
                    <th>Class</th>
                    <th>Batch</th>
                    <th>Department</th>
                    <th>Gender</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $students->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['roll_no']) ?></td>
                        <td><?= htmlspecialchars($row['class']) ?></td>
                        <td><?= htmlspecialchars($row['batch']) ?></td>
                            <td><?= htmlspecialchars($row['department_name'] ?? 'Unknown') ?></td>
                        <td><?= htmlspecialchars($row['gender']) ?></td>
                        <td>
                            <a href="/srps/app/superadmin/students/edit_student.php?id=<?= htmlspecialchars($row['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="/srps/app/superadmin/students/delete_student.php?id=<?= htmlspecialchars($row['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this student?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center text-gray-600">No students found.</p>
    <?php endif; ?>
</div>

<?php unset($_SESSION['formData']); ?>