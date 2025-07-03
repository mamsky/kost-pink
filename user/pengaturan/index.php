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
                    <p class="text-sm text-gray-600">Andi Santoso</p>
                </div>
                <div>
                    <p class="font-semibold">Email:</p>
                    <p class="text-sm text-gray-600">andi@email.com</p>
                </div>
                <div>
                    <p class="font-semibold">No. HP:</p>
                    <p class="text-sm text-gray-600">0812-3456-7890</p>
                </div>
                <div>
                    <p class="font-semibold">Tanggal Daftar:</p>
                    <p class="text-sm text-gray-600">12 Januari 2024</p>
                </div>
                <div>
                    <p class="font-semibold">Kamar:</p>
                    <p class="text-sm text-gray-600">Kamar B2 - Lantai 2</p>
                </div>

                <div class="flex gap-4 pt-4">
                    <button class="bg-pink-500 hover:bg-pink-600 text-white text-sm px-4 py-2 rounded">Edit
                        Profil</button>
                    <button
                        class="bg-white border border-pink-500 text-pink-600 hover:bg-pink-100 text-sm px-4 py-2 rounded">
                        Ubah Password
                    </button>
                </div>
            </div>
        </main>
    </div>
</body>

</html>