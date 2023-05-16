@extends('layouts.admin')

@section('title')
    Buat Jawaban
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
                        <h5 class="breadcrumbs-title mt-0 mb-0"><b>Data Jawaban</b></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('jawaban.index') }}">Data Jawaban</a></li>
                            <li class="breadcrumb-item active white-text"><b>Tambah Jawaban</b></li>
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
                        <form action="{{ route('jawaban.update', $data->id) }}" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="input-field col m6 s12">
                                    <label for="kode">Kode<span class="red-text">*</span></label>
                                    <input type="text" id="kode" name="kode"
                                        class="validate @error('kode') is-invalid @enderror" required
                                        value="{{ $data->kode }}">
                                    @error('kode')
                                        <small class="red-text">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="input-field col m6 s12">
                                    <select name="kategori" id="kategori">
                                        <option value="tanda" @if($data->kategori == 'tanda') selected @endif>Tanda</option>
                                        <option value="hukum" @if($data->kategori == 'hukum') selected @endif>Hukum</option>
                                        <option value="kategori" @if($data->kategori == 'kategori') selected @endif>Kategori</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col m6 s12">
                                    <label for="namaJawaban">Nama Jawaban<span class="red-text">*</span></label>
                                    <input type="text" id="namaJawaban" name="namaJawaban"
                                        class="validate @error('namaJawaban') is-invalid @enderror" required
                                        value="{{ $data->nama_jawaban }}">
                                    @error('namaJawaban')
                                        <small class="red-text">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="input-field col m6 s12">
                                    <label for="representasi">Representasi<span class="red-text">*</span></label>
                                    <input type="text" id="representasi" name="representasi"
                                        class="validate @error('representasi') is-invalid @enderror" required
                                        value="{{ $data->representasi }}">
                                    @error('representasi')
                                        <small class="red-text">{{ $message }}</small>
                                    @enderror
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
    
@endsection
