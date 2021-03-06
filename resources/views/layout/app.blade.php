<!DOCTYPE html>
<html lang="pl">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{env('GOOGLE_ANALYTICS')}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{env('GOOGLE_ANALYTICS')}}');
    </script>
    @yield('title')
    <meta charset="utf-8">
    @yield('description')
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/app.css">
    <script src="https://use.fontawesome.com/3146a59c2d.js"></script>
    @stack('beforeScript')
</head>
<body>
<div class="container-fluid">
        @include('layout.nav')

        @yield('content')

        @include('layout.footer')
</div>
<script src="./js/app.js"></script>
@stack('afterScripts')
</body>
</html>