@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $item)
            <li class="text-danger">{{ $item }}</li>
        @endforeach
    </ul>
@endif
@if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
