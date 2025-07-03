<?php
    require '../config/auth.php';
    require_admin();
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
                    <p class="text-2xl font-bold mt-2">24</p>
                </div>
                <div class="bg-pink-100 p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold text-pink-800">Reservasi Hari Ini</h3>
                    <p class="text-2xl font-bold mt-2">5</p>
                </div>
                <div class="bg-pink-100 p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold text-pink-800">Pendapatan Bulan Ini</h3>
                    <p class="text-2xl font-bold mt-2">Rp 12.000.000</p>
                </div>
                <div class="bg-pink-100 p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold text-pink-800">Kamar Tersedia</h3>
                    <p class="text-2xl font-bold mt-2">6</p>
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
                        <tr>
                            <td class="px-6 py-4">Sarah Oktavia</td>
                            <td class="px-6 py-4">A1</td>
                            <td class="px-6 py-4">01 Juli 2025</td>
                            <td class="px-6 py-4"><span class="text-green-600 font-semibold">Aktif</span></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">Dewi Rahma</td>
                            <td class="px-6 py-4">B2</td>
                            <td class="px-6 py-4">30 Juni 2025</td>
                            <td class="px-6 py-4"><span class="text-green-600 font-semibold">Aktif</span></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">Putri Lestari</td>
                            <td class="px-6 py-4">C3</td>
                            <td class="px-6 py-4">29 Juni 2025</td>
                            <td class="px-6 py-4"><span class="text-yellow-500 font-semibold">Pending</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

</body>

</html>