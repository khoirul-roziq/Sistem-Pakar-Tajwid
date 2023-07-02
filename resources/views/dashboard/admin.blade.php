@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('styles')
    <link rel="stylesheet" href="https://alquran.cloud/public/css/font-kitab.css?v=1">
    <link rel="stylesheet" href="{{ asset('assets/styles/css/dashboard.css') }}">
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
                        <h1 class="breadcrumbs-title mt-0 mb-0 font-kitab" id="salam">ٱلسَّلَامُ عَلَيْكُمْ وَرَحْمَةُ ٱللَّٰهِ وَبَرَكَاتُهُ</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <div class="container mt-3">
                <div class="card">
                    <div class="card-content">
                        <h1>Selamat Datang, {{ Auth::user()->name }}!</h1>
                        <h2>Kamu berhasil masuk sebagai admin</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s12 menu">
            <div class="row">
                <div class="col s12 m6 l3">
                    <a href="{{ route('tajwid.index') }}">
                        <div class="card">
                            <div class="card-content">
                                <img src="{{ asset('assets/images/icons/data-tajwid.jpg') }}" alt="data-tajwid" width="80%">
                                <p>Tajwid</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col s12 m6 l3">
                    <a href="{{ route('role-base.index') }}">
                        <div class="card">
                            <div class="card-content">
                                <img src="{{ asset('assets/images/icons/role-base.jpg') }}" alt="role-base" width="80%">
                                <p>Rule Tajwid</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col s12 m6 l3">
                    <a href="{{ route('kategori.index') }}">
                        <div class="card">
                            <div class="card-content">
                                <img src="{{ asset('assets/images/icons/kategori.jpg') }}" alt="kategori" width="80%">
                                <p>Kategori</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col s12 m6 l3">
                    <a href="{{ route('tanda-tajwid.index') }}">
                        <div class="card">
                            <div class="card-content">
                                <img src="{{ asset('assets/images/icons/tanda-tajwid.jpg') }}" alt="tanda-tajwid" width="80%">
                                <p>Huruf/ Tanda</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6 l3">
                    <a href="{{ route('pertanyaan.index') }}">
                        <div class="card">
                            <div class="card-content">
                                <img src="{{ asset('assets/images/icons/pertanyaan.jpg') }}" alt="pertanyaan" width="80%">
                                <p>Pertanyaan</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col s12 m6 l3">
                    <a href="{{ route('konsultasi.mulai') }}">
                        <div class="card">
                            <div class="card-content">
                                <img src="{{ asset('assets/images/icons/konsultasi.jpg') }}" alt="konsultasi" width="80%">
                                <p>Konsultasi</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col s12 m6 l3">
                    <a href="{{ route('data-user.index') }}">
                        <div class="card">
                            <div class="card-content">
                                <img src="{{ asset('assets/images/icons/data-user.jpg') }}" alt="data-user" width="80%">
                                <p>Pengguna</p>
                            </div>
                        </div>
                    </a>
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
