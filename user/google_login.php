<?php
require 'google_config.php';
require 'db.php';

if (isset($_GET['code'])) {
    // Authenticate with Google
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // Get user profile information
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();

    // Extract user info
    $email = $google_account_info->email;
    $name = $google_account_info->name;
    $google_id = $google_account_info->id;

    // Check if user exists in database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    if ($user) {
        // User exists, log them in
        $_SESSION['user_name'] = $user['name'];
        echo "Welcome back, " . htmlspecialchars($user['name']) . "!";
    } else {
        // New user, insert into database
        $stmt = $pdo->prepare("INSERT INTO users (name, email, google_id) VALUES (:name, :email, :google_id)");
        $stmt->execute(['name' => $name, 'email' => $email, 'google_id' => $google_id]);

        $_SESSION['user_name'] = $name;
        echo "Registration successful. Welcome, " . htmlspecialchars($name) . "!";
    }

    // Redirect to home or dashboard page
    header("Location: home.php");
    exit();
} else {
    // Redirect to Google for authentication
    $login_url = $client->createAuthUrl();
    header("Location: " . filter_var($login_url, FILTER_SANITIZE_URL));
}
?>
