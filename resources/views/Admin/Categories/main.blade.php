@extends('Admin.Layouts.app')

@section('title', 'Категории')

@section('content')
    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1>Список категорий</h1>
        <br>
{{--        <a href="{{ route('editCategories') }}" class="btn btn-info">Добавить категорию</a>--}}
        <a href="{{ route('adminAddCategories') }}" class="btn btn-info">Добавить категорию</a>
        <br><br><br>
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Наименование</th>
                <th>Описание</th>
{{--                <th>Дата добавления</th>--}}
                <th>Действия</th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->title}}</td>
                    <td>{{$category->description}}</td>
{{--                <td>{{$category->created_at->format('d-m-Y H:i')}}</td>--}}
                    <td><a href="{{route('adminEditCategories', ['id' => $category ->id] )}}">Редактировать</a> || <a href="javascript:;" class="delete" rel="{{$category->id}}">Удалить</a></td>
{{--                    <a href="javascript:;" class="delete" rel="{{$categories->id}}">Удалить</a></td>--}}
                </tr>
            @endforeach
        </table>
    </main>
@endsection;


@section('delete')
    <script>
        $(function(){
            $(".delete").on('click', function () {
                if(confirm("Вы действительно хотите удалить эту категорию ?")) {
                    let id = $(this).attr("rel");
                    $.ajax({
                        type: "DELETE",
                        url: "{!! route('adminDeleteCategories') !!}",
                        data: {_token:"{{csrf_token()}}", id:id},
                        complete: function() {
                            alert("Категория удалена");
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
