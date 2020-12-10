<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
    <nav class="navbar navbar-expand-lg border navbar-light bg-ligth">
        <div class="container">

            <a class="navbar-brand" href="#">Sikapta Unsiq</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href=" {{ route('home') }} ">Home <span class="sr-only">(current)</span></a>
                </li>
              </ul>
              @guest
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href=" {{ route('home') }} ">Register</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=" {{ route('home') }} ">Login</span></a>
                    </li>
                </ul>
              @else
                @if(Auth::guard('admin')->check())
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Logout</a>
                        </div>
                        </li>
                    </ul>
                @elseif(Auth::guard('dosen')->check())
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->nm_dosen }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Logout</a>
                        </div>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->nim }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a 
                            href="{{ route('logout') }}"
                            class="dropdown-item"
                                onclick="event.preventDefault();
                                    document.getElementById('user-logout-form').submit();">
                                Logout
                            </a>
                            <form id="user-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                        </li>
                    </ul>
                @endif
            @endguest
            </div>
        </div>
      </nav>
    
        
        <div class="container">
            
            @yield('content')

        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
