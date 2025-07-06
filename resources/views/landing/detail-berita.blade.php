@extends('landing.layouts.layout')

@section('title', $berita->judul . ' - SIHARAPAN')

{{-- Banner tidak akan ditampilkan karena @section('show_banner') tidak didefinisikan --}}

@section('content')
    <main class="py-12 md:py-20 modern-bg">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Card Konten Detail Berita -->
            <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg overflow-hidden">

                <!-- Gambar Utama Berita -->
                <img src="{{ asset($berita->path) }}" alt="{{ $berita->judul }}" class="w-full h-64 md:h-96 object-cover">

                <div class="p-6 sm:p-8 md:p-12">

                    <!-- Judul dan Meta Informasi -->
                    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">{{ $berita->judul }}</h1>
                    <p class="mt-2 text-gray-500">
                        Dipublikasikan pada {{ \Carbon\Carbon::parse($berita->created_at)->format('d F Y') }}
                    </p>

                    <hr class="my-6">

                    <!-- Konten Artikel -->
                    <article
                        class="prose prose-lg max-w-none prose-h2:font-bold prose-h2:text-2xl prose-strong:text-gray-800">
                        {!! $berita->berita !!}
                    </article>

                    <hr class="my-8">

                    <!-- Tombol Kembali -->
                    <div class="text-center">
                        <a href="{{ route('landing.berita') }}"
                            class="inline-flex items-center px-6 py-3 bg-brand-green-700 text-white rounded-lg font-semibold hover:bg-brand-green-800 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Kembali ke Semua Berita
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </main>
@endsection
