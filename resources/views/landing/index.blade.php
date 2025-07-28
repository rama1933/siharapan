@extends('landing.layouts.layout')

@section('title', 'SIHARAPAN')

@section('content')
    <main class="py-12 modern-bg">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Bagian Grafik -->
            <div id="grafik" class="bg-white p-6 sm:p-8 rounded-2xl shadow-lg mb-12 relative">
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
                                    <option value="{{ $jenis->id }}"
                                        {{ strtolower($jenis->jenis) == 'lokal' ? 'selected' : '' }}>
                                        {{ ucwords($jenis->komoditi->nama) }} - {{ ucwords($jenis->nama) }}
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

            <!-- Bagian Statistik Pengunjung -->
            <div id="statistik" class="mb-12">
                <h2 class="text-3xl font-bold text-gray-800 text-center mb-2">Statistik Kunjungan</h2>
                <p class="text-center text-gray-600 mb-8">Aktivitas platform SIHARAPAN secara real-time.</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-white">
                    <div
                        class="bg-brand-green-700 p-8 rounded-2xl shadow-lg text-center transition-transform hover:-translate-y-2 flex flex-col items-center justify-center">
                        <svg class="w-16 h-16 mb-4 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        <p class="text-5xl font-bold">{{ number_format($visit_count_day, 0, ',', '.') }}</p>
                        <p class="text-gray-300 mt-2">Pengunjung Hari Ini</p>
                    </div>
                    <div
                        class="bg-brand-gold p-8 rounded-2xl shadow-lg text-center transition-transform hover:-translate-y-2 flex flex-col items-center justify-center">
                        <svg class="w-16 h-16 mb-4 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        <p class="text-5xl font-bold">{{ number_format($visit_count_month, 0, ',', '.') }}</p>
                        <p class="text-gray-200 mt-2">Pengunjung Bulan Ini</p>
                    </div>
                    <div
                        class="bg-brand-green-900 p-8 rounded-2xl shadow-lg text-center transition-transform hover:-translate-y-2 flex flex-col items-center justify-center">
                        <svg class="w-16 h-16 mb-4 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2h10a2 2 0 002-2v-1a2 2 0 012-2h1.945M7.884 21H16.116M12 21v-4m-4-13h8" />
                        </svg>
                        <p class="text-5xl font-bold">{{ number_format($visit_count_year, 0, ',', '.') }}</p>
                        <p class="text-gray-300 mt-2">Kunjungan Tahun Ini</p>
                    </div>
                </div>
            </div>

            <!-- Bagian Tabel Harga -->
            <div id="tabel" class="bg-white rounded-2xl shadow-lg overflow-hidden mb-12">
                <div class="p-6 sm:p-8">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">TABEL HARGA PANGAN</h2>
                            @if (isset($tanggal_update))
                                <p class="text-gray-500 mt-1">Data per tanggal:
                                    {{ date('d F Y', strtotime($tanggal_update->tanggal)) }}</p>
                            @endif
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
                    <p class="text-sm text-gray-400 mt-4">Data harga berikut merupakan rekapitulasi harian yang dikumpulkan
                        dari berbagai pasar di Kabupaten Hulu Sungai Selatan untuk memastikan akurasi.</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-brand-green-900 uppercase bg-yellow-100">
                            <tr>
                                <th scope="col" class="px-6 py-3">No</th>
                                <th scope="col" class="px-6 py-3">Nama</th>
                                <th scope="col" class="px-6 py-3">Jenis</th>
                                <th scope="col" class="px-6 py-3">Satuan</th>
                                <th scope="col" class="px-6 py-3">Harga Eceran</th>
                                <th scope="col" class="px-6 py-3">Harga Grosir</th>
                                <th scope="col" class="px-6 py-3">Harga Kios Pangan</th>
                                {{-- <th scope="col" class="px-6 py-3 text-center">Perubahan (24h)</th> --}}
                                <th scope="col" class="px-6 py-3 text-center">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($table as $item)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 font-medium ">{{ $loop->iteration }}.</td>
                                    <td class="px-6 py-4 font-medium text-gray-900">{{ $item->nama }}</td>
                                    <td class="px-6 py-4">{{ $item->jenis }}</td>
                                    <td class="px-6 py-4">{{ $item->satuan }}</td>
                                    <td class="px-6 py-4 font-semibold">Rp.
                                        {{ number_format($item->harga_terendah, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4 font-semibold">Rp.
                                        {{ number_format($item->harga_grosir, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4 font-semibold">Rp.
                                        {{ number_format($item->harga_kios, 0, ',', '.') }}</td>
                                    {{-- <td class="px-6 py-4 text-center">
                                        @php $perubahan = rand(-1, 1); @endphp
                                        @if ($perubahan > 0)
                                            <span class="inline-flex items-center text-sm font-semibold text-green-600">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                                                </svg>
                                                Naik
                                            </span>
                                        @elseif($perubahan < 0)
                                            <span class="inline-flex items-center text-sm font-semibold text-red-600">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                                </svg>
                                                Turun
                                            </span>
                                        @else
                                            <span class="text-sm font-medium text-gray-500">-</span>
                                        @endif
                                    </td> --}}
                                    <td class="px-6 py-4 text-center">
                                        <a href="{{ route('detail', $item->bapo_id) }}"
                                            class="text-brand-green-700 hover:text-brand-green-900">
                                            <svg class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-8 text-gray-500">Data tabel tidak tersedia.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Bagian Berita -->
            <div id="berita" class="mb-12">
                <h2 class="text-3xl font-bold text-gray-800 text-center mb-2">Berita & Informasi</h2>
                <p class="text-center text-gray-600 mb-8">Ikuti perkembangan dan berita terbaru seputar ketahanan pangan.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($berita as $item)
                        <div
                            class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col transition-transform hover:-translate-y-2">
                            <img src="{{ asset('storage/' . $item->path) }}" alt="{{ $item->judul }}"
                                class="w-full h-48 object-cover">
                            <div class="p-6 flex flex-col flex-grow">
                                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ Str::limit($item->judul, 50) }}</h3>
                                <div class="text-gray-600 text-sm flex-grow">
                                    {!! Str::limit(strip_tags($item->berita), 100) !!}
                                </div>
                                <a href="{{ route('landing.berita.detail', ['id' => $item->id]) }}"
                                    class="mt-4 text-brand-gold hover:opacity-80 font-semibold self-start">
                                    Baca Selengkapnya &rarr;
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-8">
                    <a href="{{ route('landing.berita') }}"
                        class="bg-gray-200 text-gray-800 px-6 py-3 rounded-lg font-semibold hover:bg-gray-300 transition-colors">Lihat
                        Semua Berita</a>
                </div>
            </div>

            <!-- Tentang SIHARAPAN Section -->
            <div id="tentang" class="bg-white rounded-2xl shadow-lg p-8 sm:p-12 mb-12">
                <div class="grid md:grid-cols-3 gap-8 items-center">
                    <div class="md:col-span-1 text-center">
                        <img src="https://placehold.co/200x200/4A6F3A/ffffff?text=SIHARAPAN&font=inter"
                            alt="Logo SIHARAPAN" class="mx-auto rounded-full w-40 h-40">
                    </div>
                    <div class="md:col-span-2">
                        <h2 class="text-2xl font-bold text-gray-800">Tentang <span
                                class="text-brand-gold">SIHARAPAN</span></h2>
                        <p class="mt-4 text-gray-600">
                            SIHARAPAN (Sistem Informasi Harga Pangan) adalah sebuah inisiatif dari Dinas Ketahanan Pangan
                            Kabupaten Hulu Sungai Selatan untuk menyediakan transparansi data harga pangan kepada
                            masyarakat, pelaku usaha, dan pemerintah. Dengan data yang akurat dan mudah diakses, kami
                            berharap dapat membantu menstabilkan harga, menginformasikan keputusan pembelian, dan mendukung
                            ketahanan pangan di daerah.
                        </p>
                    </div>
                </div>
            </div>

            <div id="barcode-channel"
                class="bg-gradient-to-br from-brand-green-800 to-brand-green-900 text-white rounded-2xl shadow-lg p-8 sm:p-12">
                <div class="flex flex-col md:flex-row items-center justify-center gap-8 text-center md:text-left">
                    <div class="flex-shrink-0 bg-white p-2 rounded-lg">
                        <img src="{{ asset('logo/BARCODE CHANNEL.png') }}" alt="Barcode Saluran WhatsApp SIHARAPAN"
                            class="w-40 h-40">
                    </div>
                    <div class="md:w-2/3">
                        <h3 class="text-2xl font-bold text-brand-gold uppercase tracking-wider">Tetap Terhubung</h3>
                        <p class="mt-2 text-lg text-gray-200">
                            Dapatkan informasi harga pangan secara real-time. Scan barcode untuk mengikuti saluran WhatsApp
                            kami dan dapatkan update terbaru langsung ke ponsel Anda.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection

@push('page-scripts')
    <script>
        particlesJS("particles-js", {
            "particles": {
                "number": {
                    "value": 80,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#ffffff"
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    },
                    "polygon": {
                        "nb_sides": 5
                    }
                },
                "opacity": {
                    "value": 0.5,
                    "random": false,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 3,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 40,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 2,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "repulse"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 400,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 400,
                        "size": 40,
                        "duration": 2,
                        "opacity": 8,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 100,
                        "duration": 0.4
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true
        });
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
