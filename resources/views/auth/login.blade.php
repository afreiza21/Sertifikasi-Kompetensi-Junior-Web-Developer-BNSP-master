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

    </style>
</head>

<body class="text-center">

    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
        @include('layouts.front_header')

        <main role="main" class="inner cover">
            <img class="mb-4" src="{{ asset('img/logo.png') }}" alt="" width="72" height="72">
            <h1 class="cover-heading">Silahkan Login</h1>
            <p class="lead">Di Aplikasi Penerimaan Siswa Berbasis Web Online, aplikasi ini dibuat sebagai
                tugas praktek Sertifikasi Kompetensi Junior Web Developer</p>


            <form class="form-signin" method="POST" action="{{ route('login') }}">
                @include('layouts.session_checker')
                @csrf
                <label class="sr-only">Username</label>
                <input type="text" class="form-control mt-1" placeholder="Username/NIS" name="username" required
                    autofocus>
                <label class="sr-only">Password</label>
                <input type="password" class="form-control mt-1" placeholder="Password" name="password" required>

                <button class="btn btn-lg btn-primary btn-block mt-1" type="submit">Login</button>
            </form>
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
