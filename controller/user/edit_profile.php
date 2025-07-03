<?php
session_start();
include '../../config/db.php';

// Cek apakah user sudah login
if (!isset($_SESSION['user'])) {
    echo "<script>
        alert('Silakan login terlebih dahulu.');
        window.location.href = '../../public/login.php';
    </script>";
    exit;
}

$id    = $_SESSION['user']['id'];
$nama  = $_POST['nama'];
$email = $_POST['email'];
$telp  = $_POST['no_hp'];

// Update data ke database
$sql = $conn->query("UPDATE auth SET name = '$nama', email = '$email', telp = '$telp' WHERE id = '$id'");

if ($sql) {
    // Update data session
    $_SESSION['user']['nama'] = $nama;
    $_SESSION['user']['email'] = $email;
    $_SESSION['user']['telp'] = $telp;

    echo "<script>
        alert('Profil berhasil diperbarui.');
        window.location.href = '../../user/pengaturan';
    </script>";
} else {
    echo "<script>
        alert('Terjadi kesalahan saat memperbarui profil.');
        window.location.href = '../../user/pengaturan';
    </script>";
}
?>