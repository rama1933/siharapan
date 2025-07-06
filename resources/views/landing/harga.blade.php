@extends('landing.layouts.layout')

@section('title', 'Detail Harga Pangan - SIHARAPAN')

{{-- Banner tidak akan ditampilkan karena @section('show_banner') tidak didefinisikan --}}

@section('content')
    <main class="py-12 md:py-20 modern-bg">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Judul Halaman -->
            <div class="text-center mb-10 md:mb-12">
                <h1 class="text-4xl font-extrabold text-gray-800 tracking-tight">DETAIL <span class="text-brand-gold">HARGA
                        PANGAN</span></h1>
                <p class="mt-2 text-lg text-gray-500">Analisis historis harga komoditas.</p>
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
                    <div class="flex-grow w-full xl:w-auto grid grid-cols-1 sm:grid-cols-3 gap-4 items-end">
                        <div class="sm:col-span-1">
                            <label for="jenis-filter" class="block text-sm font-medium text-gray-700 mb-1">Komoditas</label>
                            <select id="jenis-filter" class="select2" style="width: 100%;">
                                @foreach ($jenis_list as $jenis)
                                    <option value="{{ $jenis->id }}"
                                        {{ strtolower($jenis->jenis) == 'lokal' ? 'selected' : '' }}>
                                        {{ ucwords($jenis->nama) }} - {{ ucwords($jenis->jenis) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="sm:col-span-1">
                            <label for="start-date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal
                                Awal</label>
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
                    class="absolute inset-0 bg-white bg-opacity-75 flex-col items-center justify-center rounded-2xl hidden z-20">
                    <div class="w-16 h-16 border-4 border-brand-gold border-t-transparent rounded-full animate-spin"></div>
                    <p class="mt-4 text-gray-600 font-semibold">Memuat data...</p>
                </div>
            </div>

            <!-- Bagian Tabel Harga -->
            <div id="tabel" class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="p-6 sm:p-8">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">RIWAYAT HARGA</h2>
                            <p class="text-gray-500 mt-1">Data historis untuk komoditas yang dipilih.</p>
                        </div>
                        <div class="flex space-x-2 mt-4 sm:mt-0">
                            <a href="{{ url('/pdf') }}"
                                class="inline-flex items-center px-4 py-2 bg-red-50 text-red-700 rounded-lg hover:bg-red-100 font-semibold text-sm transition-colors">
                                <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                Cetak PDF
                            </a>
                            <a href="{{ url('/excel') }}"
                                class="inline-flex items-center px-4 py-2 bg-green-50 text-green-700 rounded-lg hover:bg-green-100 font-semibold text-sm transition-colors">
                                <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                Cetak Excel
                            </a>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-brand-green-900 uppercase bg-yellow-100">
                            <tr>
                                <th scope="col" class="px-6 py-3">Tanggal</th>
                                <th scope="col" class="px-6 py-3">Nama</th>
                                <th scope="col" class="px-6 py-3">Jenis</th>
                                <th scope="col" class="px-6 py-3">Satuan</th>
                                <th scope="col" class="px-6 py-3">Harga</th>
                                <th scope="col" class="px-6 py-3">Persediaan</th>
                            </tr>
                        </thead>
                        <tbody id="tbl_non_filter">
                            @forelse ($table as $item)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        {{ date('d F Y', strtotime($item->tanggal)) }}</td>
                                    <td class="px-6 py-4">{{ $item->nama }}</td>
                                    <td class="px-6 py-4">{{ $item->jenis }}</td>
                                    <td class="px-6 py-4">{{ $item->satuan }}</td>
                                    <td class="px-6 py-4 font-semibold">Rp.
                                        {{ number_format($item->harga_terendah, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4">{{ $item->persedian }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-8 text-gray-500">Data tidak tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('page-scripts')
    <script>
        // PERBAIKAN: Menggunakan jQuery(document).ready() untuk memastikan jQuery dimuat lebih dulu
        jQuery(document).ready(function($) {
            // --- INISIALISASI SELECT2 ---
            $('#jenis-filter').select2({
                theme: "default"
            });

            // --- INISIALISASI FLATPICKR (DATE PICKER) ---
            const fpStartDate = flatpickr("#start-date", {
                dateFormat: "Y-m-d",
                onChange: function(selectedDates, dateStr, instance) {
                    fpEndDate.set('minDate', dateStr);
                    fetchChartData();
                }
            });
            const fpEndDate = flatpickr("#end-date", {
                dateFormat: "Y-m-d",
                onChange: function(selectedDates, dateStr, instance) {
                    fpStartDate.set('maxDate', dateStr);
                    fetchChartData();
                }
            });

            const chartContainer = document.getElementById('grafik-harga-pangan-container');
            const loader = document.getElementById('chart-loader');
            let chart;

            // --- FUNGSI UNTUK MEMBUAT ATAU MEMPERBARUI CHART ---
            function renderChart(hargaData, tanggalData, jenis) {
                const numericHargaData = hargaData.filter(v => v !== null && !isNaN(v)).map(Number);

                let annotations = {};

                if (numericHargaData.length > 0) {
                    const maxVal = Math.max(...numericHargaData);
                    const minVal = Math.min(...numericHargaData);
                    const maxIndex = hargaData.findIndex(v => Number(v) === maxVal);
                    const minIndex = hargaData.findIndex(v => Number(v) === minVal);

                    if (maxIndex !== -1 && minIndex !== -1) {
                        annotations = {
                            points: [{
                                    x: tanggalData[maxIndex],
                                    y: maxVal,
                                    marker: {
                                        size: 8,
                                        fillColor: '#22c55e',
                                        strokeColor: '#fff',
                                        strokeWidth: 3,
                                        radius: 2
                                    },
                                    label: {
                                        borderColor: '#22c55e',
                                        offsetY: 0,
                                        style: {
                                            background: '#22c55e',
                                            color: '#fff',
                                            padding: {
                                                left: 10,
                                                right: 10,
                                                top: 5,
                                                bottom: 5
                                            }
                                        },
                                        text: 'Tertinggi'
                                    }
                                },
                                {
                                    x: tanggalData[minIndex],
                                    y: minVal,
                                    marker: {
                                        size: 8,
                                        fillColor: '#ef4444',
                                        strokeColor: '#fff',
                                        strokeWidth: 3,
                                        radius: 2
                                    },
                                    label: {
                                        borderColor: '#ef4444',
                                        offsetY: 0,
                                        style: {
                                            background: '#ef4444',
                                            color: '#fff',
                                            padding: {
                                                left: 10,
                                                right: 10,
                                                top: 5,
                                                bottom: 5
                                            }
                                        },
                                        text: 'Terendah'
                                    }
                                }
                            ]
                        };
                    }
                }

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
                        },
                        dropShadow: {
                            enabled: true,
                            top: 5,
                            left: 0,
                            blur: 4,
                            opacity: 0.1
                        },
                    },
                    colors: ['#d1a943'],
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 3
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.7,
                            opacityTo: 0.2,
                            stops: [0, 90, 100]
                        }
                    },
                    grid: {
                        borderColor: '#e5e7eb',
                        strokeDashArray: 5
                    },
                    markers: {
                        size: 0,
                        colors: ["#fff"],
                        strokeColors: '#d1a943',
                        strokeWidth: 2,
                        hover: {
                            size: 6
                        }
                    },
                    xaxis: {
                        categories: tanggalData,
                        labels: {
                            style: {
                                colors: '#6b7280',
                                fontSize: '13px'
                            }
                        },
                        axisBorder: {
                            show: false
                        },
                        axisTicks: {
                            show: false
                        }
                    },
                    yaxis: {
                        labels: {
                            style: {
                                colors: '#6b7280',
                                fontSize: '13px'
                            },
                            formatter: (value) => "Rp " + parseInt(value).toLocaleString('id-ID')
                        }
                    },
                    tooltip: {
                        enabled: true,
                        theme: 'dark',
                        y: {
                            formatter: (value) => (value ? "Rp " + parseInt(value).toLocaleString('id-ID') :
                                'N/A')
                        },
                        marker: {
                            show: true
                        }
                    },
                    legend: {
                        show: false
                    },
                    annotations: annotations
                };

                if (!chart) {
                    chart = new ApexCharts(chartContainer, options);
                    chart.render();
                } else {
                    chart.updateOptions(options, true, true);
                }
            }

            // --- FUNGSI UNTUK MENGAMBIL DATA ---
            function fetchChartData() {
                const selectedId = $('#jenis-filter').val();
                const selectedText = $('#jenis-filter').find('option:selected').text().trim();
                const startDate = $('#start-date').val();
                const endDate = $('#end-date').val();

                loader.classList.remove('hidden');

                let fetchUrl = `{{ route('landing.chart.filter') }}?id=${selectedId}`;
                if (startDate) fetchUrl += `&start_date=${startDate}`;
                if (endDate) fetchUrl += `&end_date=${endDate}`;

                fetch(fetchUrl)
                    .then(response => response.json())
                    .then(data => {
                        if (data.harga_chart_data.length > 0) {
                            renderChart(data.harga_chart_data, data.tanggal_chart_data, selectedText);
                        } else {
                            if (chart) {
                                chart.destroy();
                                chart = null;
                            }
                            chartContainer.innerHTML =
                                '<div class="text-center py-20 text-gray-500">Data tidak tersedia untuk ' +
                                selectedText + '.</div>';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching chart data:', error);
                        if (chart) {
                            chart.destroy();
                            chart = null;
                        }
                        chartContainer.innerHTML =
                            '<div class="text-center py-20 text-gray-500">Gagal memuat data chart.</div>';
                    })
                    .finally(() => {
                        loader.classList.add('hidden');
                    });
            }

            // --- RENDER CHART AWAL ---
            const initialHargaData = {!! json_encode($harga_chart_data) !!};
            const initialTanggalData = {!! json_encode($tanggal_chart_data) !!};
            if (chartContainer && initialHargaData.length > 0) {
                renderChart(initialHargaData, initialTanggalData, 'Lokal');
            } else if (chartContainer) {
                chartContainer.innerHTML =
                    '<div class="text-center py-20 text-gray-500">Data tidak tersedia untuk ditampilkan.</div>';
            }

            // --- EVENT LISTENER UNTUK FILTER ---
            $('#jenis-filter').on('change', fetchChartData);
        });
    </script>
@endpush
