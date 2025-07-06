<!-- Header & Banner Section -->
<div class="relative bg-gradient-to-br from-brand-green-800 to-brand-green-900 text-white overflow-hidden">
    <div id="particles-js"></div>
    <div class="header-content">
        <!-- Header / Navigasi -->
        <header class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4 border-b border-white/20">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('logo/1.png') }}" class="h-12 w-auto">
                </div>
                <!-- Menu Navigasi -->
                <nav class="hidden md:flex items-center space-x-6">
                    <a href="{{ url('/') }}"
                        class="{{ request()->is('/') ? 'text-brand-gold font-bold' : 'font-medium hover:text-brand-gold' }} transition-colors">Home</a>

                    <a href="{{ route('profile') }}"
                        class="{{ request()->routeIs('profile') ? 'text-brand-gold font-bold' : 'font-medium hover:text-brand-gold' }} transition-colors">Profil</a>

                    <a href="{{ route('struktur') }}"
                        class="{{ request()->routeIs('struktur') ? 'text-brand-gold font-bold' : 'font-medium hover:text-brand-gold' }} transition-colors">Struktur</a>

                    <a href="{{ route('landing.berita') }}"
                        class="{{ request()->routeIs('landing.berita') ? 'text-brand-gold font-bold' : 'font-medium hover:text-brand-gold' }} transition-colors">Berita</a>
                    <!-- Social Icons -->
                    <div class="flex items-center space-x-4 pl-4 border-l border-white/20">
                        <a href="https://www.facebook.com/profile.php?id=100015153813326" target="_blank"
                            class="hover:text-brand-gold transition-colors" title="Facebook">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z" />
                            </svg>
                        </a>
                        <a href="https://www.instagram.com/ketahananpanganhss/" target="_blank"
                            class="hover:text-brand-gold transition-colors" title="Instagram">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.85s-.011 3.585-.069 4.85c-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07s-3.585-.012-4.85-.07c-3.252-.148-4.771-1.691-4.919-4.919-.058-1.265-.069-1.645-.069-4.85s.011-3.585.069-4.85c.149-3.225 1.664-4.771 4.919-4.919 1.266-.058 1.644-.07 4.85-.07zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948s.014 3.667.072 4.947c.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072s3.667-.014 4.947-.072c4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.947s-.014-3.667-.072-4.947c-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.689-.073-4.948-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.162 6.162 6.162 6.162-2.759 6.162-6.162-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4s1.791-4 4-4 4 1.79 4 4-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44 1.441-.645 1.441-1.44c0-.795-.645-1.44-1.441-1.44z" />
                            </svg>
                        </a>
                        <a href="https://www.youtube.com/@ketahananpanganhss4770" target="_blank"
                            class="hover:text-brand-gold transition-colors" title="YouTube">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
                            </svg>
                        </a>
                        <a href="https://goo.gl/maps/fYo8vpkYMgGpd4aB7" target="_blank"
                            class="hover:text-brand-gold transition-colors" title="Lokasi">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 0c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602zm0 11c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z" />
                            </svg>
                        </a>
                        <a href="http://dkp.hulusungaiselatankab.go.id/" target="_blank"
                            class="hover:text-brand-gold transition-colors" title="Website">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9h-9m-9 9a9 9 0 019-9m-9 9v-9m0 9h9m-9-9a9 9 0 01-9-9m9 9v9m-9-9h9" />
                            </svg>
                        </a>
                        <a href="http://wa.link/nvv83s" target="_blank" class="hover:text-brand-gold transition-colors"
                            title="WhatsApp">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.894 11.892-1.99 0-3.903-.52-5.586-1.456l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.886-.001 2.269.655 4.398 1.849 6.166l-1.132 4.135 4.274-1.124z" />
                            </svg>
                        </a>
                    </div>
                </nav>
            </div>
        </header>

        {{-- PERBAIKAN: Banner hanya akan ditampilkan jika section 'show_banner' didefinisikan --}}
        @if (isset($show_banner) && $show_banner)
            <!-- Banner Section -->
            <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div class="text-center md:text-left">
                        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tighter leading-tight fade-in-up">
                            Selamat Datang Di Aplikasi <span class="text-brand-gold">SIHARAPAN</span>
                        </h1>
                        <p class="mt-4 max-w-lg mx-auto md:mx-0 text-lg text-gray-200 fade-in-up delay-1">
                            Pantau fluktuasi harga kebutuhan pokok secara harian, langsung dari sumber terpercaya di
                            wilayah Anda.
                        </p>
                        <div class="mt-8 fade-in-up delay-2">
                            <a href="{{ route('login') }}"
                                class="bg-white text-brand-green-800 px-8 py-3 rounded-lg font-bold text-lg hover:bg-gray-200 transition-transform hover:scale-105 shadow-lg inline-block">Login</a>
                        </div>
                    </div>
                    <div class="hidden md:block fade-in-up delay-3">
                        <div class="image_1" style="margin-bottom: 20px;margin-left: 150px" class="rounded-2xl"><img
                                src="{{ asset('fresh/images/banner_img4.png') }}">
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </div>
</div>
