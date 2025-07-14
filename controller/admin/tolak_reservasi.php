<?php 
include '../../config/db.php';

if (isset($_POST['batalkan'])) {
    $id = intval($_POST['id']); // pastikan ID adalah integer
    $status = 'Ditolak';

    // Ambil data reservasi dan user
    $queryData = $conn->query("SELECT auth.name, auth.email, kamar.no_kamar, reservasi.tgl_masuk, reservasi.durasi 
                                FROM reservasi 
                                LEFT JOIN auth ON reservasi.id_user = auth.id
                                LEFT JOIN kamar ON reservasi.id_kamar = kamar.id
                                WHERE reservasi.id = $id");

    if ($queryData && $queryData->num_rows > 0) {
        $data = $queryData->fetch_assoc();

        $nama_user = htmlspecialchars($data['name']);
        $to = $data['email'];
        $kamar = htmlspecialchars($data['no_kamar']);
        $tanggal_mulai = htmlspecialchars($data['tgl_masuk']);
        $durasi = htmlspecialchars($data['durasi']);

        $subject = 'Penolakan Reservasi Kamar Kost Pink Pontianak';
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "From: booking@kostpinkpontianak.com\r\n";

        $message = '
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Booking Ditolak - Kost Pink Pontianak</title>
        </head>
        <body style="font-family: Arial, sans-serif; background-color: #fff0f5; padding: 20px;">
            <div style="max-width: 600px; margin: auto; background: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                <h2 style="color: #e3342f;">❌ Booking Anda Ditolak</h2>

                <p>Halo <strong>' . $nama_user . '</strong>,</p>
                <p>Terima kasih telah melakukan booking di <strong>Kost Pink Pontianak</strong>. Namun dengan sangat menyesal, kami informasikan bahwa permintaan booking Anda <strong>tidak dapat diproses</strong> saat ini.</p>

                <p><strong>📌 Kemungkinan Alasan Penolakan:</strong></p>
                <ul>
                    <li>Bukti pembayaran tidak valid atau tidak sesuai</li>
                    <li>Kamar telah dibooking oleh penghuni lain</li>
                    <li>Atau alasan administratif lainnya</li>
                </ul>

                <p><strong>📋 Detail Booking Anda:</strong></p>
                <table style="margin-top: 10px;">
                    <tr><td>🏠 <strong>Kamar</strong></td><td>: ' . $kamar . '</td></tr>
                    <tr><td>📅 <strong>Tanggal Mulai</strong></td><td>: ' . $tanggal_mulai . '</td></tr>
                    <tr><td>📆 <strong>Durasi</strong></td><td>: ' . $durasi . ' bulan</td></tr>
                    <tr><td>📌 <strong>Status</strong></td><td style="color: #e3342f;"><strong>Ditolak</strong></td></tr>
                </table>

                <p style="margin-top: 20px;">Jika Anda ingin melakukan klarifikasi atau rebooking ulang, silakan hubungi admin kami melalui:</p>
                <p><a href="https://wa.me/6282553270421" style="color: #d63384; font-weight: bold;">Klik di sini untuk WhatsApp Admin</a></p>

                <p style="margin-top: 30px;">Terima kasih atas perhatian dan pengertiannya 🙏</p>
                <p>Salam hangat,<br><strong>Admin Kost Pink Pontianak</strong></p>
            </div>
        </body>
        </html>';

        // Update status reservasi
        $updateQuery = $conn->query("UPDATE reservasi SET status = '$status' WHERE id = $id");

        if ($updateQuery) {
            mail($to, $subject, $message, $headers);
            echo "<script>alert('Success');window.location.href='../../admin/reservasi'</script>";
        } else {
            echo "Gagal memperbarui status reservasi.";
        }

    } else {
        echo "Data reservasi tidak ditemukan.";
    }
}
?>