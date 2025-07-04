<?php
    session_start();
    require '../../config/db.php';
    
    if(isset($_POST['delete-reservasi'])){
        $id = $_POST['id'];
        $queryDelete = $conn->query("DELETE FROM reservasi WHERE id ='$id'");
        if($queryDelete){
             echo "<script>
                    alert('Berhasil Dihapus!!.');
                </script>";
        }else{
             echo "<script>
                    alert('Gagal Dihapus.');
                </script>";
        }
    }

?>
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

                        <?php 
                        $no = 1;
                        $id_user = $_SESSION['user']['id'];
                        $getData = $conn->query("SELECT reservasi.id, reservasi.status as status, reservasi.tgl_masuk, kamar.no_kamar, kamar.tipe, kamar.lantai  FROM reservasi LEFT JOIN kamar ON reservasi.id_kamar = kamar.id GROUP BY id_user = $id_user");
                        if($getData->num_rows == 0){
                            ?>
                        <tr class="hover:bg-pink-50">
                            <td class="px-6 py-4">Tidak Ada reservasi</td>
                        </tr>
                        <?php
                        }else{
                             while($reservasi = $getData->fetch_assoc()){
                            ?>
                        <tr class="hover:bg-pink-50">
                            <td class="px-6 py-4"><?= $no++ ?></td>
                            <td class="px-6 py-4"><?= $reservasi['no_kamar'] ?></td>
                            <td class="px-6 py-4"><?= $reservasi['tipe'] ?></td>
                            <td class="px-6 py-4"><?= $reservasi['lantai'] ?></td>
                            <td class="px-6 py-4"><?= $reservasi['tgl_masuk'] ?></td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2 py-1 <?= $reservasi['status'] == 'Menunggu'? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-green-700' ?>  rounded text-xs"><?= $reservasi['status'] == 'Menunggu'? 'Menunggu':'Terkonfirmasi' ?></span>
                            </td>
                            <td class="px-6 py-4 text-center space-x-2">
                                <form action="" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin membatalkan reservasi tanggal <?php echo $reservasi['tgl_masuk'] . ' kode kamar ' . $reservasi['no_kamar']; ?>?')">
                                    <input type="hidden" name="id" value="<?= $reservasi['id']?>" />
                                    <button name="delete-reservasi"
                                        <?= $reservasi['status'] != 'Menunggu' ? 'disabled' : '' ?>
                                        class="<?= $reservasi['status'] == 'Menunggu'
                                            ? 'bg-red-500 text-white hover:bg-red-600'
                                            : 'bg-gray-300 text-gray-600 cursor-not-allowed' ?> px-2 py-1 rounded text-xs">
                                        <?= $reservasi['status'] == 'Menunggu' ? 'Batalkan' : 'Tidak Bisa Dibatalkan' ?>
                                    </button>

                                </form>
                            </td>
                        </tr>
                        <?php
                        }

                        }
                       
                    ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

</body>

</html>