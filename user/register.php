<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="card">
    <img src="logo.jpeg" alt="Logo" class="logo-image" />
        <h2 class="text-center">Register</h2>
        
        <?php if (isset($_GET['error'])): ?>
            <p class="text-danger text-center">Registration failed. Please try again.</p>
        <?php endif; ?>
        
        <form action="register_handler.php" method="post">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Nama" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        
        <p class="mt-3 text-center">
            Already have an account? <a href="index.php">Login here</a>
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
