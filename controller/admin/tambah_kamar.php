<?php
// Koneksi ke database
include '../../config/db.php';


if(isset($_POST['tambah-kamar'])){
// Ambil data dari form
$nomor_kamar = $_POST['nomor_kamar'];
$tipe        = $_POST['tipe'];
$fasilitas   = $_POST['fasilitas'];
$harga       = $_POST['harga'];
$lantai      = $_POST['lantai'];
$status      = 'tersedia';

// Upload gambar jika ada
$gambar = '';
if (isset($_FILES['gambar'])) {
    $nama_file   = $_FILES['gambar']['name'];
    $tmp_file    = $_FILES['gambar']['tmp_name'];
    $folder_tujuan = "../../temp/"; // Sesuaikan dengan direktori penyimpanan gambar

    // Buat folder jika belum ada
    if (!file_exists($folder_tujuan)) {
        mkdir($folder_tujuan, 0777, true);
    }

    $gambar = time() . '_' . basename($nama_file);
    $target_file = $folder_tujuan . $gambar;

        if (!move_uploaded_file($tmp_file, $target_file)) {
            die("Gagal mengupload gambar.");
        }
    }

    // Query insert
    $sql = "INSERT INTO kamar (no_kamar, tipe, fasilitas, harga, lantai, foto, status) VALUES ('$nomor_kamar', '$tipe', '$fasilitas', '$harga', '$lantai', '$gambar','$status')";

    $tambah = $conn->query($sql);

    if ($tambah) {
        echo "<script>alert('Data kamar berhasil disimpan'); window.location.href = '../../admin/kamar';</script>";
    } else {
        echo "<script>alert('Data kamar gagal disimpan'); window.location.href = '../../admin/kamar';</script>";
    }

}




?>