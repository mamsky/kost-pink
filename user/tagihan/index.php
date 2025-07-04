<?php 
    session_start();
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Tagihan Saya - Kost Pink Pontianak</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-50 text-gray-800 min-h-screen">

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <?php
            require '../sidebar.php'
        ?>

        <!-- Main Content -->
        <main class="flex-1 px-4 py-8">
            <h1 class="text-3xl font-bold text-pink-700 text-center mb-6">Tagihan Saya</h1>

            <div class="bg-white shadow rounded-lg overflow-hidden">
                <table class="w-full text-sm text-left">
                    <thead class="bg-pink-100 text-pink-800">
                        <tr>
                            <th class="p-4">Bulan</th>
                            <th class="p-4">Jumlah</th>
                            <th class="p-4">Status</th>
                            <th class="p-4">Jatuh Tempo</th>
                            <th class="p-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            $idUser = $_SESSION['user']['id'];
                            $getData = $conn->query("SELECT * FROM tagihan WHERE id_user = $idUser ");
                            if($getData->num_rows == 0){
                                ?>
                        <tr class="border-b hover:bg-pink-50">
                            <td class="p-4" colspan="10">Belum ada tagihan</td>
                        </tr>
                        <?php
                            }
                            while($row = $getData->fetch_assoc()){
                                ?>
                        <tr class="border-b hover:bg-pink-50">
                            <td class="p-4">
                                <?=date('', strtotime($row['bulan'])) . ' ' . bulanIndo(date('n', strtotime($row['bulan']))) . ' ' . date('Y', strtotime($row['bulan'])) ?>
                            </td>
                            <td class="p-4">Rp <?php
                             $d =$row['tagihan']; 
                            echo number_format("$d", 0, ",", ".") 
                            ?></td>
                            <td
                                class="p-4 <?= $row['status']=='lunas'? 'text-green-600':'text-yellow-600' ?> font-semibold">
                                <?= $row['status'] ?></td>
                            <td class="p-4">
                                <?=date('d', strtotime($row['jatuh_tempo'])) . ' ' . bulanIndo(date('n', strtotime($row['jatuh_tempo']))) . ' ' . date('Y', strtotime($row['jatuh_tempo'])) ?>
                            </td>
                            <?php
                                if($row['status']=='lunas'){
                                        ?>
                            <td class="p-4 text-center">
                                <span class="text-sm text-gray-400 italic">✔ Sudah Dibayar</span>
                            </td>
                            <?php
                                }else{
                                    ?>
                            <td class="p-4 text-center">
                                <a href="./bayar.php?id=<?= $row['id'] ?>&bulan=<?= $row['bulan'] ?>&jumlah=<?= $row['tagihan'] ?>&jatuh_tempo=<?= $row['jatuh_tempo'] ?>"
                                    class="bg-pink-500 text-white px-3 py-1 rounded hover:bg-pink-600 text-xs">
                                    Bayar Sekarang
                                </a>
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