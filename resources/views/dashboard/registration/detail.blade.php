@extends('layouts.dashboard')

@push('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endpush

@section('content')
    <main role="main" class="container pt-5 mt-5">
        <div class="d-flex justify-content-between">
            <h5>{{ $title ?? config('app.name') }}</h5>
        </div>
        <hr class="my-4">

        @include('layouts.session_checker')

        <ul class="list-group mb-3">
            <li class="list-group-item">NIS: <b>{{ $registration->user->username }}</b></li>
            <li class="list-group-item">Nama Lengkap: <b>{{ $registration->user->name }}</b></li>
            <li class="list-group-item">Jenis Kelamin: <b>{{ $registration->gender_name() }}</b></li>
            <li class="list-group-item">Alamat: <b>{{ $registration->address }}</b></li>
            <li class="list-group-item">Nilai Akhir: <b>{{ $registration->last_score }}</b></li>
            <li class="list-group-item">Status: <b>{!! $registration->status_label !!}</b></li>
        </ul>

        @if ($registration->status == 'diterima')
            <p>Selamat anda sudah <span class="text-success">Diterima</span> menjadi siswa, anda dapat mencetak kartu
                registrasi siswa anda <a href="{{ route('dashboard.registration.cetak_kartu') }}">Disini</a></p>
        @elseif($registration->status == 'cadangan')
            <p>Status registrasi anda menjadi Cadangan</p>
        @elseif($registration->status == 'tidak_diterima')
            <p>Status registrasi anda <span class="text-danger">Ditolak</span></p>
        @else
            <p>Pendaftaran anda sudah terkirim dengan status {!! $registration->status_label !!}, mohon tunggu verifikasi admin.
        @endif

    </main>
@endsection

@push('js')

@endpush
