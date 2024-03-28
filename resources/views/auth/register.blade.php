<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('img/logo.png') }}">

    <title>{{ config('app.name') }}</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link href="{{ asset('css/cover.css') }}" rel="stylesheet">
    <style>
        body {
            background: url('{{ asset('img/background.png') }}');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .form-signin {
            width: 100%;
            max-width: 300px;
            margin: 0 auto;
        }

        .card.card-register > * {
            color: black !important;
            text-shadow: none !important;
        }

    </style>
</head>

<body class="text-center">

    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
        @include('layouts.front_header')

        <main role="main" class="inner cover">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card card-register">
                        <header class="card-header">
                            <h4 class="card-title mt-2">Registrasi Akun</h4>
                        </header>
                        <article class="card-body">
                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="text-left">
                                    @include('layouts.session_checker')
                                </div>
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>NIS </label>
                                        <input type="text" class="form-control" name="username"
                                            value="{{ old('username') }}">
                                        <small class="text-muted">Digunakan sebagai username akun</small>
                                    </div> <!-- form-group end.// -->
                                    <div class="col form-group">
                                        <div class="form-group col-md-12">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ old('name') }}">
                                        </div>
                                    </div> <!-- form-group end.// -->
                                </div> <!-- form-row end.// -->
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" class="form-control" placeholder="Email aktif" name="email" value="{{ old('email') }}">
                                </div> <!-- form-group end.// -->
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" value="">
                                    </div> <!-- form-group end.// -->
                                    <div class="form-group col-md-6">
                                        <label>Konfirmasi Password</label>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" autocomplete="new-password">
                                    </div> <!-- form-group end.// -->
                                </div> <!-- form-row.// -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Register </button>
                                </div> <!-- form-group// -->
                            </form>
                        </article> <!-- card-body end .// -->
                    </div> <!-- card.// -->
                </div> <!-- col.//-->

            </div> <!-- row.//-->
        </main>

        <footer class="mastfoot mt-auto">
            <div class="inner">
                <p>Muhamad Ahmadin &copy 2021</p>
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
