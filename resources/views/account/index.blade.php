@extends('layouts.app')

@section('title', 'Аккаунт')

@section('content')
    <h2>Привет, {{\Auth::user()->email}}</h2>
    <br>
    @if(\Auth::user()->isAdmin == 1)
        <a href="{{ route('adminHome') }}">В админку</a><br>
    @endif
    <br>
    <a href="{{ route('index') }}">На сайт</a>
    <br>
    <br>
    <a href="{{ route('logout') }}">Выйти</a>
    <br><br>

    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h4>Мои комментарии</h4>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Статья</th>
                    {{--                    <th>Пользователь</th>--}}
                    <th>Коммент</th>
                    <th>Дата добавления</th>
                    <th>Действие</th>
                </tr>
                </thead>

                <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>{{$comment->id}}</td>
                        <td>{{_article($comment->article_id)->title ?? 'Такой статьи нет'}}</td>
                        {{--                        <td>{{_user($comment->user_id)->email}}</td>--}}
                        <td>{{$comment->comment}}</td>
                        <td>{!! $comment->created_at->format('d-m-Y H:i') !!}</td>
                        <td><a href="javascript:;" class="delete" rel="{{$comment->id}}">Удалить</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection

@section('delete')
    <script>
        $(function(){
            $(".delete").on('click', function () {
                if(confirm("Вы действительно хотите удалить этот комментарий ?")) {
                    let id = $(this).attr("rel");
                    $.ajax({
                        type: "DELETE",
                        url: "{!! route('deleteComment') !!}",
                        data: {_token:"{{csrf_token()}}", id:id},
                        complete: function() {
                            alert("Комментарий удалён");
                            location.reload();
                        }
                    });
                }else{
                    alertify.error("Дествие отменено пользователем");
                }
            });
        });
    </script>
@endsection
