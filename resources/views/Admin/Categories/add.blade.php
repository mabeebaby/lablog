@extends('Admin.Layouts.app')

@section('title', 'Добавление категорий')

@section('content')
    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1>Добавить категорию</h1>
        <br>
        <form method="post">
            @csrf
            <p>Введите наименование категории:<br><input type="text" name="title" class="form-control" required></p>
            <p>Введите текст категории:<br><textarea name="description" class="form-control"></textarea></p>
            <button type="submit" class="btn btn-success">Добавить категорию</button>
        </form>
    </main>
@endsection
