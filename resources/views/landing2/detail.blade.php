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

                        </span>
                    </a>
                    <div class="" id="">
                        <div class="User_option">
                            <a href="{{ route('masuk_form') }}">
                                <i class="" aria-hidden="true"></i>
                                <span class="btn btn-sm btn-outline-light">Login</span>
                            </a>
                            {{-- <form class="form-inline ">
                                <input type="search" placeholder="Search" />
                                <button class="btn  nav_search-btn" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form> --}}
                        </div>
                        {{-- <div class="custom_menu-btn">
                            <button onclick="openNav()">
                                <img src="{{ asset('') }}food/images/menu.png" alt="">
                            </button>
                        </div> --}}
                        {{-- <div id="myNav" class="overlay">
                            <div class="overlay-content">
                                <a href="index.html">Home</a>
                                <a href="about.html">About</a>
                                <a href="blog.html">Blog</a>
                                <a href="testimonial.html">Testimonial</a>
                            </div>
                        </div> --}}
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->

        <!-- slider section -->

        <!-- end slider section -->
    </div>


    <!-- recipe section -->

    <section class="recipe_section layout_padding-top">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Harga
                    @foreach ($bahan as $bahan)
                        {{ $bahan->nama }}
                    @endforeach
                </h2>
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-center mt-4">
                    <select name="filter_pasar" id="select_filter_pasar" onchange="filter_pasar()">
                        <option value="1">Pasar Kandangan</option>
                        <option value="2">Pasar Negara</option>
                        <option value="3">Pasar Terpadu</option>
                    </select>
                </div>
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card-body">
                        <div id="chartdiv"></div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card mt-5">

                    {{-- <div class="card-header">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-create"> <i
                                class="fa fa-plus">
                                Tambah</i></button>
                        <div class="col-sm-3">
                            <input class=" form-control" onchange="tanggal()" type="date" name="date" id="date">
                        </div>

                    </div> --}}
                    <div class="card-body" id="result">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped  table-md" id="table">
                                <thead>
                                    <tr style="background-color:#6777ef">
                                        <th rowspan="2"
                                            style="color: aliceblue;vertical-align: middle;text-align:center;padding-right:40px;padding-left:40px;border-spacing: 0px;white-space: nowrap;">
                                            Tanggal
                                        <th rowspan="1" colspan="2"
                                            style="color: aliceblue;vertical-align: middle;text-align:center">Pasar
                                            Kandangan</th>
                                        <th rowspan="1" colspan="2"
                                            style="color: aliceblue;vertical-align: middle;text-align:center">Pasar
                                            Negara</th>
                                        <th rowspan="1" colspan="2"
                                            style="color: aliceblue;vertical-align: middle;text-align:center">Pasar
                                            Terpadu</th>
                                        <th rowspan="1" colspan="1"
                                            style="color: aliceblue;vertical-align: middle;text-align:center;padding-right:10px;border-spacing: 0px;white-space: nowrap;">
                                            Indeks
                                            Harga konsumen (IHK) Banjarmasin</th>
                                    <tr style="background-color:#6777ef">

                                        <th
                                            style="color: aliceblue;vertical-align: middle;text-align:center;padding-right:60px;padding-left:60px;border-spacing: 0px;white-space: nowrap;">
                                            Harga</th>
                                        <th
                                            style="color: aliceblue;vertical-align: middle;text-align:center;padding-right:60px;padding-left:60px;border-spacing: 0px;white-space: nowrap;">
                                            Persediaan
                                        </th>
                                        <th
                                            style="color: aliceblue;vertical-align: middle;text-align:center;padding-right:60px;padding-left:60px;border-spacing: 0px;white-space: nowrap;">
                                            Harga</th>
                                        <th
                                            style="color: aliceblue;vertical-align: middle;text-align:center;padding-right:60px;padding-left:60px;border-spacing: 0px;white-space: nowrap;">
                                            Persediaan
                                        </th>
                                        <th
                                            style="color: aliceblue;vertical-align: middle;text-align:center;padding-right:60px;padding-left:60px;border-spacing: 0px;white-space: nowrap;">
                                            Harga</th>
                                        <th
                                            style="color: aliceblue;vertical-align: middle;text-align:center;padding-right:60px;padding-left:60px;border-spacing: 0px;white-space: nowrap;">
                                            Persediaan
                                        </th>
                                        <th
                                            style="color: aliceblue;vertical-align: middle;text-align:center;padding-right:10px;padding-left:10px;border-spacing: 0px;white-space: nowrap;">
                                            Harga</th>

                                    </tr>


                                    </tr>
                                </thead>
                                <tbody id="tbl_non_filter">

                                    @foreach ($harga as $harga)
                                        <tr>
                                            <td>
                                                {{ date('d-m-Y', strtotime($harga->tanggal)) }}
                                            </td>


                                            <td>

                                                Rp. {{ number_format($harga->harga_kandangan, 0, ',', '.') }}

                                            </td>

                                            <td>

                                                {{ $harga->persedian_kandangan }}

                                            </td>

                                            <td>

                                                Rp. {{ number_format($harga->harga_negara, 0, ',', '.') }}

                                            </td>

                                            <td>

                                                {{ $harga->persedian_negara }}

                                            </td>

                                            <td>

                                                Rp. {{ number_format($harga->harga_terpadu, 0, ',', '.') }}

                                            </td>

                                            <td>

                                                {{ $harga->persedian_terpadu }}

                                            </td>
                                            <td>

                                                Rp. {{ number_format($harga->ihk_banjarmasin, 0, ',', '.') }}

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
    </section>

    <!-- end recipe section -->

    <!-- app section -->

    {{-- <section class="app_section">
        <div class="container">
            <div class="col-md-9 mx-auto">
                <div class="row">
                    <div class="col-md-7 col-lg-8">
                        <div class="detail-box">
                            <h2>
                                <span> Get the</span> <br>
                                Delfood App
                            </h2>
                            <p>
                                long established fact that a reader will be distracted by the readable content of a page
                                when looking at its layout. The poin
                            </p>
                            <div class="app_btn_box">
                                <a href="" class="mr-1">
                                    <img src="{{ asset('') }}food/images/google_play.png" class="box-img" alt="">
                                </a>
                                <a href="">
                                    <img src="{{ asset('') }}food/images/app_store.png" class="box-img" alt="">
                                </a>
                            </div>
                            <a href="" class="download_btn">
                                Download Now
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-4">
                        <div class="img-box">
                            <img src="{{ asset('') }}food/images/mobile.png" class="box-img" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section> --}}

    <!-- end app section -->

    <!-- about section -->

    {{-- <section class="about_section layout_padding">
        <div class="container">
            <div class="col-md-11 col-lg-10 mx-auto">
                <div class="heading_container heading_center">
                    <h2>
                        About Us
                    </h2>
                </div>
                <div class="box">
                    <div class="col-md-7 mx-auto">
                        <div class="img-box">
                            <img src="{{ asset('') }}food/images/about-img.jpg" class="box-img" alt="">
                        </div>
                    </div>
                    <div class="detail-box">
                        <p>
                            Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum
                            passage, and going through the cites of the word in classical literature, discovered the
                            undoubtable Virginia, looked up one of the more obscure Latin words, consectetur, from a
                            Lorem Ipsum passage, and going through the cites of the word in classical literature,
                            discovered the undoubtable
                        </p>
                        <a href="">
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- end about section -->

    <!-- news section -->

    {{-- <section class="news_section">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Latest News
                </h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="box">
                        <div class="img-box">
                            <img src="{{ asset('') }}food/images/n1.jpg" class="box-img" alt="">
                        </div>
                        <div class="detail-box">
                            <h4>
                                Tasty Food For you
                            </h4>
                            <p>
                                there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum
                                generators on the Internet tend to repeat predefined
                            </p>
                            <a href="">
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box">
                        <div class="img-box">
                            <img src="{{ asset('') }}food/images/n2.jpg" class="box-img" alt="">
                        </div>
                        <div class="detail-box">
                            <h4>
                                Breakfast For you
                            </h4>
                            <p>
                                there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum
                                generators on the Internet tend to repeat predefined
                            </p>
                            <a href="">
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- end news section -->

    <!-- client section -->

    <section class="client_section layout_padding">
        {{-- <div class="container">
            <div class="col-md-11 col-lg-10 mx-auto">
                <div class="heading_container heading_center">
                    <h2>
                        Testimonial
                    </h2>
                </div>
                <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="detail-box">
                                <h4>
                                    Virginia
                                </h4>
                                <p>
                                    Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem
                                    Ipsum passage, and going through the cites of the word in classical literature,
                                    discovered the undoubtable Virginia, looked up one of the more obscure Latin words,
                                    consectetur, from a Lorem Ipsum passage, and
                                </p>
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="detail-box">
                                <h4>
                                    Virginia
                                </h4>
                                <p>
                                    Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem
                                    Ipsum passage, and going through the cites of the word in classical literature,
                                    discovered the undoubtable Virginia, looked up one of the more obscure Latin words,
                                    consectetur, from a Lorem Ipsum passage, and
                                </p>
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="detail-box">
                                <h4>
                                    Virginia
                                </h4>
                                <p>
                                    Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem
                                    Ipsum passage, and going through the cites of the word in classical literature,
                                    discovered the undoubtable Virginia, looked up one of the more obscure Latin words,
                                    consectetur, from a Lorem Ipsum passage, and
                                </p>
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev d-none" href="#customCarousel1" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div> --}}
    </section>

    <!-- end client section -->

    <div class="footer_container">
        <!-- info section -->
        {{-- <section class="info_section ">
            <div class="container">
                <div class="contact_box">
                    <a href="">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </a>
                    <a href="">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                    </a>
                    <a href="">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="info_links">
                    <ul>
                        <li class="active">
                            <a href="index.html">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="about.html">
                                About
                            </a>
                        </li>
                        <li>
                            <a class="" href="blog.html">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a class="" href="testimonial.html">
                                Testimonial
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="social_box">
                    <a href="">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                    <a href="">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                    <a href="">
                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </section> --}}
        <!-- end info_section -->


        <!-- footer section -->
        <footer class="footer_section">
            <div class="container">
                <p>
                    &copy; <span id="displayYear"></span> DISKOMINFOHSS
                    {{-- <a href="https://html.design/">Free Html Templates</a><br>
                    Distributed By: <a href="https://themewagon.com/">ThemeWagon</a> --}}
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

    <script>
        am5.ready(function() {
            // Create root element
            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
            var root = am5.Root.new("chartdiv");


            // Set themes
            // https://www.amcharts.com/docs/v5/concepts/themes/
            root.setThemes([
                am5themes_Animated.new(root)
            ]);

            root.dateFormatter.setAll({
                dateFormat: "yyyy",
                dateFields: ["valueX"]
            });

            var data = [
                @forelse ($harga_chart as $harga2)
                    {
                        "date": "{{ $harga2->tanggal }}",
                        "value": {{ $harga2->harga_kandangan }}
                    },
                @empty
                    {
                        "date": "0",
                        "value": 0
                    },
                @endforelse
            ];


            // Create chart
            // https://www.amcharts.com/docs/v5/charts/xy-chart/
            var chart = root.container.children.push(am5xy.XYChart.new(root, {
                focusable: true,
                panX: true,
                panY: true,
                wheelX: "panX",
                wheelY: "zoomX"
            }));

            var easing = am5.ease.linear;


            // Create axes
            // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
            var xAxis = chart.xAxes.push(am5xy.DateAxis.new(root, {
                maxDeviation: 0.1,
                groupData: false,
                baseInterval: {
                    timeUnit: "",
                    count: 1
                },
                renderer: am5xy.AxisRendererX.new(root, {

                }),
                tooltip: am5.Tooltip.new(root, {})
            }));

            var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                maxDeviation: 0.2,
                renderer: am5xy.AxisRendererY.new(root, {})
            }));


            // Add series
            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
            var series = chart.series.push(am5xy.LineSeries.new(root, {
                minBulletDistance: 10,
                connect: false,
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "value",
                valueXField: "date",
                tooltip: am5.Tooltip.new(root, {
                    pointerOrientation: "horizontal",
                    labelText: "{valueY}"
                })
            }));

            series.fills.template.setAll({
                fillOpacity: 0.2,
                visible: true
            });

            series.strokes.template.setAll({
                strokeWidth: 2
            });


            // Set up data processor to parse string dates
            // https://www.amcharts.com/docs/v5/concepts/data/#Pre_processing_data
            series.data.processor = am5.DataProcessor.new(root, {
                dateFormat: "yyyy-MM-dd",
                dateFields: ["date"]
            });

            series.data.setAll(data);

            series.bullets.push(function() {
                var circle = am5.Circle.new(root, {
                    radius: 4,
                    fill: root.interfaceColors.get("background"),
                    stroke: series.get("fill"),
                    strokeWidth: 2
                })

                return am5.Bullet.new(root, {
                    sprite: circle
                })
            });


            // Add cursor
            // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
            var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {
                xAxis: xAxis,
                behavior: "none"
            }));
            cursor.lineY.set("visible", false);

            // add scrollbar
            chart.set("scrollbarX", am5.Scrollbar.new(root, {
                orientation: "horizontal"
            }));


            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            chart.appear(1000, 100);

        }); // end am5.ready()

        function filter_pasar() {
            let id = {{ $id }}
            let pasar = $("#select_filter_pasar").val()
            // $("#tbl_non_filter").hide()
            console.log(pasar)
            $.ajax({
                url: "{{ url('') }}/filter",
                method: "POST",
                data: {
                    id: id,
                    pasar: pasar,
                    _token: '{{ csrf_token() }}'
                },
                beforeSend: function() {},
                success: function(data) {
                    $('#chartdiv').html(data)
                }
            });
        }
    </script>


</body>

</html>
