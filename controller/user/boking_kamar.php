<?php
session_start();
include '../../config/db.php';

if (!isset($_SESSION['user'])) {
    echo "<script>
        alert('Silakan login terlebih dahulu.');
        window.location.href = '../../public/login.php';
    </script>";
    exit;
}

// Ambil data dari form
$id_user = $_SESSION['user']['id'];
$id_kamar = isset($_POST['id_kamar']) ? (int)$_POST['id_kamar'] : 0;
$tgl_masuk = $_POST['tgl_masuk'] ?? null;
$status = 'Menunggu';

// Validasi input
if (!$id_kamar || !$tgl_masuk) {
    echo "<script>
        alert('Data booking tidak lengkap.');
        window.history.back();
    </script>";
    exit;
}

// Ambil data kamar
$kamar = $conn->query("SELECT * FROM kamar WHERE id = '$id_kamar'")->fetch_assoc();
if (!$kamar) {
    echo "<script>
        alert('Kamar tidak ditemukan.');
        window.history.back();
    </script>";
    exit;
}

// Format harga dan tanggal masuk
$harga = number_format($kamar['harga'], 0, ',', '.');

function bulanIndo($bulan) {
    $nama_bulan = [
        1 => 'Januari', 2 => 'Februari', 3 => 'Maret',
        4 => 'April', 5 => 'Mei', 6 => 'Juni',
        7 => 'Juli', 8 => 'Agustus', 9 => 'September',
        10 => 'Oktober', 11 => 'November', 12 => 'Desember'
    ];
    return $nama_bulan[(int)$bulan];
}

$tglFormatted = date('d', strtotime($tgl_masuk)) . ' ' . bulanIndo(date('n', strtotime($tgl_masuk))) . ' ' . date('Y', strtotime($tgl_masuk));

// Simpan ke tabel reservasi
$sql = $conn->query("INSERT INTO reservasi (id_user, id_kamar, status, tgl_masuk) 
                     VALUES ('$id_user', '$id_kamar', '$status', '$tgl_masuk')");


if ($sql) {
      echo "<script>
        alert('Booking berhasil! Anda akan diarahkan ke WhatsApp.');
        window.location.href = '$link_wa';
    </script>";

} else {
    echo "<script>
        alert('Terjadi kesalahan saat booking.');
        window.history.back();
    </script>";
}
?>