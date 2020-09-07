<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">myBlog</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('index') }}">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">О нас</a>
                </li>
                <li class="nav-item">
                    @if(!\Auth::user() == 1)
                        <a class="nav-link" href="{{ route('login') }}">Авторизоваться</a>
                    @else
                        <a class="nav-link" href="{{ route('account') }}">В аккаунт</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
