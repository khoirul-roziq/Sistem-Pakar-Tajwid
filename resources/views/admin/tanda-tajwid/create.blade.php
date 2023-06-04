@extends('layouts.admin')

@section('title')
    Buat Tanda Tajwid
@endsection

@section('styles')
<link rel="stylesheet"
        href="https://pixinvent.com/materialize-material-design-admin-template/app-assets/vendors/select2/select2-materialize.css"
        type="text/css">
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
                            <li class="breadcrumb-item active white-text"><b>Tambah Tanda Tajwid</b></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="col s12">
            <div class="container mt-3">
                @if ($errors->any())
                    <div class="card">
                        <div class="card-content">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li style="color: red;">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card">
                    <div class="card-content">
                        <form action="{{ route('tanda-tajwid.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="input-field col m4 s12">
                                    <label for="namaTanda">Nama Tanda<span class="red-text">*</span></label>
                                    <input type="text" id="namaTanda" name="namaTanda"
                                        class="validate @error('namaTanda') is-invalid @enderror" required
                                        value="{{ old('namaTanda') }}">
                                    @error('namaTanda')
                                        <small class="red-text">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="input-field col m4 s12">
                                    <label for="kode">Kode<span class="red-text">*</span></label>
                                    <input type="text" id="kode" name="kode"
                                        class="validate @error('kode') is-invalid @enderror" required
                                        value="{{ $newKode }}">
                                    @error('kode')
                                        <small class="red-text">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="input-field col m4 s12">
                                    <label for="unicode">Unicode<span class="red-text">*</span></label>
                                    <input type="text" id="unicode" name="unicode"
                                        class="validate @error('unicode') is-invalid @enderror" required
                                        value="{{ old('unicode') }}">
                                    @error('unicode')
                                        <small class="red-text">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="input-field col m4 s12">
                                    <select class="select2 browser-default" name="jenis">
                                        <option value="" disabled selected>--- Pilih Jenis ---</option>
                                        <option value="huruf">Huruf</option>
                                        <option value="tanda">Tanda</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col m6 s12 mb-1 mt-3">
                                    <button class="waves-effect waves-dark btn btn-primary teal" type="submit"><i
                                            class="material-icons left">save</i> Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="content-overlay"></div>
        </div>


    </div>
@endsection

@section('scripts')
    <script
        src="https://pixinvent.com/materialize-material-design-admin-template/app-assets/vendors/select2/select2.full.min.js">
    </script>
    {{-- Select --}}
    <script>
        $(".select2").select2({
            dropdownAutoWidth: true,
            width: '100%'
        });
    </script>
@endsection
