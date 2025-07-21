
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md flex flex-col">
            <div class="p-6 text-center font-bold text-2xl border-b text-blue-700">Super Admin</div>
            <nav class="p-4 flex-1 space-y-2">
                <a href="#" class="block py-2 px-4 rounded hover:bg-blue-100 font-semibold text-blue-700">Dashboard</a>
                <a href="#" class="block py-2 px-4 rounded hover:bg-blue-100">Manage Students</a>
                <a href="#" class="block py-2 px-4 rounded hover:bg-blue-100">Manage Exams</a>
                <a href="#" class="block py-2 px-4 rounded hover:bg-blue-100">Enter Results</a>
                <a href="#" class="block py-2 px-4 rounded hover:bg-blue-100">Predict Performance</a>
                <a href="#" class="block py-2 px-4 rounded hover:bg-blue-100">User Management</a>
                <a href="#" class="block py-2 px-4 rounded hover:bg-blue-100">Settings</a>
            </nav>
            <div class="p-4 border-t">
                <button class="w-full py-2 px-4 bg-red-100 text-red-600 rounded hover:bg-red-200">Logout</button>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <div class="container mx-auto">
                <h1 class="text-4xl font-bold mb-6 text-blue-800">Welcome, Super Admin</h1>
                <div class="row g-4 mb-6">
                    <div class="col-md-3">
                        <div class="bg-white p-5 rounded shadow text-center border-t-4 border-blue-600">
                            <h2 class="text-lg font-semibold mb-2">Total Students</h2>
                            <p class="text-4xl text-blue-600 font-bold">128</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="bg-white p-5 rounded shadow text-center border-t-4 border-green-600">
                            <h2 class="text-lg font-semibold mb-2">Exams Held</h2>
                            <p class="text-4xl text-green-600 font-bold">12</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="bg-white p-5 rounded shadow text-center border-t-4 border-purple-600">
                            <h2 class="text-lg font-semibold mb-2">Predictions Done</h2>
                            <p class="text-4xl text-purple-600 font-bold">45</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="bg-white p-5 rounded shadow text-center border-t-4 border-yellow-500">
                            <h2 class="text-lg font-semibold mb-2">Admins</h2>
                            <p class="text-4xl text-yellow-600 font-bold">3</p>
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
            </div>
        </main>
    </div>
</body>
</html>