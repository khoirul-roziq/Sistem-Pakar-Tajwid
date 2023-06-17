{{-- Retrive auth layout --}}
@extends('layouts.auth')

{{-- Send title to auth page --}}
@section('title', 'Registrasi')

{{-- Send style to auth page --}}
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/css/auth.css') }}">
@endsection

{{-- Send content --}}
@section('main')
    <a href="https://www.freepik.com/free-photo/islamic-new-year-concept-with-copyspace_9259618.htm#query=al%20quran&position=6&from_view=search&track=ais"
        class="login-source-bg">Source background</a>

    <div class="row">
        <div class="container mt-4">
            <div class="col s12 m8 l6  offset-l1 offset-m2 z-depth-4 card-panel login">
                <div class="login-header">
                    <h5>Sistem Pakar Tajwid</h5>
                    <h6>Registrasi</h6>
                </div>
                <div class="row">
                    <form class="col s12" action="{{ route('registration.process') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="input-field col s12 login-mi">
                                <i class="material-icons prefix">person</i>
                                <input id="nama" type="text" class="" name="nama">
                                <label for="nama">Nama Lengkap</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 login-mi">
                                <i class="material-icons prefix">email</i>
                                <input id="email" type="email" class="" name="email">
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
                                <input id="icon_telephone" type="password" class="validate">
                                <label for="icon_telephone">Konfirmasi Kata Sandi</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s6">
                                <i class="material-icons prefix">wc</i>
                                <select name="jenis-kelamin">
                                  <option value="" disabled selected>Jenis Kelamin</option>
                                  <option value="L">Laki-laki</option>
                                  <option value="P">Perempuan</option>
                                </select>
                                {{-- <label>Jenis Kelamin</label> --}}
                              </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <button type="submit" class="waves-effect waves-light btn-large col s12"><i
                                        class="material-icons right">send</i>Daftar</button>
                            </div>
                            <div class="input-field col s12">
                                <a href="{{ route('login') }}" class="waves-effect waves-light col s12"><i
                                        class="material-icons left">arrow_back</i>Halaman Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- Send Script --}}
@section('scripts')
    <script src="{{ asset('assets/vendor/materialize-src/js/plugins.min.js') }}"></script>
@endsection