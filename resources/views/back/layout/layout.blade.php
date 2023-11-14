<!doctype html>
<html class="no-js " lang="en">
<head>
@include('back.sections.head')
</head>

<body class="theme-blush">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="{{ asset('back/images/loader.svg') }}" width="48" height="48" alt="Aero"></div>
        <p>Please wait...</p>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>


@include('back.sections.right_side')

@include('back.sections.left_side')


@yield('content')

@include('back.sections.script')
</body>
</html>