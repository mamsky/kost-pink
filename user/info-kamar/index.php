<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Daftar Kamar - Kost Pink Pontianak</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-50 text-gray-800">

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <?php require '../sidebar.php'; ?>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <h1 class="text-3xl font-bold text-pink-700 mb-6 text-center">Daftar Kamar Tersedia</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Kamar Card 1 -->
                <div class="bg-white rounded-xl shadow border border-pink-100 overflow-hidden">
                    <img src="https://asset.morefurniture.id/NEWS/7-Inspirasi-Desain-Kamar-Kost-ukuran-3X3--Maksimalkan-Setiap-Sudut!.webp"
                        alt="Kamar A1" class="w-full h-48 object-cover">
                    <div class="p-4 space-y-2">
                        <h2 class="text-lg font-bold text-pink-700">Kamar A1</h2>
                        <p class="text-sm text-gray-600">AC + Kamar Mandi Dalam | Lantai 1</p>
                        <p class="text-sm text-gray-700">Fasilitas: Kasur, Meja, Lemari, Wi-Fi</p>
                        <p class="text-pink-600 font-semibold">Rp 600.000 / bulan</p>
                        <button class="w-full mt-2 bg-pink-500 text-white py-2 rounded hover:bg-pink-600 text-sm">
                            Booking Sekarang
                        </button>
                    </div>
                </div>

                <!-- Kamar Card 2 -->
                <div class="bg-white rounded-xl shadow border border-pink-100 overflow-hidden">
                    <img src="https://asset.morefurniture.id/NEWS/7-Inspirasi-Desain-Kamar-Kost-ukuran-3X3--Maksimalkan-Setiap-Sudut!.webp"
                        alt="Kamar B2" class="w-full h-48 object-cover">
                    <div class="p-4 space-y-2">
                        <h2 class="text-lg font-bold text-pink-700">Kamar B2</h2>
                        <p class="text-sm text-gray-600">Non-AC + Kamar Mandi Luar | Lantai 2</p>
                        <p class="text-sm text-gray-700">Fasilitas: Kasur, Meja, Lemari</p>
                        <p class="text-pink-600 font-semibold">Rp 450.000 / bulan</p>
                        <button class="w-full mt-2 bg-pink-500 text-white py-2 rounded hover:bg-pink-600 text-sm">
                            Booking Sekarang
                        </button>
                    </div>
                </div>

                <!-- Kamar Card 3 -->
                <div class="bg-white rounded-xl shadow border border-pink-100 overflow-hidden">
                    <img src="https://asset.morefurniture.id/NEWS/7-Inspirasi-Desain-Kamar-Kost-ukuran-3X3--Maksimalkan-Setiap-Sudut!.webp"
                        alt="Kamar C3" class="w-full h-48 object-cover">
                    <div class="p-4 space-y-2">
                        <h2 class="text-lg font-bold text-pink-700">Kamar C3</h2>
                        <p class="text-sm text-gray-600">AC + KM Dalam + Balkon | Lantai 3</p>
                        <p class="text-sm text-gray-700">Fasilitas: Kasur, Meja, Lemari, AC, Balkon</p>
                        <p class="text-pink-600 font-semibold">Rp 750.000 / bulan</p>
                        <button class="w-full mt-2 bg-pink-500 text-white py-2 rounded hover:bg-pink-600 text-sm">
                            Booking Sekarang
                        </button>
                    </div>
                </div>

                <!-- Tambahkan card lainnya jika perlu -->

            </div>
        </div>
    </div>

</body>

</html>