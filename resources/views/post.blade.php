@extends('layouts.app')

@section('title', 'Статья')

@section('content')

    <header class="masthead">
{{--                style="background-image: url('img/post-bg.jpg')--}}
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>{!! $article->title !!}</h1>
{{--                        <h2 class="subheading">{!! $article->short_text !!}</h2>--}}
                        <span class="meta">Опубликовал
              <a href="#">{!! $article->author !!}</a>
              в {!! $article->created_at->format('H:i - d-m-Y') !!}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    {!! $article->full_text !!}
                </div>
                @foreach($comments as $comment)
                    <h5>Комментарии:</h5>
                    <div class="comment" style="border:1px solid #004085;">
                        <p>{{_user($comment->user_id)->email}}:</p>
                        <p>{!! $comment->comment !!}</p>
                    </div>
                @endforeach
                <br><br>
                <hr>
                <br>



                @if(\Auth::check())
                    <form method="post" action="{{ route('addComments') }}">
                        @csrf
                        <input type="hidden" value="{{$article->id}}" name="article_id">
                        <p>Комментарий
                            <textarea class="form-control" cols="60" rows="5" name="comment"></textarea></p>
                        <br>
                        <button type="submit" class="btn btn-success" style="cursor: pointer">Добавить каментарий</button>
                    </form>
                @endif
            </div>
        </div>
    </article>

    <hr>

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
                </div>
            </div>
        </div>
    </footer>
@endsection
