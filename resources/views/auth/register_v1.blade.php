<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>{{ $title ?? config('app.name') }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    @stack('css')

</head>

<body>

    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link btn btn-outline-primary" href="#">Beranda <span
                                class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <form class="form-inline mt-2 mt-md-0 mx-2" action="{{ route('logout') }}" method="POST">
                    <a class="btn btn-outline-success my-2 my-sm-0 ml-4 text-white">Login</a>
                    <a class="btn btn-outline-warning my-2 my-sm-0 ml-4 text-white">Registrasi</a>
                </form>

            </div>
        </nav>
    </header>

    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Registrasi Akun</div>

                    <div class="card-body">
                        @include('layouts.session_checker')
                        <form method="POST" action="{{ route('register') }}" class="form-row" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-md-12">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username"
                                    value="{{ old('username') }}">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password"
                                    value="">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Konfirmasi Password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript
  ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    @stack('js')
</body>

</html>
