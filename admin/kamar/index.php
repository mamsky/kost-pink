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
                <a href="./tambah-kamar.php" class="bg-pink-500 text-white px-4 py-2 rounded hover:bg-pink-600 text-sm">
                    + Tambah Kamar
                </a>
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
                            <th class="px-6 py-3">Foto</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-pink-100 text-sm">
                        <!-- Row 1 -->
                        <?php 
                        $nomor = 1;
                            require '../../config/db.php';
                            $sql = "SELECT * FROM kamar";
                            $getData = $conn->query($sql);
                            if($getData->num_rows == 0){
                               ?>
                        <tr class="hover:bg-pink-50">
                            <td class="px-6 py-4" colspan="8">Mohon input data kamar..</td>
                        </tr>
                        <?php
                            }else{
                          while($row = $getData->fetch_assoc()){
                                ?>
                        <tr class="hover:bg-pink-50">
                            <td class="px-6 py-4"><?= $nomor++ ?></td>
                            <td class="px-6 py-4"><?= $row['no_kamar'] ?></td>
                            <td class="px-6 py-4"><?= $row['tipe'] ?></td>
                            <td class="px-6 py-4"><?= $row['lantai'] ?></td>
                            <td class="px-6 py-4">Rp <?= number_format($row['harga'], 0, ",", ".") ?></td>
                            <td class="px-6 py-4"><img src="../../temp/<?= $row['foto'] ?>"
                                    alt="<?= $row['no_kamar'] ?>" class="max-w-10 max-h-10"></td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2 py-1 rounded text-xs <?= $row['status'] == 'tersedia'? 'bg-green-100 text-green-600': 'bg-red-100 text-red-600'?>"><?= $row['status'] ?></span>
                            </td>
                            <td class="px-6 py-4 text-center space-x-2">
                                <a href="./edit-kamar.php?id=<?= $row['id']?>"
                                    class="bg-yellow-400 text-white px-2 py-1 rounded hover:bg-yellow-500 text-xs">Edit</a>
                                <a href="../../controller/admin/delete_kamar.php?id=<?= $row['id']?>"
                                    onclick="return confirm('Yakin ingin menghapus kamar <?= $row['no_kamar'] ?>?')"
                                    class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 text-xs">Hapus</a>
                            </td>
                        </tr>
                        <?php
                            }
                            }
  
                         ?>

                        <!-- Tambah data kamar lainnya di sini -->
                    </tbody>
                </table>
            </div>
        </main>
    </div>

</body>

</html>