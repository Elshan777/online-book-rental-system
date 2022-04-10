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
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
           
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="navbar-brand" href="/">
                        <img src="https://www.elte.hu/media/2e/7f/f78d4052ec5e196f902d4b8a91a4693d2e45edbb7574b47592ebedcf759d/elte_cimer_szines.jpg"
                        alt="" width="30" height="24" class="d-inline-block align-text-top">
                        Online Book Rental System
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link" href="{{ route('books.index') }}">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link" href="{{ route('books.create') }}">Add Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link" href="{{ route('genres.index') }}">Genres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link" href="{{ route('genres.create') }}">Add Genres</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link">About</a>
                </li>
              </ul>
            </div>
        </nav>

    
        @yield('content')
    </div>
</body>
</html>