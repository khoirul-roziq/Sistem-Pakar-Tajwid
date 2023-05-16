@extends('layouts.guest')

@section('title')
    Konsultasi
@endsection

@section('styles')

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
                        <h5 class="breadcrumbs-title mt-0 mb-0"><b>Ghunnah</b></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="">Konsultasi</a></li>
                            <li class="breadcrumb-item active white-text"><b>Ghunnah</b></li>
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
                        <h1>Hukum bacaan ghunnah dibedakan menjadi dua yaitu <span class="font-kitab">{{ html_entity_decode(json_decode('"\u0646"'), ENT_QUOTES, 'UTF-8') }}</span> (nun) dan <span class="font-kitab">{{ html_entity_decode(json_decode('"\u0645"'), ENT_QUOTES, 'UTF-8') }}</span> (mim). Pilih salah satu dari dua huruf tersebut!</h1>
                    </div>
                    <div class="opsi row">
                        <form action="{{ route('ghunnah', 2) }}" method="post" class="col">
                            @csrf
                            <input type="text" value="\u0646" name="unicode" hidden>
                            <button type="submit" class="btn"><span class="font-kitab">{{ html_entity_decode(json_decode('"\u0646"'), ENT_QUOTES, 'UTF-8') }}</span></button>
                        </form>
                        <form action="{{ route('ghunnah', 2) }}" method="post" class="col">
                            @csrf
                            <input type="text" value="\u0645" name="unicode" hidden>
                            <button type="submit" class="btn"><span class="font-kitab">{{ html_entity_decode(json_decode('"\u0645"'), ENT_QUOTES, 'UTF-8') }}</span></button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- END: Page Main-->
@endsection

@section('scripts')
@endsection
