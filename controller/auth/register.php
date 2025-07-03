<?php
include '../../config/db.php';

if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = 'user';

    // Format tanggal daftar seperti "12 Januari 2024" secara manual
    $bulanIndo = [
        '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
        '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
        '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
    ];

    $tanggal = new DateTime(); // sekarang
    $tgl = $tanggal->format('d');
    $bln = $tanggal->format('m');
    $thn = $tanggal->format('Y');
    $tgl_daftar = "$tgl " . $bulanIndo[$bln] . " $thn";

    // Cek apakah email sudah digunakan
    $check = $conn->query("SELECT * FROM auth WHERE email = '$email'");
    if ($check->num_rows > 0) {
        echo "<script>
                alert('Email sudah terdaftar. Silakan gunakan email lain.');
                window.location.href = '../../public/register.php';
            </script>";
    
    } else {
        $sql = $conn->query("INSERT INTO auth (name, email, telp, password, role, tgl_daftar) VALUES ('$nama', '$email', '$phone', '$password', '$role', '$tgl_daftar')");
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