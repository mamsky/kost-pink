<?php
include '../../config/db.php';

if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = 'user';

    // Cek apakah email sudah digunakan
    $check = $conn->query("SELECT * FROM auth WHERE email = '$email'");
    if ($check->num_rows > 0) {
        echo "<script>
                alert('Email sudah terdaftar. Silakan gunakan email lain.');
                window.location.href = '../../public/register.php';
            </script>";
    
    } else {
        $sql = $conn->query("INSERT INTO auth (name, email, telp, password, role) VALUES ('$nama', '$email', '$phone', '$password', '$role')");
        if ($sql) {
            echo "<script>
                alert('Pendaftaran berhasil! Silakan Login');
                window.location.href = '../../public/login.php';
            </script>";
        } else {
             echo "<script>
                alert('Terjadi kesalahan. Coba lagi.');
                window.location.href = '../../public/register.php';
            </script>";
        }
    }
}
?>