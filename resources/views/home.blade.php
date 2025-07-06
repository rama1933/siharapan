@extends('layouts.app')

@section('title', 'Dashboard')

@push('page-styles')
    {{-- Menambahkan CSS untuk Select2 dan Flatpickr --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        /* Kustomisasi untuk Select2 agar cocok dengan tema */
        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            height: 50px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #111827;
            line-height: 48px;
            padding-left: 1rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 48px;
            right: 8px;
        }
    </style>
@endpush

@section('content')
    <div class="space-y-8">
        <!-- Welcome Card -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="flex items-center">
                <div class="w-full lg:w-2/3 p-8">
                    <h2 class="text-3xl font-bold text-brand-green-800">Selamat Datang Kembali!</h2>
                    <p class="mt-2 text-lg text-gray-600">Anda login sebagai
                        <strong>{{ Auth::user()->name ?? 'Admin' }}</strong>. Mari kita mulai.
                    </p>
                    <a href="{{ url('/') }}" target="_blank"
                        class="mt-6 inline-block bg-brand-gold text-white font-bold px-6 py-3 rounded-lg hover:opacity-90 transition-opacity shadow-md">
                        Lihat Halaman Depan
                    </a>
                </div>
                <div class="hidden lg:flex w-1/3 items-center justify-center p-4">
                    <img src="{{ asset('sneat/assets/img/illustrations/man-with-laptop-light.png') }}" alt="Man with laptop"
                        class="w-full h-auto max-w-xs">
                </div>
            </div>
        </div>


        <!-- Grafik Harga Pangan -->
        <div id="grafik" class="bg-white p-6 sm:p-8 rounded-2xl shadow-lg mt-8 relative">
            <div class="flex flex-col xl:flex-row justify-between items-start xl:items-center mb-6 gap-4">
                <div class="flex-shrink-0">
                    <h2 class="text-2xl font-bold text-gray-800">GRAFIK <span class="text-brand-gold">HARGA PANGAN</span>
                    </h2>
                    <p class="text-gray-500 mt-1">Analisis tren harga komoditas.</p>
                </div>
                <div class="flex-grow w-full xl:w-auto grid grid-cols-1 sm:grid-cols-3 gap-4 items-end">
                    <div class="sm:col-span-1">
                        <label for="jenis-filter" class="block text-sm font-medium text-gray-700 mb-1">Komoditas</label>
                        <select id="jenis-filter" class="select2" style="width: 100%;">
                            @foreach ($jenis_list as $jenis)
                                <option value="{{ $jenis->id }}"> {{ ucwords($jenis->komoditi->nama) }} -
                                    {{ ucwords($jenis->nama) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="sm:col-span-1">
                        <label for="start-date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Awal</label>
                        <input type="text" id="start-date" placeholder="Pilih tanggal..."
                            class="w-full h-[50px] px-4 border border-gray-300 rounded-lg focus:ring-brand-green-700 focus:border-brand-green-700">
                    </div>
                    <div class="sm:col-span-1">
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
    </div>
@endsection

@push('page-scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // --- INISIALISASI ---
            $('#jenis-filter').select2({
                theme: "default"
            });
            const fpStartDate = flatpickr("#start-date", {
                dateFormat: "Y-m-d"
            });
            const fpEndDate = flatpickr("#end-date", {
                dateFormat: "Y-m-d"
            });

            const chartContainer = document.getElementById('grafik-harga-pangan-container');
            const loader = document.getElementById('chart-loader');
            let chart;

            // --- FUNGSI RENDER & FETCH CHART ---
            function renderChart(hargaData, tanggalData) {
                const options = {
                    series: [{
                        name: 'Harga Rata-Rata',
                        data: hargaData
                    }],
                    chart: {
                        height: 450,
                        type: 'area',
                        fontFamily: 'Inter, sans-serif',
                        toolbar: {
                            show: true
                        }
                    },
                    colors: ["#4A6F3A"],
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    xaxis: {
                        type: 'datetime',
                        categories: tanggalData
                    },
                    tooltip: {
                        x: {
                            format: 'dd/MM/yy'
                        }
                    },
                };
                if (chart) {
                    chart.updateOptions(options);
                } else {
                    chart = new ApexCharts(chartContainer, options);
                    chart.render();
                }
            }

            function fetchChartData() {
                loader.style.display = 'flex';
                const komoditasId = $('#jenis-filter').val();
                const startDate = $('#start-date').val();
                const endDate = $('#end-date').val();

                let url = `{{ route('landing.chart.filter') }}?id=${komoditasId}`;
                if (startDate) url += `&start_date=${startDate}`;
                if (endDate) url += `&end_date=${endDate}`;

                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        renderChart(data.harga_chart_data, data.tanggal_chart_data);
                    })
                    .finally(() => {
                        loader.style.display = 'none';
                    });
            }

            // --- RENDER AWAL & EVENT LISTENERS ---
            const initialHargaData = {!! json_encode($harga_chart_data) !!};
            const initialTanggalData = {!! json_encode($tanggal_chart_data) !!};
            if (chartContainer && initialHargaData.length > 0) {
                renderChart(initialHargaData, initialTanggalData);
            } else if (chartContainer) {
                chartContainer.innerHTML =
                    '<div class="text-center py-20 text-gray-500">Data tidak tersedia untuk ditampilkan.</div>';
            }

            $('#jenis-filter, #start-date, #end-date').on('change', fetchChartData);
        });
    </script>
@endpush
