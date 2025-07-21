<?php
session_start();
?>
<!-- Bootstrap 5 CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Animate.css CDN for animations -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link rel="stylesheet" href="assets/css/style.css">



<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="card login-card p-5<?php if (empty($_SESSION['error'])) echo ' animate__animated animate__fadeInDown'; ?>" style="width: 500px; max-width: 98vw;">
    <div class="login-icon">
      <i class="bi bi-person-circle"></i>
      <!-- If you don't use Bootstrap Icons, you can use an emoji: -->
      <!-- <span>🔐</span> -->
    </div>
    <h3 class="text-center mb-4 login-title text-primary<?php if (empty($_SESSION['error'])) echo ' animate__animated animate__fadeIn'; ?>">Login</h3>
    <?php if (!empty($_SESSION['error'])): ?>
      <div class="alert alert-danger text-center mb-3 animate__animated animate__shakeX" style="border-radius:0;">
        <?= htmlspecialchars($_SESSION['error']) ?>
      </div>
      <?php unset($_SESSION['error']); ?>
    <?php endif; ?>
    <form method="POST" action="login_process.php"<?php if (empty($_SESSION['error'])) echo ' class="animate__animated animate__fadeInUp"'; ?>>
      <div class="mb-4">
        <label for="username" class="form-label fw-semibold">Username</label>
        <input type="text" class="form-control form-control-lg shadow-sm" id="username" name="username" required autofocus autocomplete="username" style="height: 52px;">
      </div>
      <div class="mb-4">
        <label for="password" class="form-label fw-semibold">Password</label>
        <input type="password" class="form-control form-control-lg shadow-sm" id="password" name="password" required autocomplete="current-password" style="height: 52px;">
      </div>
      <div class="mt-4 d-flex justify-content-center">
        <button 
          type="submit" 
          name="login" 
          class="btn btn-primary w-100 fw-bold btn-login-animated animate__animated<?php 
            if (empty($_SESSION['error'])) { 
              echo ' animate__pulse animate__infinite animate__slower'; 
            }
          ?>" 
          style="font-size: 1.2rem; padding: 0.75rem 0;">
          <span class="animate__animated<?php if (empty($_SESSION['error'])) echo ' animate__heartBeat animate__infinite animate__slower'; ?>">
            🔒 Login
          </span>
        </button>
      </div>
    </form>
  </div>
</div>