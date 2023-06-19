@extends('layouts.guest')

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
                    <h2>Kamu berhasil masuk sebagai tamu</h2>
                    <a class="btn-large mt-3" href="{{ route('konsultasi.mulai') }}">Mulai Konsultasi</a>
                </div>
            </div>

        </div>
    </div>

    <!-- END: Page Main-->
@endsection

@section('scripts')

@endsection
