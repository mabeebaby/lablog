<nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('adminCategories') }}">Категории</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('adminArticles') }}">Статьи</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('adminUsers') }}">Пользователи</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('comments') }}">Комментарии</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('account') }}">Аккаунт</a>
        </li>
    </ul>
</nav>
