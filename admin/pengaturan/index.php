<?php
    session_start();
    if(!isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'){
        header("Location: ../../public/login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Pengaturan - Admin Kost Pink</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-50 text-gray-800">

    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Sidebar -->
        <?php 
            require '../sidebar.php'
        ?>

        <!-- Main -->
        <main class="flex-1 p-6 bg-white">
            <h1 class="text-2xl font-bold text-pink-700 mb-6">Pengaturan Sistem</h1>

            <!-- Informasi Kost -->
            <?php
                require 'informasi-kost.php'
            ?>

            <!-- Akun Admin -->
            <?php
        require 'setting-akun.php'
       ?>
        </main>
    </div>

</body>

</html>