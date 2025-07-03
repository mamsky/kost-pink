<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Data Penghuni - Admin Kost Pink</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-50 text-gray-800">

    <!-- Container -->
    <div class="min-h-screen flex flex-col md:flex-row">

        <!-- Sidebar -->
        <?php 
            require '../sidebar.php'
        ?>

        <!-- Main Content -->
        <main class="flex-1 p-6 bg-white">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-pink-700">Data Penghuni</h1>
                <a href="./tambah-penghuni.php"
                    class="bg-pink-500 text-white px-4 py-2 rounded hover:bg-pink-600 text-sm">
                    + Tambah Penghuni
                </a>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="min-w-full divide-y divide-pink-200">
                    <thead class="bg-pink-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-pink-800">No</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-pink-800">Nama</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-pink-800">Email</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-pink-800">No HP</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-pink-800">Kamar</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-pink-800">Tanggal Masuk</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-pink-800">Status</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold text-pink-800">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-pink-100 text-sm">
                        <tr class="hover:bg-pink-50">
                            <td class="px-6 py-4">1</td>
                            <td class="px-6 py-4">Sarah Oktavia</td>
                            <td class="px-6 py-4">sarah@mail.com</td>
                            <td class="px-6 py-4">0812-3456-7890</td>
                            <td class="px-6 py-4">A1</td>
                            <td class="px-6 py-4">01 Juli 2025</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs">Aktif</span>
                            </td>
                            <td class="px-6 py-4 text-center space-x-2">
                                <button
                                    class="bg-yellow-400 text-white px-2 py-1 rounded hover:bg-yellow-500 text-xs">Edit</button>
                                <button
                                    class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 text-xs">Hapus</button>
                            </td>
                        </tr>
                        <tr class="hover:bg-pink-50">
                            <td class="px-6 py-4">2</td>
                            <td class="px-6 py-4">Dewi Rahma</td>
                            <td class="px-6 py-4">dewi@mail.com</td>
                            <td class="px-6 py-4">0851-1234-5678</td>
                            <td class="px-6 py-4">B2</td>
                            <td class="px-6 py-4">25 Juni 2025</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded text-xs">Pending</span>
                            </td>
                            <td class="px-6 py-4 text-center space-x-2">
                                <button
                                    class="bg-yellow-400 text-white px-2 py-1 rounded hover:bg-yellow-500 text-xs">Edit</button>
                                <button
                                    class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 text-xs">Hapus</button>
                            </td>
                        </tr>
                        <!-- Tambah baris lainnya di sini -->
                    </tbody>
                </table>
            </div>
        </main>
    </div>

</body>

</html>