@extends('auth.authLayouts.app')

@section('title', 'Регистрация')

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

    <div class="container">
        <form class="form-signin" method="post">
            @csrf
            <h2 class="form-signin-heading">Регистрация</h2>
            <label for="inputEmail" class="sr-only">Email адрес</label>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email адрес" required autofocus>
            <label for="inputPassword" class="sr-only">Пароль</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Пароль" required>
            <label for="inputPassword" class="sr-only">Повторите пароль</label>
            <input type="password" id="inputPassword" name="password_confirmation" class="form-control" placeholder="Повторите пароль" required>
            <div class="checkbox">
                <label>
{{--                    <input type="checkbox" name="remember" value="1" >  Запомнить--}}
                    <a class="nav-link" href="{{ route('login') }}">Войти</a>
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" href="{{ route('account') }}">Регистрация</button>
        </form>
    </div> <!-- /container -->
@endsection
