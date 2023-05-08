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
            <div class="container" id="salam">
                <div class="row center-align">
                    <div class="col s12 m12 l12">
                        <h1 class="breadcrumbs-title mt-0 mb-0 font-kitab"> {{ html_entity_decode(json_decode('"\ufd3e \u0642\u064e\u0627\u0646\u06e1\u0633\u064f\u0644\u06e1\u062a\u064e\u0627\u0633\u0650\u064a\u06e1 \u062a\u064e\u0627\u062c\u06e1\u0648\u0650\u064a\u06e1\u062f \ufd3f"'), ENT_QUOTES, 'UTF-8') }}</h1>
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
