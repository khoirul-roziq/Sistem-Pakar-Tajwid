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
            <div class="col s12 m8 l6  offset-l3 offset-m2 z-depth-4 card-panel" id="card-login">
                <header>
                    <h5>Sistem Pakar Tajwid</h5>
                    <h6>Login</h6>
                </header>
                <div class="row">
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">email</i>
                                <input id="email" type="email" class="validate">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">key</i>
                                <input id="password" type="password" class="validate">
                                <label for="password">Kata Sandi</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <a class="waves-effect waves-light btn-large col s12"><i class="material-icons right">forward</i>Masuk</a>
                            </div>
                            <div class="input-field col s12">
                                <a class="waves-effect waves-light btn-small col s12"><i class="material-icons right">person_add</i>Registrasi</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/vendor/materialize-src/js/bin/materialize.js') }}"></script>

</body>

</html>
