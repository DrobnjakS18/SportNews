<!doctype html>
<html lang="{{ \App::getLocale() }}">
@include('common.head')
<body>

    <div class="loading" delay-hide="50000"></div>

    @include('common.nav')
            @yield('content')
    @include('common.footer')

    @include('common.script')
    @yield('scripts')
</body>
</html>
