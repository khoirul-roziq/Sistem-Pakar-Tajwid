@extends('layouts.admin')

@section('title')
    Buat Data User
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
                        <h5 class="breadcrumbs-title mt-0 mb-0"><b>DATA USER</b></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('role-base.index') }}">Data User</a></li>
                            <li class="breadcrumb-item active white-text"><b>Tambah Data User</b></li>
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
                        <div class="row">
                            <form class="col s12" action="{{ route('data-user.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="input-field col s12 login-mi">
                                        <i class="material-icons prefix">person</i>
                                        <input id="nama" type="text" class="" name="nama" value="{{ old('nama') }}">
                                        <label for="nama">Nama Lengkap</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12 login-mi">
                                        <i class="material-icons prefix">email</i>
                                        <input id="email" type="email" class="" name="email" value="{{ old('email') }}">
                                        <label for="email">Alamat Email</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">lock</i>
                                        <input id="icon_prefix" type="password" class="validate" name="password">
                                        <label for="icon_prefix">Kata Sandi</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">lock_outline</i>
                                        <input id="icon_telephone" type="password" class="validate" name="password-validation">
                                        <label for="icon_telephone">Konfirmasi Kata Sandi</label>
                                    </div>
                                </div>
                    
                                <div class="row">
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">wc</i>
                                        <select name="jenis-kelamin">
                                            <option value="" disabled selected>Jenis Kelamin</option>
                                            <option value="L" @if(old('jenis-kelamin') == 'L') selected @endif>Laki-laki</option>
                                            <option value="P" @if(old('jenis-kelamin') == 'P') selected @endif>Perempuan</option>
                                        </select>
                                        {{-- <label>Jenis Kelamin</label> --}}
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
            </div>
        </div>

    </div>

    
    <!-- END: Page Main-->
@endsection

@section('scripts')
@endsection
