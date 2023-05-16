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
                        <h1>Hasil Konsultasi</h1>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            
                            <table>
                                <tbody>
                                    <tr>
                                        <th>Nama Tajwid</th>
                                        <td>: <span class="badge teal lighten-1">Idzhar Halqi</span></td>
                                    </tr>
                                    <tr>
                                        <th>Kategori</th>
                                        <td>: Nun Mati/ Tanwin</td>
                                    </tr>
                                    <tr>
                                        <th>Sebab Tajwid</th>
                                        <td>: Nun mati bertemu dengan ngain</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 mt-3">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis architecto id cum omnis illo numquam itaque aperiam nostrum labore sapiente! Earum nemo placeat non ab reprehenderit, dolorum ullam deserunt voluptatum?</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 mt-3">
                            <span>Contoh :</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 mt-2">
                            <span class="font-kitab" style="font-size: 35px; color:salmon;">{{ html_entity_decode(json_decode('"\u0633\u064f\u0648\u0631\u064e\u0629\u064f \u0627\u0644\u0628\u064e\u0642\u064e\u0631\u064e\u0629\u0650"'), ENT_QUOTES, 'UTF-8') }}</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- END: Page Main-->
@endsection

@section('scripts')
@endsection
