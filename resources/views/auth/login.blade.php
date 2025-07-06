<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIHARAPAN</title>
    <link href="{{ url('') }}/logo/hss.png" rel="icon">

    <!-- Memuat Font Inter dari Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Memuat Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Konfigurasi Tailwind untuk menggunakan font Inter dan warna kustom
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        'brand-green': {
                            '700': '#4A6F3A',
                            '800': '#3A592E',
                            '900': '#2E4724'
                        },
                        'brand-gold': '#d1a943',
                    }
                }
            }
        }
    </script>
</head>

<body class="font-sans bg-gray-100">

    <div class="relative min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 bg-no-repeat bg-cover"
        style="background-image: url(https://images.unsplash.com/photo-1533900298318-6b8da08a523e?q=80&w=2070&auto=format&fit=crop);">
        <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
        <div class="max-w-4xl w-full bg-white rounded-2xl shadow-2xl flex z-10 overflow-hidden my-8">

            <!-- Kolom Kiri dengan Gambar Ilustrasi -->
            <div class="hidden md:flex w-1/2 items-center justify-center p-12 bg-brand-green-800">
                <div class="text-center text-white">
                    <img src="{{ asset('logo/1.png') }}" alt="Logo SIHARAPAN" class="mx-auto mb-6 h-20 w-auto">
                    <h2 class="text-3xl font-bold tracking-tight">SIHARAPAN</h2>
                    <p class="mt-2 text-lg opacity-80">Sistem Informasi Harga Pangan Kabupaten Hulu Sungai Selatan</p>
                </div>
            </div>

            <!-- Kolom Kanan dengan Form -->
            <div class="w-full md:w-1/2 p-8 sm:p-12">
                <div class="text-left mb-8">
                    <h2 class="text-3xl font-extrabold text-gray-900">Login Akun</h2>
                    <p class="mt-2 text-gray-600">Selamat datang kembali!</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Input Username -->
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <div class="mt-1">
                            <input id="username" name="username" type="text" required
                                class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-brand-green-700 focus:border-brand-green-700 sm:text-sm"
                                placeholder="Masukkan username Anda">
                        </div>
                    </div>

                    <!-- Input Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" required
                                class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-brand-green-700 focus:border-brand-green-700 sm:text-sm"
                                placeholder="Masukkan password Anda">
                        </div>
                    </div>

                    <!-- Tombol Login -->
                    <div>
                        <button type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-brand-green-700 hover:bg-brand-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-green-500 transition-colors">
                            Login
                        </button>
                    </div>
                </form>


            </div>
        </div>
    </div>

</body>

</html>
