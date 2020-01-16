{{--<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">--}}
{{--    <div class="container">--}}
{{--        <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--            {{ config('app.name', 'Laravel') }}--}}
{{--        </a>--}}
{{--        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}

{{--        <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--            <!-- Left Side Of Navbar -->--}}
{{--            <ul class="navbar-nav mr-auto">--}}

{{--            </ul>--}}

{{--            <!-- Right Side Of Navbar -->--}}
{{--            <ul class="navbar-nav ml-auto">--}}
{{--                <!-- Authentication Links -->--}}
{{--                @guest--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                    </li>--}}
{{--                    @if (Route::has('register'))--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
{{--                @else--}}
{{--                    <li class="nav-item dropdown">--}}
{{--                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                            {{ Auth::user()->name }} <span class="caret"></span>--}}
{{--                        </a>--}}

{{--                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                            <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                               onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                {{ __('Logout') }}--}}
{{--                            </a>--}}

{{--                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                                @csrf--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                @endguest--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}

<div class="trending-bar-dark hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="trending-bar-title">Trending News</h3>
                <div class="trending-news-slider">
                    <div class="item">
                        <div class="post-content">
                            <h2 class="post-title title-sm">
                                <a href="{{route('single')}}">Ex-Googler warns coding bootcamps are lacking</a>
                            </h2>
                        </div>
                    </div>
                    <div class="item">
                        <div class="post-content">
                            <h2 class="post-title title-sm">
                                <a href="{{route('single')}}">Intel’s new smart glasses actually look good</a>
                            </h2>
                        </div>
                    </div>
                    <div class="item">
                        <div class="post-content">
                            <h2 class="post-title title-sm">
                                <a href="{{route('single')}}" >Here's How To Get Free Pizza On 2 hour</a>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12 top-nav-social-lists text-lg-right col-lg-4 ml-lg-auto">
                <ul class="list-unstyled mt-4 mt-lg-0">
                    <li>
                        <a href="#">
                            <span class="social-icon">
                                <i class="fa fa-facebook-f"></i>
                            </span>
                        </a>
                        <a href="#">
                            <span class="social-icon">
                                <i class="fa fa-twitter"></i>
                            </span>
                        </a>
                        <a href="#">
                            <span class="social-icon">
                                <i class="fa fa-google-plus"></i>
                            </span>
                        </a>
                        <a href="#">
                            <span class="social-icon">
                                <i class="fa fa-youtube"></i>
                            </span>
                        </a>
                        <a href="#">
                            <span class="social-icon">
                                <i class="fa fa-linkedin"></i>
                            </span>
                        </a>
                        <a href="#">
                            <span class="social-icon">
                                <i class="fa fa-pinterest-p"></i>
                            </span>
                        </a>
                        <a href="#">
                            <span class="social-icon">
                                <i class="fa fa-rss"></i>
                            </span>
                        </a>
                        <a href="#">
                            <span class="social-icon">
                                <i class="fa fa-github"></i>
                            </span>
                        </a>
                        <a href="#">
                            <span class="social-icon">
                                <i class="fa fa-reddit-alien"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>

<header class="header-navigation  d-lg-block">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-3 d-none d-lg-block">
                <!-- Logo -->
                <div class="logo">
                    <a href="{{route('home')}}">
                        <img src="{{asset('images/logos/logo.png')}}" alt="logo"> <!-- Replace Logo Here -->
                    </a>
                </div>
                <!-- End Logo -->
            </div>
            <div class="col-12 col-lg-9">
                <div class="top-ad-banner d-flex justify-content-center justify-content-lg-end ">
{{--                    <a href="#">--}}
{{--                        <img src="{{asset('images/news/ad-pro.png')}}" class="img-fluid" alt="banner-ads">--}}
{{--                    </a>--}}
                    @if(Auth::check())

                        <a class="nav-link username-button" href="{{route('author')}}">
                            {{ Auth::user()->name }}
                        </a>
                        <a class="nav-link register-button" href="#"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a class="nav-link login-button mr-5 mr-lg-4" href="{{ route('login') }}">Log in</a>
                        @if (Route::has('register'))
                            <a class="nav-link register-button" href="{{route('register')}}">Sign up</a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>


<div class="main-navbar clearfix bg-dark ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg site-main-nav navigation">
                    <a class="navbar-brand d-lg-none" href="{{route('home')}}">
                        <img src="{{asset('images/logos/footer-logo.png')}}" alt="logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fa fa-bars"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">

                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{route('home')}}">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{route('category','Football')}}">Football</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{route('category','Basketball')}}">Basketball</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{route('category','Tenis')}}">Tenis</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{route('category','AUTOMOTO')}}">Automoto</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{route('category', 'ESPORTS')}}">ESPORTS</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Post
                                </a>
                                <div class="dropdown-menu" >
{{--                                    <a class="dropdown-item" href="post-left-sidebar.html">Post Left Sidebar</a>--}}
{{--                                    <a class="dropdown-item" href="post-full-width.html">Post Full Width</a>--}}
                                    <a class="dropdown-item" href="{{route('single')}}">Single Post</a>
{{--                                    <a class="dropdown-item" href="post-category-1.html">Category 1</a>--}}
{{--                                    <a class="dropdown-item" href="post-category-2.html">Category 2</a>--}}
                                    <a class="dropdown-item" href="{{route('author')}}">Author</a>
                                </div>
                            </li>
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    Account--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu">--}}
{{--                                    <a class="dropdown-item" href="{{ route('login') }}">Log In</a>--}}
{{--                                    <a class="dropdown-item" href="{{route('register')}}">Register</a>--}}
{{--                                </div>--}}
{{--                            </li>--}}

                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{route('about')}}">
                                    About
                                </a>
{{--                                <div class="dropdown-menu">--}}
{{--                                    <a class="dropdown-item" href="about.html">About</a>--}}
{{--                                    <a class="dropdown-item" href="terms.html">Terms</a>--}}
{{--                                    <a class="dropdown-item" href="privacy.html">Privacy Policy</a>--}}
{{--                                    <a class="dropdown-item" href="job.html">Career</a>--}}
{{--                                </div>--}}
                            </li>
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    Pages--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu">--}}
{{--                                    <a class="dropdown-item" href="404.html">404 Page</a>--}}
{{--                                    <a class="dropdown-item" href="search.html">Search Page</a>--}}
{{--                                </div>--}}
{{--                            </li>--}}

                            <li class="nav-item">
                                <a class="nav-link" href="{{route('contact')}}">Contact</a>
                            </li>

                        </ul>
                        <div class="nav-search ml-auto d-none d-lg-block">
                            <span id="search">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </nav>

            </div>
        </div>
    </div>
    <form class="site-search" method="get">
        <input type="text" id="searchInput" name="site_search" placeholder="Enter Keyword Here..." autofocus="">
        <div class="search-close">
            <span class="close-search">
                <i class="fa fa-times"></i>
            </span>
        </div>
    </form>
</div>


