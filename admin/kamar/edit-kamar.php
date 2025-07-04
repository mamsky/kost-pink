<?php
    require '../../config/db.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM kamar WHERE id = '$id'";
    $getData = $conn->query($sql);
    $data = $getData->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Edit Kamar - Admin Kost Pink</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-50 text-gray-800 min-h-screen">
    <div class="max-w-3xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-pink-700 text-center mb-8">Edit Kamar Baru</h1>

        <form action="../../controller/admin/edit_kamar.php?id=<?= $data['id'] ?>" method="POST"
            enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow space-y-4">
            <input type="hidden" value="<?= $id ?>" name="id">
            <div>
                <label class="block mb-1 font-medium">Nomor Kamar</label>
                <input type="text" name="nomor_kamar" required class="w-full border border-pink-300 rounded px-3 py-2"
                    value="<?= $data['no_kamar'] ?>" placeholder="Misal: A1, B2" />
            </div>

            <div>
                <label class="block mb-1 font-medium">Tipe Kamar</label>
                <select name="tipe" required class="w-full border border-pink-300 rounded px-3 py-2">
                    <option value="<?= $data['tipe'] ?>" selected hidden><?= $data['tipe'] ?></option>
                    <option value="AC">AC + KM Dalam</option>
                    <option value="Non-AC">Non-AC + KM Luar</option>
                </select>
            </div>

            <div>
                <label class="block mb-1 font-medium">Fasilitas</label>
                <textarea name="fasilitas" rows="3" required class="w-full border border-pink-300 rounded px-3 py-2"
                    placeholder="Contoh: Kasur, Meja, Lemari, Wi-Fi, Balkon"><?= $data['fasilitas'] ?></textarea>
            </div>

            <div>
                <label class="block mb-1 font-medium">Harga per Bulan</label>
                <input type="number" name="harga" required class="w-full border border-pink-300 rounded px-3 py-2"
                    value="<?= $data['harga'] ?>" placeholder="Contoh: 600000" />
            </div>

            <div>
                <label class="block mb-1 font-medium">Lantai</label>
                <select name="lantai" required class="w-full border border-pink-300 rounded px-3 py-2">
                    <option value="<?= $data['lantai'] ?>" selected hidden><?= $data['lantai'] ?></option>
                    <option value="Lantai 1">Lantai 1</option>
                    <option value="Lantai 2">Lantai 2</option>
                    <option value="Lantai 3">Lantai 3</option>
                </select>
            </div>

            <div>
                <label class="block mb-1 font-medium">Gambar Kamar</label>
                <input type="file" name="gambar" value="<?= $data['foto'] ?>"
                    class="w-full border border-pink-300 rounded px-3 py-2" />
            </div>

            <div>
                <label class="block mb-1 font-medium">Status</label>
                <select name="status" required class="w-full border border-pink-300 rounded px-3 py-2">
                    <option value="<?= $data['status'] ?>" selected hidden><?= $data['status'] ?></option>
                    <option value="terisi">terisi</option>
                    <option value="tersedia">tersedia</option>
                </select>
            </div>

            <div class="pt-4">
                <button type="submit" name="edit-kamar"
                    class="w-full bg-pink-500 text-white py-2 rounded hover:bg-pink-600 font-semibold">
                    Edit Kamar
                </button>
            </div>
        </form>
    </div>
</body>

</html>