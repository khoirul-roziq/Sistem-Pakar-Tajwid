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
                        <h1>{!! $pertanyaan->soal !!}</h1>
                    </div>
                    <div class="opsi row">
                        <div class="col s12">
                            @if ($kode == 'K000')
                                @foreach ($pertanyaan->kategoriJawaban as $kategori)
                                    <form action="{{ route('konsultasi') }}" method="post" class="mt-1 mb-2 col">
                                        @csrf
                                        <input type="text" value="{{ $pertanyaan->id }}" name="reference" hidden>
                                        <input type="text" value="{{ $kategori->kode }}" name="jawaban" hidden>
                                        <button type="submit" class="btn 
                                        @if(session()->has('kategori'))
                                            @if(session('kategori') == $kategori->id)
                                            pink darken-3
                                            @endif`
                                        @endif
                                        ">
                                            {{ $kategori->nama_kategori }}
                                        </button>
                                    </form>
                                @endforeach
                            @else
                                @if ($kode == 'H000')
                                    @foreach ($pertanyaan->tajwidJawaban as $tajwid)
                                        <form action="{{ route('konsultasi') }}" method="post" class="mt-1 mb-2 col">
                                            @csrf
                                            <input type="text" value="{{ $pertanyaan->id }}" name="reference" hidden>
                                            <input type="text" value="{{ $tajwid->kode }}" name="jawaban" hidden>
                                            <button type="submit" class="btn
                                            @if(session()->has('tajwid'))
                                                @if(session('tajwid') == $tajwid->id)
                                                pink darken-3
                                                @endif`
                                            @endif
                                            ">
                                                {{ $tajwid->nama_tajwid }}
                                            </button>
                                        </form>
                                    @endforeach
                                @else
                                    @foreach ($pertanyaan->tandaTajwidJawaban as $tandaTajwid)
                                        <form action="{{ route('konsultasi') }}" method="post" class="mt-1 mb-2 col">
                                            @csrf
                                            <input type="text" value="{{ $pertanyaan->id }}" name="reference" hidden>
                                            <input type="text" value="{{ $pertanyaan->last_question }}"
                                                name="lastQuestion" hidden>
                                            <input type="text" value="{{ $kode }}" name="kode" hidden>
                                            <input type="text" value="{{ $tandaTajwid->kode }}" name="jawaban" hidden>
                                            <button type="submit"
                                                class="btn-large 
                                                @if (session()->has('pertanyaan'))
                                                    @if (in_array($pertanyaan->id, session('pertanyaan')))
                                                        @if ($tandaTajwid->kode == session('jawaban')[array_search($pertanyaan->id, session('pertanyaan'))]) pink darken-3 @endif
                                                    @endif
                                                @endif
                                                ">
                                                <span class="font-kitab"
                                                    style="font-size:25px;">{{ html_entity_decode(json_decode('"' . $tandaTajwid->unicode . '"'), ENT_QUOTES, 'UTF-8') }}</span>
                                            </button>
                                        </form>
                                    @endforeach
                                @endif
                            @endif
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
