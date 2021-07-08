<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.meta')

    <title>@yield('title') | e-Office</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="">
    <link rel="shortcut icon" type="image/x-icon" href="">

    @stack('before-style')
    <!-- style -->
    @include('includes.style')
    @stack('after-style')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-CQ3D5563GM"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-CQ3D5563GM');

    </script>
</head>

<body>

    @include('includes.header')
    @include('includes.sidebar')


    @yield('content')


    @include('includes.footer')

    @stack('before-script')
    <!-- script -->
    @include('includes.script')
    @stack('after-script')

</body>

</html>
