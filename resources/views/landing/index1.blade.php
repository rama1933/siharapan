@extends('landing.layout.layout')

@section('show_banner')
@endsection

@section('title', 'Home - SIHARAPAN')

@push('page-styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        #chartdiv {
            width: 100%;
            height: 380px;
        }

        #chart {
            max-width: 100%;
            margin: 35px auto;
        }

        .counter {
            background-color: black;
            padding: 20px 0;
            border-radius: 5px;
        }

        .count-title {
            font-size: 40px;
            font-weight: normal;
            margin-top: 10px;
            margin-bottom: 0;
            text-align: center;
        }

        .count-text {
            font-size: 13px;
            font-weight: normal;
            margin-top: 10px;
            margin-bottom: 0;
            text-align: center;
        }

        .fa-2x {
            margin: 0 auto;
            float: none;
            display: table;
            color: #4ad1e5;
        }

        .select2-container--default .select2-selection--single {
            height: calc(1.5em + 0.75rem + 12px);
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: calc(1.5em + 0.75rem);
            padding-left: 0.75rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: calc(1.5em + 0.75rem);
        }
    </style>
@endpush

@section('content')
    {{-- Grafik Harga Pangan --}}
    <div class="services_section layout_padding">
        <div class="container">
            <h1 class="services_taital"><span style="color: #fcce2d">GRAFIK</span> HARGA PANGAN</h1>
            <div class="services_section_2">
                <div class="row">
                    <div class="card-body" style="background-color: white">
                        <div class="row justify-content-center">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <label for="jenis-filter" class="form-label" style="font-weight:500;">Pilih Jenis
                                        Komoditas:</label>

                                    <select id="jenis-filter" class="select2" style="width: 100%;">
                                        @foreach ($jenis_list as $jenis)
                                            <option value="{{ $jenis }}"
                                                {{ strtolower($jenis) == 'lokal' ? 'selected' : '' }}>
                                                {{ ucwords($jenis->nama) }} - {{ ucwords($jenis->jenis) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="p-6 m-20  ">
                            <div id="grafik-harga-pangan-container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Harga Pangan --}}
    <div class="news_section layout_padding">
        <div class="container">
            <h1 class="services_taital"><span style="color: #fcce2d">TABEL</span> HARGA PANGAN</h1>
            <div class="services_section_2">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body" id="result">
                                <a href="{{ url('/pdf') }}" title="Unduh Dokumen (PDF)"
                                    class="btn btn-md btn-outline-primary mb-3"><i class="fa fa-print"> Cetak Pdf</i></a>
                                <a href="{{ url('/excel') }}" title="Unduh Dokumen (Excel)"
                                    class="btn btn-md btn-outline-success mb-3"><i class="fa fa-print"> Cetak Excel</i></a>
                                @if (isset($tanggal_update))
                                    <p class="float-right">Tanggal Update Data :
                                        {{ date('d-m-Y', strtotime($tanggal_update->tanggal)) }}</p>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-md" id="table">
                                        <thead>
                                            <tr style="background-color:#6777ef">
                                                <th style="color: aliceblue;vertical-align: middle;text-align:center;">Nama
                                                </th>
                                                <th style="color: aliceblue;vertical-align: middle;text-align:center;">Jenis
                                                </th>
                                                <th style="color: aliceblue;vertical-align: middle;text-align:center;">
                                                    Satuan</th>
                                                <th style="color: aliceblue;vertical-align: middle;text-align:center;">Harga
                                                </th>
                                                {{-- <th style="color: aliceblue;vertical-align: middle;text-align:center;">
                                                    Persediaan</th> --}}
                                                <th style="color: aliceblue;vertical-align: middle;text-align:center;">
                                                    Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbl_non_filter">
                                            @foreach ($table as $item)
                                                <tr>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->jenis }}</td>
                                                    <td>{{ $item->satuan }}</td>
                                                    <td>Rp. {{ number_format($item->harga_terendah, '0', ',', '.') }}</td>
                                                    {{-- <td>{{ $item->persedian }}</td> --}}
                                                    <td style="text-align: center">
                                                        <a href="{{ route('detail', $item->bapo_id) }}"
                                                            class="btn btn-sm btn-outline-primary mr-2">
                                                            <i class="fa fa-line-chart"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Jumlah Pengunjung --}}
    <div class="client_section layout_padding mt-5">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <h1 class="services_taital"><span style="color: #fcce2d">Jumlah</span> <span
                                        style="color: white">Pengunjung</span></h1>
                            </div>
                        </div>
                        <br>
                        <div class="row text-center">
                            <div class="col">
                                <div class="counter">
                                    <i class="fa fa-code fa-2x"></i>
                                    <h2 class="timer count-title count-number text-white" data-to="100" data-speed="1500">
                                        {{ $visit_count_day }}</h2>
                                    <p class="count-text text-white">Pengunjung Hari Ini</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="counter">
                                    <i class="fa fa-coffee fa-2x"></i>
                                    <h2 class="timer count-title count-number text-white" data-to="1700" data-speed="1500">
                                        {{ $visit_count_month }}</h2>
                                    <p class="count-text text-white">Pengunjung Bulan Ini</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="counter">
                                    <i class="fa fa-bug fa-2x"></i>
                                    <h2 class="timer count-title count-number text-white" data-to="157" data-speed="1500">
                                        {{ $visit_count_year }}</h2>
                                    <p class="count-text text-white">Kunjungan Tahun Ini</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Berita Terbaru --}}
    <div class="container">
        <div class="col text-center">
            <h1 class="services_taital mt-5"><span style="color: #fcce2d">Berita</span> <span>Terbaru</span></h1>
        </div>
        <div class="row">
            @foreach ($berita as $item)
                <div class="col-lg-4 sm-margin-30px-bottom mt-5">
                    <div class="card border-0 shadow h-100">
                        <a href="{{ route('landing.berita.detail', ['id' => $item->id]) }}">
                            <img src="{{ asset($item->path) }}" class="card-img-top rounded"
                                style="max-height:250px;min-height:250px;max-width:100%" alt="{{ $item->judul }}">
                        </a>
                        <div class="card-body padding-30px-all">
                            <h5 class="card-title font-size22 font-weight-500 magin-20px-bottom"
                                style="max-height:50px;max-height:50px">
                                <a href="{{ route('landing.berita.detail', ['id' => $item->id]) }}"
                                    class="text-extra-dark-gray">{{ $item->judul }}</a>
                            </h5>
                            <div class="no-margin-bottom">
                                {!! $item->berita !!}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col text-center mt-5">
            <a href="{{ route('landing.berita') }}" class="btn btn-primary">Berita Lainya</a>
        </div>
    </div>
@endsection

@push('page-scripts')
    {{-- Memuat library ApexCharts --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- Tambahkan font modern seperti Inter di layout utama Anda untuk hasil terbaik --}}
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"> --}}

    {{-- SCRIPT BARU UNTUK MEMBUAT CHART MODERN --}}
    <script>
        // Gunakan jQuery's document ready untuk memastikan semua elemen siap
        $(document).ready(function() {
            // --- INISIALISASI SELECT2 ---
            $('#jenis-filter').select2({
                theme: "default"
            });

            const chartContainer = document.getElementById('grafik-harga-pangan-container');
            let chart;

            // --- FUNGSI UNTUK MEMBUAT ATAU MEMPERBARUI CHART ---
            function renderChart(hargaData, tanggalData, jenis) {
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
                    colors: ['#007BFF'],
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
                        borderColor: '#e7e7e7',
                        strokeDashArray: 5
                    },
                    markers: {
                        size: 0,
                        colors: ["#fff"],
                        strokeColors: '#007BFF',
                        strokeWidth: 2,
                        hover: {
                            size: 6
                        }
                    },
                    xaxis: {
                        categories: tanggalData,
                        labels: {
                            style: {
                                colors: '#6c757d',
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
                                colors: '#6c757d',
                                fontSize: '13px'
                            },
                            formatter: (value) => "Rp " + parseInt(value).toLocaleString('id-ID')
                        }
                    },
                    title: {
                        text: 'Grafik Harga ' + jenis,
                        align: 'left',
                        style: {
                            fontSize: '18px',
                            fontWeight: 'bold',
                            color: '#263238'
                        }
                    },
                    subtitle: {
                        text: 'Data Rata-Rata 30 Hari Terakhir',
                        align: 'left',
                        style: {
                            fontSize: '14px',
                            color: '#9aa0ac'
                        }
                    },
                    tooltip: {
                        enabled: true,
                        theme: 'light',
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
                    }
                };

                if (!chart) {
                    chart = new ApexCharts(chartContainer, options);
                    chart.render();
                } else {
                    chart.updateOptions(options, true, true);
                }
            }

            // --- RENDER CHART AWAL SAAT HALAMAN DIMUAT ---
            const initialHargaData = {!! json_encode($harga_chart_data) !!};
            const initialTanggalData = {!! json_encode($tanggal_chart_data) !!};
            if (chartContainer && initialHargaData.length > 0) {
                renderChart(initialHargaData, initialTanggalData, 'Lokal');
            } else if (chartContainer) {
                chartContainer.innerHTML =
                    '<div style="text-align:center; padding: 50px;">Data tidak tersedia.</div>';
            }

            // --- EVENT LISTENER UNTUK FILTER ---
            $('#jenis-filter').on('change', function() {
                const selectedJenis = $(this).val();
                const selectedJenisText = $(this).find('option:selected').text()
                    .trim(); // Membersihkan spasi ekstra

                // PERBAIKAN: Menghapus baris yang menyebabkan error
                // if(chart) chart.showLoading(); 

                fetch(`{{ route('landing.chart.filter') }}?jenis=${selectedJenis}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.harga_data.length > 0) {
                            renderChart(data.harga_data, data.tanggal_data, selectedJenisText);
                        } else {
                            if (chart) {
                                chart.destroy();
                                chart = null;
                            }
                            chartContainer.innerHTML =
                                '<div style="text-align:center; padding: 50px;">Data tidak tersedia untuk jenis ' +
                                selectedJenisText + '.</div>';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching chart data:', error);
                        if (chart) {
                            chart.destroy();
                            chart = null;
                        }
                        chartContainer.innerHTML =
                            '<div style="text-align:center; padding: 50px;">Gagal memuat data chart.</div>';
                    });
            });
        });
    </script>

    {{-- Script Anda yang lain (select2) --}}
    <script>
        $(document).ready(function() {
            if (jQuery().select2) {
                $(".select2").select2({
                    width: '200px'
                });
            }
        });
    </script>
@endpush
