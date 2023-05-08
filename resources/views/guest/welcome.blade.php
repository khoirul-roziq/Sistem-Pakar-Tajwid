@extends('layouts.guest')

@section('title')
    Welcome
@endsection

@section('styles')
<link rel="stylesheet" href="https://alquran.cloud/public/css/font-kitab.css?v=1">
@endsection

@section('content')
    <!-- BEGIN: Page Main-->

    <div class="row">
        <div class="content-wrapper-before teal"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container" id="salam">
                <div class="row center-align">
                    <div class="col s12 m12 l12">
                        <h1 class="breadcrumbs-title mt-0 mb-0 font-kitab">ٱلسَّلَامُ عَلَيْكُمْ وَرَحْمَةُ ٱللَّٰهِ وَبَرَكَاتُهُ</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col s12">
        <div class="container mt-3">
            <div class="card">
                <div class="card-content">
                    <h1>Selamat Datang, {{ Auth::user()->name }}!</h1>
                    <a class="btn-small" href="{{ route('konsultasi.mulai') }}">Konsultasi</a>
                </div>
            </div>

        </div>
    </div>

    <!-- END: Page Main-->
@endsection

@section('scripts')
<!-- BEGIN PAGE VENDOR JS-->
{{-- <script src="https://pixinvent.com/materialize-material-design-admin-template/laravel/demo-1/vendors/chartjs/chart.min.js"></script> --}}
{{-- <script src="https://pixinvent.com/materialize-material-design-admin-template/laravel/demo-1/vendors/chartist-js/chartist.min.js"></script> --}}
{{-- <script src="https://pixinvent.com/materialize-material-design-admin-template/laravel/demo-1/vendors/chartist-js/chartist-plugin-tooltip.js"></script> --}}
{{-- <script src="https://pixinvent.com/materialize-material-design-admin-template/laravel/demo-1/vendors/chartist-js/chartist-plugin-fill-donut.min.js"></script> --}}
<!-- END PAGE VENDOR JS-->

<!-- BEGIN PAGE LEVEL JS-->
{{-- <script src="https://pixinvent.com/materialize-material-design-admin-template/laravel/demo-1/js/scripts/dashboard-modern.js"></script> --}}
{{-- <script src="https://pixinvent.com/materialize-material-design-admin-template/laravel/demo-1/js/scripts/intro.js"></script> --}}
<!-- END PAGE LEVEL JS-->
@endsection
