<?php
    session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Edit Profil - Kost Pink Pontianak</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-50 text-gray-800 min-h-screen">

    <div class="max-w-xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-pink-700 text-center mb-8">Edit Profil</h1>

        <form action="../../controller/user/edit_profile.php" method="POST"
            class="bg-white p-6 rounded-lg shadow space-y-4">
            <!-- Nama -->
            <div>
                <label class="block mb-1 font-medium">Nama Lengkap</label>
                <input type="text" name="nama" value="<?= $_SESSION['user']['nama'] ?>" required
                    class="w-full border border-pink-300 rounded px-3 py-2" />
            </div>

            <!-- Email -->
            <div>
                <label class="block mb-1 font-medium">Email</label>
                <input type="email" name="email" value="<?= $_SESSION['user']['email'] ?>" required
                    class="w-full border border-pink-300 rounded px-3 py-2" />
            </div>

            <!-- No HP -->
            <div>
                <label class="block mb-1 font-medium">No. HP</label>
                <input type="text" name="no_hp" value="<?= $_SESSION['user']['telp'] ?>" required
                    class="w-full border border-pink-300 rounded px-3 py-2" />
            </div>

            <!-- Tombol -->
            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-pink-500 text-white py-2 rounded hover:bg-pink-600 font-semibold">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

</body>

</html>