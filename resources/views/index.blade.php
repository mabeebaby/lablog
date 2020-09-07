@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    <header class="masthead">
        {{--        style="background-image: url('img/home-bg.jpg')"--}}
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Мой блог</h1>
                        <span class="subheading">Тема блога от Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                @foreach($articles as $article)
                    <div class="post-preview">
                        <a href="{!! route('showArticle', [
                       'id'   => $article->id,
                       'slug' => str_slug($article->title)
                    ]) !!}">
                            <h2 class="post-title">
                                {!! $article->title !!}
                            </h2>
                            <h3 class="post-subtitle">
                                {!! $article->short_text !!}
                            </h3>
                        </a>
                        <p class="post-meta">Опубликовал
                            <a href="#">{!! $article->author !!}</a>
                            в {!! $article->created_at->format('H:i - d-m-Y') !!}</p>
                    </div>
                @endforeach
                <hr>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Павлуша &copy; Вебсайт 2020</p>
                </div>
            </div>
        </div>
    </footer>
@endsection
