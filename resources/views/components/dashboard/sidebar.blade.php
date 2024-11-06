<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('dashboard')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset(setting('favicon')) }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img class="dark-login" src="{{ asset(setting('logo')) }}" alt="">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('dashboard')}}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset(setting('favicon')) }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img class="light-login" src="{{ asset(setting('logo_white')) }}" alt="">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                {!! Module::sidebarMenu() !!}
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>