@extends('layouts.dashboard')

@push('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endpush

@section('content')
    <main role="main" class="container pt-5 mt-5">
        <div class="d-flex justify-content-between">
            <h5>{{ $title ?? config('app.name') }}</h5>
            <a href="{{ route('dashboard.index') }}" class="btn btn-sm btn-primary">Kembali ke Dashboard</a>
        </div>
        <hr class="my-4">

        @include('layouts.session_checker')


        <form action="{{ route('dashboard.users.update_profile', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>{{ Auth::user()->role == 'admin' ? 'Username' : 'NIS' }}</label>
                    <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                </div>
                <div class="form-group col-md-6">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" value="">
                    <small class="text-muted">Kosongkan jika tidak ingin diupdate</small>
                </div>
                <div class="form-group col-md-4">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                </div>
                <div class="form-group col-md-4">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                </div>
                <div class="form-group col-md-4">
                    <label>Avatar</label> <br>
                    <img src="{{ $user->get_avatar_url() }}" alt="Avatar" width="100"> <br>
                    <input type="file" class="form-control mt-1" name="avatar">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

    </main>
@endsection

@push('js')

@endpush
