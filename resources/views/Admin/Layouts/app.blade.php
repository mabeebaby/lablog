<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset ('adminStyles/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('adminStyles/css/dashboard.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
</head>
<body>
@include('Admin.Includes.header')
@include('Admin.Includes.leftSection')
@yield('content')
<script src="{{ asset('js/jquery.min.js') }}"></script>
@yield('delete')
</body>
</html>
