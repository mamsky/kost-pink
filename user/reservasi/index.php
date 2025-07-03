<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Reservasi Saya - Kost Pink Pontianak</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-50 text-gray-800">

    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Sidebar -->
        <?php
            require '../sidebar.php'
        ?>

        <!-- Main Content -->
        <main class="flex-1 p-6 bg-white">
            <h1 class="text-2xl font-bold text-pink-700 mb-6">Reservasi Saya</h1>

            <!-- Tabel Reservasi -->
            <div class="overflow-x-auto bg-white shadow rounded-lg">
                <table class="min-w-full divide-y divide-pink-200">
                    <thead class="bg-pink-100 text-pink-800 text-left text-sm font-semibold">
                        <tr>
                            <th class="px-6 py-3">No</th>
                            <th class="px-6 py-3">Kode Kamar</th>
                            <th class="px-6 py-3">Tipe</th>
                            <th class="px-6 py-3">Lantai</th>
                            <th class="px-6 py-3">Tanggal Reservasi</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-pink-100 text-sm">
                        <tr class="hover:bg-pink-50">
                            <td class="px-6 py-4">1</td>
                            <td class="px-6 py-4">A1</td>
                            <td class="px-6 py-4">AC + KM Dalam</td>
                            <td class="px-6 py-4">1</td>
                            <td class="px-6 py-4">03 Juli 2025</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded text-xs">Menunggu</span>
                            </td>
                            <td class="px-6 py-4 text-center space-x-2">
                                <button
                                    class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 text-xs">Batalkan</button>
                            </td>
                        </tr>
                        <tr class="hover:bg-pink-50">
                            <td class="px-6 py-4">2</td>
                            <td class="px-6 py-4">B2</td>
                            <td class="px-6 py-4">Non AC + KM Luar</td>
                            <td class="px-6 py-4">2</td>
                            <td class="px-6 py-4">01 Juli 2025</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs">Terkonfirmasi</span>
                            </td>
                            <td class="px-6 py-4 text-center space-x-2">
                                <button class="bg-gray-300 text-gray-600 px-2 py-1 rounded text-xs cursor-not-allowed"
                                    disabled>
                                    Tidak Bisa Dibatalkan
                                </button>
                            </td>
                        </tr>
                        <!-- Tambah reservasi lainnya di sini -->
                    </tbody>
                </table>
            </div>
        </main>
    </div>

</body>

</html>