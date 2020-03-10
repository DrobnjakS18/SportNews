<div class="trending-bar-dark hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="trending-bar-title">Breaking Sports News</h3>
                <div class="trending-news-slider">
                    @if($nav->count() > 0 )
                        @foreach($nav->sortBy('created_at')->take(5) as $post)
                        <div class="item">
                            <div class="post-content">
                                <h2 class="post-title title-sm">
                                    <a href="{{route('post',[ucfirst($post->category->name),$post->slug])}}">{{substr($post->title,0,50).'...'}}</a>
                                </h2>
                            </div>
                        </div>
                        @endforeach
                    @endif
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
                        <img src="{{asset('storage/images/logo.png')}}" alt="logo"> <!-- Replace Logo Here -->
                    </a>
                </div>
                <!-- End Logo -->
            </div>
            <div class="col-12 col-lg-9">
                <div class="top-ad-banner d-flex justify-content-center justify-content-lg-end ">
                    @if(Auth::check())
                        @switch(Auth::user()->role->name)
                            @case("author")
                                <a class="username-button mt-n2" href="{{route('author',Auth::user()->slug)}}">
                                    <img class="img-fluid user-profile-image-small" src="{{asset('storage/images/'.Auth::user()->profile_picture)}}" alt="profile">
                                    <span class="pl-2 account-name">{{ Auth::user()->name }}</span>
                                </a>
                                @break
                            @case("user")
                                <a class="username-button mt-n2" href="" data-toggle="modal" data-target="#modalUserAccount">
                                    <img class="img-fluid" src="{{asset('storage/images/'.Auth::user()->profile_picture)}}" alt="profile">
                                    <span class="pl-2 account-name">{{ Auth::user()->name }}</span>
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
                    @endif
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
                        <img src="{{asset('storage/images/footer-logo.png')}}" alt="logo">
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
                                <a class="nav-link" href="{{route('category','Esports')}}">ESPORTS</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Post
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('post.create')}}">Create Post</a>
                                </div>
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
    <form action="{{route('search')}}" class="site-search" method="POST">
        @csrf
        <input type="text" id="searchInput" name="search" placeholder="Enter Keyword Here..." autofocus="">
        <div class="search-close">
            <span class="close-search">
                <i class="fa fa-times"></i>
            </span>
        </div>
    </form>
</div>


