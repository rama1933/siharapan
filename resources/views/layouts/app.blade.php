<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - SIHARAPAN</title>
    <link href="{{ url('') }}/logo/hss.png" rel="icon">

    <!-- Memuat Font Inter dari Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Memuat Aset dari Vite (CSS & JS) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('page-styles')
</head>

<body class="bg-gray-100 font-sans antialiased">
    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-brand-green-900 lg:translate-x-0 lg:static lg:inset-0">
            <div class="flex items-center justify-center mt-8">
                <div class="flex items-center">
                    <img src="{{ asset('logo/1.png') }}" class="h-12 w-auto">
                </div>
            </div>

            {{-- PERBAIKAN: Menu dengan ikon dan gaya baru --}}
            <nav class="mt-10 px-4">
                <a class="flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('home') ? 'bg-brand-gold text-white shadow-lg' : 'text-gray-300 hover:bg-brand-green-800 hover:text-white' }} transition-colors duration-200"
                    href="{{ route('home') }}">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="mx-3 font-medium">Dashboard</span>
                </a>

                <div class="mt-6">
                    <span class="px-4 text-xs font-bold text-gray-500 uppercase tracking-wider">MASTER</span>
                    <a class="flex items-center px-4 py-3 mt-2 rounded-lg {{ request()->routeIs('satuan.*') ? 'bg-brand-gold text-white shadow-lg' : 'text-gray-300 hover:bg-brand-green-800 hover:text-white' }} transition-colors duration-200"
                        href="{{ route('satuan.index') }}">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                        </svg>
                        <span class="mx-3 font-medium">Satuan</span>
                    </a>
                    <a class="flex items-center px-4 py-3 mt-2 rounded-lg {{ request()->routeIs('komoditi.*') ? 'bg-brand-gold text-white shadow-lg' : 'text-gray-300 hover:bg-brand-green-800 hover:text-white' }} transition-colors duration-200"
                        href="{{ route('komoditi.index') }}">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <span class="mx-3 font-medium">Komoditi</span>
                    </a>
                    <a class="flex items-center px-4 py-3 mt-2 rounded-lg {{ request()->routeIs('bapo.*') ? 'bg-brand-gold text-white shadow-lg' : 'text-gray-300 hover:bg-brand-green-800 hover:text-white' }} transition-colors duration-200"
                        href="{{ route('bapo.index') }}">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7l8 4" />
                        </svg>
                        <span class="mx-3 font-medium">Bahan Pokok</span>
                    </a>
                </div>

                <div class="mt-6">
                    <span class="px-4 text-xs font-bold text-gray-500 uppercase tracking-wider">HARGA</span>
                    <a class="flex items-center px-4 py-3 mt-2 rounded-lg {{ request()->routeIs('harga.kandangan.*') ? 'bg-brand-gold text-white shadow-lg' : 'text-gray-300 hover:bg-brand-green-800 hover:text-white' }} transition-colors duration-200"
                        href="{{ route('harga.kandangan.index') }}">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v.01M12 6v-1.646a4.002 4.002 0 00-4-3.996 4.002 4.002 0 00-4 3.996v1.646m8 0h-8m8 0c1.657 0 3 .895 3 2s-1.343 2-3 2m0 8c-1.11 0-2.08-.402-2.599-1M12 16v1m0-1v-.01M12 18v1.646a4.002 4.002 0 004 3.996 4.002 4.002 0 004-3.996v-1.646m-8 0h8m-8 0c-1.657 0-3-.895-3-2s1.343-2 3-2" />
                        </svg>
                        <span class="mx-3 font-medium">Harga</span>
                    </a>
                    <a class="flex items-center px-4 py-3 mt-2 rounded-lg {{ request()->routeIs('koefisien.*') ? 'bg-brand-gold text-white shadow-lg' : 'text-gray-300 hover:bg-brand-green-800 hover:text-white' }} transition-colors duration-200"
                        href="{{ route('koefisien.index') }}">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v.01M12 6v-1.646a4.002 4.002 0 00-4-3.996 4.002 4.002 0 00-4 3.996v1.646m8 0h-8m8 0c1.657 0 3 .895 3 2s-1.343 2-3 2m0 8c-1.11 0-2.08-.402-2.599-1M12 16v1m0-1v-.01M12 18v1.646a4.002 4.002 0 004 3.996 4.002 4.002 0 004-3.996v-1.646m-8 0h8m-8 0c-1.657 0-3-.895-3-2s1.343-2 3-2" />
                        </svg>
                        <span class="mx-3 font-medium">Koefisien</span>
                    </a>
                </div>

                <div class="mt-6">
                    <span class="px-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Berita</span>
                    <a class="flex items-center px-4 py-3 mt-2 rounded-lg {{ request()->routeIs('berita.*') ? 'bg-brand-gold text-white shadow-lg' : 'text-gray-300 hover:bg-brand-green-800 hover:text-white' }} transition-colors duration-200"
                        href="{{ route('berita.index') }}">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3h4m-4 16v4m0 0v-4m0 4H5m16-4h-2" />
                        </svg>
                        <span class="mx-3 font-medium">Berita</span>
                    </a>
                </div>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-brand-gold">
                <div class="flex items-center">
                    <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>

                <div class="flex items-center">
                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = !dropdownOpen"
                            class="relative block h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none">
                            <img class="h-full w-full object-cover" src="{{ asset('') }}logo/user.png"
                                alt="Your avatar">
                        </button>

                        <div x-show="dropdownOpen" @click="dropdownOpen = false"
                            class="fixed inset-0 h-full w-full z-10"></div>

                        <div x-show="dropdownOpen"
                            class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-20">
                            <a href="{{ route('logout') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-brand-green-700 hover:text-white">Logout</a>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="container mx-auto px-6 py-8">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    @stack('page-scripts')
</body>

</html>
