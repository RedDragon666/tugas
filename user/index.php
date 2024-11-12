<?php
session_start();

// Cek apakah pengguna sudah login, jika ya langsung ke dashboard
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="card">
        <img src="logo.jpeg" alt="Logo" class="logo-image" />
        <h2 class="text-center">LOGIN</h2>
        
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger">
                Invalid name or password. Please try again.
            </div>
        <?php endif; ?>
        
        <form action="login_handler.php" method="post">
            <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Nama" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary">LOGIN</button>
        </form>
        
        <p class="mt-3 text-center">
            Don't have an account? <a href="register.php">Register here</a>
        </p>

        <div class="mt-3">
        <a href="google_login.php" class="btn btn-light btn-block">
          <img
            src="https://developers.google.com/identity/images/g-logo.png"
            width="20px"
            alt="Google logo" />
          Sign in with Google
        </a>
      </div>
    </div>
</body>
</html>
