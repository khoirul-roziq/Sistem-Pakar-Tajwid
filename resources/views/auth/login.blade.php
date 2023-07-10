{{-- Retrive auth layout --}}
@extends('layouts.auth')

{{-- Send title to auth page --}}
@section('title', 'Login')

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
            <div class="col s12 m8 l5  offset-l1 offset-m2 z-depth-4 card-panel login">
                <div class="login-header">
                    <h5>Sistem Pakar Tajwid</h5>
                    <h6>Login</h6>
                </div>
                @if (session('message'))
                    <div class="row">
                        <div class="col s10 m12 l12">
                            <div class="card-alert card cyan">
                                <div class="card-content white-text">
                                    <p>
                                        <i class="material-icons">check</i> {{ session('message') }}
                                    </p>
                                </div>
                                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <form class="col s12" action="" method="post">
                        @csrf
                        <div class="row">
                            <div class="input-field col s12 auth-mi">
                                <i class="material-icons prefix">email</i>
                                <input id="email" type="email"
                                    class="validate {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email">
                                <label for="email">Email</label>
                                @if ($errors->has('email'))
                                    @error('email')
                                        <span class="helper-text">{{ $message }}</span>
                                    @enderror
                                @else
                                    <span class="helper-text" data-error="Email yang anda masukan salah!"
                                        data-success=""></span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 auth-mi">
                                <i class="material-icons prefix">key</i>
                                <input id="password" type="password"
                                    class="validate {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                                <label for="password">Kata Sandi</label>
                                @if ($errors->has('password'))
                                    @error('password')
                                        <span class="helper-text">{{ $message }}</span>
                                    @enderror
                                @else
                                    <span class="helper-text" data-error="Kata Sandi yang anda masukan salah!"
                                        data-success=""></span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 auth-mc">
                                <p>
                                    <label>
                                        <input type="checkbox" checked="" name="remember" />
                                        <span>Ingat Saya</span>
                                    </label>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <button type="submit" class="waves-effect waves-light btn-large col s12"><i
                                        class="material-icons right">input</i>Masuk</button>
                            </div>
                            <div class="input-field col s12 auth-mc">
                                <a href="{{ route('registration') }}" class="waves-effect waves-light btn-small col s12"><i
                                        class="material-icons right">person_add</i>Registrasi</a>
                            </div>
                            <div class="input-field col s12">
                                <a href="{{ url('home') }}" class="waves-effect waves-light col s12"><i
                                        class="material-icons left">arrow_back</i>Halaman Beranda</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')
<script src="https://pixinvent.com/materialize-material-design-admin-template/laravel/demo-1/js/scripts/ui-alerts.js">
</script>
@endsection
