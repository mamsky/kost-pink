<?php
   require '../../config/db.php';
    if(isset($_POST['konfirmasi'])){
        $id = $_POST['id'];
        $sql = $conn->query("UPDATE reservasi SET status='Terkonfirmasi' WHERE id = '$id'");
        if($sql){
            echo "<script>alert('Reservasi Terkonfirmasi');</script>";
        }else{
            echo "<script>alert('Gagal Mengonfirmasi');</script>";
        }
    }

if(isset($_POST['batalkan'])){
    $id = $_POST['id'];
    $sql = $conn->query("DELETE FROM reservasi WHERE id='$id'");
    if($sql){
         echo "<script>alert('Reservasi Dibatalkan');</script>";
    }else{
         echo "<script>alert('Gagal Dibatalkan');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Reservasi - Admin Kost Pink</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-50 text-gray-800">

    <!-- Layout -->
    <div class="min-h-screen flex flex-col md:flex-row">

        <!-- Sidebar -->
        <?php
             require '../sidebar.php'
        ?>

        <!-- Main -->
        <main class="flex-1 p-6 bg-white">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-pink-700">Data Reservasi</h1>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto bg-white shadow rounded-lg">
                <table class="min-w-full divide-y divide-pink-200">
                    <thead class="bg-pink-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-pink-800">No</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-pink-800">Nama</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-pink-800">Email</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-pink-800">Kamar</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-pink-800">Tanggal Reservasi</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-pink-800">Status</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold text-pink-800">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-pink-100 text-sm">
                        <!-- Row 1 -->
                        <?php 
                            $no = 1;
                            $getData = $conn->query("
                                SELECT 
                                    reservasi.id as idR, 
                                    reservasi.tgl_masuk, 
                                    reservasi.id_user, 
                                    reservasi.id_kamar,
                                    reservasi.durasi,
                                    reservasi.durasi_terbayar,
                                    reservasi.images,
                                    reservasi.status, 
                                    auth.name, 
                                    auth.email,
                                    kamar.no_kamar,
                                    kamar.harga
                                FROM reservasi 
                                LEFT JOIN auth ON reservasi.id_user = auth.id 
                                LEFT JOIN kamar ON kamar.id = reservasi.id_kamar
                            ");
                             if($getData->num_rows == 0){
                            echo '<td class="px-6 py-4">Belum ada reservasi baru</td>';
                           }
                            while ($row = $getData->fetch_assoc()) {
                                ?>
                        <tr class="hover:bg-pink-50">
                            <td class="px-6 py-4"><?= $no++ ?></td>
                            <td class="px-6 py-4"><?= htmlspecialchars($row['name']) ?></td>
                            <td class="px-6 py-4"><?= htmlspecialchars($row['email']) ?></td>
                            <td class="px-6 py-4"><?= htmlspecialchars($row['no_kamar']) ?></td>
                            <td class="px-6 py-4"><?= htmlspecialchars($row['tgl_masuk']) ?></td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2 py-1 <?= $row['status'] != 'Terkonfirmasi'? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-green-700' ?>  rounded text-xs"><?= $row['status'] != 'Terkonfirmasi'? $row['status'] :'Terkonfirmasi' ?></span>
                            </td>
                            <td class="px-6 py-4 text-center flex gap-2 justify-center">
                                <?php
                                if($row['status'] != 'Terkonfirmasi' ){
                                    ?>
                                <a href="./bukti_reservasi.php?id=<?php echo $row['idR']?>&name=<?= $row['name'] ?>&email=<?= $row['email'] ?>&tgl_masuk=<?= $row['tgl_masuk']?>&harga=<?= $row['harga'] ?>&durasi_terbayar=<?= $row['durasi_terbayar']?>&durasi=<?= $row['durasi']?>&id_kamar=<?= $row['id_kamar'] ?>&images=<?= $row['images'] ?>"
                                    class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600 text-xs">Konfirmasi</a>
                                <?php 
                                }else{
                                    ?>
                                <button disabled
                                    class="bg-slate-200 text-slate-700 px-2 py-1 rounded text-xs">Terkonfirmasi</button>
                                <?php
                                }
                                    
                                ?>
                                <form action="../../controller/admin/tolak_reservasi.php"
                                    onsubmit="return confirm('Apakah anda ingin mebatalkan reservasi?')" method="POST">
                                    <input type="hidden" name="id" value="<?= $row['idR'] ?>">
                                    <button name="batalkan"
                                        class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 text-xs">Batalkan</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                            }
                            ?>


                        <!-- Tambah data lainnya di sini -->
                    </tbody>
                </table>
            </div>
        </main>
    </div>

</body>

</html>