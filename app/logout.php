    <?php
    require_once 'classes/Auth.php';
    Auth::logout(); 
    header('Location: login.php'); // Redirect to login page after logout
    exit();