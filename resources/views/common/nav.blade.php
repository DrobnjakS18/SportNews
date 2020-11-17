<div class="trending-bar-dark hidden-xs">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-2 px-0" style="margin-top: 0.3rem;">
                <h3 class="trending-bar-title">Breaking Sports News</h3>
            </div>
            <div class="col-md-6 my-2 my-0 pl-md-0 text-md-left">
                <div class="trending-news-slider">
                    @if($nav->count() > 0 )
                        @foreach($nav->sortBy('created_at')->take(5) as $post)
                        <div class="item">
                            <div class="post-content">
                                <h2 class="post-title title-sm">
                                    <a href="{{route('post',[ucfirst($post->category->name),$post->slug])}}">{{substr($post->title,0,100).'...'}}</a>
                                </h2>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-md-4 top-nav-social-lists text-lg-left d-flex align-items-center">
                <ul class="list-unstyled">
                    <li class="navbar-social d-flex justify-content-around d-lg-block text-center">
                        <button class="button" data-sharer="facebook"  data-url="{{Request::url()}}"><i class="fa fa-facebook"></i></button>
                        <button class="button" data-sharer="twitter" data-title="Sports News" data-url="{{Request::url()}}"><i class="fa fa-twitter"></i></button>
                        <button class="button" data-sharer="linkedin" data-url="{{Request::url()}}"><i class="fa fa-linkedin"></i></button>
                        <button class="button" data-sharer="pinterest" data-url="{{Request::url()}}"><i class="fa fa-pinterest"></i></button>
                        <button class="button" data-sharer="email" data-title="Sports News" data-url="{{Request::url()}}" data-subject="Sports News" data-to=""><i class="fa fa-envelope"></i></button>
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
                        <img src="{{asset('images/logo.png')}}" alt="Sports News logo"> <!-- Replace Logo Here -->
                    </a>
                </div>
                <!-- End Logo -->
            </div>
            <div class="col-12 col-lg-9">
                <div class="top-ad-banner d-flex justify-content-center justify-content-lg-end align-items-baseline ">
                    @auth
                        @switch(Auth::user()->role->name)
                            @case("author")
                                <a class="username-button mt-n2" href="{{route('author.profile',Auth::user()->slug)}}">
                                    <img class="img-fluid user-profile-image-small" src="{{Auth::user()->profile_picture}}" alt="Sports News profile image">
                                    <span class="pl-2 account-name d-none d-md-inline">{{ Auth::user()->name }}</span>
                                </a>
                                @break
                            @case("user")
                                <a class="username-button mt-n2" href="" data-toggle="modal" data-target="#modalUserAccount">
                                    <img class="img-fluid" src="{{Auth::user()->profile_picture}}" alt="Sports News profile image">
                                    <span class="pl-2 account-name d-none d-md-inline">{{ Auth::user()->name }}</span>
                                </a>
                                @break
                            @case("admin")
                                NAPRAVITI LINK ZA ADMINA
                                @break
                            @default
                                @break;
                            @endswitch
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
                    @endauth
                </div>
            </div>
        </div>
    </div>
</header>


<div class="main-navbar clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg site-main-nav navigation">
                    <a class="navbar-brand d-lg-none" href="{{route('home')}}">
                        <img src="{{asset('images/footer-logo.png')}}" alt="Sport News logo">
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
                                <a class="nav-link" href="{{route('category','Tennis')}}">Tennis</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{route('category','Esports')}}">ESPORTS</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{route('about')}}">
                                    About
                                </a>
                            </li>
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
    <form action="{{route('search')}}" class="site-search" method="GET">
        @csrf
        <input type="text" id="searchInput" name="search" placeholder="Enter Keyword Here..." autofocus="">
        <div class="search-close">
            <span class="close-search">
                <i class="fa fa-times"></i>
            </span>
        </div>
    </form>
</div>


