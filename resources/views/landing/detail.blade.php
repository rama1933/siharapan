<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>SIHARAPAN</title>
    <link href="{{ url('') }}/logo/hss.png" rel="icon">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- owl carousel style -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.carousel.min.css" />
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}cas/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}cas/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('') }}cas/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('') }}cas/images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('') }}cas/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    {{-- <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
     --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap"
        rel="stylesheet">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="{{ asset('') }}cas/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('') }}cas/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">

    <link rel="stylesheet" href="{{ asset('stisla/node_modules/select2/dist/css/select2.min.css') }}">

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
    </style>
</head>

<body>
    <!--header section start -->
    <div class="header_section">
        <div class="header_bg">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="logo" href="{{ url('') }}">
                        <img src="{{ asset('') }}logo/1.png" style="margin-left:-100px ">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile') }}">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('struktur') }}">Struktur </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('landing.berita') }}">Berita</a>
                            </li>
                        </ul>
                        <div class="call_section">
                            <ul>
                                <li><a href="https://www.facebook.com/profile.php?id=100015153813326"
                                        target="_blank"><img src="{{ asset('') }}cas/images/fb-icon.png"></a></li>
                                <li><a href="https://www.instagram.com/ketahananpanganhss/" target="_blank"><img
                                            src="{{ asset('') }}cas/images/instagram-icon.png"></a>
                                </li>
                                <li><a href="https://www.youtube.com/@ketahananpanganhss4770" target="_blank"><img
                                            src="{{ asset('') }}cas/images/yt.png"
                                            style="width: 25px;height:20px"></a>
                                </li>

                                <li><a href="https://goo.gl/maps/fYo8vpkYMgGpd4aB7" target="_blank"><img
                                            src="{{ asset('') }}cas/images/loc.png"
                                            style="width: 15px;height:20px"></a>
                                </li>

                                <li><a href="http://dkp.hulusungaiselatankab.go.id/" target="_blank"><img
                                            src="{{ asset('') }}cas/images/web.png"
                                            style="width: 20px;height:20px"></a>
                                </li>

                                <li><a href="http://wa.link/nvv83s" target="_blank"><img
                                            src="{{ asset('') }}cas/images/wa.png"
                                            style="width: 20px;height:20px"></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!--banner section start -->
        <!--banner section end -->
    </div>
    <!--header section end -->
    <!-- services section start -->
    <div class="services_section layout_padding">
        <div class="container">
            <h1 class="services_taital"><span style="color: #fcce2d">GRAFIK</span> HARGA PANGAN</h1>
            <div class="services_section_2">
                <div class="row">
                    <div class="card-body" style="background-color: white">
                        <div class="row justify-content-center">
                            <select name="bahan_pokok_child_id" class="select2" id="select_filter"
                                onchange="filter()" style="margin-right: 10px;">
                                @foreach ($bapo as $bapo)
                                    <option value="{{ $bapo->nama }}">{{ $bapo->komoditi->nama }} -
                                        {{ $bapo->nama }}
                                    </option>
                                @endforeach
                            </select>

                            {{--  <select name="filter_pasar" id="select_filter_pasar" class="select2"
                                onchange="filter_pasar()">
                                <option value="1">Harga Eceran</option>
                                <option value="2">Harga Produsen</option>
                            </select>  --}}
                        </div>
                        <div id="chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- services section end -->
    <!-- about section start -->
    <div class="news_section layout_padding">
        <div class="container">
            <h1 class="services_taital"><span style="color: #fcce2d">TABEL</span> HARGA PANGAN</h1>
            <div class="services_section_2">
                <div class="row">
                    <div class="col-12">
                        <div class="card mt-5">
                            <div class="card-body" id="result">
                                <a href="{{ url('') }}/pdf" title="Unduh Dokumen (PDF)"
                                    class="btn btn-md btn-outline-primary mb-3"><i class="fa fa-print">
                                        Cetak Pdf</i></a>
                                <a href="{{ url('') }}/excel" title="Unduh Dokumen (Excel)"
                                    class="btn btn-md btn-outline-success mb-3"><i class="fa fa-print">
                                        Cetak Excel</i></a>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped  table-md" id="table">
                                        <thead>
                                            <tr style="background-color:#6777ef">
                                                <th rowspan="1"
                                                    style="color: aliceblue;vertical-align: middle;text-align:center;width:130px">
                                                    Tanggal
                                                </th>
                                                <th rowspan="1"
                                                    style="color: aliceblue;vertical-align: middle;text-align:center;width:130px">
                                                    Nama
                                                </th>
                                                <th rowspan="1"
                                                    style="color: aliceblue;vertical-align: middle;text-align:center;width:130px">
                                                    Jenis
                                                </th>
                                                <th rowspan="1"
                                                    style="color: aliceblue;vertical-align: middle;text-align:center;width:130px">
                                                    Satuan
                                                </th>
                                                <th rowspan="1"
                                                    style="color: aliceblue;vertical-align: middle;text-align:center;width:130px">
                                                    Harga
                                                </th>
                                                <th rowspan="1"
                                                    style="color: aliceblue;vertical-align: middle;text-align:center;width:130px">
                                                    Persediaan
                                                </th>


                                            </tr>
                                        </thead>
                                        <tbody id="tbl_non_filter">
                                            @foreach ($table as $table)
                                                <tr>
                                                    <td>
                                                        {{ date('d-m-Y', strtotime($table->tanggal)) }}
                                                    </td>
                                                    <td>
                                                        {{ $table->nama }}
                                                    </td>
                                                    <td>{{ $table->jenis }}</td>
                                                    <td>{{ $table->satuan }}</td>
                                                    <td>{{ $table->harga_terendah }}</td>
                                                    <td>{{ $table->persedian }}</td>
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




    <!-- footer section end -->
    <!-- copyright section start -->
    <div class="copyright_section mt-5">
        <div class="container">
            <p class="copyright_text">© {{ date('Y') }} DISKOMINFOHSS All Rights Reserved</p>
        </div>
    </div>
    <!-- copyright section end -->
    <!-- Javascript files-->
    <script src="{{ asset('') }}cas/js/jquery.min.js"></script>
    <script src="{{ asset('') }}cas/js/popper.min.js"></script>
    <script src="{{ asset('') }}cas/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}cas/js/jquery-3.0.0.min.js"></script>
    <script src="{{ asset('') }}cas/js/plugin.js"></script>
    <!-- sidebar -->
    <script src="{{ asset('') }}cas/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="{{ asset('') }}cas/js/custom.js"></script>
    <!-- javascript -->
    <script src="{{ asset('') }}cas/js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script src="{{ url('') }}/amcharts/index.js"></script>
    <script src="{{ url('') }}/amcharts/xy.js"></script>
    <script src="{{ url('') }}/amcharts/themes/Animated.js"></script>
    <script src="{{ asset('stisla/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"
        integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        if (jQuery().select2) {
            $(".select2").select2({
                width: '200px'
            });
        }

        var options = {
            series: [{
                name: 'Harga',
                data: [
                    @foreach ($harga_chart as $kandangan)
                        {{ $kandangan->harga_terendah }},
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
                },
                beforeSend: function() {},
                success: function(data) {
                    $('#chart').html(data)
                }
            });
        }


        function filter() {
            let nama = $("#select_filter").val()
            // $("#tbl_non_filter").hide()
            $.ajax({
                url: window.location.origin + '/landing/filter',
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    nama: nama,
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
