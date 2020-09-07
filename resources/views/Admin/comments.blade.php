@extends('Admin.Layouts.app')

@section('title', 'Админ панель')

@section('content')
    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h2>Комментарии</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Статья</th>
                    <th>Пользователь</th>
                    <th>Коммент</th>
                    <th>Статус</th>
                    <th>Дата добавления</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>{{$comment->id}}</td>
                        <td>{{_article($comment->article_id)->title ?? 'Такой статьи нет'}}</td>
                        <td>{{_user($comment->user_id)->email}}</td>
                        <td>{{$comment->comment}}</td>
                        <td>@if($comment->status) Активен @else На модерации<br><a href="{{ route('acceptComments', ['id' => $comment->id]) }}">Одобрить</a> @endif</td>
                        <td>{!! $comment->created_at->format('d-m-Y H:i') !!}</td>
                        <td><a href="javascript:" class="delete" rel="{{$comment->id}}">Удалить</a></td>
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
