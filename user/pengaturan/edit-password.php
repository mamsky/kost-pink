<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Ubah Password - Kost Pink Pontianak</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-50 text-gray-800 min-h-screen">
    <div class="max-w-md mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold text-pink-700 text-center mb-8">Ubah Password</h1>

        <form action="../../controller/user/edit_password.php" method="POST"
            class="bg-white p-6 rounded-lg shadow space-y-4">
            <!-- Password Lama -->
            <div>
                <label class="block mb-1 font-medium">Password Lama</label>
                <input type="password" name="password_lama" required
                    class="w-full border border-pink-300 rounded px-3 py-2" />
            </div>

            <!-- Password Baru -->
            <div>
                <label class="block mb-1 font-medium">Password Baru</label>
                <input type="password" name="password_baru" required
                    class="w-full border border-pink-300 rounded px-3 py-2" />
            </div>

            <!-- Konfirmasi Password Baru -->
            <div>
                <label class="block mb-1 font-medium">Konfirmasi Password Baru</label>
                <input type="password" name="konfirmasi_password" required
                    class="w-full border border-pink-300 rounded px-3 py-2" />
            </div>

            <!-- Tombol -->
            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-pink-500 text-white py-2 rounded hover:bg-pink-600 font-semibold">
                    Simpan Password Baru
                </button>
            </div>
        </form>
    </div>
</body>

</html>