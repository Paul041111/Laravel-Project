<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Articles')</title>
</head>
<body>

    <header>
        <nav>
            <a href="{{ route('articles.index') }}">Articles</a>

            @auth
                <a href="{{ route('articles.create') }}">New Article</a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Sign Up</a>
            @endguest
        </nav>
    </header>

    <main>
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif

        @yield('content')
    </main>

</body>
</html>
