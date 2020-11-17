<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>

{{--    <link rel="apple-touch-icon" sizes="180x180" href="https://cdn.unlimited3d.com/assets/favicon/apple-touch-icon.png">--}}
{{--    <link rel="icon" type="image/png" sizes="32x32" href="https://cdn.unlimited3d.com/assets/favicon/favicon-32x32.png">--}}
{{--    <link rel="icon" type="image/png" sizes="16x16" href="https://cdn.unlimited3d.com/assets/favicon/favicon-16x16.png">--}}
{{--    <link rel="manifest" href="https://cdn.unlimited3d.com/assets/favicon/site.webmanifest">--}}
{{--    <link rel="mask-icon" href="https://cdn.unlimited3d.com/assets/favicon/safari-pinned-tab.svg" color="#5bbad5">--}}
{{--    <meta name="msapplication-TileColor" content="#da532c">--}}
{{--    <meta name="theme-color" content="#ffffff">--}}
    {{--SEO Optimization--}}

    <meta name="description" content="@yield('description')">
    <meta name="copyright" content="Stefan Drobnjak" />
    <meta name="author" content="Stefan Drobnjak">

    {{--Open graph--}}
    <meta property="og:title" content="@yield('title')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ Request::url() }}">
    <meta property="og:image" content="@yield('og-image')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:site_name" content="SportsNews">

    {{-- Twitter Card--}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="SportsNews">
    <meta name="twitter:creator" content="@sportsnews">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('description')">
    <meta name="twitter:image" content="@yield('og-image')">

@yield('style')

<!-- Theme CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('gentelella/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/vendors/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/vendors/switchery/dist/switchery.min.css') }}" rel="stylesheet">

    <link href="{{ asset('gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/vendors/iCheck/skins/all.css') }}" rel="stylesheet">

    <link href="{{ asset('gentelella/build/css/custom.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
