@extends('layouts.dashboard')

@push('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <style>
        @media print {
            .btn-cetak {
                display: none;
            }
        }
    </style>
@endpush

@section('content')
    <main role="main" class="container pt-5 mt-5">
        @include('layouts.session_checker')
        <center>
            <a href="#" onclick="window.print()" class="btn btn-primary btn-cetak mb-2">Cetak</a>
            <div class="card" style="width: 24rem; border: 5px dotted black">
                <img class="card-img-top" src="{{ $registration->user->get_avatar_url() }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $registration->user->name }}</h5>
                    <small class="text-muted">{{ $registration->user->username }}</small>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item" style="border: 1px solid #ccc">NIS: {{ $registration->user->username }}</li>
                    <li class="list-group-item" style="border: 1px solid #ccc">Email: {{ $registration->user->email }}</li>
                    <li class="list-group-item" style="border: 1px solid #ccc">Nomor HP: {{ $registration->phone }}</li>
                </ul>
                <div class="card-body text-center">
                    Alamat
                    <p class="card-text">{{ $registration->address }}</p>
                    <hr>
                    <span class="lead">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" width="70" class="mb-1"> <br>
                        {{ config('app.name') }}
                    </span>
                </div>
            </div>
        </center>

    </main>
@endsection

@push('js')

@endpush
