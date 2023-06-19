@extends('layouts.konsultasi')

@section('title')
    Konsultasi
@endsection

@section('styles')
    <style>
        tajwid {
            color: red;

        }

        tajwid:hover {
            background-color: rgb(255, 160, 160);
        }

        tajwidSec {
            color: orange;

        }

        tajwidSec:hover {
            background-color: rgb(255, 219, 160);
        }

        .contoh {
            font-size: 32px;
            line-height: 80px;
            text-align: right;
            padding: 20px;
            border-radius: 5px;
            color: #666666;
        }
    </style>
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
                    @if($roleEmpty)
                        <div class="row">
                            <div class="col s12">
                                <h5 class="mb-3 red-text">Role Base tidak ditemukan!</h5>
                            </div>
                        </div>
                    @else
                    <div class="row">
                        <div class="col s12">

                            <table>
                                <tbody>
                                    <tr>
                                        <th>Nama Tajwid</th>
                                        <td>: <span class="badge teal lighten-1">{{ $trueTajwid->nama_tajwid }}</span></td>
                                    </tr>
                                    <tr>
                                        <th>Kategori</th>
                                        <td>: {{ $trueTajwid->kategori->nama_kategori }}</td>
                                    </tr>
                                    <tr>
                                        <th>Sebab Tajwid</th>
                                        <td>: {{ strip_tags($trueRoleBase->keterangan) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 mt-3">
                            <p><b>Penjelasan :</b></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12" style="margin-top: -15px; margin-left: -3px;">
                            {!! $trueTajwid->penjelasan !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 mt-3">
                            <span>Contoh :</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <h1 class="font-kitab contoh" style="font-size: 35px;">{!! str_replace(
                                ['\\n'],
                                '',
                                html_entity_decode(preg_replace('/\\\\u([0-9A-F]{4})/i', "&#x$1;", $ayahUnicode), ENT_QUOTES, 'UTF-8'),
                            ) !!}</h1>
                        </div>
                    </div>
                    @endif

                    <div class="row center">
                        <div class="col">
                            <form action="{{ route('konsultasi.reset') }}" method="post">
                                @csrf
                                <button class="btn-large"><b>Konsultasi Lagi</b></button>
                            </form>
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
