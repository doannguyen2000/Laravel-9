<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('mau/assets/') }}" data-template="vertical-menu-template-free">

<head>
    <title>DEMO LARAVEL| @yield('title')</title>
    @include('layouts.head')
</head>

<body>
    <!-- Layout wrapper -->
    
    @yield('content')
    <!-- / Layout wrapper -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    @include('layouts.src')
    @yield('js')
</body>
</html>
