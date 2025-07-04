<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kost Pink Pontianak</title>

    <!-- SwiperJS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="assets/styles/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-50 text-pink-800">

    <!-- Navbar -->
    <header class="bg-pink-100 shadow-md p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="" class="text-2xl font-semibold">Kost Pink Pontianak</a>
            <a href="./public/login.php"
                class="bg-pink-500 text-white px-4 py-2 rounded hover:bg-pink-600">Login/Reservation</a>
        </div>
        <!-- <nav class="mt-4">
            <ul class="flex justify-center space-x-6 text-pink-700">
                <li><a href="#" class="hover:underline">Home</a></li>
            </ul>
        </nav> -->
    </header>


    <!-- Carousel Section -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide">
                        <img src="https://www.onassis-hardware.com/wp-content/uploads/2023/10/kamar-hotel.webp"
                            alt="Room" />
                    </div>
                    <div class="swiper-slide">
                        <img src="https://www.onassis-hardware.com/wp-content/uploads/2023/10/kamar-hotel.webp"
                            alt="Room" />
                    </div>
                    <div class="swiper-slide">
                        <img src="https://www.onassis-hardware.com/wp-content/uploads/2023/10/kamar-hotel.webp"
                            alt="Room" />
                    </div>
                    <div class="swiper-slide">
                        <img src="https://www.onassis-hardware.com/wp-content/uploads/2023/10/kamar-hotel.webp"
                            alt="Room" />
                    </div>
                    <div class="swiper-slide">
                        <img src="https://www.onassis-hardware.com/wp-content/uploads/2023/10/kamar-hotel.webp"
                            alt="Room" />
                    </div>
                    <!-- Slide 2 -->
                    <div class="swiper-slide">
                        <img src="https://www.onassis-hardware.com/wp-content/uploads/2023/10/kamar-hotel.webp"
                            alt="Restaurant" />
                    </div>
                    <!-- Slide 3 -->
                    <div class="swiper-slide">
                        <img src="https://www.onassis-hardware.com/wp-content/uploads/2023/10/kamar-hotel.webp"
                            alt="Reception" />
                    </div>
                </div>

                <!-- Pagination -->
                <div class="swiper-pagination mt-6"></div>
            </div>
        </div>
    </section>

    <!-- Swiper Init -->
    <script>
    const swiper = new Swiper(".mySwiper", {
        loop: true,
        spaceBetween: 30,
        slidesPerView: 3,
        centeredSlides: true,
        initialSlide: 1, // tampilkan slide ke-2 sebagai awal (tengah)
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        },
    });
    </script>
    <!-- Features -->
    <section class="py-10 bg-pink-50">
        <div class="max-w-6xl mx-auto grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 text-center gap-8 text-sm">

            <div>
                <div class="text-2xl">❄️</div>
                <strong>AC</strong>
                <p>Sejuk & nyaman</p>
            </div>

            <div>
                <div class="text-2xl">🚽</div>
                <strong>WC Dalam</strong>
                <p>Privasi lebih terjaga</p>
            </div>

            <div>
                <div class="text-2xl">🪑</div>
                <strong>Meja & Kursi</strong>
                <p>Belajar lebih nyaman</p>
            </div>

            <div>
                <div class="text-2xl">🧳</div>
                <strong>Lemari</strong>
                <p>Penyimpanan aman</p>
            </div>

            <div>
                <div class="text-2xl">🛏️</div>
                <strong>Kasur</strong>
                <p>Tempat tidur bersih</p>
            </div>

            <div>
                <div class="text-2xl">📶</div>
                <strong>Wi-Fi</strong>
                <p>Internet 24 jam</p>
            </div>

            <div>
                <div class="text-2xl">🍳</div>
                <strong>Dapur</strong>
                <p>Boleh masak sendiri</p>
            </div>

            <div>
                <div class="text-2xl">🎥</div>
                <strong>CCTV 24 Jam</strong>
                <p>Aman & diawasi</p>
            </div>

        </div>
    </section>


    <!-- Contact & FAQ Section -->
    <section class="bg-pink-50 py-12">
        <div class="max-w-6xl mx-auto px-4">
            <!-- FAQ Accordion -->
            <div>
                <h3 class="text-lg md:text-4xl font-semibold mb-4 text-center">Pertanyaan?</h3>
                <div class="space-y-2 text-sm">
                    <details class="bg-pink-100 p-2 rounded border border-pink-300">
                        <summary class="cursor-pointer font-medium">Bagaimana Cara Pemesanan?</summary>
                        <p class="mt-2 text-pink-700">
                            Untuk memesan kamar kos, silakan ikuti langkah-langkah berikut:
                        <ol class="list-decimal list-inside mt-2 space-y-1">
                            <li><strong>Login / Daftar:</strong> Masuk ke akun Anda. Jika belum punya, silakan daftar
                                terlebih dahulu.</li>
                            <li><strong>Cek Ketersediaan:</strong> Setelah login, Anda bisa melihat kamar yang masih
                                tersedia lengkap dengan detail fasilitas dan harga.</li>
                            <li><strong>Lakukan Booking:</strong> Pilih kamar yang diinginkan dan klik “Booking
                                Sekarang”. Isi data sesuai kebutuhan (durasi sewa, tanggal mulai, dll).</li>
                            <li><strong>Konfirmasi via WhatsApp:</strong> Setelah booking, Anda akan diarahkan secara
                                otomatis ke WhatsApp kami dengan pesan pemesanan yang sudah terisi otomatis. Anda hanya
                                perlu mengirim pesan tersebut untuk menyelesaikan proses pemesanan.</li>
                        </ol>
                        Booking akan diproses setelah kami menerima konfirmasi dari WhatsApp dan pembayaran uang muka
                        (DP).
                        </p>
                    </details>
                    <!-- Cleaning Room -->
                    <details class="bg-pink-100 p-2 rounded border border-pink-300">
                        <summary class="cursor-pointer font-medium">Apakah tersedia layanan Cleaning Room?</summary>
                        <p class="mt-2 text-pink-700">
                            Ya, kami menyediakan layanan cleaning room (bersih-bersih kamar) secara berkala.
                            Jadwal pembersihan dilakukan seminggu sekali atau sesuai permintaan penghuni.
                            Mohon informasikan kepada pengelola jika Anda ingin jadwal khusus atau tambahan pembersihan.
                        </p>
                    </details>
                    <details class="bg-pink-100 p-2 rounded border border-pink-300">
                        <summary class="cursor-pointer font-medium">Apakah tersedia layanan Laundry?</summary>
                        <p class="mt-2 text-pink-700">
                            Layanan laundry tersedia untuk semua penghuni kos. Anda dapat menitipkan pakaian kotor ke
                            petugas atau tempat yang telah disediakan. Pakaian akan dicuci dan dikembalikan dalam waktu
                            2-3 hari.
                            Biaya laundry akan ditambahkan ke tagihan bulanan atau bisa dibayar terpisah, tergantung
                            kesepakatan.
                        </p>
                    </details>
                    <details class="bg-pink-100 p-2 rounded border border-pink-300">
                        <summary class="cursor-pointer font-medium">Apakah Masih Ada Kamar Kosong?</summary>
                        <p class="mt-2 text-pink-700">
                            Ketersediaan kamar dapat berubah setiap saat. Untuk informasi paling akurat dan terbaru
                            mengenai kamar kosong, silakan hubungi kami langsung. Kami menyediakan berbagai tipe kamar,
                            mulai dari kamar standar hingga kamar ber-AC dengan kamar mandi dalam. Kami sarankan untuk
                            booking secepatnya karena jumlah kamar terbatas.
                        </p>
                    </details>
                    <details class="bg-pink-100 p-2 rounded border border-pink-300">
                        <summary class="cursor-pointer font-medium">Apa saja metode pembayarannya?</summary>
                        <p class="mt-2 text-pink-700">
                            Kami menyediakan beberapa metode pembayaran untuk memudahkan penyewa, di antaranya:
                        <ul class="list-disc list-inside mt-2">
                            <li>Transfer bank (BCA, BRI, Mandiri)</li>
                            <li>E-wallet seperti OVO, GoPay, dan Dana</li>
                            <li>Cash langsung di lokasi (khusus untuk pembayaran awal)</li>
                        </ul>
                        Pembayaran sewa dilakukan setiap bulan, maksimal tanggal 5 setiap bulannya. Keterlambatan akan
                        dikenakan denda sesuai ketentuan.
                        </p>

                    </details>
                    <details class="bg-pink-100 p-2 rounded border border-pink-300">
                        <summary class="cursor-pointer font-medium">Apa Saja Peraturannya?</summary>
                        <p class="mt-2 text-pink-700">
                            Untuk menjaga kenyamanan bersama, berikut adalah peraturan kos-kosan yang wajib dipatuhi
                            oleh seluruh penghuni:
                        <ul class="list-disc list-inside mt-2">
                            <li>Tidak diperbolehkan membawa lawan jenis ke dalam kamar</li>
                            <li>Tamu hanya diperbolehkan sampai pukul 22.00</li>
                            <li>Dilarang merokok di dalam kamar</li>
                            <li>Dilarang membawa atau mengonsumsi alkohol serta narkoba</li>
                            <li>Wajib menjaga kebersihan dan tidak membuat kebisingan</li>
                            <li>Pembayaran sewa wajib dilakukan tepat waktu</li>
                        </ul>
                        Pelanggaran terhadap peraturan di atas dapat menyebabkan peringatan hingga pemutusan kontrak kos
                        secara sepihak.
                        </p>

                    </details>
                    <details class="bg-pink-100 p-2 rounded border border-pink-300">
                        <summary class="cursor-pointer font-medium">Apa saja Personalisasinya?</summary>
                        <p class="mt-2 text-pink-700">
                            Untuk menjaga kenyamanan bersama, berikut adalah peraturan kos-kosan yang wajib dipatuhi
                            oleh seluruh penghuni:
                        <ul class="list-disc list-inside mt-2">
                            <li>Tidak diperbolehkan membawa lawan jenis ke dalam kamar</li>
                            <li>Tamu hanya diperbolehkan sampai pukul 22.00</li>
                            <li>Dilarang merokok di dalam kamar</li>
                            <li>Dilarang membawa atau mengonsumsi alkohol serta narkoba</li>
                            <li>Wajib menjaga kebersihan dan tidak membuat kebisingan</li>
                            <li>Pembayaran sewa wajib dilakukan tepat waktu</li>
                        </ul>
                        Pelanggaran terhadap peraturan di atas dapat menyebabkan peringatan hingga pemutusan kontrak kos
                        secara sepihak.
                        </p>

                    </details>
                </div>
            </div>

        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-pink-200 py-8 text-sm">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 px-4 text-pink-800">
            <div class="max-w-6xl mx-auto flex flex-col md:flex-row justify-center gap-10 px-4 text-center text-sm">
                <div>
                    <img src="./assets/images/mutia.png" class="mx-auto w-16 h-16 rounded-full mb-2" alt="Testimonial">
                    <p class="font-semibold">Mutia</p>
                    <p class="text-pink-700">Permilik.</p>
                </div>
            </div>
            <!-- Kontak -->
            <div>
                <p>📞 +62 825-5327-0421</p>
                <p>📧 kostpink@gmail.com</p>
                <p>📍 Pontianak, Indonesia</p>
            </div>
            <!-- Sosial Media -->
            <div>
                <p><a href="#" class="hover:underline">Facebook</a></p>
                <p><a href="#" class="hover:underline">Instagram</a></p>
            </div>
        </div>

        <div class="text-center text-pink-800 mt-6">
            <p>© 2025 Kost Pink Pontianak. All rights reserved.</p>
        </div>
    </footer>


</body>

</html>