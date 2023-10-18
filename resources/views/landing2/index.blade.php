<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>SIHAPOK</title>
    <link href="{{ url('') }}/logo/hss.png" rel="icon">


    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}food/css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">

    <!-- font awesome style -->
    <link href="{{ asset('') }}food/css/font-awesome.min.css" rel="stylesheet" />
    <!-- nice select -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />
    <!-- slidck slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
        integrity="sha256-UK1EiopXIL+KVhfbFa8xrmAWPeBjMVdvYMYkTAEv/HI=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css.map"
        integrity="undefined" crossorigin="anonymous" />


    <!-- Custom styles for this template -->
    <link href="{{ asset('') }}food/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('') }}food/css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('stisla/node_modules/select2/dist/css/select2.min.css') }}">

    <style>
        img {
            display: block;
        }

        .thumbnail {
            position: relative;
            display: inline-block;
        }

        .caption {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: black;
            font-weight: bold;
        }

        #chartdiv {
            width: 100%;
            height: 380px;
        }

        @import url(https://fonts.googleapis.com/css?family=Roboto);

        body {
            font-family: Roboto, sans-serif;
        }

        #chart {
            max-width: 100%;
            margin: 35px auto;
        }
    </style>

</head>

<body>

    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container">
                    <a class="navbar-brand" href="index.html">
                        <span>
                            {{-- <h3>SIHAPOK</h3> --}}
                        </span>
                    </a>
                    <div class="" id="">
                        <div class="User_option">
                            <a class="nav-link" href="{{ route('landing.index.grafik') }}">
                                Grafik Harga
                            </a>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Tabel Harga
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" style="color: black"
                                                href="{{ route('landing.semua.index') }}">Semua Pasar</a>
                                            <a class="dropdown-item" style="color: black"
                                                href="{{ route('landing.kandangan.index') }}">Pasar Kandangan</a>
                                            <a class="dropdown-item" style="color: black"
                                                href="{{ route('landing.negara.index') }}">Pasar Negara</a>
                                            <a class="dropdown-item" style="color: black"
                                                href="{{ route('landing.bjm.index') }}">IHK Banjarmasin</a>
                                            <a class="dropdown-item" style="color: black"
                                                href="{{ route('landing.tanjung.index') }}">IHK Tanjung</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <a href="{{ route('login') }}">
                                <i class="" aria-hidden="true"></i>
                                {{--  <span class="btn btn-sm btn-outline-light">Login</span>  --}}
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->

        <!-- slider section -->
        <section class="slider_section">
            <div class="container ">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="detail-box" style="margin-bottom: 100px">
                            <h1>
                                SIHAPOK
                            </h1>
                            <h2>
                                Sistem Informasi Harga Pokok
                                <br>
                                Kabupaten Hulu Sungai Selatan
                            </h2>
                            {{-- <div class="card-body">
                                <div id="chartdiv"></div>
                            </div> --}}
                        </div>
                        {{-- <div class="find_container ">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <form>
                                            <div class="form-row ">
                                                <div class="form-group col-lg-5">
                                                    <input type="text" class="form-control" id="inputHotel"
                                                        placeholder="Restaurant Name">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <input type="text" class="form-control" id="inputLocation"
                                                        placeholder="All Locations">
                                                    <span class="location_icon">
                                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <div class="btn-box">
                                                        <button type="submit" class="btn ">Search</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="slider_container">
                @foreach ($harga as $harga)
                    <div class="item">
                        <div class="img-box thumbnail">
                            <img src="{{ asset('') }}food/images/frame.png">
                            <div class="caption">
                                <h6>{{ $harga['komoditi'] }} <br>
                                    {{ $harga['nama'] }}</h6>
                                <hr>
                                <p> Harga Hari Ini <br>
                                    @if (isset($harga['rata2']))
                                        Rp. {{ number_format($harga['rata2'], 0, ',', '.') }}
                                    @endif
                                    @if (isset($harga['persen']))
                                        @if ($harga['persen'] > 0)
                                            <i class="fa fa-arrow-up" style="color:red"></i>
                                            <small
                                                class="text-danger">{{ number_format($harga['persen'], 2, ',', '.') }}%</small>
                                        @elseif($harga['persen'] < 0)
                                            <i class="fa fa-arrow-down" style="color: green"></i>
                                            <small
                                                class="text-success">{{ number_format($harga['persen'], 2, ',', '.') }}%</small>
                                        @elseif($harga['persen'] = 0)
                                        @endif
                                    @endif


                                </p>


                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <!-- end slider section -->
    </div>


    <!-- recipe section -->

    <section class="recipe_section layout_padding-top">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Harga Bahan Pokok Hari Ini
                </h2>
            </div>
            <div class="row">
                <div class="card-body" style="background-color: white">
                    <div class="row justify-content-center">

                        <select name="filter_pasar" id="select_filter_pasar" class="select2"
                            onchange="filter_pasar()">
                            <option value="1">Semua Pasar</option>
                            <option value="2">Pasar Kandangan</option>
                            <option value="3">Pasar Negara</option>
                            <option value="4">IHK Banjasrmasin</option>
                            <option value="5">IHK Tanjung</option>
                        </select>

                        <select name="bahan_pokok_child_id" class="select2" id="select_filter" onchange="filter()"
                            style="margin-right: 10px;">
                            @foreach ($bapo as $bapo)
                                <option value="{{ $bapo->nama }}">{{ $bapo->komoditi->nama }} -
                                    {{ $bapo->nama }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                    <div id="chart">
                    </div>
                </div>
                <div class="col-12">
                    <div class="card mt-5">
                        <div class="card-body" id="result">
                            <a href="{{ route('landing.index.excelharga') }}" title="Unduh Dokumen (Excel)"
                                class="btn btn-md btn-outline-success mb-3"><i class="fa fa-print">
                                    Cetak Excel</i></a>
                            @if (isset($tanggal_update))
                                <p class="float-right">Tanggal Update Data
                                    : {{ date('d-m-Y', strtotime($tanggal_update->tanggal)) }}</p>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped  table-md" id="table">
                                    <thead>
                                        <tr style="background-color:#6777ef">
                                            <th rowspan="2"
                                                style="color: aliceblue;vertical-align: middle;text-align:center;width:130px">
                                                No
                                            </th>
                                            <th rowspan="2"
                                                style="color: aliceblue;vertical-align: middle;text-align:center;width:130px">
                                                Nama Bahan
                                            </th>
                                            <th rowspan="2"
                                                style="color: aliceblue;vertical-align: middle;text-align:center;width:130px">
                                                Satuan
                                            </th>

                                            <th rowspan="1" colspan="4"
                                                style="color: aliceblue;vertical-align: middle;text-align:center">Pasar
                                                Kandangan</th>
                                            <th rowspan="1" colspan="4"
                                                style="color: aliceblue;vertical-align: middle;text-align:center">Pasar
                                                Negara</th>
                                            <th rowspan="1" colspan="4"
                                                style="color: aliceblue;vertical-align: middle;text-align:center">
                                                Indeks
                                                Harga konsumen (IHK) Banjarmasin</th>
                                            <th rowspan="1" colspan="4"
                                                style="color: aliceblue;vertical-align: middle;text-align:center">
                                                Indeks
                                                Harga konsumen (IHK) Tanjung</th>
                                            <th rowspan="2"
                                                style="color: aliceblue;vertical-align: middle;text-align:center">
                                                Persediaan
                                            </th>
                                        <tr style="background-color:#6777ef">

                                            <th
                                                style="color: aliceblue;vertical-align: middle;text-align:center;padding-right:20px;padding-left:20px;border-spacing: 0px;white-space: nowrap;">
                                                Harga Hari Ini</th>
                                            <th
                                                style="color: aliceblue;vertical-align: middle;text-align:center;padding-right:20px;padding-left:20px;border-spacing: 0px;white-space: nowrap;">
                                                Harga Kemarin</th>
                                            <th
                                                style="color: aliceblue;vertical-align: middle;text-align:center;padding-right:20px;padding-left:20px;border-spacing: 0px;white-space: nowrap;">
                                                Perubahan Harga</th>
                                            <th
                                                style="color: aliceblue;vertical-align: middle;text-align:center;padding-right:20px;padding-left:20px;border-spacing: 0px;white-space: nowrap;">
                                                Perubahan Harga (%)</th>
                                            <th
                                                style="color: aliceblue;vertical-align: middle;text-align:center;padding-right:20px;padding-left:20px;border-spacing: 0px;white-space: nowrap;">
                                                Harga Hari Ini</th>
                                            <th
                                                style="color: aliceblue;vertical-align: middle;text-align:center;padding-right:20px;padding-left:20px;border-spacing: 0px;white-space: nowrap;">
                                                Harga Kemarin</th>
                                            <th
                                                style="color: aliceblue;vertical-align: middle;text-align:center;padding-right:20px;padding-left:20px;border-spacing: 0px;white-space: nowrap;">
                                                Perubahan Harga</th>
                                            <th
                                                style="color: aliceblue;vertical-align: middle;text-align:center;padding-right:20px;padding-left:20px;border-spacing: 0px;white-space: nowrap;">
                                                Perubahan Harga (%)</th>
                                            <th
                                                style="color: aliceblue;vertical-align: middle;text-align:center;padding-right:20px;padding-left:20px;border-spacing: 0px;white-space: nowrap;">
                                                Harga Hari Ini</th>
                                            <th
                                                style="color: aliceblue;vertical-align: middle;text-align:center;padding-right:20px;padding-left:20px;border-spacing: 0px;white-space: nowrap;">
                                                Harga Kemarin</th>
                                            <th
                                                style="color: aliceblue;vertical-align: middle;text-align:center;padding-right:20px;padding-left:20px;border-spacing: 0px;white-space: nowrap;">
                                                Perubahan Harga</th>
                                            <th
                                                style="color: aliceblue;vertical-align: middle;text-align:center;padding-right:20px;padding-left:20px;border-spacing: 0px;white-space: nowrap;">
                                                Perubahan Harga (%)</th>
                                            <th
                                                style="color: aliceblue;vertical-align: middle;text-align:center;padding-right:20px;padding-left:20px;border-spacing: 0px;white-space: nowrap;">
                                                Harga Hari Ini</th>
                                            <th
                                                style="color: aliceblue;vertical-align: middle;text-align:center;padding-right:20px;padding-left:20px;border-spacing: 0px;white-space: nowrap;">
                                                Harga Kemarin</th>
                                            <th
                                                style="color: aliceblue;vertical-align: middle;text-align:center;padding-right:20px;padding-left:20px;border-spacing: 0px;white-space: nowrap;">
                                                Perubahan Harga</th>
                                            <th
                                                style="color: aliceblue;vertical-align: middle;text-align:center;padding-right:20px;padding-left:20px;border-spacing: 0px;white-space: nowrap;">
                                                Perubahan Harga (%)</th>

                                        </tr>


                                        </tr>
                                    </thead>
                                    <tbody id="tbl_non_filter">

                                        @foreach ($table as $key => $value)
                                            <tr>
                                                <td style="background-color: moccasin">
                                                    <h5>{{ $loop->iteration }}</h5>
                                                </td>
                                                <td colspan="20" style="background-color: moccasin">
                                                    <h5>{{ $key }}</h5>
                                                </td>
                                            </tr>
                                            @foreach ($value as $item)
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        {{ $item['nama'] }}
                                                    </td>
                                                    <td>
                                                        {{ $item['satuan'] }}
                                                    </td>
                                                    @if (isset($item['harga_hari_ini_kandangan']))
                                                        <td>
                                                            Rp.
                                                            {{ number_format($item['harga_hari_ini_kandangan'], 0, ',', '.') }}
                                                        </td>
                                                        <td>
                                                            Rp.
                                                            {{ number_format($item['harga_kemarin_kandangan'], 0, ',', '.') }}
                                                        </td>
                                                        <td>
                                                            Rp.
                                                            {{ number_format($item['perubahan_harga_kandangan'], 0, ',', '.') }}
                                                            @if ($item['perubahan_harga_kandangan'] > 0)
                                                                <i class="fa fa-arrow-up" style="color:red"></i>
                                                            @elseif($item['perubahan_harga_kandangan'] < 0)
                                                                <i class="fa fa-arrow-down" style="color: green"></i>
                                                            @elseif($item['perubahan_harga_kandangan'] = 0)
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{ number_format($item['perubahan_harga_persen_kandangan'], 0, ',', '.') }}%
                                                            @if ($item['perubahan_harga_persen_kandangan'] > 0)
                                                                <i class="fa fa-arrow-up" style="color:red"></i>
                                                            @elseif($item['perubahan_harga_persen_kandangan'] < 0)
                                                                <i class="fa fa-arrow-down" style="color: green"></i>
                                                            @elseif($item['perubahan_harga_persen_kandangan'] = 0)
                                                            @endif
                                                        </td>
                                                    @else
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    @endif

                                                    @if (isset($item['harga_hari_ini_negara']))
                                                        <td>
                                                            Rp.
                                                            {{ number_format($item['harga_hari_ini_negara'], 0, ',', '.') }}
                                                        </td>
                                                        <td>
                                                            Rp.
                                                            {{ number_format($item['harga_kemarin_negara'], 0, ',', '.') }}
                                                        </td>
                                                        <td>
                                                            Rp.
                                                            {{ number_format($item['perubahan_harga_negara'], 0, ',', '.') }}
                                                            @if ($item['perubahan_harga_negara'] > 0)
                                                                <i class="fa fa-arrow-up" style="color:red"></i>
                                                            @elseif($item['perubahan_harga_negara'] < 0)
                                                                <i class="fa fa-arrow-down" style="color: green"></i>
                                                            @elseif($item['perubahan_harga_negara'] = 0)
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{ number_format($item['perubahan_harga_persen_negara'], 0, ',', '.') }}%
                                                            @if ($item['perubahan_harga_persen_negara'] > 0)
                                                                <i class="fa fa-arrow-up" style="color:red"></i>
                                                            @elseif($item['perubahan_harga_persen_negara'] < 0)
                                                                <i class="fa fa-arrow-down" style="color: green"></i>
                                                            @elseif($item['perubahan_harga_persen_negara'] = 0)
                                                            @endif
                                                        </td>
                                                    @else
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    @endif


                                                    @if (isset($item['harga_hari_ini_bjm']))
                                                        <td>
                                                            Rp.
                                                            {{ number_format($item['harga_hari_ini_bjm'], 0, ',', '.') }}
                                                        </td>
                                                        <td>
                                                            Rp.
                                                            {{ number_format($item['harga_kemarin_bjm'], 0, ',', '.') }}
                                                        </td>
                                                        <td>
                                                            Rp.
                                                            {{ number_format($item['perubahan_harga_bjm'], 0, ',', '.') }}
                                                            @if ($item['perubahan_harga_bjm'] > 0)
                                                                <i class="fa fa-arrow-up" style="color:red"></i>
                                                            @elseif($item['perubahan_harga_bjm'] < 0)
                                                                <i class="fa fa-arrow-down" style="color: green"></i>
                                                            @elseif($item['perubahan_harga_bjm'] = 0)
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{ number_format($item['perubahan_harga_persen_bjm'], 0, ',', '.') }}%
                                                            @if ($item['perubahan_harga_persen_bjm'] > 0)
                                                                <i class="fa fa-arrow-up" style="color:red"></i>
                                                            @elseif($item['perubahan_harga_persen_bjm'] < 0)
                                                                <i class="fa fa-arrow-down" style="color: green"></i>
                                                            @elseif($item['perubahan_harga_persen_bjm'] = 0)
                                                            @endif
                                                        </td>
                                                    @else
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    @endif

                                                    @if (isset($item['harga_hari_ini_tanjung']))
                                                        <td>
                                                            Rp.
                                                            {{ number_format($item['harga_hari_ini_tanjung'], 0, ',', '.') }}
                                                        </td>
                                                        <td>
                                                            Rp.
                                                            {{ number_format($item['harga_kemarin_tanjung'], 0, ',', '.') }}
                                                        </td>
                                                        <td>
                                                            Rp.
                                                            {{ number_format($item['perubahan_harga_tanjung'], 0, ',', '.') }}
                                                            @if ($item['perubahan_harga_tanjung'] > 0)
                                                                <i class="fa fa-arrow-up" style="color:red"></i>
                                                            @elseif($item['perubahan_harga_tanjung'] < 0)
                                                                <i class="fa fa-arrow-down" style="color: green"></i>
                                                            @elseif($item['perubahan_harga_tanjung'] = 0)
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{ number_format($item['perubahan_harga_persen_tanjung'], 0, ',', '.') }}%
                                                            @if ($item['perubahan_harga_persen_tanjung'] > 0)
                                                                <i class="fa fa-arrow-up" style="color:red"></i>
                                                            @elseif($item['perubahan_harga_persen_tanjung'] < 0)
                                                                <i class="fa fa-arrow-down" style="color: green"></i>
                                                            @elseif($item['perubahan_harga_persen_tanjung'] = 0)
                                                            @endif
                                                        </td>
                                                    @else
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    @endif



                                                    <td>
                                                        {{ $item['persedian'] }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="client_section layout_padding">
    </section>

    <!-- end client section -->

    <div class="footer_container">


        <!-- footer section -->
        <footer class="footer_section">
            <div class="container">
                <p>
                    &copy; <span id="displayYear"></span> DISKOMINFOHSS
                </p>
            </div>
        </footer>
        <!-- footer section -->


    </div>
    <!-- jQery -->
    <script src="{{ asset('') }}food/js/jquery-3.4.1.min.js"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('') }}food/js/bootstrap.js"></script>
    <!-- slick  slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"
        integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
    <!-- custom js -->
    <script src="{{ asset('') }}food/js/custom.js"></script>

    <script src="{{ url('') }}/amcharts/index.js"></script>
    <script src="{{ url('') }}/amcharts/xy.js"></script>
    <script src="{{ url('') }}/amcharts/themes/Animated.js"></script>
    <script src="{{ asset('stisla/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        var options = {
            series: [{
                name: 'Pasar Kandangan',
                data: [
                    @foreach ($harga_chart_kandangan as $kandangan)
                        {{ $kandangan->harga_hari_ini }},
                    @endforeach
                ]
            }],
            chart: {
                height: 550,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'date',
                categories: [
                    @foreach ($tanggal as $tanggal)
                        "{{ date('d-m-Y', strtotime($tanggal->tanggal)) }}",
                    @endforeach
                ]
            },
            tooltip: {
                x: {
                    format: 'dd/mm/YY'
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

        function filter_pasar() {
            let nama = $("#select_filter").val()
            let pasar = $("#select_filter_pasar").val()
            // $("#tbl_non_filter").hide()
            console.log(pasar)
            $.ajax({
                url: window.location.origin + '/landing/filter',
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    nama: nama,
                    pasar: pasar
                },
                beforeSend: function() {},
                success: function(data) {
                    $('#chart').html(data)
                }
            });
        }


        function filter() {
            let nama = $("#select_filter").val()
            let pasar = $("#select_filter_pasar").val()
            // $("#tbl_non_filter").hide()
            console.log(pasar)
            $.ajax({
                url: window.location.origin + '/landing/filter',
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    nama: nama,
                    pasar: pasar,
                },
                beforeSend: function() {},
                success: function(data) {
                    $('#chart').html(data)
                }
            });
        }
    </script>




</body>

</html>
