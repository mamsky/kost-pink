<?php
session_start();
include '../../config/db.php';

if (isset($_POST['booking_kamar'])) {
    // Ambil data dari form dan session
    $id_user       = $_SESSION['user']['id'];
    $nama_user     = $_SESSION['user']['nama'];
    $email_user    = $_SESSION['user']['email'];
    $id_kamar      = $_POST['id_kamar'];
    $kamar         = $_POST['kamar'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $durasi        = $_POST['durasi'];
    $durasi_bayar  = $_POST['durasi_bayar'];
    $metode        = $_POST['metode'];
    $status        = 'Menunggu';

    // Validasi durasi bayar
    if ($durasi_bayar > $durasi) {
        echo "<script>
                alert('Durasi Bayar tidak boleh lebih besar daripada Durasi Sewa.');
                window.history.back();
              </script>";
        exit;
    }

    // Upload file bukti pembayaran
    $upload_dir     = "../../temp/pembayaran/";
    $bukti_name     = $_FILES['bukti']['name'];
    $bukti_tmp      = $_FILES['bukti']['tmp_name'];
    $change_name    = time() . '_Reservasi_' . basename($bukti_name);
    $bukti_path     = $upload_dir . $change_name;

    if (!move_uploaded_file($bukti_tmp, $bukti_path)) {
        echo "<script>
                alert('❌ Upload Image Gagal.');
                window.history.back();
              </script>";
        exit;
    }

    // Kirim email notifikasi
    $to      = 'pmaskr2417@gmail.com';
    $subject = 'Reservasi Kamar';
    $headers = "Content-type:text/html;charset=UTF-8\r\n";
    $headers .= "From: booking@kostpinkpontianak.com\r\n";

    $message = '
    <html>
    <head><title>Booking Baru - Kost Pink Pontianak</title></head>
    <body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px; color: #333;">
        <div style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); padding: 30px;">
            <h2 style="color: #d63384; border-bottom: 2px solid #d63384; padding-bottom: 10px;">📢 Booking Kamar Baru</h2>
            <p style="font-size: 16px;">Ada pemesanan kamar baru di <strong>Kost Pink Pontianak</strong>:</p>
            <table style="width: 100%; font-size: 15px; border-collapse: collapse;">
                <tr><td style="padding: 8px;"><strong>Nama</strong></td><td style="padding: 8px;">' . htmlspecialchars($nama_user) . '</td></tr>
                <tr style="background-color: #f2f2f2;"><td style="padding: 8px;"><strong>Email</strong></td><td style="padding: 8px;">' . htmlspecialchars($email_user) . '</td></tr>
                <tr><td style="padding: 8px;"><strong>Kamar</strong></td><td style="padding: 8px;">' . htmlspecialchars($kamar) . '</td></tr>
                <tr style="background-color: #f2f2f2;"><td style="padding: 8px;"><strong>Tanggal Mulai</strong></td><td style="padding: 8px;">' . htmlspecialchars($tanggal_mulai) . '</td></tr>
                <tr><td style="padding: 8px;"><strong>Durasi</strong></td><td style="padding: 8px;">' . $durasi . ' bulan</td></tr>
                <tr style="background-color: #f2f2f2;"><td style="padding: 8px;"><strong>Durasi Bayar</strong></td><td style="padding: 8px;">' . $durasi_bayar . ' bulan</td></tr>
                <tr><td style="padding: 8px;"><strong>Pembayaran</strong></td><td style="padding: 8px;">' . htmlspecialchars($metode) . '</td></tr>
            </table>
            <p style="margin-top: 20px; font-size: 15px;">✅ Segera lakukan verifikasi melalui sistem.</p>
            <p style="font-size: 13px; color: #999;">Email ini dikirim otomatis oleh sistem Kost Pink Pontianak.</p>
        </div>
    </body>
    </html>';

    if (!mail($to, $subject, $message, $headers)) {
        echo "<script>
                alert('❌ Email gagal dikirim.');
                window.history.back();
              </script>";
        exit;
    }

    // Simpan ke database
    $insert = "INSERT INTO reservasi (id_user, id_kamar, durasi, durasi_terbayar, status, tgl_masuk, images)
               VALUES ('$id_user', '$id_kamar', '$durasi', '$durasi_bayar', '$status', '$tanggal_mulai', '$bukti_path')";

    $query = $conn->query($insert);

    if ($query) {
        echo "<script>
                alert('Reservasi berhasil dikirim. Tunggu verifikasi admin.');
                window.location.href='../../user/reservasi';
              </script>";
    } else {
        echo "<script>
                alert('Terjadi kesalahan saat booking.');
                window.history.back();
              </script>";
    }
}
?>