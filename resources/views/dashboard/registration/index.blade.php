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
        <div class="table-responsive">
            <table id="jwd_table" class="display">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Avatar</th>
                        <th>NIS/Username</th>
                        <th>Nama Siswa</th>
                        <th>Alamat</th>
                        <th>Nomor HP</th>
                        <th>Jenis Kelamin</th>
                        <th>Nilai Akhir</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registrations as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ $item->user->get_avatar_url() }}" alt="Avatar" width="50" class="img-thumbnail">
                            </td>
                            <td>{{ $item->user->username }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->gender_name() }}</td>
                            <td><b>{{ $item->last_score }}</b></td>
                            <td>{!! $item->status_label !!}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('dashboard.registration.edit', $item->id) }}"
                                        class="btn btn-sm btn-info">Detail</a>
                                    <form action="{{ route('dashboard.registration.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger ml-1 buttonDeletion" onclick="return confirm('Yakin ?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>
@endsection

@push('js')
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#jwd_table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
@endpush
