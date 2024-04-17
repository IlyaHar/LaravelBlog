<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page-title')</title>
    @vite('resources/css/app.css')
</head>
<body>
<header class="container">
    <span class="logo">Blog Spot</span>
    <nav>
        <a href="{{ route('index') }}">Главная</a>
        <a href="{{ route('about') }}">Про нас</a>
        <a href="{{ route('add_article')}}">Добавить статью</a>
        <a href="{{ route('blog') }}">Блог</a>
        <a href="{{ route('shop') }}">Товары</a>
    </nav>
</header>
<main class="container">
    @include('blocks.messages')
    @yield('content')
</main>
<footer>Все права защищены</footer>
</body>
</html>
