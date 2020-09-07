<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
            <!-- Custom fonts for this template -->
            <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
            <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
            <!-- Custom styles for this template -->
            <link href="{{ asset('css/clean-blog.min.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body>
    @if(!Request::is('account'))
        @include('Includes.header')
    @endif
            @yield('content')
            <script src="{{ asset('js/jquery.min.js') }}"></script>
            @yield('delete')
</body>
</html>
