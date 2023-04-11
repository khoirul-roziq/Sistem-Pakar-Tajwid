<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/materialize-src/css/vendors.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- END: VENDOR CSS-->

    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/materialize-src/css/materialize.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/materialize-src/css/style.min.css') }}">
    <!-- END: Page Level CSS-->
    
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/materialize-src/css/custom.css') }}">
    
    <!-- END: Custom CSS-->

    @yield('styles')

    <title>@yield('title') &mdash; Sistem Pakar Tajwid</title>

</head>

@yield('custom-body')

    <div id="app">
        @yield('app')
    </div>
    
    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('assets/vendor/materialize-src/js/vendors.min.js') }}"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="{{ asset('assets/vendor/materialize-src/js/plugins.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/materialize-src/js/search.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/materialize-src/js/custom-script.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/materialize-src/js/customizer.min.js') }}"></script>
    <!-- END THEME  JS-->

    <!-- BEGIN PAGE LEVEL JS-->
    @yield('scripts') 
    <!-- END PAGE LEVEL JS-->
</body>
</html>