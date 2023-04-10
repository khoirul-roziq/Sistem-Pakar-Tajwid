<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('assets/vendor/materialize-src/sass/materialize.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/styles/css/auth.css') }}">

    <title>Registrasi | Sistem Pakar Tajwid</title>
</head>

<body
    style="background-image: url({{ asset('assets/images/background/islamic-new-year-concept-with-copy-space.jpg') }});">
    <a href="https://www.freepik.com/free-photo/islamic-new-year-concept-with-copyspace_9259618.htm#query=al%20quran&position=6&from_view=search&track=ais"
        class="login-source-bg">Source background</a>

    <div class="row">
        <div class="container mt-4">
            <div class="col s12 m8 l6  offset-l3 offset-m2 z-depth-4 card-panel login"
                style="padding: 2rem; box-sizing: border-box;">
                <div class="login-header">
                    <h5>Sistem Pakar Tajwid</h5>
                    <h6>Registrasi</h6>
                </div>
                <div class="row">
                    <form class="col s12" action="" method="post">
                        @csrf
                        <div class="row">
                            <div class="input-field col s12 login-mi">
                                <i class="material-icons prefix">person</i>
                                <input id="nama-lengkap" type="text" class="" name="nama-lengkap">
                                <label for="nama-lengkap">Nama Lengkap</label>
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
                                <input id="icon_prefix" type="text" class="validate">
                                <label for="icon_prefix">Kata Sandi</label>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">lock_outline</i>
                                <input id="icon_telephone" type="tel" class="validate">
                                <label for="icon_telephone">Konfirmasi Kata Sandi</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <button type="submit" class="waves-effect waves-light btn-large col s12"><i
                                        class="material-icons right">create</i>Daftar</button>
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

    {{-- Source --}}

    <script src="{{ asset('assets/vendor/materialize-src/js/bin/materialize.js') }}"></script>

    {{-- END: Source --}}

</body>

</html>
