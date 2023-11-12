<!DOCTYPE html>
<html lang="en">
<head>
    @include('front.sections.head')
    @yield('custom_css')
</head>
<body>

    @include('front.sections.header')

    @yield('content')

    @include('front.sections.footer')


    @include('front.sections.script')
    @yield('custom_js')
</body>
</html>