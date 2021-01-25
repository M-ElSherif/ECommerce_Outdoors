<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Heruko -->
    <link rel="stylesheet" href="{{ secure_asset('assets/css/style.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href={{url('assets/css/style.css')}}>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            {{-- <div class="container"> --}}
                @guest
                    <a href="/" class="navbar-brand">
                        <h5 class="px-4">
                            <i class="fas fa-home"></i> Home
                        </h5>
                    </a>
                    <a href="/services" class="navbar-brand">
                        <h5 class="px-4">
                            <i class="fas fa-address-card"></i> Services
                        </h5>
                    </a>
                    <a href="/contact" class="navbar-brand">
                        <h5 class="px-4">
                            <i class="fas fa-people-carry"></i> Contact Us
                        </h5>
                    </a>
                    <a href="/products" class="navbar-brand">
                        <h5 class="px-4">
                            <i class="fas fa-shopping-basket"></i> Product
                        </h5>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="mr-auto"></div>
                            <div class="navbar-nav">
                                <a href="/cart" class="nav-item nav-link active">
                                    <h5 class="px-5 cart">
                                        <i class="fas fa-shopping-cart"></i> Cart
                                        <?php
                
                                        if (Cart::count() > 0) {
                                            echo "<span style=\"text-align: center; padding: 0 0.9rem 0.1rem 0.9rem; border-radius: 3rem; \"id=\"cart_count\" class=\"text-warning bg-light\">" . Cart::count() . "</span>";
                                        } else {
                                            echo "<span style=\"text-align: center; padding: 0 0.9rem 0.1rem 0.9rem; border-radius: 3rem; id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                                        }
                                        ?>
                                    </h5>
                                </a>
                            </div>
                        </div>
                        <div class="menubar-log ml-auto">
                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
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
                                    <li class="nav-item1 dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                        </div>
                    </div>
                @else
                    @if (Auth::user()->current_team_id)
                        <a href="/admin" class="navbar-brand">
                            <h5 class="px-4">
                                <i class="fas fa-users-cog"></i> Products
                            </h5>
                        </a>
                        <a href="/adminCategories" class="navbar-brand">
                            <h5 class="px-4">
                                <i class="fas fa-users-cog"></i> Categories
                            </h5>
                        </a>
                        <a href="/adminOrders" class="navbar-brand">
                            <h5 class="px-4">
                                <i class="fas fa-users-cog"></i> Orders
                            </h5>
                        </a>
                        <a href="/adminMessages" class="navbar-brand">
                            <h5 class="px-4">
                                <i class="fas fa-users-cog"></i> Messages
                            </h5>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="ml-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                        </div>
                    @else
                    <a href="/" class="navbar-brand">
                        <h5 class="px-4">
                            <i class="fas fa-home"></i> Home
                        </h5>
                    </a>
                    <a href="/services" class="navbar-brand">
                        <h5 class="px-4">
                            <i class="fas fa-address-card"></i> Services
                        </h5>
                    </a>
                    <a href="/contact" class="navbar-brand">
                        <h5 class="px-4">
                            <i class="fas fa-people-carry"></i> Contact Us
                        </h5>
                    </a>
                    <a href="/products" class="navbar-brand">
                        <h5 class="px-4">
                            <i class="fas fa-shopping-basket"></i> Product
                        </h5>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="mr-auto"></div>
                            <div class="navbar-nav">
                                <a href="/cart" class="nav-item nav-link active">
                                    <h5 class="px-5 cart">
                                        <i class="fas fa-shopping-cart"></i> Cart
                                        <?php
                
                                        if (Cart::count() > 0) {
                                            echo "<span style=\"text-align: center; padding: 0 0.9rem 0.1rem 0.9rem; border-radius: 3rem; \"id=\"cart_count\" class=\"text-warning bg-light\">" . Cart::count() . "</span>";
                                        } else {
                                            echo "<span style=\"text-align: center; padding: 0 0.9rem 0.1rem 0.9rem; border-radius: 3rem; id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                                        }
                                        ?>
                                    </h5>
                                </a>
                            </div>
                        </div>
                        <div class="menubar-log ml-auto">
                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
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
                                    <li class="nav-item1 dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                        </div>
                    </div>
                    @endif
                @endguest
            {{-- </div> --}}
        </nav>
    </div>
    
    <div>
        @yield('content')
    </div>

    <div class="footer1-bg">
        <div class="container footer-area wrapper">
          <div class="row">
            <div class="col-lg-5 col-md-4 col-sm-6">
              <h5>Address</h5>
              <ul class="list-group  list-group-flush ">
                <li class="list-group-item bg-transparent">1811 4th street sw unit 208 <br> Calgary Alberta T2S 1W2 <br> Canada</li>
                <li class="list-group-item bg-transparent">+1 (587) 890-9898</li>
                <li class="list-group-item bg-transparent">cherlove@telus.net<a href="mailto: cherlove@telus.net"></a></li>
              </ul>
            </div>
            <div class="col-lg-5 col-md-4 col-sm-6">
              <h5>Follow Us</h5>
                <ul class="list-group  list-group-flush">
                  <!--Facebook-->
                  <li class="list-group-item bg-transparent"><a href="https://www.facebook.com"><button type="button" class="btn btn-fb"><i class="fab fa-facebook-f"></i></button>Facebook - Dream It Today Do It Tomorrow Telesummits</a></li>
                  <!--Twitter-->
                  <li class="list-group-item bg-transparent"><a href="https://www.twitter.com"><button type="button" class="btn btn-tw"><i class="fab fa-twitter"></i></button>Twitter</a></li>
                </ul>
            </div>
          </div>
        </div>
        <!-- content -->
        <!-- footer -->
        <footer class="footer2-bg navbar-dark bg-dark">
            <p style="color: black">&copy; <?php echo date("Y") ?> CST8334. All Rights Reserved.</p>
        </footer>
        <!-- footer end -->
    </div>

</body>
</html>
