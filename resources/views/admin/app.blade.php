<!DOCTYPE html>
<html lang="{{ \App::getLocale() }}">

@include('admin.common.head')

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        @include('admin.partials.sidebar')

        @include('admin.partials.topNavigation')

        @yield('content')

        @include('admin.partials.footer')

        @include('admin.common.scripts')

        Page Specific Scripts

        @yield('scripts')
    </div>
</div>
</body>
</html>
