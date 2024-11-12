<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if email is already registered
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    
    if ($stmt->rowCount() > 0) {
        // Email already exists
        header("Location: register.php?error=exists");
        exit();
    } else {
        // Save new user data
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        if ($stmt->execute(['name' => $name, 'email' => $email, 'password' => $hashedPassword])) {
            // Registration successful, redirect to login page
            header("Location: index.php?success=registered");
            exit();
        } else {
            // Registration failed
            header("Location: register.php?error=failed");
            exit();
        }
    }
}
?>