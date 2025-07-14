<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title>Booking Sekarang - Kost Pink Pontianak</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-50 text-gray-800 min-h-screen">

    <div class="max-w-xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-pink-700 text-center mb-6">Booking Kamar</h1>

        <form action="../../controller/user/booking_kamar.php" method="POST" enctype="multipart/form-data"
            class="bg-white shadow rounded-lg p-6 space-y-5">
            <input type="hidden" name="id_kamar" value="<?= $_GET['id'] ?>">
            <input type="hidden" id="hargaPerBulan" value="<?= $_GET['harga'] ?>" />

            <!-- Nama Kamar -->
            <div>
                <label class="block mb-1 font-medium text-pink-700">Nama Kamar</label>
                <input type="text" name="kamar" value="Kamar <?= $_GET['no_kamar'] ?>" readonly
                    class="w-full border border-pink-200 rounded p-2 bg-pink-50 text-pink-800" />
            </div>

            <!-- Tanggal Mulai -->
            <div>
                <label class="block mb-1 font-medium text-pink-700">Tanggal Mulai Sewa</label>
                <input type="date" name="tanggal_mulai" required class="w-full border border-gray-300 rounded p-2" />
            </div>

            <!-- Durasi Sewa -->
            <div>
                <label class="block mb-1 font-medium text-pink-700">Durasi Sewa (bulan)</label>
                <select id="durasi" name="durasi" required class="w-full border border-gray-300 rounded p-2">
                    <option value="1">1 Bulan</option>
                    <option value="3">3 Bulan</option>
                    <option value="6">6 Bulan</option>
                    <option value="12">12 Bulan</option>
                </select>
            </div>

            <!-- Durasi Bayar -->
            <div>
                <label class="block mb-1 font-medium text-pink-700">Durasi yang ingin dibayar (bulan)</label>
                <select id="durasiBayar" name="durasi_bayar" required class="w-full border border-gray-300 rounded p-2">
                    <option value="1">1 Bulan</option>
                    <option value="3">3 Bulan</option>
                    <option value="6">6 Bulan</option>
                    <option value="12">12 Bulan</option>
                </select>
            </div>

            <!-- Metode Pembayaran -->
            <div>
                <h2 class="font-semibold text-lg text-pink-700 mb-2">Pilih Metode Pembayaran</h2>
                <div class="space-y-2">
                    <label class="block">
                        <input type="radio" name="metode" class="mr-2" value="Transfer" checked>
                        Transfer Bank (BCA: 1234567890 - a.n. Kost Pink)
                    </label>
                    <label class="block">
                        <input type="radio" name="metode" class="mr-2" value="OVO">
                        OVO (0812-xxxx-xxxx)
                    </label>
                    <label class="block">
                        <input type="radio" name="metode" class="mr-2" value="GoPay">
                        GoPay (0813-xxxx-xxxx)
                    </label>
                    <label class="block">
                        <input type="radio" name="metode" class="mr-2" value="Dana">
                        Dana (0812-xxxx-xxxx)
                    </label>
                </div>
            </div>

            <!-- Total Bayar -->
            <div id="totalBayarBox" class="mt-2 hidden bg-pink-100 border border-pink-300 rounded p-3 text-center">
                <p class="text-sm text-gray-700">Total yang harus dibayar:</p>
                <p id="totalBayarText" class="text-xl font-bold text-pink-700"></p>
            </div>

            <!-- Bukti Pembayaran -->
            <div>
                <label class="block mb-1 font-medium text-pink-700">Upload Bukti Pembayaran</label>
                <input type="file" name="bukti" accept="image/*" required
                    class="w-full border border-pink-300 rounded px-3 py-2" />
            </div>

            <!-- Catatan -->
            <div class="text-sm text-gray-600 bg-pink-100 p-3 rounded border border-pink-300">
                Setelah mengirim bukti pembayaran, admin akan memverifikasi maksimal dalam 1x24 jam.
            </div>

            <!-- Tombol Submit -->
            <div class="pt-4">
                <button type="submit" name="booking_kamar"
                    class="w-full bg-pink-600 text-white py-2 rounded hover:bg-pink-700 font-semibold transition">
                    Lanjutkan Booking
                </button>
            </div>
        </form>
    </div>

    <!-- Script -->
    <script>
    const hargaPerBulan = parseInt(document.getElementById("hargaPerBulan").value);
    const durasiSelect = document.getElementById("durasi");
    const durasiBayarSelect = document.getElementById("durasiBayar");
    const totalBox = document.getElementById("totalBayarBox");
    const totalText = document.getElementById("totalBayarText");

    const updateTotal = () => {
        const durasi = parseInt(durasiSelect.value);
        const durasiBayar = parseInt(durasiBayarSelect.value);

        if (durasiBayar > durasi) {
            totalBox.classList.remove("hidden");
            totalText.textContent = "Durasi Bayar tidak boleh lebih besar daripada Durasi Sewa.";
            return;
        }

        if (!isNaN(durasiBayar)) {
            const total = hargaPerBulan * durasiBayar;
            totalBox.classList.remove("hidden");
            totalText.textContent = "Rp " + total.toLocaleString("id-ID");
        } else {
            totalBox.classList.add("hidden");
            totalText.textContent = "";
        }
    };

    durasiBayarSelect.addEventListener("change", updateTotal);
    durasiSelect.addEventListener("change", updateTotal); // Tambahan: kalau user ubah durasi sewa
    </script>
</body>

</html>