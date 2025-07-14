<?php
    include '../../config/db.php';

    function tglHelper($tanggal){
    $hariMasuk= $tanggal;
    
    $jatuhTempo= date('d-m-Y', strtotime($hariMasuk. ' + 30 days'));
    return array(
        'masuk'=> $hariMasuk,
        'tambahSebulan'=> $jatuhTempo,
        );
    }

    if(isset($_POST['verif'])){
        $id = $_POST['id']; // id reservasi
        $i = 1;
        $getReservasi = $conn->query("SELECT reservasi.*, auth.name, auth.email, kamar.harga, kamar.no_kamar
        FROM reservasi 
        LEFT JOIN auth 
        ON reservasi.id_user = auth.id
        LEFT JOIN kamar
        ON reservasi.id_kamar = kamar.id
        WHERE reservasi.id = $id
        ");

        $data = $getReservasi->fetch_assoc();

        $id_kamar = $data['id_kamar'];
        $id_user = $data['id_user'];
        $name_user = $data['name'];
        $durasi = $data['durasi'];
        $durasi_terbayar = $data['durasi_terbayar'];
        $tgl_masuk = $data['tgl_masuk'];
        $harga = $data['harga'];
        $no_kamar = $data['no_kamar'];

        $to      = $data['email'];
        $subject = 'Konfirmasi Kamar Kost Pink Pontianak';
        $headers = "Content-type:text/html;charset=UTF-8\r\n";
        $headers .= "From: booking@kostpinkpontianak.com\r\n";

        $updateReservasi = $conn->query("UPDATE reservasi SET status = 'Terkonfirmasi' WHERE id = $id");
        if($updateReservasi){
            $conn->query("UPDATE kamar SET status='terisi' WHERE id = '$id_kamar'");
            $data = array();
            $tanggal= date("d-m-Y", strtotime($tgl_masuk));
            while ($i <= $durasi) {
                $tg = $i == 1 ? $tanggal: (tglHelper($data[$i-1]['bulan']))['tambahSebulan'];
                $masuk =tglHelper($tg)['masuk'];
                $tempo =tglHelper($tg)['tambahSebulan'];
                $data[$i]=[ 
                    'id_user'=> $id_user,
                    'tagihan'=> $harga,
                    'bulan'=> $masuk,
                    'jatuh_tempo'=> $tempo,
                    'status'=> $i <= $durasi_terbayar ? 'lunas' : 'belum lunas',];
                $i++;
            } 
            foreach($data as $tagihan){
                $stmt= $conn->prepare("INSERT INTO tagihan (id_user, tagihan, bulan, jatuh_tempo, status) VALUES (?,?,?,?,?)");
                $stmt->bind_param("issss",$tagihan['id_user'], $tagihan['tagihan'], $tagihan['bulan'], $tagihan['jatuh_tempo'], $tagihan['status']);
                $stmt->execute();
            }
            $tableRows = '';
            foreach ($data as $row) {
                $tableRows .= '<tr>
                    <td style="border:1px solid #ccc;padding:6px;">' . $row['bulan'] . '</td>
                    <td style="border:1px solid #ccc;padding:6px;">' . $row['jatuh_tempo'] . '</td>
                    <td style="border:1px solid #ccc;padding:6px;">Rp ' . number_format($row['tagihan']) . '</td>
                    <td style="border:1px solid #ccc;padding:6px;">' . ucfirst($row['status']) . '</td>
                </tr>';
            }
            $message = '
            <html>
            <head>
            <title>Konfirmasi Booking - Kost Pink Pontianak</title>
            </head>
            <body style="font-family: Arial, sans-serif; color: #444;">
            <h2 style="color: #d63384;">✅ Booking Anda Sudah Terkonfirmasi</h2>
            <p>Halo <strong>' . $name_user . '</strong>,</p>
            <p>Booking Anda di <strong>Kost Pink Pontianak</strong> telah kami verifikasi.</p>
            <table style="margin-top: 10px;">
                <tr><td><strong>🏠 Kamar</strong></td><td>: ' . $no_kamar . '</td></tr>
                <tr><td><strong>📅 Tanggal Mulai</strong></td><td>: ' . $tgl_masuk . '</td></tr>
                <tr><td><strong>📆 Durasi</strong></td><td>: ' . $durasi . ' bulan</td></tr>
                <tr><td><strong>📌 Status</strong></td><td>: Terkonfirmasi </td></tr>
            </table>
            <p>Silakan datang sesuai tanggal mulai sewa. Kami siap menyambut Anda 😊</p>

            <h3 style="margin-top: 30px;">📄 Rincian Tagihan</h3>
            <table style="border-collapse:collapse;width:100%;max-width:600px;">
                <thead>
                    <tr>
                        <th style="border:1px solid #ccc;padding:6px;background:#f8f9fa;">Bulan</th>
                        <th style="border:1px solid #ccc;padding:6px;background:#f8f9fa;">Jatuh Tempo</th>
                        <th style="border:1px solid #ccc;padding:6px;background:#f8f9fa;">Nominal</th>
                        <th style="border:1px solid #ccc;padding:6px;background:#f8f9fa;">Status</th>
                    </tr>
                </thead>
                <tbody>' . $tableRows . '</tbody>
            </table>

            <br>
            <p>Salam hangat,</p>
            <strong>Admin Kost Pink Pontianak</strong>
            </body>
            </html>';
            $stmt->close();
                mail($to, $subject, $message, $headers);
            $conn->close();
            echo "<script>alert('Success');window.location.href='../../admin/reservasi'</script>";
        }
    }

?>