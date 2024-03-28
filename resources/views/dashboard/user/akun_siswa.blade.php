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
                        <th>Username</th>
                        <th>Email</th>
                        <th>Nama</th>
                        <th>Sudah Registrasi ?</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ $item->get_avatar_url() }}" alt="Avatar" width="50" class="img-thumbnail">
                            </td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{!! $item->is_registered() !!}</td>
                            <td>{{ $item->role_name }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('dashboard.users.edit', $item->id) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('dashboard.users.destroy', $item->id) }}" method="POST">
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
