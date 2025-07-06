<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIHARAPAN - Sistem Informasi Harga Pangan')</title>
    <link href="{{ url('') }}/logo/hss.png" rel="icon">

    <!-- Memuat Font Inter dari Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Memuat CSS untuk Library Eksternal -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- PERBAIKAN: Memuat CSS dan JS yang sudah dikompilasi oleh Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Kustomisasi untuk Select2 dan animasi -->
    <style>
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

        .select2-container--default.select2-container--open .select2-selection--single {
            border-color: #4A6F3A;
        }

        .select2-dropdown {
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
        }

        .select2-search--dropdown .select2-search__field {
            border-radius: 0.375rem;
            border: 1px solid #d1d5db;
        }

        .select2-results__option--highlighted.select2-results__option--selectable {
            background-color: #4A6F3A;
            color: white;
        }

        .fade-in-up {
            animation: fadeInUp 1s ease-out forwards;
            opacity: 0;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .delay-1 {
            animation-delay: 0.2s;
        }

        .delay-2 {
            animation-delay: 0.4s;
        }

        .delay-3 {
            animation-delay: 0.6s;
        }

        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 0;
        }

        .header-content {
            position: relative;
            z-index: 1;
        }

        .modern-bg {
            background-color: #f9fafb;
            background-image: radial-gradient(circle at 1px 1px, #e5e7eb 1px, transparent 0);
            background-size: 25px 25px;
        }
    </style>

    @stack('page-styles')
</head>

<body class="bg-gray-100 font-sans">

    @include('landing.layouts.header')

    @yield('content')

    @include('landing.layouts.footer')

    <!-- Memuat library JavaScript yang dibutuhkan -->
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    @stack('page-scripts')
</body>

</html>
