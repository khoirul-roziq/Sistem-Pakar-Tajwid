@extends('layouts.admin')

@section('title')
    Detail Tanda Tajwid
@endsection

@section('styles')
@endsection

@section('content')
    <div class="row">
        <div class="content-wrapper-before teal"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><b>TANDA TAJWID</b></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('tanda-tajwid.index') }}">Tanda Tajwid</a></li>
                            <li class="breadcrumb-item active white-text"><b>Detail Tanda Tajwid</b></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">

            </div>
        </div>
        <div class="col s12">
            <div class="container mt-3">
                <!-- users list start -->

                <div class="card">
                    <div class="card-content">
                        <h5 class="caption"><b>"{{$data->nama_tanda }}"</b><small class="deep-orange-text">{{ ' ('.$data->kode.')' }}</small></h5>
                    </div>
                </div>
                <div class="card">
                    <div class="row">
                        <div class="card-content">
                            <section class="keterangan">
                                {!! $data->keterangan !!}
                            </section>
                        </div>
                    </div>
                </div>

                <!-- users list ends -->


            </div>
            <div class="content-overlay"></div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
