<?php
if (!isset($content) || empty($content)) {
    die("Content file not specified!");
}

$username = $_SESSION['username'];

ob_start();
include $content;
$mainContent = ob_get_clean();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Super Admin Dashboard</title>

  <!-- Bootstrap CSS (for optional components like buttons) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Header -->
  <?php include 'components/header.php'; ?>

  <div class="min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md">
      <?php include 'components/sidebar.php'; ?>
    </aside>

    <!-- Main content -->
    <main class="flex-1 p-6 bg-gray-50">
      <div class="bg-white p-6 rounded-xl shadow-sm">
        <?= $mainContent ?>
      </div>
    </main>f
  </div>

  <!-- Footer -->
  <?php include 'components/footer.php'; ?>
</body>
</html>
