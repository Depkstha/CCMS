<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>Consultancy CCMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- Layout config Js -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />

    @stack('css')

    <style>
        :root {
            --vz-primary: {{ setting('color') }};
            --primary-theme-color: {{ setting('color') }};
            --vz-vertical-menu-item-hover-color: {{ setting('color') }};
            --vz-vertical-menu-item-active-color: {{ setting('color') }};
            --vz-vertical-menu-sub-item-hover-color: {{ setting('color') }};
            --vz-vertical-menu-sub-item-active-color: {{ setting('color') }};
        }
    </style>

</head>

<body>

    <div id="layout-wrapper">
        <x-dashboard.navbar />
        <x-dashboard.remove-notification-modal />
        <x-dashboard.sidebar />

        <div class="vertical-overlay"></div>
        <div class="main-content">
            <div class="page-content">

                @yield('content')

            </div>
            <x-dashboard.footer />
        </div>
    </div>

    <x-dashboard.preloader />

    <!-- JAVASCRIPT -->
    <script>
        const app_url = "{{ config('app.url') }}";
    </script>
    <script src="{{ asset('assets/libs/jquery/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>

    @stack('js')

    <!-- Ckeditor js -->
    <script src="{{ asset('assets/libs/ckeditor4/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/libs/ckeditor4/adapters/jquery.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>
