<header class="masthead mb-auto">
    <div class="inner">
        <a href="{{ route('welcome') }}">
            <h3 class="masthead-brand">{{ config('app.name') }}</h3>
        </a>
        <nav class="nav nav-masthead justify-content-center">
            @if (Route::has('login'))
                @auth
                    <a class="nav-link active" href="{{ url('/home') }}">Home</a>
                @else
                    <a class="nav-link active" href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a class="nav-link active" href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            @endif
        </nav>
    </div>
</header>
