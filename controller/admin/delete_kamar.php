<?php
// Koneksi ke database
include '../../config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil nama file gambar yang akan dihapus
    $query = $conn->query("SELECT foto FROM kamar WHERE id = '$id'");
    $data = $query->fetch_assoc();
    $gambar = $data['foto'];

    // Hapus gambar dari folder jika ada
    $path_gambar = "../../temp/" . $gambar;
    if (file_exists($path_gambar) && !empty($gambar)) {
        unlink($path_gambar); // Hapus file gambar
    }

    // Hapus data dari database
    $delete = $conn->query("DELETE FROM kamar WHERE id = '$id'");

    if ($delete) {
        echo "<script>alert('Data kamar berhasil dihapus'); window.location.href='../../admin/kamar';</script>";
    } else {
        echo "<script>alert('Data kamar gagal dihapus'); window.location.href='../../admin/kamar';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location.href='../../admin/kamar';</script>";
}
?>