@extends('layouts.dashboard')

@section('content')
    <main role="main" class="container pt-5">
        <div class="jumbotron mt-5">
            <h1 class="display-4">Selamat Datang!</h1>
            <p class="lead">Selamat datang di aplikasi PSB Online. Aplikasi ini dibuat untuk tugas praktek
                Sertifikasi Kompetensi BNSP Junior Web Developer</p>
            <hr class="my-4">

            @php
                $is_registered = \App\Registration::where('user_id', Auth::user()->id)->first();
            @endphp

            @if ($is_registered != null && $is_registered->count() > 0)

                @if ($is_registered->status == 'diterima')
                    <p>Selamat anda sudah <span class="text-success">Diterima</span> menjadi siswa, anda dapat mencetak kartu registrasi siswa anda <a
                            href="{{ route('dashboard.registration.cetak_kartu') }}">Disini</a></p>
                @elseif($is_registered->status == 'cadangan')
                    <p>Status registrasi anda menjadi Cadangan</p>
                @elseif($is_registered->status == 'tidak_diterima')
                    <p>Status registrasi anda <span class="text-danger">Ditolak</span></p>
                @else
                    <p>Pendaftaran anda sudah terkirim dengan status {!! $is_registered->status_label !!}, mohon tunggu verifikasi admin.
                        Lihat lebih lanjut dengan mengklik tombol dibawah ini:</p>
                    <p class="lead">
                        <a class="btn btn-info btn-lg" href="{{ route('dashboard.registration.detail') }}"
                            role="button">Lihat
                            Status</a>
                    </p>
                @endif

            @else
                <p>Untuk pendaftaran siswa, silahkan klik tombol dibawah ini:</p>
                <p class="lead">
                    <a class="btn btn-success btn-lg" href="{{ route('dashboard.registration.create') }}"
                        role="button">Daftar Sekarang!</a>
                </p>
            @endif
        </div>
    </main>
@endsection
