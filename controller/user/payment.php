<?php
session_start();
include '../../config/db.php'; // Ubah sesuai path file koneksi Anda

if (isset($_POST['bayar'])) {
    $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];
    $id_reservasi = $_POST['id_reservasi'];
    $bulan = $_POST['bulan'];
    $jumlah = $_POST['jumlah'];
    $jatuh_tempo = $_POST['jatuh_tempo'];
    $metode = $_POST['metode'];

    // Handle upload bukti pembayaran
    $bukti_name = $_FILES['bukti']['name'];
    $bukti_tmp = $_FILES['bukti']['tmp_name'];
    $upload_dir = "../../temp/";
    $bukti_path = $upload_dir . time() . '_' . basename($bukti_name);

    if (move_uploaded_file($bukti_tmp, $bukti_path)) {
        // Simpan ke database
        $stmt = $conn->prepare("INSERT INTO payment (id_user, id_reservasi, nama, bulan, jatuh_tempo, metode,harga, images) 
                                VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bind_param("iissssss", $id_user,$id_reservasi, $nama,  $bulan, $jatuh_tempo, $metode, $jumlah, $bukti_path);

        if ($stmt->execute()) {
            echo "<script>alert('Pembayaran berhasil dikirim. Tunggu verifikasi admin.'); window.location.href='../../user/tagihan';</script>";
        } else {
            // echo "<script>alert('Gagal menyimpan pembayaran.'); history.back();</script>";
        }
    } else {
        echo "<script>alert('Upload bukti gagal.'); </script>";
    }
}
?>