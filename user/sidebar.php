 <?php
    $rootDir = $_SERVER['REQUEST_URI'];
    $isDashboard = $rootDir === '/hotel/user/' || $rootDir === '/hotel/user/index.php';
    $isReservasi = $rootDir === '/hotel/user/reservasi/' || $rootDir === '/hotel/user/reservasi/';
    $isInfoKamar = $rootDir === '/hotel/user/info-kamar/' || $rootDir === '/hotel/user/info-kamar/';
    $isTagihan = $rootDir === '/hotel/user/tagihan/' || $rootDir === '/hotel/user/tagihan/';
    $isPengaturan = $rootDir === '/hotel/user/pengaturan/' || $rootDir === '/hotel/user/pengaturan/';
?>


 <aside class="w-full md:w-64 bg-pink-200 p-6 text-pink-900">
     <h2 class="text-2xl font-bold mb-6">👩‍🎓 Kost Pink</h2>
     <nav class="space-y-3 text-sm">
         <a href="/hotel/user/"
             class="block hover:text-pink-600 <?= $isDashboard ? 'text-pink-600 font-bold' : '' ?>">🏠
             Dashboard</a>
         <a href="/hotel/user/reservasi/"
             class="block hover:text-pink-600 <?= $isReservasi ? 'text-pink-600 font-bold' : '' ?>">📋 Reservasi
             Saya</a>
         <a href="/hotel/user/info-kamar/"
             class="block hover:text-pink-600 <?= $isInfoKamar ? 'text-pink-600 font-bold' : '' ?>">🏢 Info
             Kamar</a>
         <a href="/hotel/user/tagihan/"
             class="block hover:text-pink-600 <?= $isTagihan ? 'text-pink-600 font-bold' : '' ?>">📄 Tagihan</a>
         <a href="/hotel/user/pengaturan/"
             class="block hover:text-pink-600 <?= $isPengaturan ? 'text-pink-600 font-bold' : '' ?>">⚙️ Akun Saya</a>
     </nav>
     <div class="mt-8">
         <a
             href="<?= ($rootDir === '/hotel/user/') ? '../controller/auth/logout.php' : '../../controller/auth/logout.php' ?>">
             <p class="w-full bg-pink-500 text-white py-2 rounded hover:bg-pink-600 text-md text-center">
                 Logout
             </p>
         </a>

     </div>
 </aside>