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

        <ul class="list-group">
            <li class="list-group-item">NIS: <b>{{ $registration->user->username }}</b></li>
            <li class="list-group-item">Nama Lengkap: <b>{{ $registration->user->name }}</b></li>
            <li class="list-group-item">Jenis Kelamin: <b>{{ $registration->gender_name() }}</b></li>
            <li class="list-group-item">Alamat: <b>{{ $registration->address }}</b></li>
            <li class="list-group-item">Nilai Akhir: <b>{{ $registration->last_score }}</b></li>
            <li class="list-group-item">
                <form action="{{ route('dashboard.registration.update', $registration->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label>Status:</label>
                    <select name="status" id="status">
                        <option value="pending" {{ $registration->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="diterima" {{ $registration->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="cadangan" {{ $registration->status == 'cadangan' ? 'selected' : '' }}>Cadangan</option>
                        <option value="tidak_diterima" {{ $registration->status == 'tidak_diterima' ? 'selected' : '' }}>Tidak Diterima</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </li>
          </ul>

    </main>
@endsection

@push('js')

@endpush
