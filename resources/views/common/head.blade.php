<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title')</title>

{{--    IKONICE --}}
    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('images/logo_48X48.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logo_32X32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logo_16X16.png') }}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#a42828">
    {{--SEO Optimization--}}

    <meta name="description" content="@yield('description')">
    <meta name="copyright" content="Stefan Drobnjak"/>
    <meta name="author" content="Stefan Drobnjak">

    {{--Open graph--}}
    <meta property="og:title" content="@yield('title')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ Request::url() }}">
    <meta property="og:image" content="@yield('og-image')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:site_name" content="SportNews">

    {{-- Twitter Card--}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="SportNews">
    <meta name="twitter:creator" content="@SportNews">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('description')">
    <meta name="twitter:image" content="@yield('og-image')">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('style')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('fonts/css/font-awesome.min.css')}}">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="{{asset('plugins/slick-carousel/slick.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/slick-carousel/slick-theme.css')}}">
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('tags-input/dist/jquery.tagsinput.min.css') }}" rel="stylesheet">
    <!-- Quill Snow Theme included stylesheets -->
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">


    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
