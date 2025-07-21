<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?? 'Dashboard' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
  <?php include __DIR__ . '/components/header.php'; ?>
  
  <main class="p-6">
    <?php include $view; ?>
  </main>

  <?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
