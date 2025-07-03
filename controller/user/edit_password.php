<?php
session_start();
include '../../config/db.php';

// Pastikan user sudah login
if (!isset($_SESSION['user'])) {
    echo "<script>
        alert('Silakan login terlebih dahulu.');
        window.location.href = '../../public/login.php';
    </script>";
    exit;
}

$id = $_SESSION['user']['id'];
$password_lama = $_POST['password_lama'];
$password_baru = $_POST['password_baru'];
$konfirmasi_password = $_POST['konfirmasi_password'];

// Ambil password lama dari database
$cek = $conn->query("SELECT password FROM auth WHERE id = '$id'");
$data = $cek->fetch_assoc();

if (!password_verify($password_lama, $data['password'])) {
    echo "<script>
        alert('Password lama salah.');
        window.location.href = '../../user/pengaturan/edit-password.php';
    </script>";
    exit;
}

// Cek apakah password baru dan konfirmasi cocok
if ($password_baru !== $konfirmasi_password) {
    echo "<script>
        alert('Konfirmasi password tidak cocok.');
        window.location.href = '../../user/pengaturan/edit-password.php';
    </script>";
    exit;
}

// Hash password baru dan update ke database
$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

$update = $conn->query("UPDATE auth SET password = '$password_hash' WHERE id = '$id'");

if ($update) {
    echo "<script>
        alert('Password berhasil diperbarui.');
        window.location.href = '../../user/pengaturan/';
    </script>";
} else {
    echo "<script>
        alert('Terjadi kesalahan saat menyimpan password.');
        window.location.href = '../../user/pengaturan/edit-password.php';
    </script>";
}
?>