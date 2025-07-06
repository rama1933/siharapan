 @extends('landing.layouts.layout')

 @section('title', 'Profil Organisasi - SIHARAPAN')

 {{-- Banner tidak ditampilkan di halaman ini karena @section('show_banner') tidak didefinisikan --}}

 @section('content')
     <main class="py-12 md:py-20 modern-bg">
         <div class="container mx-auto px-4 sm:px-6 lg:px-8">

             <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                 <div class="p-6 sm:p-8 md:p-12">

                     <div class="text-center mb-10">
                         <h1 class="text-4xl font-extrabold text-gray-800 tracking-tight fade-in">PROFIL <span
                                 class="text-brand-gold">ORGANISASI</span></h1>
                         <p class="mt-2 text-lg text-gray-500 fade-in delay-100">Dinas Ketahanan Pangan Kabupaten Hulu Sungai
                             Selatan</p>
                     </div>

                     <article class="text-lg text-gray-700 leading-relaxed">
                         <p class="mb-4 fade-in delay-200">
                             Dinas Ketahanan Pangan Kabupaten Hulu Sungai Selatan dibentuk berdasarkan Peraturan
                             Daerah Nomor 13 Tahun 2016 tentang Pembentukan dan Susunan Perangkat Daerah. Dinas
                             Ketahanan Pangan adalah perangkat daerah yang merupakan unsur pelaksana urusan
                             pemerintahan daerah bidang pangan. Dinas Ketahanan Pangan dipimpin oleh Kepala Dinas
                             yang berkedudukan dibawah dan bertanggung jawab kepada Bupati melalui Sekretaris Daerah.
                         </p>
                         <p class="mb-6 fade-in delay-300">
                             Berpedoman Peraturan Bupati Nomor 81 Tahun 2016 tentang Kedudukan, Susunan Organisasi,
                             Fungsi, dan Tugas Serta Tata Kerja Dinas Ketahanan Pangan Kabupaten Hulu Sungai Selatan
                             mempunyai tugas membantu bupati dalam melaksanakan urusan pemerintahan bidang
                             penyelenggaraan pangan berdasarkan kedaulatan dan kemandirian, penyelenggaraan pangan,
                             penanganan kerawanan pangan dan keamanan pangan serta tugas lain yang diberikan Bupati
                             sesuai perundang-undangan yang berlaku.
                         </p>

                         <h2 class="text-2xl font-bold text-brand-green-800 mt-10 mb-4 fade-in delay-400">Fungsi Dinas
                             Ketahanan Pangan</h2>
                         <ol class="list-decimal pl-5 space-y-2 fade-in delay-500">
                             <li class="hover:bg-gray-50 transition-colors duration-200 py-1 px-2 rounded-md">Koordinasi
                                 penyusunan rencana strategis, program, dan anggaran Dinas Ketahanan Pangan;</li>
                             <li class="hover:bg-gray-50 transition-colors duration-200 py-1 px-2 rounded-md">Perumusan
                                 kebijakan bidang penyelenggaraan pangan berdasarkan kedaulatan dan kemandirian;</li>
                             <li class="hover:bg-gray-50 transition-colors duration-200 py-1 px-2 rounded-md">Pelaksanaan
                                 kebijakan bidang penyelenggaraan pangan;</li>
                             <li class="hover:bg-gray-50 transition-colors duration-200 py-1 px-2 rounded-md">Pelaksanaan
                                 evaluasi dan pelaporan bidang penyelenggaraan pangan;</li>
                             <li class="hover:bg-gray-50 transition-colors duration-200 py-1 px-2 rounded-md">Pelaksanaan
                                 administrasi Dinas Ketahanan Pangan; dan</li>
                             <li class="hover:bg-gray-50 transition-colors duration-200 py-1 px-2 rounded-md">Pelaksanaan
                                 fungsi lain yang diberikan oleh Bupati terkait dengan tugas dan fungsinya.</li>
                         </ol>

                         <h2 class="text-2xl font-bold text-brand-green-800 mt-10 mb-4 fade-in delay-600">Struktur
                             Organisasi</h2>
                         <p class="mb-4 fade-in delay-700">Sesuai peraturan Bupati Nomor 81 Tahun 2016, struktur organisasi
                             Dinas Ketahanan Pangan Kab. Hulu Sungai Selatan terdiri atas:</p>
                         <ol class="list-decimal pl-5 space-y-3 fade-in delay-800">
                             <li class="hover:bg-gray-50 transition-colors duration-200 py-1 px-2 rounded-md"><strong>Kepala
                                     Dinas</strong></li>
                             <li class="hover:bg-gray-50 transition-colors duration-200 py-1 px-2 rounded-md">
                                 <strong>Sekretariat Dinas</strong>, membawahi:
                                 <ol class="list-[lower-alpha] pl-6 mt-2 space-y-1">
                                     <li class="hover:bg-gray-50 transition-colors duration-200 py-1 px-2 rounded-md">Sub
                                         Bagian Umum dan Kepegawaian</li>
                                     <li class="hover:bg-gray-50 transition-colors duration-200 py-1 px-2 rounded-md">Sub
                                         Bagian Perencanaan dan Keuangan</li>
                                 </ol>
                             </li>
                             <li class="hover:bg-gray-50 transition-colors duration-200 py-1 px-2 rounded-md"><strong>Bidang
                                     Ketersediaan dan Distribusi Pangan</strong>, membawahi:
                                 <ol class="list-[lower-alpha] pl-6 mt-2 space-y-1">
                                     <li class="hover:bg-gray-50 transition-colors duration-200 py-1 px-2 rounded-md">Seksi
                                         Ketersediaan Pangan</li>
                                     <li class="hover:bg-gray-50 transition-colors duration-200 py-1 px-2 rounded-md">Seksi
                                         Distribusi Pangan</li>
                                 </ol>
                             </li>
                             <li class="hover:bg-gray-50 transition-colors duration-200 py-1 px-2 rounded-md"><strong>Bidang
                                     Konsumsi dan Keamanan Pangan</strong>, membawahi:
                                 <ol class="list-[lower-alpha] pl-6 mt-2 space-y-1">
                                     <li class="hover:bg-gray-50 transition-colors duration-200 py-1 px-2 rounded-md">Seksi
                                         Konsumsi dan Penganekaragaman Pangan</li>
                                     <li class="hover:bg-gray-50 transition-colors duration-200 py-1 px-2 rounded-md">Seksi
                                         Keamanan Pangan</li>
                                 </ol>
                             </li>
                             <li class="hover:bg-gray-50 transition-colors duration-200 py-1 px-2 rounded-md">
                                 <strong>Kelompok Jabatan Fungsional</strong>
                             </li>
                         </ol>

                         <h2 class="text-2xl font-bold text-brand-green-800 mt-10 mb-4 fade-in delay-900">Tugas dan Fungsi
                             Sekretariat</h2>
                         <p class="mb-4 fade-in delay-1000">
                             Sekretariat mempunyai tugas melaksanakan koordinasi pelaksanaan tugas, pembinaan, dan
                             pemberian dukungan pelayanan administrasi kepada seluruh unit organisasi di lingkungan Dinas
                             Ketahanan Pangan.
                         </p>

                         <strong class="text-gray-800 fade-in delay-1100">Fungsi Sekretariat:</strong>
                         <ul class="list-disc pl-5 mt-2 space-y-2 fade-in delay-1200">
                             <li class="hover:bg-gray-50 transition-colors duration-200 py-1 px-2 rounded-md">Koordinasi
                                 penyusunan rencana strategis, program, dan anggaran.</li>
                             <li class="hover:bg-gray-50 transition-colors duration-200 py-1 px-2 rounded-md">Pembinaan dan
                                 pemberian dukungan administrasi (ketatausahaan, kepegawaian, kerumahtanggaan, kerjasama,
                                 hukum, humas, arsip, dan dokumentasi).</li>
                             <li class="hover:bg-gray-50 transition-colors duration-200 py-1 px-2 rounded-md">Pembinaan dan
                                 penataan organisasi dan tata laksana.</li>
                             <li class="hover:bg-gray-50 transition-colors duration-200 py-1 px-2 rounded-md">Koordinasi dan
                                 penyusunan peraturan perundang-undangan.</li>
                             <li class="hover:bg-gray-50 transition-colors duration-200 py-1 px-2 rounded-md">Pengelolaan
                                 barang milik/kekayaan negara.</li>
                             <li class="hover:bg-gray-50 transition-colors duration-200 py-1 px-2 rounded-md">Pelaksanaan
                                 koordinasi program dan kegiatan.</li>
                             <li class="hover:bg-gray-50 transition-colors duration-200 py-1 px-2 rounded-md">Koordinasi
                                 penyusunan laporan kinerja.</li>
                             <li class="hover:bg-gray-50 transition-colors duration-200 py-1 px-2 rounded-md">Pembinaan dan
                                 dukungan urusan administrasi keuangan.</li>
                         </ul>
                     </article>
                 </div>
             </div>

         </div>
     </main>
 @endsection

 <style>
     .fade-in {
         animation: fadeIn 0.5s ease-out forwards;
         opacity: 0;
     }

     @keyframes fadeIn {
         from {
             opacity: 0;
             transform: translateY(10px);
         }

         to {
             opacity: 1;
             transform: translateY(0);
         }
     }

     .delay-100 {
         animation-delay: 0.1s;
     }

     .delay-200 {
         animation-delay: 0.2s;
     }

     .delay-300 {
         animation-delay: 0.3s;
     }

     .delay-400 {
         animation-delay: 0.4s;
     }

     .delay-500 {
         animation-delay: 0.5s;
     }

     .delay-600 {
         animation-delay: 0.6s;
     }

     .delay-700 {
         animation-delay: 0.7s;
     }

     .delay-800 {
         animation-delay: 0.8s;
     }

     .delay-900 {
         animation-delay: 0.9s;
     }

     .delay-1000 {
         animation-delay: 1s;
     }

     .delay-1100 {
         animation-delay: 1.1s;
     }

     .delay-1200 {
         animation-delay: 1.2s;
     }
 </style>
