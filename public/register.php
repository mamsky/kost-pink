<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Register - Kost Pink Pontianak</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-50 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-sm">
        <h2 class="text-2xl font-bold text-center mb-6">Register <span class="text-pink-600">Kost Pink</span> </h2>
        <form class="space-y-4" method="POST" action="../controller/auth/register.php">
            <div>
                <label class="block text-sm font-medium text-pink-700">Nama Lengkap</label>
                <input type="text" placeholder="Masukkan Nama Lengkap Anda" name="nama"
                    class="w-full p-2 mt-1 border border-pink-300 rounded-md focus:outline-none focus:ring-2 focus:ring-pink-500"
                    required />
            </div>
            <div>
                <label class="block text-sm font-medium text-pink-700">Email</label>
                <input type="email" placeholder="Masukkan Email Anda" name="email"
                    class="w-full p-2 mt-1 border border-pink-300 rounded-md focus:outline-none focus:ring-2 focus:ring-pink-500"
                    required />
            </div>
            <div>
                <label class="block text-sm font-medium text-pink-700">Phone</label>
                <input type="number" placeholder="Masukkan No Telpon Anda" name="phone"
                    class="w-full p-2 mt-1 border border-pink-300 rounded-md focus:outline-none focus:ring-2 focus:ring-pink-500"
                    required />
            </div>
            <div>
                <label class="block text-sm font-medium text-pink-700">Password</label>
                <input type="password" placeholder="Masukkan Password Anda" name="password"
                    class="w-full p-2 mt-1 border border-pink-300 rounded-md focus:outline-none focus:ring-2 focus:ring-pink-500"
                    required />
            </div>
            <button type="submit" name="register"
                class="w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold py-2 rounded-md">
                Register
            </button>
            <p class="text-center text-sm mt-4 text-gray-500">
                Sudah punya akun? <a href="./login.php" class="text-pink-600 font-semibold hover:underline">Login
                    sekarang</a>
            </p>
        </form>
    </div>

</body>

</html>