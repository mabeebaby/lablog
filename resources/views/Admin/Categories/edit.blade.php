@extends('Admin.Layouts.app')

@section('title', 'Редактирование категорий')

@section('content')
    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1>Редактировать категорию</h1>
        <br>
        <form method="post">
            @csrf
            <p>Введите наименование категории:<br><input type="text" name="title" class="form-control" value="{{$categories->title}}" required></p>
            <p>Введите текст категории:<br><textarea name="description" class="form-control" value="{{$categories->description}}"></textarea></p>
            <button type="submit" class="btn btn-success">Редактировать</button>
        </form>
    </main>
@endsection
