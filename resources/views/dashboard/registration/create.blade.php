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


        <form action="{{ route('dashboard.registration.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>NIS</label>
                    <input type="text" class="form-control" name="username" value="{{ Auth::user()->username }}" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label>Nomor Handphone</label>
                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                </div>
                <div class="form-group col-md-12">
                    <label>Alamat Lengkap</label>
                    <textarea name="address" id="address" cols="30" rows="4" class="form-control">{{ old('address') }}</textarea>
                </div>
                <div class="form-group col-md-4">
                    <label>Jenis Kelamin</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="L" value="L" name="gender" class="custom-control-input" checked>
                        <label class="custom-control-label" for="L">Laki-Laki</label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input type="radio" id="P" value="P" name="gender" class="custom-control-input">
                        <label class="custom-control-label" for="P">Perempuan</label>
                      </div>
                </div>
                <div class="form-group col-md-4">
                    <label>Tanggal Lahir</label>
                    <input type="date" class="form-control" name="dob" value="{{ old('dob') }}">
                </div>
                <div class="form-group col-md-4">
                    <label>Nilai Akhir</label>
                    <input type="number" min="0" max="100" class="form-control" name="last_score" value="{{ old('last_score') }}">
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Registrasi</button>
            </div>
        </form>

    </main>
@endsection

@push('js')

@endpush
