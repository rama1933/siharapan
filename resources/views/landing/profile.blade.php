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
                            <li class="nav-item active">
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
            <h1 class="services_taital"><span style="color: #fcce2d">PROFILE</span> ORGANISASI</h1>
            <div class="services_section_2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="news_taital_box">
                            {{-- <p class="date_text">01 Jan 2020</p>
                            <h4 class="make_text">Make it Simple</h4> --}}
                            <p class="lorem_text">
                                Dinas Ketahanan Pangan Kabupaten Hulu Sungai Selatan dibentuk berdasarkan Peraturan
                                Daerah Nomor 13 Tahun 2016 tentang Pembentukan dan Susunan Perangkat Daerah. Dinas
                                Ketahanan Pangan adalah perangkat daerah yang merupakan unsur pelaksana urusan
                                pemerintahan daerah bidang pangan. Dinas Ketahanan Pangan dipimpin oleh Kepala Dinas
                                yang berkedudukan dibawah dan bertanggung jawab kepada Bupati melalui Sekretaris Daerah.
                                <br>
                                <br>
                                Berpedoman Peraturan Bupati Nomor 81 Tahun 2016 tentang Kedudukan, Susunan Organisasi,
                                Fungsi, dan Tugas Serta Tata Kerja Dinas Ketahanan Pangan Kabupaten Hulu Sungai Selatan
                                mempunyai tugas membantu bupati dalam melaksanakan urusan pemerintahan bidang
                                penyelenggaraan pangan berdasarkan kedaulatan dan kemandirian, penyelenggaraan pangan,
                                penanganan kerawanan pangan dan keamanan pangan serta tugas lain yang diberikan Bupati
                                sesuai perundang-undangan yang berlaku. Dimana Dinas Ketahanan Pangan mempunyai fungsi
                                sebagai berikut :
                                <br>
                            <ol>
                                <li>a. koordinasi penyusunan rencana strategis, program, dan anggaran Dinas Ketahanan
                                    Pangan;</li>
                                <li>b. perumusan kebijakan bidang penyelenggaraan pangan berdasarkan kedaulatan dan
                                    kemandirian, penyelenggaraan pangan, penanganan kerawanan pangan dan keamanan
                                    pangan;</li>
                                <li>c. pelaksanaan kebijakan bidang penyelenggaraan pangan berdasarkan kedaulatan dan
                                    kemandirian, penyelenggaraan pangan, penanganan kerawanan pangan dan keamanan
                                    pangan;</li>
                                <li>d. pelaksanaan evaluasi dan pelaporan bidang penyelenggaraan pangan berdasarkan
                                    kedaulatan dan kemandirian, penyelenggaraan pangan, penanganan kerawanan pangan dan
                                    keamanan pangan;</li>
                                <li>e. pelaksanaan administrasi Dinas Ketahanan Pangan; dan</li>
                                <li>f. pelaksanaan fungsi lain yang diberikan oleh Bupati terkait dengan tugas dan
                                    fungsinya.</li>
                            </ol>
                            <br>

                            Sesuai peraturan Bupati Nomor 81 Tahun 2016 tersebut, dalam pelaksanaan tugasnya Kepala
                            Dinas Ketahanan Pangan Kabupaten Hulu Sungai Selatan di bantu oleh 1 (satu) Sekretaris dan 2
                            (dua) Kepala Bidang. Struktur organisasi Dinas Ketahanan Pangan Kab. HSS terdiri atas :
                            <br>
                            Struktur organisasi Dinas Ketahanan Pangan Kab. Hulu Sungai Selatan terdiri atas :

                            <ol>
                                <li>1. Kepala Dinas</li>
                                <li>2. Sekretariat Dinas</li>
                                <li>a. Sub Bagian Umum dan Kepegawaian
                                    <br>
                                    b. Sub Bagian Perencanaan dan Keuangan
                                </li>
                                <li>
                                    3. Bidang Ketersediaan dan Distribusi Pangan
                                </li>
                                <li>
                                    a. Seksi Ketersediaan Pangan
                                    <br>
                                    b. Seksi Distribusi Pangan
                                </li>
                                <li>
                                    4. Bidang Konsumsi dan Keamanan Pangan
                                </li>
                                <li>
                                    a. Seksi Konsumsi dan penganekaragaman Pangan
                                    <br>
                                    b. Seksi Keamanan Pangan
                                </li>
                                <li>5. Kelompok Jabatan Fungsional</li>
                            </ol>
                            <br>
                            Secara rinci tugas dan fungsi setiap bagian di Dinas Ketahanan Pangan Kabupaten Hulu Sungai
                            Selatan sebagai berikut:
                            <br>
                            <ol>
                                <li><b>1. Sekretariat</b> </li>
                            </ol>
                            <br>
                            Sekretariat mempunyai tugas melaksanakan koordinasi pelaksanaan tugas, pembinaan, dan
                            pemberian dukungan pelayanan administrasi kepada seluruh unit organisasi di lingkungan Dinas
                            Ketahanan Pangan serta tugas lain yang diberikan Kepala Dinas sesuai dengan tugas dan
                            fungsinya. Fungsi Sekretariat sebagai berikut :
                            <br>
                            <ol>
                                <li>a. koordinasi penyusunan rencana strategis, program, dan anggaran Dinas Ketahanan
                                    Pangan;
                                    <br>
                                    b. pembinaan dan pemberian dukungan administrasi yang meliputi ketatausahaan,
                                    kepegawaian, kerumah tanggaan, kerjasama, hukum, hubungan masyarakat, keprotokolan,
                                    arsip, dan dokumentasi;
                                    <br>
                                    c. pembinaan dan penataan organisasi dan tata laksana;
                                    <br>
                                    d. pelaksanaan koordinasi dan penyusunan peraturan perundang-undangan;
                                    <br>
                                    e. pengelolaan barang milik/kekayaan negara;
                                    <br>
                                    f. pelaksanaan koordinasi program dan kegiatan di lingkungan Dinas Ketahanan
                                    Pangan ;
                                    <br>
                                    g. koordinasi penyusunan laporan kinerja, prorgam dan kegiatan;
                                    <br>
                                    h. pembinaan dan pemberian dukungan urusan administrasi keuangan,
                                    perbendaharaan, akuntansi dan verifikasi; dan
                                    <br>
                                    i. pelaksanaan tugas lain yang diberikan oleh Kepala Dinas sesuai dengan tugas
                                    dan fungsinya.
                                </li>
                            </ol>
                            <br>
                            Sekretariat terdiri dari :
                            <ol>
                                <li>1) Sub Bagian Umum dan Kepegawaian
                                    Sub Bagian Umum dan Kepegawaian mempunyai tugas menyelenggarakan urusan surat
                                    menyurat,
                                    kearsipan, inventarisasi barang, rumah tangga, perlengkapan, perjalanan dinas,
                                    kerjasama, hukum, hubungan masyarakat, keprotokolan, arsip, dan dokumentasi
                                    serta
                                    pengelolaan administrasi kepegawaian dan ketatalaksanaan. dengan rincian berikut
                                    :</li>
                            </ol>
                            <ol>
                                <li>
                                    a. menyusun rencana kegiatan dan anggaran Sub Bagian Umum dan Kepegawaian;
                                    <br>
                                    b. melaksanakan urusan tata usaha dan kearsipan;
                                    <br>
                                    c. menyiapkan bahan dan menyusun Rencana Kebutuhan Barang Unit (RKBU)
                                    dan Rencana Tahunan Barang Unit (RTBU) sesuai usulan
                                    masing-masing Bidang;
                                    <br>
                                    d. menyiapkan bahan dan melaksanakan pengadaan, penyaluran, penghapusan
                                    dan pemindahtanganan barang;
                                    <br>
                                    e. melakukan penyiapan bahan penatausahaan dan inventarisasi barang;
                                    <br>
                                    f. melaksanakan pelayanan administrasi perjalanan dinas, pelayanan akomodasi
                                    tamu, hubungan masyarakat dan keprotokolan;
                                    <br>
                                    g. melaksanakan pengelolaan urusan rumah tangga, keamanan dan kebersihan
                                    lingkungan kantor;
                                    <br>
                                    h. menyiapkan bahan dan menyusun rencana kebutuhan dan pengembangan
                                    pegawai;
                                    <br>
                                    i. menyiapkan bahan dan melaksanakan proses administrasi kepegawaian
                                    meliputi kenaikan pangkat, kenaikan gaji berkala, pemberhentian, mutasi,
                                    pensiun dan cuti;
                                    <br>
                                    j. menyiapkan bahan dan melaksanakan pembinaan pegawai meliputi
                                    pembinaan disiplin, pengawasan melekat, kesejahteraan, pemberian tanda
                                    jasa/penghargaan dan kedudukan hukum pegawai;
                                    <br>
                                    k. menyiapkan bahan, telaahan dan melaksanakan penyusunan peraturan
                                    perundang-undangan serta evaluasi kelembagaan dan ketatalaksanaan;
                                    <br>
                                    l. menyiapkan bahan dan mengelola tata usaha kepegawaian meliputi DUK,
                                    dokumentasi berkas kepegawaian dan rekapitulasi absensi;
                                    <br>
                                    m. menyusun Standar Operasional Prosedur (SOP) pada Sub Bagian Umum dan
                                    Kepegawaian; dan
                                    <br>
                                    n. melaksanakan tugas lain yang diberikan oleh Sekretaris sesuai bidang tugas.
                                </li>
                            </ol>
                            <br>
                            <ol>
                                <li>2) Sub Bagian Perencanaan dan Keuangan</li>
                            </ol>
                            <br>
                            Sub Bagian Perencanaan dan Keuangan mempunyai tugas menyelenggarakan urusan urusan
                            penyusunan program, rencana kerja, rencana anggaran dan pelaporan pelaksanaan kegiatan,
                            pengelolaan administrasi keuangan dan pertanggungjawaban keuangan, serta laporan keuangan,
                            dengan rincian berikut :

                            <ol>
                                <li>
                                    a. menyusun rencana kegiatan dan anggaran Sub Bagian Perencanaan dan Keuangan;
                                    <br>
                                    b. menyiapkan bahan dan melaksanakan penyusunan program Dinas Ketahanan Pangan;
                                    <br>
                                    c. menyiapkan bahan dan melaksanakan penyusunan anggaran Dinas Ketahanan Pangan;
                                    <br>
                                    d. menyiapkan bahan penyusunan satuan biaya, daftar isian pelaksanaan anggaran,
                                    petunjuk operasional kegiatan, dan perubahan anggaran;
                                    <br>
                                    e. melakukan kerjasama dengan unit kerja dan instansi terkait dalam rangka
                                    penyusunan rencana kerja, baik rencana kerja tahunan, jangka menengah maupun jangka
                                    panjang;
                                    <br>
                                    f. menyusun rencana anggaran belanja tidak langsung, anggaran belanja langsung,
                                    rencana penerimaan dan pendapatan Dinas Ketahanan Pangan;
                                    <br>
                                    g. melaksanakan koordinasi dan kerjasama penyusunan rencana anggaran belanja dan
                                    rencana pendapatan dan penerimaan;
                                    <br>
                                    h. menyiapkan bahan dan melaksanakan koordinasi penyusunan rencana evaluasi dan
                                    pelaporan kinerja;
                                    <br>
                                    i. melaksanakan pengumpulan, pengolahan, penyajian dan analisa data yang berhubungan
                                    dengan bidang pangan;
                                    <br>
                                    j. menyiapkan bahan dan menyusun konsep laporan kegiatan Dinas, baik laporan rutin
                                    maupun laporan insidentil;
                                    <br>
                                    k. menyiapkan bahan penyusunan petunjuk teknis dan melaksanakan pengelolaan
                                    administrasi keuangan, akutansi, dan verifikasi keuangan;
                                    <br>
                                    l. melaksanakan urusan perbendaharaan, pengelolaan penerimaan negara bukan pajak,
                                    pengujian dan penerbitan surat perintah membayar;
                                    <br>
                                    m. melaksanakan urusan gaji pegawai;
                                    <br>
                                    n. menyiapkan bahan pengesahan dokumen anggaran;
                                    <br>
                                    o. menyiapkan bahan dan melaksanakan evaluasi realisasi anggaran;
                                    <br>
                                    p. menyiapkan bahan dan menyusun laporan pertanggung jawaban keuangan
                                    dan pengelolaan dokumen keuangan ;
                                    <br>
                                    q. menyiapkan bahan dan mengusulkan pejabat pengelola perbendaharaan;
                                    <br>
                                    r. penyiapan bahan pemantauan tidak lanjut laporan hasil pengawasan dan
                                    penyelesaian tuntutan perbendaharaan dan ganti rugi;
                                    <br>
                                    s. menyusunStandarOperasionalProsedur(SOP)padaSubBagianPerencanaan
                                    dan Keuangan; dan
                                    <br>
                                    t. melaksanakan tugas lain yang diberikan oleh Sekretaris sesuai bidang tugas.
                                </li>
                            </ol>
                            <br>
                            <ol>
                                <li><b>2. Bidang Ketersediaan dan Distribusi Pangan</b></li>
                            </ol>
                            <br>
                            Bidang Ketersediaan dan Distribusi Pangan mempunyai tugas melaksanakan pembinaan,
                            pemantauan, evaulasi dan pengkajian sistem ketersediaan, cadangan pangan daerah, pengamanan
                            dan pengendalian harga pangan strategis, pemetaan kerawanan pangan, sistem distribusi pangan
                            dan kewaspadan pangan. Bidang Ketersediaan dan Distribusi Pangan mempunyai fungsi sebagai
                            berikut :
                            <ol>
                                <li>
                                    a. perumusan kebijakan teknis sistem ketersediaan pamgan, cadangan pangan daerah,
                                    pengamanan dan pengendalian harga pangan strategis, pemetaan kerawanan pangan,
                                    sistem distribusi pangan dan kewaspadan pangan;
                                    <br>
                                    b. penyusunan program sistem ketersediaan pangan, cadangan pangan daerah, pengamanan
                                    dan pengendalian harga pangan strategis, pemetaan kerawanan pangan, sistem
                                    distribusi pangan dan kewaspadan pangan;
                                    <br>
                                    c. pelaksanaan sistem ketersediaan pangan, cadangan pangan daerah, pengamanan dan
                                    pengendalian harga pangan strategis, pemetaan kerawanan pangan, sistem distribusi
                                    pangan dan kewaspadan pangan;
                                    <br>
                                    d. pelaksanaan koordinasi kebijakan sistem ketersediaan pangan, cadangan pangan
                                    daerah, pengamanan dan pengendalian harga pangan strategis, pemetaan kerawanan
                                    pangan, sistem distribusi pangan dan kewaspadan pangan;
                                    <br>
                                    e. pembinaan, pengawasan dan pengendalian sistem ketersediaan pangan, cadangan
                                    pangan daerah, pengamanan dan pengendalian harga pangan strategis, pemetaan
                                    kerawanan pangan, sistem distribusi pangan dan kewaspadan pangan;
                                    <br>
                                    f. evaluasi dan pelaporan sistem ketersediaan pangan, cadangan pangan daerah,
                                    pengamanan dan pengendalian harga pangan strategis, pemetaan kerawanan pangan,
                                    sistem distribusi pangan dan kewaspadan pangan; dan
                                    <br>
                                    g. pelaksanaantugaslainyangdiberikanolehKepalaDinassesuaidenganbidang tugas dan
                                    fungsinya
                                </li>
                            </ol>
                            <br>
                            Bidang Ketersediaan dan Distribusi Pangan terdiri dari :
                            <br>
                            <ol>
                                <li>
                                    1) Seksi Ketersediaan Pangan
                                    <br>
                                    Seksi Ketersediaan dan Kerawanan Pangan mempunyai tugas melaksanakan penyiapan bahan
                                    koordinasi dan melaksanakan analisis, penyusunan rencana program kerja, pemantauan,
                                    evaluasi, supervisi, pengkajian kebijakan teknis ketersediaan dan kerawanan pangan,
                                    pendampingan. Dengan rincian sebagai berikut :
                                    <br>
                                </li>
                            </ol>
                            <ol>
                                <li>
                                    a. menyusun rencana kegiatan Seksi Ketersediaan dan Kerawanan Pangan;
                                    <br>
                                    b. menyiapkan bahan koordinasi dan analisis dibidang ketersediaan pangan, penyediaan
                                    infrastruktur pangan dan sumber daya ketahanan pangan lainnya;
                                    <br>
                                    c. menyiapkan bahan penyusunan rencana dan bahan pendampingan dan
                                    pelaksanaankegiatan dibidang ketersediaan pangan;
                                    <br>
                                    d. menyiapkan bahan dan melaksanakan pemantauan, evaluasi, supervisi, dan
                                    pelaporan kegiatan;
                                    <br>
                                    e. menyiapkan data, dan informasi untuk penyusunan Neraca Bahan Makanan
                                    dan perhitungan Pola Pangan Harapan (PPH);
                                    <br>
                                    f. menyiapkan bahan dan melaksanakan pengembangan jaringan informasi
                                    ketersediaan pangan dan pengkajian penyediaan infrastuktur pangan;
                                    <br>
                                    g. menyiapkan bahan koordinasi, analisis, bahan pendampingan dan penyusunan rencana
                                    kegiatan dibidang cadangan pangan dan penanganan
                                    kerawanan pangan;
                                    <br>
                                    h. menyiapkan bahan pemantauan, evaluasi dan pelaporan kegiatan dibidang
                                    cadangan pangan dan penanganan kerawanman pangan;
                                    <br>
                                    i. menyiapkanbahan dan melaksanakan bahan intervinsi penanganan daerah
                                    rawan pangan;
                                    <br>
                                    j. menyusun data analisis sistem kewaspadaan pangan dan gizi;
                                    <br>
                                    k. mengunpulkan dan mengolah data dan informasi kerentanan dan ketahanan
                                    pangan Daerah;
                                    <br>
                                    l. menyiapkan penyediaan dan pengelolaan cadangan pangan Pemerintah
                                    Daerah (pangan pokok dan pangan pokok lokal); dan
                                    <br>
                                    m. melaksanakan tugas lain yang diberikan oleh Kepala Bidang Ketersediaan dan
                                    Distribusi Pangan sesuai bidang tugas;
                                </li>
                            </ol>
                            <br>
                            <ol>
                                <li>
                                    2) Seksi Distribusi Pangan
                                    <br>
                                    Seksi Distribusi Pangan mempunyai tugas melaksanakan penyiapan bahan koordinasi dan
                                    melaksanakan analisis, pendampingan, penyusunan rencana, pemantauan, evaluasi
                                    distribusi pangan. Dengan rincian sebagai berikut :
                                    <br>
                                </li>
                            </ol>
                            <br>
                            <ol>
                                <li>
                                    a. menyusun rencana kegiatan Seksi Distribusi Pangan;
                                    <br>
                                    b. menyiapkan bahan koordinasi kegiatan pendampingan dan penyusunan
                                    rencana kegiatan dibidang distribusi dan harga pangan;
                                    <br>
                                    c. menyiapankan bahan pemantauan, evaluasi dan pelaporan kegiatan dibidang
                                    distribusi harga pangan;
                                    <br>
                                    d. mengumpulkan dan mengolah data dan informasi rantai pasok dan jaringan
                                    distribusi pangan;
                                    <br>
                                    e. melaksanakan pengembangan kelembagaan distribusi pangan untuk
                                    meningkatkan akses masyarakat terhadap pangan;
                                    <br>
                                    f. melaksanakan penyusunan prognosa neraca pangan;
                                    <br>
                                    g. mengumpulkan dan mengolah data harga pangan di tingkat produsen dan
                                    kunsumen untuk panel harga;
                                    <br>
                                    h. menyiapkan bahan penyusunan petunjuk teknis/operasional pembinaan
                                    lembaga tunda jual, lumbung pangan dan Lembaga Usaha Ekonomi Pedesaan
                                    (LUEP) sesuai prosedur yang berlaku;
                                    <br>
                                    i. mengelola dana cadangan pangan daerah dalam rangka persediaan dan
                                    pengendalian harga pangan; dan
                                    <br>
                                    j. melaksanakan tugas lain yang diberikan oleh Kepala Bidang Ketersediaan dan
                                    Distribusi Pangan sesuai bidang tugas.
                                </li>
                            </ol>
                            <br>
                            <ol>
                                <li><b>3. Bidang Konsumsi dan Keamanan Pangan</b></li>
                            </ol>
                            Bidang Konsumsi dan Keamanan Pangan mempunyai tugas melaksanakan kebijakan, pembinaan,
                            pemantauan dan evaulasi sistem konsumsi, keamanan pangan, penganekaragaman konsumsi pangan
                            dan pengembangan pangan lokal terhadap konsumsi serta keamanan pangan. Bidang Konsumsi dan
                            Keamanan Pangan mempunyai fungsi sebagai berikut :
                            <br>
                            <ol>
                                <li>
                                    <br>
                                    a. perumusan kebijakan teknis sistem konsumsi, keamanan pangan, penganekaragaman
                                    konsumsi pangan dan pengembangan pangan lokal terhadap konsumsi serta keamanan
                                    pangan;
                                    <br>
                                    b. penyusunan program sistem konsumsi, keamanan pangan, penganekaragaman konsumsi
                                    pangan dan pengembangan pangan lokal terhadap konsumsi serta keamanan pangan;
                                    <br>
                                    c. pelaksanaan sistem konsumsi, keamanan pangan, penganekaragaman konsumsi pangan
                                    dan pengembangan pangan lokal terhadap konsumsi serta keamanan pangan;
                                    <br>
                                    d. pelaksanaan koordinasi sistem konsumsi, keamanan pangan, penganekaragaman
                                    konsumsi pangan dan pengembangan pangan lokal terhadap konsumsi serta keamanan
                                    pangan;
                                    <br>
                                    e. pembinaan, pengawasan dan pengendalian sistem konsumsi, keamanan pangan,
                                    penganekaragaman konsumsi pangan dan pengembangan pangan lokal terhadap konsumsi
                                    serta keamanan pangan;
                                    <br>
                                    f. evaluasi dan pelaporan program sistem konsumsi, keamanan pangan, pengembangan
                                    pangan lokal dan evaulasi terhadap konsumsi dan keamanan pangan; dan
                                    <br>
                                    g. pelaksanaantugaslainyangdiberikanolehKepalaDinassesuaidenganbidang tugas dan
                                    fungsinya.
                                </li>
                            </ol>
                            <br>
                            <ol>
                                <li>
                                    Bidang Konsumsi dan Keamanan Pangan terdiri dari : 1) Seksi Konsumsi dan
                                    Penganekaragaman Pangan
                                    <br>
                                    Seksi Konsumsi dan Penganekaragaman Pangan mempunyai tugas menyiapkan bahan
                                    koordinasi, pengkajian, dan penyusunan kebijakan, pemantapan, pendampingan,
                                    pemantauan, dan pengolahan data statistik konsumsi pangan, keanekaragaman pangan,
                                    pola pangan harapan, dan neraca bahan makanan serta evaluasi konsumsi dan
                                    penganekaragaman pangan. Dengan rincian sebagai berikut :
                                    <br>
                                    a. menyusun rencana kegiatan Seksi Distribusi Pangan;
                                    <br>
                                    b. menyiapkan bahan koordinasi penyusunan rencana dan bahan pendampingan
                                    di bidang konsumsi pangan;
                                    <br>
                                    c. menyiapkan bahan pemantauan evaluasi dan pelaporan kegiatan di bidang
                                    konsumsi pangan;
                                    <br>
                                    d. melaksanaakan perhitungan tingkat konsumsi energi dan protein masyarakat
                                    per kapita per tahun;
                                    <br>
                                    e. melaksanaakan perhitungan pola pangan harapan (PPH) tingkat konsumsi;
                                    <br>
                                    f. menyiapkan bahan dan melaksanakan penyusunan peta pola komsumsi
                                    pangan;
                                    <br>
                                    g. menyiapkan bahan koordinasi dan analisis penyusunan rencana dan bahan
                                    pendampingan di bidang konsumsi pangan, promosi penganekaragaman
                                    pangan, dan pengembangan pangan lokal;
                                    <br>
                                    h. menyiapkan bahan pemantauan evaluasi dan pelaporan kegiatan di bidang
                                    konsumsi pangan, promosi penganekaragaman konsumsi pangan, dan
                                    pengembangan pangan lokal;
                                    <br>
                                    i. melaksanakan promosi konsumsi pangan yang beragam, Bergizi Seimbang dan
                                    Aman (B2SA) berbasis sumber daya lokal;
                                    <br>
                                    j. melaksanakan gerakan konsumsi pangan non beras dan non terigu;
                                    <br>
                                    k. melaksanakan koordinasi antar lembaga pemerintah, swasta dan masyarakat
                                    dalam percepatan penganekaragaman konsumsi pangan berbasis sumberdaya
                                    lokal;
                                    <br>
                                    l. melaksanakan kegiatan pemanfaatan lahan pekarangan untuk ketahanan
                                    pangan lokal;
                                    <br>
                                    m. mengembangkan pangan pokok lokal; dan
                                    <br>
                                    n. melaksanakan tugas lain yang diberikan oleh Kepala Bidang Konsumsi dan
                                    Keamanan Pangan sesuai dengan bidang tugas dan fungsinya.
                                    <br>
                                    2) Seksi Keamanan Pangan
                                    Seksi Keamanan Pangan mempunyai tugas melaksanakan penyiapan bahan koordinasi,
                                    analisis, penyusunan rencana dan pelaksanaan kegiatan, pendampingan, pemantauan,
                                    evaluasi, pelaporan, sertifikasi, Jejaring Keamanan Pangan Daerah (JKPD),
                                    komunikasi, informasi dan edukasi keamanan pangan. Dengan rincian sebagai berikut :
                                    <br>
                                    a. menyusun rencana kegiatan Seksi Keamanan Pangan;
                                    <br>
                                    b. menyiapkan bahan koordinasi dan analisis penyusunan rencana dan bahan
                                    pendampingan di bidang konsumsi pangan, promosi penganekaragaman pangan, dan
                                    pengembangan pangan lokal kelembagaan keamanan pangan, pengawasan keamanan pangan,
                                    dan kerjasama dan informasi keamanan pangan;
                                    <br>
                                    c. menyiapkan bahan pemantauan evaluasi dan pelaporan kegiatan dibidang kelembagaan
                                    keamanan pangan, pengawasan pangan segar yang beredar, keamanan pangan, dan
                                    kerjasama dan informasi keamanan pangan;
                                    <br>
                                    d. menyiapkan bahan sertifikasi jaminan keamanan pangan segar;
                                    <br>
                                    e. melaksanakan dan mengembangkan Jejaring Keamanan Pangan Daerah
                                    (JKPD);
                                    <br>
                                    f. menyiapkan bahan dan melaksanakan komunikasi, informasi dan edukasi keamanan
                                    pangan;
                                    <br>
                                    g. melaksanakan tugas lain yang diberikan oleh Kepala Bidang Konsumsi dan Keamanan
                                    Pangan sesuai dengan bidang tugas dan fungsinya.

                                </li>
                            </ol>
                            <br>
                            <ol>
                                <li>
                                    <b>4. Unit Pelaksana Teknis Dinas</b>
                                </li>
                                <li>
                                    Pada Dinas Ketahanan Pangan dapat dibentuk Unit Pelaksana Teknis Dinas
                                </li>
                            </ol>
                            <br>
                            <ol>
                                <li>
                                    <b>5. Kelompok Jabatan Fungsional</b>
                                </li>
                                <li>
                                    Kelompok jabatan fungsional mempunyai tugas melaksanakan sebagian tugas dan fungsi
                                    Dinas Ketahanan Pangan sesuai dengan keahlian dan kebutuhan.
                                </li>
                            </ol>
                            </p>

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
