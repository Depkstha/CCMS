<!DOCTYPE html>
<html lang="en">

<head>
    <!-- PAGE TITLE HERE -->
    <title>CCMS - Consultancy Admin Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Bibhuti Solutions">
    <link rel="canonical" href="">
    <meta name="keywords"
        content="WorldNIC admin dashboard, Bootstrap admin template, HTML admin panel, admin dashboard design, Bootstrap admin HTML, management dashboard, data visualization template, WorldNIC Bootstrap, admin panel features, web admin template, Bootstrap admin dashboard">
    <meta name="description"
        content="WorldNIC is a versatile admin dashboard Bootstrap HTML template. It offers a clean design and robust features for effective management and
			data visualization.">
    <!-- OG:META TAGS -->
    <meta property="og:title" content="CCMS - Bibhuti Consultancy Admin Dashboard">
    <meta property="og:description"
        content="WorldNIC is a versatile admin dashboard Bootstrap HTML template. It offers a clean design and robust features for effective management and data visualization.">
    <meta property="og:image" content="social-image.html">
    <meta name="format-detection" content="telephone=no">
    <!-- TWITTER:META TAGS -->
    <meta name="twitter:title" content="CCMS - Bibhuti Consultancy Admin Dashboard">
    <meta name="twitter:description"
        content="WorldNIC is a versatile admin dashboard Bootstrap HTML template. It offers a clean design and robust features for effective management and data visualization">
    <meta name="twitter:image" content="social-image.html">
    <meta name="twitter:card" content="summary_large_image">

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" href="images/favicon.png">
    <link href="{{ asset('vendor/swiper/css/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
    <!-- STYLE CSS -->
    <link class="main-css" href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <x-home.preloader />
    <div id="main-wrapper" class="show">

        <x-home.application-logo />
        <x-home.navbar />
        <x-home.sidebar />

        <div class="content-body">
            <div class="container-fluid">

                @yield('content')

            </div>

            <x-home.footer />

        </div>

        <!-- Required vendors -->
        <script src="{{ asset('vendor/global/global.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
        <!-- Apex Chart -->
        <script src="{{ asset('vendor/apexchart/apexchart.js') }}"></script>
        <script src="{{ asset('vendor/chart-js/chart.bundle.min.js') }}"></script>
        <!-- Chart piety plugin files -->
        <script src="{{ asset('vendor/peity/jquery.peity.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('vendor/jqvmap/js/jquery.vmap.world.js') }}"></script>
        <script src="{{ asset('vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script>
        <!-- Dashboard 1 -->
        <script src="{{ asset('js/dashboard/dashboard-1.js') }}"></script>
        <script src="{{ asset('vendor/swiper/js/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        <script src="{{ asset('js/ic-sidenav-init.js') }}"></script>
        <script src="{{ asset('js/demo.js') }}"></script>
        <script src="{{ asset('js/styleSwitcher.js') }}"></script>

        @stack('js')
        <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 1.5,
                spaceBetween: 15,
                navigation: {
                    nextEl: "",
                    prevEl: "",
                },
                breakpoints: {
                    360: {
                        slidesPerView: 1.5,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 2.5,
                        spaceBetween: 40,
                    },
                    1200: {
                        slidesPerView: 1.5,
                        spaceBetween: 20,
                    },
                },
            });
            var swiper = new Swiper(".mySwiper1", {
                slidesPerView: 4,
                spaceBetween: 15,
                navigation: {
                    nextEl: "",
                    prevEl: "",
                },
                breakpoints: {
                    360: {
                        slidesPerView: 1.5,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 2.5,
                        spaceBetween: 20,
                    },
                },
            });
        </script>
</body>

</html>
