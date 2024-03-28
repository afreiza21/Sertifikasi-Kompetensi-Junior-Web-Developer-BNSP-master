@extends('layouts.dashboard')

@push('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endpush

@section('content')
    <main role="main" class="container pt-5 mt-5">
        <div class="d-flex justify-content-between">
            <h5>{{ $title ?? config('app.name') }}</h5>
            <a href="{{ route('dashboard.users.index') }}" class="btn btn-sm btn-primary">Kembali</a>
        </div>
        <hr class="my-4">

        @include('layouts.session_checker')


        <form action="{{ route('dashboard.users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                </div>
                <div class="form-group col-md-6">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                </div>
                <div class="form-group col-md-4">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group col-md-4">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group col-md-4">
                    <label>Avatar</label>
                    <input type="file" class="form-control" name="avatar">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

    </main>
@endsection

@push('js')

@endpush
