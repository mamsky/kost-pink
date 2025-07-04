<?php
    require '../config/db.php';
    require '../config/auth.php';
    require_user();
    // SELECT reservasi.status, kamar.*, tagihan.tagihan FROM reservasi LEFT JOIN kamar ON reservasi.id_kamar = kamar.id LEFT JOIN tagihan ON reservasi.id_user=tagihan.id_user WHERE MONTH(STR_TO_DATE(bulan, '%d-%m-%Y')) = MONTH(CURRENT_DATE()) && reservasi.id_user = 2
    $user_id = $_SESSION['user']['id'];
    $data = $conn->query("SELECT reservasi.status as rs, kamar.*, tagihan.tagihan FROM reservasi LEFT JOIN kamar ON reservasi.id_kamar = kamar.id LEFT JOIN tagihan ON reservasi.id_user=tagihan.id_user WHERE MONTH(STR_TO_DATE(bulan, '%d-%m-%Y')) = MONTH(CURRENT_DATE()) && reservasi.id_user = $user_id")->fetch_assoc();
    $tagihan = $data['tagihan'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>User Dashboard - Kost Pink Pontianak</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-50 text-gray-800">

    <!-- Layout -->
    <div class="min-h-screen flex flex-col md:flex-row">

        <!-- Sidebar -->
        <?php
            require 'sidebar.php'
       ?>

        <!-- Main -->
        <main class="flex-1 p-6 bg-white">
            <!-- Welcome -->
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-pink-700">Hai, <?= $_SESSION['user']['nama'] ?>! 👋</h1>
                <p class="text-sm text-gray-500">Selamat datang di dashboard kost kamu 💖</p>
            </div>

            <!-- Status Info -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-pink-100 p-4 rounded-lg shadow text-center">
                    <p class="text-sm text-pink-700 font-medium">Status Reservasi</p>
                    <p
                        class="text-xl font-bold mt-2 <?= $data['rs'] == 'Terkonfirmasi' ? 'text-green-600':' text-red-600' ?>">
                        <?= $data['rs'] == 'Terkonfirmasi' ? 'Aktif':' Tidak Aktif' ?></p>
                </div>
                <div class="bg-pink-100 p-4 rounded-lg shadow text-center">
                    <p class="text-sm text-pink-700 font-medium">Nomor Kamar</p>
                    <p class="text-xl font-bold mt-2"><?= $data['no_kamar']?></p>
                </div>
                <div class="bg-pink-100 p-4 rounded-lg shadow text-center">
                    <p class="text-sm text-pink-700 font-medium">Tagihan Bulan Ini</p>
                    <p class="text-xl font-bold mt-2">Rp <?= number_format("$tagihan", 0, ",", ".") ?></p>
                </div>
            </div>

            <!-- Rincian -->
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Informasi User -->
                <div class="bg-pink-50 border border-pink-100 rounded-lg p-4 shadow">
                    <h3 class="text-pink-700 font-semibold mb-3">👩 Informasi Pengguna</h3>
                    <ul class="text-sm space-y-2">
                        <li><strong>Nama:</strong> <?= $_SESSION['user']['nama'] ?></li>
                        <li><strong>Email:</strong> <?= $_SESSION['user']['email'] ?></li>
                        <li><strong>No. HP:</strong> <?= $_SESSION['user']['telp'] ?></li>
                        <li><strong>Tanggal Masuk:</strong> <?= $_SESSION['user']['tgl_daftar'] ?></li>
                    </ul>
                </div>

                <!-- Informasi Kamar -->
                <div class="bg-pink-50 border border-pink-100 rounded-lg p-4 shadow">
                    <h3 class="text-pink-700 font-semibold mb-3">🏢 Informasi Kamar</h3>
                    <ul class="text-sm space-y-2">
                        <li><strong>Tipe:</strong> <?= $data['tipe']?></li>
                        <li><strong>Lantai:</strong> <?= $data['lantai']?></li>
                        <li><strong>Status:</strong> <?= $data['status']?></li>
                        <li><strong>Harga/Bulan:</strong> Rp <?= number_format("$tagihan", 0, ",", ".") ?></li>
                    </ul>
                </div>
            </div>
        </main>
    </div>

</body>

</html>