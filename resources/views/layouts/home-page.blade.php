<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- BEGIN: VENDOR CSS-->

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/materialize-src/css/vendors.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
            href="{{ asset('assets/vendor/materialize-src/css/materialize.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/materialize-src/css/style.min.css') }}">

    <!-- END: VENDOR CSS-->


    <!-- BEGIN: Custom CSS-->
        @yield('styles')
    <!-- END: Custom CSS-->


    <title>Beranda &mdash; Sistem Pakar Tajwid</title>

</head>

<body>

    <header>
            @include('partials.home.header')
    </header>

    <main>
            @include('partials.home.main')
    </main>

    <footer class="page-footer teal center">
            @include('partials.home.footer')
            @include('partials.home.sosmed')
            @include('partials.home.scripts')
    </footer>


    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('assets/vendor/materialize-src/js/vendors.min.js') }}"></script>
    <!-- BEGIN PAGE VENDOR JS-->

    <!-- BEGIN PAGE LEVEL JS-->
        @yield('scripts')
    <!-- END PAGE LEVEL JS-->
</body>

</html>
