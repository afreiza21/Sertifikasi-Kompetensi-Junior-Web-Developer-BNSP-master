@extends('layouts.dashboard')

@section('content')
<main role="main" class="container pt-5">
    <div class="jumbotron mt-5">
        <h1 class="display-4">Selamat Datang!</h1>
        <p class="lead">Selamat datang di aplikasi PSB Online. Aplikasi ini dibuat untuk tugas praktek Sertifikasi Kompetensi BNSP Junior Web Developer</p>
        <hr class="my-4">
        <p>Anda dapat melihat data formulir registrasi siswa dengan menekan tombol dibawah ini:</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="{{ route('dashboard.registration.index') }}">Lihat Pendaftar</a>
        </p>
    </div>
</main>
@endsection
