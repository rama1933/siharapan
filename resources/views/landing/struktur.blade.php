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
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap"
        rel="stylesheet">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="{{ asset('') }}cas/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('') }}cas/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">

    <link rel="stylesheet" href="{{ asset('stisla/node_modules/select2/dist/css/select2.min.css') }}">

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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile') }}">Profile</a>
                            </li>
                            <li class="nav-item active">
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
        {{-- <div class="banner_section layout_padding">
            <div id="my_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="banner_taital_main">
                                <div class="row">
                                    <div class="col-md-6" style="margin-top: 30px">
                                        <h1 class="banner_taital">
                                            Selamat Datang Di Aplikasi SIHARAPAN
                                        </h1>
                                        <p class="banner_text">Sistem Informasi Harga Pangan Kabupaten Hulu Sungai
                                            Selatan</p>
                                        <div class="btn_main">
                                            <div class="about_bt active mb-3"><a
                                                    href="{{ route('masuk_form') }}">Login</a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="image_1" style="margin-bottom: 20px;margin-left: 150px"><img
                                                src="{{ asset('') }}fresh/images/banner_img4.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!--banner section end -->
    </div>
    <!--header section end -->
    <!-- services section start -->
    <div class="services_section layout_padding">
        <div class="container">
            <h1 class="services_taital"><span style="color: #fcce2d">STRUKTUR</span> ORGANISASI</h1>
            <div class="services_section_2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="news_taital_box">
                            <img src="{{ asset('') }}logo/sto.jpeg" alt="">
                            {{-- <p class="date_text">01 Jan 2020</p>
                            <h4 class="make_text">Make it Simple</h4> --}}
                            {{-- <p class="post_text">Post By : Casinal</p> --}}
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

</body>

</html>
