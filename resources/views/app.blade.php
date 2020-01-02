<!doctype html>
<html lang="{{ \App::getLocale() }}">
@include('common.head')
<body>
    @include('common.nav')
            @yield('content')
    @include('common.footer')
    @include('common.script')
    @yield('scripts')
</body>
</html>
