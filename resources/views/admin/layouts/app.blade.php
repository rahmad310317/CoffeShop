<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ auth()->user()->role == 1 ? 'Admin' : 'Kasir' }} | {{ $title }}</title>
    <link rel="icon" href="{{ asset('images/logo-icon.png') }}">
    <!-- Custom CSS -->
    <link href="{{ asset('extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('extra-libs/jvector/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ asset('/css/style.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        @include('admin.layouts.topbar')
        @include('admin.layouts.aside')
        @include('admin.layouts.main')
    </div>



    <script src="/js/app.js"></script>
    <script src="/js/notif.js"></script>
    <script src="{{ asset('libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="{{ asset('js/app-style-switcher.js')}}"></script>
    <script src="{{ asset('js/feather.min.js')}}"></script>
    <script src="{{ asset('libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{ asset('js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('js/custom.min.js')}}"></script>
    <!--This page JavaScript -->
    <script src="{{ asset('extra-libs/c3/d3.min.js')}}"></script>
    <script src="{{ asset('extra-libs/c3/c3.min.js')}}"></script>
    <script src="{{ asset('libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('extra-libs/jvector/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('extra-libs/jvector/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('js/pages/dashboards/dashboard1.min.js')}}"></script>
</body>

</html>
