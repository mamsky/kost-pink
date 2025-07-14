<?php
    require '../../config/db.php';
  function bulanIndo($bulan) {
    $nama_bulan = [
        1 => 'Januari', 2 => 'Februari', 3 => 'Maret',
        4 => 'April', 5 => 'Mei', 6 => 'Juni',
        7 => 'Juli', 8 => 'Agustus', 9 => 'September',
        10 => 'Oktober', 11 => 'November', 12 => 'Desember'
    ];
    return $nama_bulan[(int)$bulan];
    }

    if(isset($_POST['lulusin'])){
        $id = $_POST['id'];
        $sql = $conn->query("UPDATE tagihan SET status='lunas' WHERE id = $id");
        if($sql){
            echo "<script>alert('YEY Berhasil'); window.location.href='';</script>";
        }else{
            echo "<script>alert('Gagal')</script>";
        }
    }

?>
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
                            <!-- <th class="px-6 py-3 text-center text-sm font-semibold text-pink-800">Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-pink-100 text-sm">
                        <?php
                            $no = 1;
                            $sql =$conn->query("SELECT auth.name, auth.email, auth.telp, kamar.no_kamar,tagihan.bulan,tagihan.status FROM tagihan LEFT JOIN auth ON auth.id = tagihan.id_user LEFT JOIN reservasi ON reservasi.id_user = tagihan.id_user LEFT JOIN kamar ON reservasi.id_kamar = kamar.id WHERE MONTH(STR_TO_DATE(tagihan.bulan, '%d-%m-%Y')) = MONTH(CURRENT_DATE())");
                            if($sql->num_rows==0){
                                echo '<td class="px-6 py-4">Tidak ada penghuni</td>';
                            }
                            while($row = $sql-> fetch_assoc()){
                                ?>
                        <tr class="hover:bg-pink-50">
                            <td class="px-6 py-4"><?= $no++ ?></td>
                            <td class="px-6 py-4"><?= $row['name'] ?></td>
                            <td class="px-6 py-4"><?= $row['email'] ?></td>
                            <td class="px-6 py-4"><?= $row['telp'] ?></td>
                            <td class="px-6 py-4"><?= $row['no_kamar'] ?></td>
                            <td class="px-6 py-4">
                                <?=date('d', strtotime($row['bulan'])) . ' ' . bulanIndo(date('n', strtotime($row['bulan']))) . ' ' . date('Y', strtotime($row['bulan'])) ?>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2 py-1  <?= $row['status'] == 'lunas'? 'bg-green-100 text-green-700':'bg-red-100 text-red-700' ?> rounded text-xs"><?= $row['status'] == 'lunas'? 'Aktif':'Tidak Aktif' ?></span>
                            </td>
                        </tr>
                        <?php
                            }
                       ?>
                    </tbody>
                </table>
            </div>

            <h1 class="text-3xl font-bold text-pink-700 my-6">Daftar Tagihan Penghuni</h1>
            <div class="bg-white shadow-md rounded-lg overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-pink-100 text-pink-800">
                        <tr>
                            <th class="p-4">Nama Penghuni</th>
                            <th class="p-4">Bulan</th>
                            <th class="p-4">Jumlah</th>
                            <th class="p-4">Status</th>
                            <th class="p-4">Jatuh Tempo</th>
                            <th class="p-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            $sql = $conn->query("SELECT payment.*, tagihan.status FROM payment LEFT JOIN tagihan ON payment.id_reservasi = tagihan.id"); 
                            if($sql->num_rows==0){
                                echo '<td class="px-6 py-4">Tidak ada tagihan penghuni saat ini.</td>';
                            }
                            while($row = $sql->fetch_assoc()){
                                $harga = $row['harga'];
                                    ?>
                        <tr class="border-b hover:bg-pink-50">
                            <td class="p-4"><?= $row['nama'] ?></td>
                            <td class="p-4"><?= $row['bulan'] ?></td>
                            <td class="p-4">Rp <?=number_format("$harga", 0, ",", ".")  ?></td>
                            <td
                                class="p-4 <?= $row['status'] == 'belum lunas'? 'text-yellow-600' :'text-green-500' ?> font-semibold">
                                <?= $row['status'] ?></td>
                            <td class="p-4"><?= $row['bulan'] ?></td>
                            <?php
                                if($row['status']=='lunas'){
                                    ?>
                            <td class="text-center text-green-700">✔ Sudah Dibayar</td>
                            <?php
                                    }else{
                                        ?>
                            <td class="p-4 text-center flex gap-2 justify-center">
                                <form method="POST" onsubmit="return confirm('Apakah pembayaran sudah sesuai?')">
                                    <input type="hidden" name="id" value="<?= $row['id_reservasi'] ?>">
                                    <button name="lulusin"
                                        class="bg-pink-500 text-white px-3 py-1 rounded text-xs hover:bg-pink-600">Tandai
                                        Lunas</button>
                                </form>
                                <a href="./bukti-pembayaran.php?id=<?= $row['id_reservasi'] ?>&id_payment=<?= $row['id'] ?>&nama=<?= $row['nama'] ?>&bulan=<?= $row['bulan'] ?>&harga=<?= $row['harga'] ?>&images=<?= $row['images'] ?>"
                                    class="bg-gray-200 text-pink-700 px-3 py-1 rounded text-xs hover:bg-gray-300">Lihat
                                    Bukti</a>
                            </td>
                            <?php
                                    }
                            ?>

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