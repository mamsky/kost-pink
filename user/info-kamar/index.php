<?php 
    require '../../config/db.php'
?>
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

                <?php
                $getKamar = $conn->query("SELECT * FROM kamar WHERE status = 'tersedia' ORDER BY id ASC");

                while($kamar = $getKamar->fetch_assoc()) {
                    $harga = number_format($kamar['harga'], 0, ',', '.');
                ?>

                <!-- Kartu Kamar -->
                <div class="bg-white rounded-xl shadow border border-pink-100 overflow-hidden">
                    <img src="../../temp/<?= $kamar['foto'] ?>" alt="Kamar <?= $kamar['no_kamar'] ?>"
                        class="w-full h-48 object-cover">
                    <div class="p-4 space-y-2">
                        <h2 class="text-lg font-bold text-pink-700">Kamar <?= $kamar['no_kamar'] ?></h2>
                        <p class="text-sm text-gray-600"><?= $kamar['tipe'] ?> | <?= $kamar['lantai'] ?></p>
                        <p class="text-sm text-gray-700">Fasilitas: <?= $kamar['fasilitas'] ?></p>
                        <p class="text-pink-600 font-semibold">Rp <?= $harga ?> / bulan</p>

                        <!-- Tombol Booking -->
                        <button type="button" onclick="konfirmasiBooking(
                                <?= $kamar['id'] ?>,
                                '<?= addslashes($kamar['no_kamar']) ?>',
                                '<?= addslashes($kamar['tipe']) ?>',
                                '<?= addslashes($kamar['lantai']) ?>',
                                '<?= addslashes($kamar['fasilitas']) ?>',
                                '<?= $harga ?>'
                            )" class="w-full mt-2 bg-pink-500 text-white py-2 rounded hover:bg-pink-600 text-sm">
                            Booking Sekarang
                        </button>

                        <!-- Form Booking (hidden) -->
                        <form id="form-booking-<?= $kamar['id'] ?>" action="../../controller/user/boking_kamar.php"
                            method="POST" style="display: none;">
                            <input type="hidden" name="id_kamar" value="<?= $kamar['id'] ?>">
                            <input type="date" name="tgl_masuk" id="tgl-masuk-<?= $kamar['id'] ?>"
                                value="<?= date('Y-m-d') ?>">
                        </form>
                    </div>
                </div>

                <?php } ?>

                <!-- JavaScript konfirmasi -->
                <script>
                function konfirmasiBooking(idKamar, noKamar, tipe, lantai, fasilitas, harga) {
                    const tgl = prompt("Masukkan tanggal masuk (format: YYYY-MM-DD):", new Date().toISOString().split(
                        'T')[0]);
                    if (!tgl) return;
                    if (!confirm(`Apakah Anda yakin ingin booking kamar ini pada tanggal ${tgl}?`)) return;
                    if (!confirm(
                            `Ketika Anda Menekan Tombol OK Akan Di Arahkan Ke WhatsApp dan Silahkan Kirim Pesan Ke WhatsApp Untuk Confirmasi`
                        )) return;

                    // Tentukan sapaan berdasarkan jam sekarang di client
                    const hour = new Date().getHours();
                    let sapaan = 'malam';
                    if (hour >= 5 && hour < 11) sapaan = 'pagi';
                    else if (hour < 15) sapaan = 'siang';
                    else if (hour < 18) sapaan = 'sore';

                    // Format tanggal masuk ke format dd MMMM yyyy pakai bahasa Indonesia (simple manual)
                    function bulanIndo(bulan) {
                        const nama_bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                        ];
                        return nama_bulan[bulan - 1];
                    }
                    const dt = new Date(tgl);
                    const tglFormatted = dt.getDate() + ' ' + bulanIndo(dt.getMonth() + 1) + ' ' + dt.getFullYear();

                    // Buat pesan WA lengkap
                    let pesan = `Selamat ${sapaan},\n`;
                    pesan += `Saya ingin booking kamar ${noKamar}\n`;
                    pesan += `Rincian:\n`;
                    pesan += `Tipe: ${tipe}\n`;
                    pesan += `Lantai: ${lantai}\n`;
                    pesan += `Fasilitas: ${fasilitas}\n`;
                    pesan += `Harga: Rp ${harga} / bulan\n`;
                    pesan += `Tanggal Masuk: ${tglFormatted}\n\n`;
                    pesan += `Terima kasih.`;

                    const nomorwa = '6287889280269'; // nomor WA admin tanpa +

                    // Buka WA di tab baru (langsung dari klik user)
                    window.open(`https://wa.me/${nomorwa}?text=${encodeURIComponent(pesan)}`, '_blank');

                    // Submit form via AJAX
                    const form = document.getElementById(`form-booking-${idKamar}`);
                    document.getElementById(`tgl-masuk-${idKamar}`).value = tgl;
                    const formData = new FormData(form);
                    fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            credentials: 'same-origin'
                        }).then(res => res.text())
                        .then(data => window.location.href = '../../user/reservasi/')
                        .catch(err => alert('Gagal booking: ' + err));
                }
                </script>


            </div>
        </div>
    </div>

</body>

</html>