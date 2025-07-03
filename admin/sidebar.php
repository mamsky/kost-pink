<?php
    $rootDir = $_SERVER['REQUEST_URI'];
?>

<aside class="w-64 bg-pink-200 text-pink-900 flex flex-col px-6 py-8 shadow-md">
    <h1 class="text-2xl font-bold mb-8">Kost Pink Admin</h1>
    <nav class="space-y-4">
        <!-- <?= var_dump($_SERVER) ?> -->
        <?php
            $isDashboard = $rootDir === '/hotel/admin/' || $rootDir === '/hotel/admin/index.php';
            $isPenghuni = strpos($rootDir, '/hotel/admin/penghuni') !== false;
            $isReservasi = strpos($rootDir, '/hotel/admin/reservasi') !== false;
            $isKamar = strpos($rootDir, '/hotel/admin/kamar') !== false;
            $isPengaturan = strpos($rootDir, '/hotel/admin/pengaturan') !== false;
        ?>

        <a href="/hotel/admin/"
            class="block font-medium hover:text-pink-600 <?= $isDashboard ? 'text-pink-600 font-bold' : '' ?>">🏠
            Dashboard</a>

        <a href="/hotel/admin/penghuni/"
            class="block font-medium hover:text-pink-600 <?= $isPenghuni ? 'text-pink-600 font-bold' : '' ?>">👥
            Penghuni</a>

        <a href="/hotel/admin/reservasi/"
            class="block font-medium hover:text-pink-600 <?= $isReservasi ? 'text-pink-600 font-bold' : '' ?>">📅
            Reservasi</a>

        <a href="/hotel/admin/kamar/"
            class="block font-medium hover:text-pink-600 <?= $isKamar ? 'text-pink-600 font-bold' : '' ?>">🏢
            Kamar</a>
        <a href="/hotel/admin/pengaturan/"
            class="block font-medium hover:text-pink-600 <?= $isPengaturan ? 'text-pink-600 font-bold' : '' ?>">⚙️
            Pengaturan</a>
    </nav>

    <div class="mt-auto pt-10 border-t">
        <a href="/hotel/controller/auth/logout.php">
            <p class="w-full bg-pink-500 text-white py-2 rounded hover:bg-pink-600 text-md text-center">Logout</p>
        </a>
    </div>
</aside>