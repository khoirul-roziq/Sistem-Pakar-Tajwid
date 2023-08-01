@extends('layouts.guest')

@section('title')
    Materi Tajwid
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
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><b>MATERI TAJWID</b></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active white-text"><b>Materi</b></li>
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

                    <h1 class="mb-4"><b>Kategori Hukum Tajwid</b></h1>

                    @foreach ($kategori as $kategoriItem)
                        <ul class="collapsible">
                            <li>
                                <div class="collapsible-header"><b>{{ $kategoriItem->nama_kategori }}</b></div>
                                <div class="collapsible-body">
                                    <ul class="collapsible popout">
                                        @foreach ($tajwid as $tajwidItem)
                                            @if ($tajwidItem->kategori_id == $kategoriItem->id)
                                                <li>
                                                    <div class="collapsible-header">{{ $tajwidItem->nama_tajwid }}</div>
                                                    <div class="collapsible-body">{!! $tajwidItem->penjelasan !!}</span>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    @endforeach

                </div>
            </div>

        </div>
    </div>

    <!-- END: Page Main-->
@endsection

@section('scripts')
@endsection
