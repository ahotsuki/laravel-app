<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popular Space</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-100">

    <nav class="p-6 bg-white flex justify-between mb-10">
        <ul class="flex items-center">
            <li>
                <a href="{{ route('home') }}" class="p-3">Home</a>
            </li>
            <li>
                <a href="{{ route('ranks') }}" class="p-3">Rankings</a>
            </li>
            @auth
                <li>
                    <a href="{{ route('dashboard') }}" class="p-3">Dashboard<span class="pl-1 text-red-600">({{auth()->user()->username}})</span></a>
                </li>
            @endauth
        </ul>
        <ul class="flex items-center">
            @auth
                <li>
                    <form action="logout" method="post" class="p-3 inline">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            @endauth
            @guest
                <li>
                    <a href="{{ route('login') }}" class="p-3">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="p-3">Register</a>
                </li>
            @endguest
        </ul>
    </nav>
    @yield('content')
</body>
</html>