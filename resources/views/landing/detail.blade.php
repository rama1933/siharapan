@extends('landing.layouts.layout')

@section('title', 'Detail Harga Pangan - SIHARAPAN')

{{-- Tambahkan CSS untuk DataTables --}}
@push('page-styles')
    {{-- Menggunakan CSS DataTables standar yang lebih kompatibel --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <style>
        /* Kustomisasi ulang untuk DataTables agar cocok dengan tema */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.5em 1em;
            margin-left: 2px;
            border-radius: 0.5rem;
            border: 1px solid #d1d5db;
            background: white;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background: #4A6F3A !important;
            color: white !important;
            border-color: #4A6F3A !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #f3f4f6 !important;
            border-color: #d1d5db !important;
        }

        .dataTables_length select,
        .dataTables_filter input {
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            padding: 0.5rem;
            margin: 0 0.5rem;
        }
    </style>
@endpush

@section('content')
    <main class="py-12 md:py-20 modern-bg">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Judul Halaman -->
            <div class="text-center mb-10 md:mb-12">
                <h1 class="text-4xl font-extrabold text-gray-800 tracking-tight">DETAIL <span class="text-brand-gold">HARGA
                        PANGAN</span></h1>
                <p class="mt-2 text-lg text-gray-500">Analisis historis untuk komoditas:
                    <strong>{{ $nama_komoditas->nama . ' - ' . $nama_komoditas->jenis ?? 'Tidak Ditemukan' }}</strong>
                </p>
            </div>

            <!-- Card untuk Filter dan Grafik -->
            <div id="grafik" class="bg-white p-6 sm:p-8 rounded-2xl shadow-lg mb-12 relative">
                <div class="flex flex-col xl:flex-row justify-between items-start xl:items-center mb-6 gap-4">
                    <div class="flex-shrink-0">
                        <h2 class="text-2xl font-bold text-gray-800">GRAFIK <span class="text-brand-gold">HARGA
                                PANGAN</span>
                        </h2>
                        <p class="text-gray-500 mt-1">Analisis tren harga komoditas.</p>
                    </div>
                    {{-- PERBAIKAN: Menggunakan grid 2 kolom agar filter sejajar --}}
                    <div class="flex-grow w-full xl:w-auto grid grid-cols-1 sm:grid-cols-2 gap-4 items-end">
                        <div>
                            <label for="start-date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal
                                Awal</label>
                            <input type="text" id="start-date" placeholder="Pilih tanggal..."
                                class="w-full h-[50px] px-4 border border-gray-300 rounded-lg focus:ring-brand-green-700 focus:border-brand-green-700">
                        </div>
                        <div>
                            <label for="end-date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Akhir</label>
                            <input type="text" id="end-date" placeholder="Pilih tanggal..."
                                class="w-full h-[50px] px-4 border border-gray-300 rounded-lg focus:ring-brand-green-700 focus:border-brand-green-700">
                        </div>
                    </div>
                </div>
                <div id="grafik-harga-pangan-container" class="w-full min-h-[450px]"></div>

                <div id="chart-loader"
                    class="absolute inset-0 bg-white bg-opacity-75 flex flex-col items-center justify-center rounded-2xl hidden z-20">
                    <div class="w-16 h-16 border-4 border-brand-gold border-t-transparent rounded-full animate-spin"></div>
                    <p class="mt-4 text-gray-600 font-semibold">Memuat data...</p>
                </div>
            </div>

            <!-- Bagian Tabel Harga -->
            <div id="tabel" class="bg-white rounded-2xl shadow-lg overflow-hidden p-6 sm:p-8">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">RIWAYAT HARGA</h2>
                        <p class="text-gray-500 mt-1">Data historis untuk komoditas yang dipilih.</p>
                    </div>
                    {{-- Tombol cetak bisa ditambahkan di sini jika diperlukan --}}
                    <div class="flex space-x-2 mt-4 sm:mt-0">
                        <a href="#" id="export-pdf"
                            class="inline-flex items-center px-4 py-2 bg-red-50 text-red-700 rounded-lg hover:bg-red-100 font-semibold text-sm transition-colors">
                            <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Cetak PDF
                        </a>
                        <a href="#" id="export-excel"
                            class="inline-flex items-center px-4 py-2 bg-green-50 text-green-700 rounded-lg hover:bg-green-100 font-semibold text-sm transition-colors">
                            <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Cetak Excel
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full" id="harga-table">
                        <thead class="text-xs text-brand-green-900 uppercase bg-yellow-100">
                            <tr>
                                <th class="px-6 py-3">Tanggal</th>
                                <th class="px-6 py-3">Nama</th>
                                <th class="px-6 py-3">Jenis</th>
                                <th class="px-6 py-3">Satuan</th>
                                <th class="px-6 py-3">Harga</th>
                                <th class="px-6 py-3">
                                    Harga Grosir</th>
                                <th class="px-6 py-3">
                                    Harga Kios Pangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Isi tabel akan dimuat oleh DataTables --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('page-scripts')
    {{-- Memuat JS untuk DataTables --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

    <script>
        $(document).ready(function() {
            // --- INISIALISASI ---
            const fpStartDate = flatpickr("#start-date", {
                dateFormat: "Y-m-d"
            });
            const fpEndDate = flatpickr("#end-date", {
                dateFormat: "Y-m-d"
            });

            const chartContainer = document.getElementById('grafik-harga-pangan-container');
            const loader = document.getElementById('chart-loader');
            let chart;
            let dataTable;

            // --- Inisialisasi DataTables ---
            function initializeDataTable() {
                dataTable = $('#harga-table').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    order: [
                        [0, 'desc']
                    ],
                    ajax: {
                        url: "{{ route('landing.detail.data', ['id' => $id]) }}",
                        data: function(d) {
                            d.start_date = $('#start-date').val();
                            d.end_date = $('#end-date').val();
                        }
                    },
                    columns: [{
                            data: 'tanggal',
                            name: 'tanggal'
                        },
                        {
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'jenis',
                            name: 'jenis'
                        },
                        {
                            data: 'satuan',
                            name: 'satuan'
                        },
                        {
                            data: 'harga_terendah',
                            name: 'harga_terendah'
                        },
                        {
                            data: 'harga_grosir',
                            name: 'harga_grosir',
                        },
                        {
                            data: 'harga_kios',
                            name: 'harga_kios'
                        },
                    ]
                });
            }

            // --- FUNGSI UNTUK MENGAMBIL DATA GRAFIK ---
            function fetchChartData() {
                loader.classList.remove('hidden');

                let fetchUrl = `{{ route('landing.chart.filter') }}?id={{ $id }}`;
                const startDate = $('#start-date').val();
                const endDate = $('#end-date').val();
                if (startDate) fetchUrl += `&start_date=${startDate}`;
                if (endDate) fetchUrl += `&end_date=${endDate}`;

                fetch(fetchUrl)
                    .then(response => response.json())
                    .then(data => {
                        if (chart) {
                            chart.updateSeries([{
                                data: data.harga_chart_data
                            }]);
                            chart.updateOptions({
                                xaxis: {
                                    categories: data.tanggal_chart_data
                                }
                            });
                        }
                    })
                    .finally(() => {
                        loader.classList.add('hidden');
                    });
            }

            // --- FUNGSI UNTUK MEMPERBARUI LINK EKSPOR ---
            function updateExportLinks() {
                const startDate = $('#start-date').val();
                const endDate = $('#end-date').val();

                let pdfUrl = `{{ route('export.pdf.detail', ['id' => $id]) }}`;
                let excelUrl = `{{ route('export.excel.detail', ['id' => $id]) }}`;

                const params = new URLSearchParams();
                if (startDate) params.append('start_date', startDate);
                if (endDate) params.append('end_date', endDate);

                if (params.toString()) {
                    pdfUrl += `?${params.toString()}`;
                    excelUrl += `?${params.toString()}`;
                }

                $('#export-pdf').attr('href', pdfUrl);
                $('#export-excel').attr('href', excelUrl);
            }

            // --- RENDER CHART AWAL ---
            const initialHargaData = {!! json_encode($harga_chart_data) !!};
            const initialTanggalData = {!! json_encode($tanggal_chart_data) !!};
            if (chartContainer && initialHargaData.length > 0) {
                const options = {
                    series: [{
                        name: 'Harga',
                        data: initialHargaData
                    }],
                    chart: {
                        height: 450,
                        type: 'area',
                        fontFamily: 'Inter, sans-serif'
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    colors: ['#d1a943'],
                    xaxis: {
                        type: 'date',
                        categories: initialTanggalData
                    },
                    tooltip: {
                        x: {
                            format: 'dd MMM yy'
                        }
                    },
                };
                chart = new ApexCharts(chartContainer, options);
                chart.render();
            }

            // --- Inisialisasi Data Awal & Event Listener ---
            initializeDataTable();
            updateExportLinks(); // Panggil saat halaman dimuat

            $('#start-date, #end-date').on('change', function() {
                dataTable.ajax.reload(); // Muat ulang data tabel
                fetchChartData(); // Muat ulang data grafik
                updateExportLinks(); // Perbarui link ekspor
            });
        });
    </script>
@endpush
