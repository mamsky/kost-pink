<?php
// Koneksi ke database
include '../../config/db.php';

if(isset($_POST['edit-kamar'])) {
    // Ambil data dari form
    $id          = $_POST['id'];
    $nomor_kamar = $_POST['nomor_kamar'];
    $tipe        = $_POST['tipe'];
    $fasilitas   = $_POST['fasilitas'];
    $harga       = $_POST['harga'];
    $lantai      = $_POST['lantai'];
    $status      = $_POST['status'];

    // Ambil gambar lama dari database
    $getData = $conn->query("SELECT foto FROM kamar WHERE id = '$id'");
    $getImages = $getData->fetch_assoc();
    $gambar_lama = $getImages['foto'];

    $gambar = '';
    // Cek apakah ada file gambar baru yang diupload
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $nama_file   = $_FILES['gambar']['name'];
        $tmp_file    = $_FILES['gambar']['tmp_name'];
        $folder_tujuan = "../../temp/"; // Sesuaikan dengan direktori penyimpanan gambar

        // Buat folder jika belum ada
        if (!file_exists($folder_tujuan)) {
            mkdir($folder_tujuan, 0777, true);
        }

        // Generate nama file baru
        $gambar_baru = time() . '_' . basename($nama_file);
        $target_file = $folder_tujuan . $gambar_baru;

        // Pindahkan file upload ke folder tujuan
        if (move_uploaded_file($tmp_file, $target_file)) {
            $gambar = $gambar_baru;
        } else {
            die("Gagal mengupload gambar.");
        }
    } else {
        // Jika tidak ada gambar baru, gunakan gambar lama
        $gambar = $gambar_lama;
    }

    // Query update data kamar
    $sql = "UPDATE kamar SET 
                no_kamar='$nomor_kamar', 
                tipe='$tipe', 
                fasilitas='$fasilitas', 
                harga='$harga', 
                lantai='$lantai', 
                foto='$gambar',
                status='$status'
            WHERE id = $id";

    $edit = $conn->query($sql);

    if ($edit) {
        echo "<script>alert('Data kamar berhasil di edit'); window.location.href = '../../admin/kamar';</script>";
    } else {
        echo "<script>alert('Data kamar gagal di edit'); window.location.href = '../../admin/kamar';</script>";
    }
}
?>