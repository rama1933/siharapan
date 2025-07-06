@extends('landing.layouts.layout')

@section('title', 'Struktur Organisasi - SIHARAPAN')

{{-- Banner tidak ditampilkan di halaman ini karena @section('show_banner') tidak didefinisikan --}}

@section('content')
    <main class="py-12 md:py-20 modern-bg">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Card Konten Struktur -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="p-6 sm:p-8 md:p-12">

                    <!-- Judul Halaman -->
                    <div class="text-center mb-10">
                        <h1 class="text-4xl font-extrabold text-gray-800 tracking-tight">STRUKTUR <span
                                class="text-brand-gold">ORGANISASI</span></h1>
                        <p class="mt-2 text-lg text-gray-500">Dinas Ketahanan Pangan Kabupaten Hulu Sungai Selatan</p>
                    </div>

                    <!-- Gambar Struktur Organisasi -->
                    <div class="w-full overflow-x-auto">
                        <img src="{{ asset('logo/sto.jpeg') }}" class="max-w-full h-auto mx-auto rounded-lg shadow-md"
                            alt="Bagan Struktur Organisasi Dinas Ketahanan Pangan">
                    </div>

                </div>
            </div>

        </div>
    </main>
@endsection
