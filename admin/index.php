<?php
    require '../config/db.php';
    require '../config/auth.php';
    require_admin();
    $PR = $conn->query("SELECT SUM(reservasi.status = 'Terkonfirmasi') AS penghuni, SUM(reservasi.status = 'Belum Terkonfirmasi') as reservasi, SUM(kamar.status = 'tersedia') FROM reservasi INNER JOIN kamar ON reservasi.id_kamar = kamar.id")->fetch_assoc();
    $pendapatan = $conn->query("SELECT SUM(tagihan) as pendapatan FROM tagihan WHERE status='lunas' && MONTH(STR_TO_DATE(bulan, '%d-%m-%Y')) = MONTH(CURRENT_DATE())")->fetch_assoc();
    $kamar = $conn->query("SELECT SUM(kamar.status = 'tersedia') as tersedia FROM kamar")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard - Kost Pink Pontianak</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-50 text-gray-800">

    <!-- Sidebar + Topbar Layout -->
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <?php 
            require 'sidebar.php'
        ?>

        <!-- Main Content -->
        <main class="flex-1 p-8 bg-white">
            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-bold text-pink-700">Dashboard</h2>
                <div class="text-sm text-gray-500">Selamat datang, <?= $_SESSION['user']['role']?> 💖</div>
            </div>

            <!-- Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-pink-100 p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold text-pink-800">Total Penghuni</h3>
                    <p class="text-2xl font-bold mt-2"><?= $PR['penghuni'] ?? '0' ?></p>
                </div>
                <div class="bg-pink-100 p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold text-pink-800">Reservasi Hari Ini</h3>
                    <p class="text-2xl font-bold mt-2"><?= $PR['reservasi'] ?? '0' ?></p>
                </div>
                <div class="bg-pink-100 p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold text-pink-800">Pendapatan Bulan Ini</h3>
                    <p class="text-2xl font-bold mt-2">Rp <?= number_format($pendapatan['pendapatan'], 0, ",", ".") ?>
                    </p>
                </div>
                <div class="bg-pink-100 p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold text-pink-800">Kamar Tersedia</h3>
                    <p class="text-2xl font-bold mt-2"><?= $kamar['tersedia'] ?? '0' ?></p>
                </div>
            </div>

            <!-- Table -->
            <div class="bg-white border border-pink-100 shadow rounded-lg overflow-hidden">
                <div class="px-6 py-4 border-b bg-pink-100 text-pink-800 font-semibold">
                    Penghuni Terbaru
                </div>
                <table class="min-w-full divide-y divide-pink-100">
                    <thead class="bg-pink-50 text-left">
                        <tr>
                            <th class="px-6 py-3 text-sm font-medium">Nama</th>
                            <th class="px-6 py-3 text-sm font-medium">Kamar</th>
                            <th class="px-6 py-3 text-sm font-medium">Masuk</th>
                            <th class="px-6 py-3 text-sm font-medium">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-pink-100">
                        <?php
                            $query = $conn->query("SELECT auth.name, kamar.no_kamar, reservasi.status, reservasi.tgl_masuk FROM reservasi LEFT JOIN auth ON reservasi.id_user = auth.id LEFT JOIN kamar ON reservasi.id_kamar = kamar.id");
                           if($query->num_rows == 0){
                            echo '<td class="px-6 py-4">Belum ada penghuni baru</td>';
                           }
                            while($row = $query->fetch_assoc()){
                                ?>
                        <tr>
                            <td class="px-6 py-4"><?= $row['name'] ?></td>
                            <td class="px-6 py-4"><?= $row['no_kamar'] ?></td>
                            <td class="px-6 py-4"><?= $row['tgl_masuk'] ?></td>
                            <td class="px-6 py-4"><span
                                    class="<?= $row['status']=='Terkonfirmasi'? 'text-green-600': 'text-yellow-500' ?> font-semibold"><?= $row['status']=='Terkonfirmasi'? 'Aktif': 'Pending' ?></span>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

</body>

</html>