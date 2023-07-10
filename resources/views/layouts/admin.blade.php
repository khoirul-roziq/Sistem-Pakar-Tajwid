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
    <link rel="stylesheet" href="{{ asset('assets/vendor/materialize-adm/vendors/vendors.min.css') }}">
    <!-- END: VENDOR CSS-->

    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/materialize-src/css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/materialize-adm/css/themes/vertical-modern-menu-template/style.min.css') }}">
    <!-- END: Page Level CSS-->
    
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" href="{{ asset('assets/styles/css/admin.css') }}">
    <!-- END: Custom CSS-->

    @yield('styles')
    
  </head>

  <body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 2-columns" data-open="click" data-menu="vertical-modern-menu" data-col="2-columns" onload = "autoClick();">
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

      {{-- <footer class="page-footer footer footer-static footer-dark teal navbar-border navbar-shadow">
        @include('partials.footer')
      </footer> --}}
    </div>

    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('assets/vendor/materialize-adm/js/vendors.min.js') }}"></script>
    <!-- BEGIN VENDOR JS-->

    <!-- BEGIN THEME  JS-->
    <script src="{{ asset('assets/vendor/materialize-adm/js/plugins.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/materialize-adm/js/scripts/customizer.min.js') }}"></script>
    <!-- END THEME  JS-->
    
    <!-- BEGIN PAGE LEVEL JS-->
    @yield('scripts') 
    <!-- END PAGE LEVEL JS-->
    
  </body>
</html>