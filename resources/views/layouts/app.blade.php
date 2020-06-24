<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        @if (Auth::user()->role == 1)
                        <img src="https://cdn2.vectorstock.com/i/1000x1000/25/31/user-icon-businessman-profile-man-avatar-vector-10552531.jpg" width="40" style="border-radius: 40px;" height="40">
                        <li class="nav-item dropdown">
                            {{-- <img src="data:image/jpeg;base64,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" alt=""> --}}
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->firstname }} <span class="caret"></span>
                            </a>
                           
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <a class="dropdown-item" href=""
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('User') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @else
                        <img src="https://cdn2.vectorstock.com/i/1000x1000/25/31/user-icon-businessman-profile-man-avatar-vector-10552531.jpg" width="40" style="border-radius: 40px;" height="40">
                        <li class="nav-item dropdown">
                            {{-- <img src="data:image/jpeg;base64,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" alt=""> --}}
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->firstname }} <span class="caret"></span>
                            </a>
                           
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endif
                        
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
