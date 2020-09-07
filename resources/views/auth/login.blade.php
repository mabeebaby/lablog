@extends('auth.authLayouts.app')

@section('title', 'Авторизация')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Signin Template for Bootstrap</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/signin/">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset ('adminStyles/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
    <link href="{{ asset ('css/signin.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <form class="form-signin" method="post">
        @csrf
        <h2 class="form-signin-heading">Авторизуйтесь</h2>
        <label for="inputEmail" class="sr-only">Email адрес</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email адрес" required autofocus>
        <label for="inputPassword" class="sr-only">Пароль</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Пароль" required>
        <div class="checkbox">
            <label>
{{--                <input type="checkbox" name="remember" value="1" >  Запомнить--}}
                <a class="nav-link" href="{{ route('register') }}">Зарегистрироваться</a>
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
    </form>
</div> <!-- /container -->
</body>
</html>
@endsection
