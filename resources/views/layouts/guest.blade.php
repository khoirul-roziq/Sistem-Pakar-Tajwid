<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="Khoirul Roziq">
    <title>@yield('title') &mdash; Sistem Pakar Tajwid</title>
    <link rel="apple-touch-icon" href="{{ asset('images/favicon/apple-touch-icon-152x152.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo/logo-kmnu(210x140).jpg') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/materialize-material-design-admin-template/app-assets/vendors/vendors.min.css">
    <link rel="stylesheet" href="https://alquran.cloud/public/css/font-kitab.css?v=1">
    <!-- END: VENDOR CSS-->

    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/materialize-material-design-admin-template/app-assets/css/themes/vertical-modern-menu-template/materialize.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/materialize-material-design-admin-template/app-assets/css/themes/vertical-modern-menu-template/style.min.css">
    <!-- END: Page Level CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/materialize-material-design-admin-template/app-assets/css/custom/custom.css">
    <link rel="stylesheet" href="{{ asset('assets/styles/css/guest.css') }}">
    <!-- END: Custom CSS-->

    @yield('styles')

</head>

<body
    class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 2-columns"
    data-open="click" data-menu="vertical-modern-menu" data-col="2-columns" onload="autoClick();">
    <div id="app">
        <header class="page-topbar" id="header">
            @include('partials.header')
        </header>

        <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
            @include('partials.sidebar')
        </aside>

        <div id="main">
            @yield('content')
        </div>

    </div>

    <!-- BEGIN VENDOR JS-->
    <script src="https://pixinvent.com/materialize-material-design-admin-template/app-assets/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->

    <!-- BEGIN THEME  JS-->
    <script src="https://pixinvent.com/materialize-material-design-admin-template/app-assets/js/plugins.min.js"></script>
    <script src="https://pixinvent.com/materialize-material-design-admin-template/app-assets/js/scripts/customizer.min.js">
    </script>
    <!-- END THEME  JS-->

    <!-- BEGIN PAGE LEVEL JS-->
    @yield('scripts')
    <!-- END PAGE LEVEL JS-->
</body>

</html>
