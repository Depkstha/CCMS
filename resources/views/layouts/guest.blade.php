{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <!-- PAGE TITLE HERE -->
    <title>CCMS - Consultancy Admin Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Bibhuti Solutions">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ setting('website_url') }}">
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
    <link rel="shortcut icon" type="image/png" href="{{ setting('favicone') }}">
    <link href="{{ asset('assets/vendor/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
</head>

<body>
    <div class="authincation d-flex flex-column flex-lg-row flex-column-fluid">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/ic-sidenav-init.js') }}"></script>
    <script src="{{ asset('assets/js/demo.js') }}"></script>
    <script src="{{ asset('assets/js/styleSwitcher.js') }}"></script>
</body>

</html> --}}

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>{{ setting('title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Consultancy CMS Admin Dashboard" name="description" />
    <meta content="Bibhuti Solutions" name="author" />
    <link rel="canonical" href="{{ setting('website_url') }}">
    <link rel="shortcut icon" href="{{ asset(setting('favicon')) }}">

    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>

    @yield('content')

    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/libs/particles.js/particles.js') }}"></script>
    <script src="{{ asset('assets/js/pages/particles.app.js') }}"></script>
    <script src="{{ asset('assets/js/pages/password-addon.init.js') }}"></script>
</body>

</html>
