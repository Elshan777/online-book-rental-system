<!doctype html>
<html>
<head>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
           
            <ul class="navbar-nav">
                <li class="nav-item">
                    @if  (Auth::user() and Auth::user()->is_librarian())
                    <a class="navbar-brand" href="/main">
                        <img src="https://www.elte.hu/media/2e/7f/f78d4052ec5e196f902d4b8a91a4693d2e45edbb7574b47592ebedcf759d/elte_cimer_szines.jpg"
                        alt="" width="30" height="24" class="d-inline-block align-text-top">
                        Online Book Rental System
                    </a>
                    @elseif (Auth::user())
                    <a class="navbar-brand" href="/rentals">
                        <img src="https://www.elte.hu/media/2e/7f/f78d4052ec5e196f902d4b8a91a4693d2e45edbb7574b47592ebedcf759d/elte_cimer_szines.jpg"
                        alt="" width="30" height="24" class="d-inline-block align-text-top">
                        Online Book Rental System
                    </a>
                    @else
                    <a class="navbar-brand" href="/login">
                        <img src="https://www.elte.hu/media/2e/7f/f78d4052ec5e196f902d4b8a91a4693d2e45edbb7574b47592ebedcf759d/elte_cimer_szines.jpg"
                        alt="" width="30" height="24" class="d-inline-block align-text-top">
                        Online Book Rental System
                    </a>
                    @endif
                </li>
                <li class="nav-item">
                    @if  (Auth::user())
                        <a class="nav-item nav-link" href="{{ route('books.index') }}">Books</a>
                    @endif
                </li>
                @auth
                    <li class="nav-item">
                        @if  (Auth::user()->is_librarian())
                            <a class="nav-item nav-link" href="{{ route('books.create') }}">Add Books</a>
                        @endif
                    </li>
                @endauth
                <li class="nav-item">
                    @if  (Auth::user())
                        <a class="nav-item nav-link" href="{{ route('genres.index') }}">Genres</a>
                    @endif
                </li>
                @auth
                    <li class="nav-item">
                        @if  (Auth::user()->is_librarian())
                            <a class="nav-item nav-link" href="{{ route('genres.create') }}">Create New Genre</a>
                        @endif
                    </li>
                @endauth 

                @auth
                    <li class="nav-item">
                        @if  (Auth::user()->is_librarian())
                            <a class="nav-item nav-link" href="{{ route('borrows.index') }}">Admin Borrows</a>
                        @endif
                    </li>
                @endauth 

                @auth
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="{{ route('rentals') }}">Rentals</a>
                    </li>
                @endauth 
              </ul>
            </div>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} @if  (Auth::user()->is_librarian()) (ADMIN) @endif
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </nav>

    
        @yield('content')
    </div>
</body>
</html>