<div class="bg-white shadow rounded-lg p-6 border border-pink-100">
    <h2 class="text-lg font-semibold text-pink-600 mb-4">👤 Akun Admin</h2>
    <form class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-pink-700">Nama Admin</label>
            <input type="text" value="<?= $_SESSION['user']['nama']?>"
                class="w-full border border-pink-300 rounded-md p-2 focus:ring-2 focus:ring-pink-500" />
        </div>
        <div>
            <label class="block text-sm font-medium text-pink-700">Email</label>
            <input type="email" value="<?= $_SESSION['user']['email'] ?>"
                class="w-full border border-pink-300 rounded-md p-2 focus:ring-2 focus:ring-pink-500" />
        </div>
        <div>
            <label class="block text-sm font-medium text-pink-700">Ganti Password</label>
            <input type="password" placeholder="Masukkan password baru" required
                class="w-full border border-pink-300 rounded-md p-2 focus:ring-2 focus:ring-pink-500" />
        </div>
        <button type="submit" class="bg-pink-500 text-white px-4 py-2 rounded hover:bg-pink-600">Update</button>
    </form>
</div>