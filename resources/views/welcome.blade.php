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
    </style>
</head>

<body class="text-center">

    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
        @include('layouts.front_header')

        <main role="main" class="inner cover" >
            <img src="{{ asset('img/logo.png') }}" alt="Logo" width="100">
            <h1 class="cover-heading">Selamat Datang</h1>
            <p class="lead">Di Aplikasi Penerimaan Siswa Berbasis Web Online, aplikasi ini dibuat sebagai
                tugas praktek Sertifikasi Kompetensi Junior Web Developer</p>
            <p class="lead">
                <a href="{{ route('login') }}" class="btn btn-lg btn-secondary">Login</a>
            </p>
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
