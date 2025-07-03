<?php
session_start();
include '../../config/db.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = $conn->query("SELECT * FROM auth WHERE email = '$email'");

    if ($check->num_rows === 1) {
        $user = $check->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'nama' => $user['name'],
                'email' => $user['email'],
                'role' => $user['role']
            ];

            // Redirect berdasarkan role
            if ($user['role'] === 'admin') {
                echo "<script>alert('Login berhasil!'); window.location.href = '../../admin';</script>";
            } else {
                echo "<script>alert('Login berhasil!'); window.location.href = '../../user';</script>";
            }
            exit;
        } else {
            echo "<script>
                alert('Password salah.');
                window.location.href = '../../public/login.php';
            </script>";
        }
    } else {
        echo "<script>
                alert('Email tidak ditemukan.');
                window.location.href = '../../public/login.php';
            </script>";
    }
}
?>