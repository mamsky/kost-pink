<?php
    session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Akun Saya - Kost Pink Pontianak</title>
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
        <main class="flex-1 p-6">
            <h1 class="text-3xl font-bold text-pink-700 mb-6 text-center">Akun Saya</h1>

            <div class="bg-white shadow-md rounded-lg p-6 max-w-2xl mx-auto space-y-4">
                <div>
                    <p class="font-semibold">Nama Lengkap:</p>
                    <p class="text-sm text-gray-600"><?= $_SESSION['user']['nama'] ?></p>
                </div>
                <div>
                    <p class="font-semibold">Email:</p>
                    <p class="text-sm text-gray-600"><?= $_SESSION['user']['email'] ?></p>
                </div>
                <div>
                    <p class="font-semibold">No. HP:</p>
                    <p class="text-sm text-gray-600"><?= $_SESSION['user']['telp'] ?></p>
                </div>
                <div>
                    <p class="font-semibold">Tanggal Daftar:</p>
                    <p class="text-sm text-gray-600"><?= $_SESSION['user']['tgl_daftar'] ?></p>
                </div>

                <div class="flex gap-4 pt-4">
                    <a href="./edit-profile.php"
                        class="bg-pink-500 hover:bg-pink-600 text-white text-sm px-4 py-2 rounded">Edit
                        Profil</a>
                    <a href="./edit-password.php"
                        class="bg-white border border-pink-500 text-pink-600 hover:bg-pink-100 text-sm px-4 py-2 rounded">
                        Ubah Password
                    </a>
                </div>
            </div>
        </main>
    </div>
</body>

</html>