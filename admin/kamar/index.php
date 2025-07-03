<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Data Kamar - Admin Kost Pink</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-50 text-gray-800">

    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Sidebar -->
        <?php
             require '../sidebar.php'
        ?>

        <!-- Main -->
        <main class="flex-1 p-6 bg-white">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-pink-700">Data Kamar</h1>
                <button class="bg-pink-500 text-white px-4 py-2 rounded hover:bg-pink-600 text-sm">
                    + Tambah Kamar
                </button>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="min-w-full divide-y divide-pink-200">
                    <thead class="bg-pink-100 text-left text-sm text-pink-800 font-semibold">
                        <tr>
                            <th class="px-6 py-3">No</th>
                            <th class="px-6 py-3">Kode</th>
                            <th class="px-6 py-3">Tipe</th>
                            <th class="px-6 py-3">Lantai</th>
                            <th class="px-6 py-3">Harga/Bulan</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-pink-100 text-sm">
                        <!-- Row 1 -->
                        <tr class="hover:bg-pink-50">
                            <td class="px-6 py-4">1</td>
                            <td class="px-6 py-4">A1</td>
                            <td class="px-6 py-4">AC + KM Dalam</td>
                            <td class="px-6 py-4">1</td>
                            <td class="px-6 py-4">Rp 600.000</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 bg-red-100 text-red-600 rounded text-xs">Terisi</span>
                            </td>
                            <td class="px-6 py-4 text-center space-x-2">
                                <button
                                    class="bg-yellow-400 text-white px-2 py-1 rounded hover:bg-yellow-500 text-xs">Edit</button>
                                <button
                                    class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 text-xs">Hapus</button>
                            </td>
                        </tr>

                        <!-- Row 2 -->
                        <tr class="hover:bg-pink-50">
                            <td class="px-6 py-4">2</td>
                            <td class="px-6 py-4">B2</td>
                            <td class="px-6 py-4">Non AC + KM Luar</td>
                            <td class="px-6 py-4">2</td>
                            <td class="px-6 py-4">Rp 450.000</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs">Tersedia</span>
                            </td>
                            <td class="px-6 py-4 text-center space-x-2">
                                <button
                                    class="bg-yellow-400 text-white px-2 py-1 rounded hover:bg-yellow-500 text-xs">Edit</button>
                                <button
                                    class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 text-xs">Hapus</button>
                            </td>
                        </tr>

                        <!-- Tambah data kamar lainnya di sini -->
                    </tbody>
                </table>
            </div>
        </main>
    </div>

</body>

</html>