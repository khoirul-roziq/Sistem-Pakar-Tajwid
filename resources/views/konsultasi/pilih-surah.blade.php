@extends('layouts.guest')

@section('title')
    Konsultasi
@endsection

@section('styles')
    <link rel="stylesheet"
        href="https://pixinvent.com/materialize-material-design-admin-template/app-assets/vendors/select2/select2-materialize.css"
        type="text/css">
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
                        <h1 class="breadcrumbs-title mt-0 mb-0 font-kitab">
                            {{ html_entity_decode(json_decode('"\ufd3e \u0642\u064e\u0627\u0646\u06e1\u0633\u064f\u0644\u06e1\u062a\u064e\u0627\u0633\u0650\u064a\u06e1 \u062a\u064e\u0627\u062c\u06e1\u0648\u0650\u064a\u06e1\u062f \ufd3f"'), ENT_QUOTES, 'UTF-8') }}
                        </h1>
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
                        <h1>Pilih ayat!</h1>
                    </div>
                    <form action="{{ route('get.ayah') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col s12">
                                <div class="input-field col m6 s12">
                                    <select class="select2 browser-default" name="surah">
                                        <option value="" disabled selected>--- Pilih Surat ---</option>
                                        @foreach ($surahs as $surah)
                                            <option value="{{ $surah['number'] }}">
                                                {{ $surah['number'] . '. ' . $surah['englishName'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="btn-small">Lanjut</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- END: Page Main-->
@endsection

@section('scripts')
    <script
        src="https://pixinvent.com/materialize-material-design-admin-template/app-assets/vendors/select2/select2.full.min.js">
    </script>

    {{-- Select --}}
    <script>
        $(".select2").select2({
            dropdownAutoWidth: true,
            width: '100%',
        });
    </script>
@endsection
