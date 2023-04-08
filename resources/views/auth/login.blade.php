<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('assets/vendor/materialize-src/sass/materialize.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/styles/css/login.css') }}">

    <title>Login</title>
</head>

<body>

    <div class="row">
        <div class="col-12"></div>
        <div class="container mt-4">
            <div class="col s12 m8 l6  offset-l3 offset-m2 z-depth-4 card-panel login"
                style="padding: 2rem; box-sizing: border-box;">
                <div class="login-header">
                    <h5>Sistem Pakar Tajwid</h5>
                    <h6>Login</h6>
                </div>
                <div class="row">
                    <form class="col s12" action="" method="post">
                        @csrf
                        <div class="row">
                            <div class="input-field col s12 login-mi">
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
                            <div class="input-field col s12 login-mi">
                                <i class="material-icons prefix">key</i>
                                <input id="password" type="password" class="validate {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
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
                            <div class="input-field col s12 login-mc">
                                <p>
                                    <label>
                                        <input type="checkbox" checked="checked" name="remember" />
                                        <span>Ingat Saya</span>
                                    </label>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <button type="submit" class="waves-effect waves-light btn-large col s12"><i
                                        class="material-icons right">forward</i>Masuk</button>
                            </div>
                            <div class="input-field col s12 login-mc">
                                <a class="waves-effect waves-light btn-small col s12"><i
                                        class="material-icons right">person_add</i>Registrasi</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Source --}}

    <script src="{{ asset('assets/vendor/materialize-src/js/bin/materialize.js') }}"></script>

    {{-- END: Source --}}

</body>

</html>
