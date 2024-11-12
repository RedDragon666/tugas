<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Query untuk mencari pengguna berdasarkan nama
    $stmt = $pdo->prepare("SELECT * FROM users WHERE name = :name");
    $stmt->execute(['name' => $name]);
    $user = $stmt->fetch();

    // Memeriksa apakah pengguna ada dan verifikasi password
    if ($user && password_verify($password, $user['password'])) {
        // Password benar, set variabel session
        $_SESSION['logged_in'] = true;
        $_SESSION['name'] = $user['name']; // Simpan name di session
        header("Location: dashboard.php"); // Redirect ke dashboard
        exit();
    } else {
        // Autentikasi gagal, kembali ke login dengan error
        header("Location: index.php?error=1");
        exit();
    }
}
?>
