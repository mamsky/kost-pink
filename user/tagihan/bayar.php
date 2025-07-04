<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Bayar Tagihan - Kost Pink Pontianak</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-50 text-gray-800 min-h-screen">
    <div class="max-w-xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-pink-700 text-center mb-6">Bayar Tagihan</h1>

        <div class="bg-white shadow-md rounded-lg p-6 space-y-4">
            <!-- Info Tagihan -->
            <div class="space-y-1">
                <p><span class="font-semibold">Bulan:</span> Juli 2025</p>
                <p><span class="font-semibold">Jumlah:</span> Rp 600.000</p>
                <p><span class="font-semibold">Jatuh Tempo:</span> 05 Juli 2025</p>
                <p><span class="font-semibold text-yellow-600">Status:</span> Belum Lunas</p>
            </div>

            <!-- Metode Pembayaran -->
            <div>
                <h2 class="font-semibold text-lg text-pink-700 mb-2">Pilih Metode Pembayaran</h2>
                <div class="space-y-2">
                    <label class="block">
                        <input type="radio" name="metode" class="mr-2" checked> Transfer Bank (BCA: 1234567890 - a.n.
                        Kost Pink)
                    </label>
                    <label class="block">
                        <input type="radio" name="metode" class="mr-2"> OVO (0812-xxxx-xxxx)
                    </label>
                    <label class="block">
                        <input type="radio" name="metode" class="mr-2"> GoPay (0813-xxxx-xxxx)
                    </label>
                    <label class="block">
                        <input type="radio" name="metode" class="mr-2"> Dana (0812-xxxx-xxxx)
                    </label>
                </div>
            </div>

            <!-- Upload Bukti -->
            <div>
                <label class="block mb-1 font-medium">Upload Bukti Pembayaran</label>
                <input type="file" name="bukti" accept="image/*"
                    class="w-full border border-pink-300 rounded px-3 py-2" />
            </div>

            <!-- Catatan -->
            <div class="text-sm text-gray-600 bg-pink-100 p-3 rounded border border-pink-300">
                Setelah mengirim bukti pembayaran, admin akan memverifikasi maksimal dalam 1x24 jam.
            </div>

            <!-- Tombol -->
            <div class="pt-2">
                <button class="w-full bg-pink-500 text-white py-2 rounded hover:bg-pink-600 font-semibold">
                    Konfirmasi Pembayaran
                </button>
            </div>
        </div>
    </div>
</body>

</html>