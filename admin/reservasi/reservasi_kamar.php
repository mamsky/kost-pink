<!DOCTYPE html>
<html lang="id">
<!-- Ganti dari 'en' ke 'id' karena kontennya berbahasa Indonesia -->

<head>
    <meta charset="UTF-8" />
    <title>Reservasi - Kost Pink Pontianak</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-50 text-gray-800 min-h-screen">
    <div class="max-w-xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-pink-700 text-center mb-6">Reservasi Kamar</h1>

        <div class="bg-white shadow-md rounded-lg p-6 space-y-4">
            <form action="../../controller/admin/reservasi_kamar.php" method="POST">
                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                <input type="hidden" name="id_user" value="<?= $_GET['id_user'] ?>">
                <input type="hidden" name="harga" value="<?= $_GET['harga'] ?>">
                <input type="hidden" name="id_kamar" value="<?= $_GET['id_kamar'] ?>">
                <div>
                    <label class="block mb-1 font-medium">Durasi Reservasi (bulan)</label>
                    <input type="number" name="startDate" placeholder="Masukkan jumlah bulan reservasi" required
                        class="w-full border border-pink-300 rounded px-3 py-2" />
                </div>

                <div>
                    <label class="block mb-1 font-medium">Jumlah Bulan yang Sudah Dibayar</label>
                    <input type="number" name="endDate" placeholder="Masukkan jumlah bulan yang telah dibayar" required
                        class="w-full border border-pink-300 rounded px-3 py-2" />
                </div>

                <!-- Catatan -->
                <div class="text-sm  my-4 text-gray-600 bg-pink-100 p-3 rounded border border-pink-300">
                    Silahkan masukkan durasi reservasi dan jumlah bulan yang telah dibayar untuk mengonfirmasi
                </div>

                <!-- Tombol -->
                <div class="pt-2">
                    <button name="reservasi"
                        class="w-full bg-pink-500 text-white py-2 rounded hover:bg-pink-600 font-semibold">
                        Konfirmasi Pembayaran
                    </button>
                </div>
            </form>


        </div>
    </div>
</body>

</html>