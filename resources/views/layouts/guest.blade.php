<!DOCTYPE html>
<html lang="en">

<head>
    <!-- PAGE TITLE HERE -->
    <title>CCMS - Consultancy Admin Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Bibhuti Solutions">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://worldnic.dexignlab.com/xhtml">
    <meta name="keywords"
        content="WorldNIC admin dashboard, Bootstrap admin template, HTML admin panel, admin dashboard design, Bootstrap admin HTML, management dashboard, data visualization template, WorldNIC Bootstrap, admin panel features, web admin template, Bootstrap admin dashboard">
    <meta name="description"
        content="WorldNIC is a versatile admin dashboard Bootstrap HTML template. It offers a clean design and robust features for effective management and
				data visualization.">
    <!-- OG:META TAGS -->
    <meta property="og:title" content="WorldNIC - Admin Dashboard Bootstrap HTML Template">
    <meta property="og:description"
        content="WorldNIC is a versatile admin dashboard Bootstrap HTML template. It offers a clean design and robust features for effective management and data visualization.">
    <meta property="og:image" content="social-image.html">
    <meta name="format-detection" content="telephone=no">
    <!-- TWITTER:META TAGS -->
    <meta name="twitter:title" content="WorldNIC - Admin Dashboard Bootstrap HTML Template">
    <meta name="twitter:description"
        content="WorldNIC is a versatile admin dashboard Bootstrap HTML template. It offers a clean design and robust features for effective management and data visualization">
    <meta name="twitter:image" content="social-image.html">
    <meta name="twitter:card" content="summary_large_image">

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="{{ asset('assets/vendor/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
</head>

<body>
    <div class="authincation d-flex flex-column flex-lg-row flex-column-fluid">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/ic-sidenav-init.js') }}"></script>
    <script src="{{ asset('assets/js/demo.js') }}"></script>
    <script src="{{ asset('assets/js/styleSwitcher.js') }}"></script>
</body>

</html>
