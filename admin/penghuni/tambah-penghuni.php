<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Tambah Penghuni - Admin Kost Pink</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-50 text-gray-800 min-h-screen">
    <div class="max-w-3xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-pink-700 text-center mb-8">Tambah Penghuni Baru</h1>

        <form action="/admin/penghuni/store.php" method="POST" class="bg-white p-6 rounded-lg shadow space-y-4">

            <div>
                <label class="block mb-1 font-medium">Nama Lengkap</label>
                <input type="text" name="nama" required class="w-full border border-pink-300 rounded px-3 py-2" />
            </div>

            <div>
                <label class="block mb-1 font-medium">Email</label>
                <input type="email" name="email" required class="w-full border border-pink-300 rounded px-3 py-2" />
            </div>

            <div>
                <label class="block mb-1 font-medium">No. HP</label>
                <input type="text" name="no_hp" required class="w-full border border-pink-300 rounded px-3 py-2" />
            </div>

            <div>
                <label class="block mb-1 font-medium">Alamat</label>
                <textarea name="alamat" required rows="3"
                    class="w-full border border-pink-300 rounded px-3 py-2"></textarea>
            </div>

            <div>
                <label class="block mb-1 font-medium">Pilih Kamar</label>
                <select name="kamar" required class="w-full border border-pink-300 rounded px-3 py-2">
                    <option value="">-- Pilih Kamar --</option>
                    <option value="A1">Kamar A1 - Lantai 1</option>
                    <option value="B2">Kamar B2 - Lantai 2</option>
                    <option value="C3">Kamar C3 - Lantai 3</option>
                </select>
            </div>

            <div>
                <label class="block mb-1 font-medium">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" required
                    class="w-full border border-pink-300 rounded px-3 py-2" />
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-pink-500 text-white py-2 rounded hover:bg-pink-600 font-semibold">
                    Simpan Penghuni
                </button>
            </div>
        </form>
    </div>
</body>

</html>