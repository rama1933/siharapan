@extends('landing.layouts.layout')

@section('title', 'Semua Berita - SIHARAPAN')

{{-- Banner tidak akan ditampilkan karena @section('show_banner') tidak didefinisikan --}}

@section('content')
    <main class="py-12 md:py-20 modern-bg">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Judul Halaman -->
            <div class="text-center mb-10 md:mb-12">
                <h1 class="text-4xl font-extrabold text-gray-800 tracking-tight">SEMUA <span
                        class="text-brand-gold">BERITA</span></h1>
                <p class="mt-2 text-lg text-gray-500">Ikuti perkembangan dan informasi terbaru seputar ketahanan pangan.</p>
            </div>

            <!-- Grid untuk Kartu Berita -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($berita as $data)
                    <div
                        class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col transition-transform hover:-translate-y-2">
                        {{-- Gambar Berita --}}
                        <a href="{{ route('landing.berita.detail', ['id' => $data->id]) }}">
                            <img src="{{ asset('storage/' . $data->path) }}" alt="{{ $data->judul }}"
                                class="w-full h-48 object-cover">
                        </a>

                        {{-- Konten Kartu --}}
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-lg font-bold text-gray-900 mb-2">
                                <a href="{{ route('landing.berita.detail', ['id' => $data->id]) }}"
                                    class="hover:text-brand-gold transition-colors">
                                    {{ Str::limit($data->judul, 50) }}
                                </a>
                            </h3>
                            <div class="text-gray-600 text-sm flex-grow">
                                {!! Str::limit(strip_tags($data->berita), 100, '...') !!}
                            </div>
                            <a href="{{ route('landing.berita.detail', ['id' => $data->id]) }}"
                                class="mt-4 text-brand-green-700 hover:text-brand-gold font-semibold self-start transition-colors">
                                Baca Selengkapnya &rarr;
                            </a>
                        </div>
                    </div>
                @empty
                    {{-- Pesan jika tidak ada berita --}}
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-16">
                        <p class="text-gray-500 text-xl">Belum ada berita yang tersedia.</p>
                    </div>
                @endforelse
            </div>

            <!-- Link Paginasi -->
            <div class="mt-12">
                {{-- Catatan: Untuk styling paginasi yang sempurna dengan Tailwind, 
                     Anda mungkin perlu menjalankan `php artisan vendor:publish --tag=laravel-pagination` 
                     dan menyesuaikan file-filenya, atau menggunakan paket seperti `laravel-tailwind-paginator`. 
                     Ini adalah styling dasar. --}}
                {{ $berita->links() }}
            </div>

        </div>
    </main>
@endsection
