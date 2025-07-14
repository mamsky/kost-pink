<?php
    require '../../config/db.php';
    $harga= $_GET['harga'] * $_GET['durasi_terbayar'];
 
    // if(isset($_POST['tolak'])){
    //     $id = $_POST['id'];
    //     $sql = $conn->query("DELETE FROM payment WHERE id = $id");
    //     if($sql){
    //         echo "<script>alert('YEY Berhasil'); window.location.href='../reservasi';</script>";
    //     }else{
    //         echo "<script>alert('Gagal'); window.history.back();</script>";
    //     }
    // }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Lihat Bukti Pembayaran - Admin Kost Pink</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-50 text-gray-800 min-h-screen">
    <div class="max-w-2xl mx-auto px-4 py-10">
        <h1 class="text-2xl font-bold text-pink-700 mb-6 text-center">Lihat Bukti Reservasi</h1>

        <div class="bg-white rounded-lg shadow p-6 space-y-4">
            <div>
                <p><strong>Nama Penghuni:</strong> <?= $_GET['name'] ?></p>
                <p><strong>Email:</strong> <?= $_GET['email'] ?></p>
                <p><strong>Tanggal Masuk:</strong> <?= $_GET['tgl_masuk'] ?></p>
                <p><strong>Durasi:</strong> <?= $_GET['durasi'] ?> Bulan</p>
                <p><strong>Durasi Terbayar:</strong> <?= $_GET['durasi_terbayar'] ?> Bulan</p>
                <p><strong>Jumlah:</strong> Rp <?= number_format("$harga", 0, ",", ".")  ?></p>
            </div>

            <div>
                <p class="font-medium mb-2">Bukti Pembayaran:</p>
                <img src=" <?= $_GET['images'] ?>" alt="Bukti Pembayaran"
                    class="w-full max-h-[500px] object-contain border rounded" />
            </div>

            <div class="flex justify-end space-x-2 pt-4">
                <form action="../../controller/admin/konfirmasi_reservasi.php" method="POST"
                    onsubmit="return confirm('Apakah kamu ingin Mengkonfirmasi?')">
                    <input type="hidden" value="<?= $_GET['id'] ?>" name="id">
                    <button name="verif"
                        class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded">
                        Verifikasi Pembayaran
                    </button>
                </form>
                <form action="" method="post" onsubmit="return confirm('Apakah kamu ingin membatalkannya?')">
                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                    <button name="tolak" class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded">
                        Tolak
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>