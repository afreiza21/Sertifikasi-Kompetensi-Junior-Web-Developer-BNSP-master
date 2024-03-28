<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('img/logo.png') }}">

    <title>{{ $title ?? config('app.name') }}</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('') }}/css/bootstrap.min.css">


    @stack('css')
    <link rel="stylesheet" href="{{ asset('') }}/css/buttons.dataTables.min.css">

  </head>

  <body>

    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('dashboard.index') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            @if (Auth::user()->role == 'admin')
                <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.users.index') }}">Akun Admin</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.users.akun_siswa') }}">Akun Siswa</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.registration.index') }}">Pendaftar <span class="badge badge-primary badge-pill">{{ \App\Registration::where('status', '=', 'pending')->count() }}</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.registration.siswa') }}">Data Siswa</a>
                </li>
            @else
                <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.registration.create') }}">Registrasi Siswa</a>
                </li>

            @endif
          </ul>
          <form class="form-inline mt-2 mt-md-0 mx-2" action="{{ route('logout') }}" method="POST">
            @csrf
            <a href="{{ route('dashboard.profile') }}" class="d-flex">
                <img src="{{ Auth::user()->get_avatar_url() }}" alt="Avatar" width="50" height="50" style="border-radius: 50%">
                <span class="d-flex flex-column ml-2">
                    <span class="">{{ Auth::user()->name }}</span>
                    <small class="text-muted">{{ Auth::user()->role_name }}</small>
                </span>
            </a>
            <button class="btn btn-outline-danger my-2 my-sm-0 ml-4" type="submit">Logout</button>
          </form>
        </div>
      </nav>
    </header>
