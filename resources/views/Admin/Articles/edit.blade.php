@extends('Admin.Layouts.app')

@section('title', 'Редактирование статей')

@section('content')

    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1>Редактировать статью</h1>
        <br>
        <form method="post">
            {!! csrf_field() !!}
            <p>Выбор категории (ий):<br><select name="categories" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
                </select> </p>
            <p>Название статьи:<br><input type="text" name="title" value="{{$article->title}}" class="form-control" required> </p>
            <p>Автор:<br><input type="text" name="author" value="{{$article->author}}" class="form-control" required> </p>
            <p>Короткий текст:<br><textarea name="short_text" class="form-control">{!! $article->short_text !!}</textarea></p>
            <p>Полный текст:<br><textarea name="full_text" class="form-control">{!! $article->full_text !!}</textarea></p>
            <button type="submit" href="{{ route("adminArticles") }}" class="btn btn-success" style="cursor: pointer; float: right;">Редактировать</button>
            <br><br>
        </form>
    </main>
@endsection









{{--@section('content')--}}
{{--    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">--}}
{{--        <h1>Редактировать статью</h1>--}}
{{--        <br>--}}
{{--        <form method="post">--}}
{{--            @csrf--}}
{{--            <p>Введите наименование категории:<br><input type="text" name="title" class="form-control" value="{{$categories->title}}" required></p>--}}
{{--            <p>Введите текст категории:<br><textarea name="description" class="form-control" value="{{$categories->description}}"></textarea></p>--}}
{{--            <button type="submit" class="btn btn-success">Редактировать</button>--}}
{{--        </form>--}}
{{--    </main>--}}
{{--@endsection--}}
