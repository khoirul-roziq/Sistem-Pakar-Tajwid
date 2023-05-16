@extends('layouts.guest')

@section('title')
    Konsultasi
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
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><b>Kategori Tajwid</b></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="">Konsultasi</a></li>
                            <li class="breadcrumb-item active white-text"><b>Kategori</b></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col s12">
        <div class="container mt-3">
            <div class="card">
                <div class="card-content">
                    <div class="judul">
                        <h1>Pilih salah satu kategori tajwid!</h1>
                    </div>
                    <div class="opsi">
                        <a href="" class="btn">Nun Mati/ Tanwin</a>
                        <a href="" class="btn">Mim Mati</a>
                        <a href="{{ route('ghunnah.view', 1) }}" class="btn">Ghunnah</a>
                        <a href="" class="btn">Lam Ta'rif</a>
                        <a href="" class="btn">Ro</a>
                        <a href="" class="btn">Lam</a>
                        <a href="" class="btn">Qolqolah</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- END: Page Main-->
@endsection

@section('scripts')
@endsection
