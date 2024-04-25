@extends('layout.main')
@section('page-title')Кабинет пользователя@endsection
@section('content')
    <div class="block">
        <h1>Кабинет пользывателя</h1>
        @if (session('status'))
            <div class="success-mess" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <p>Привет, {{ Auth::user()->name }}</p>
        <p>{{ Auth::user()->email }}</p>
    </div>
@if(count($articles) > 0)
        <div class="articles">
            @foreach($articles as $el)
                <div class="post">
                    <img src="/storage/img/articles/{{ $el->image }}" alt="">
                    <h2>{{ $el->title }}</h2>
                    <p>{{ $el->anons }}</p>
                    <p><b>Автор:</b> {{ $el->user->name }}</p>
                    <a href="{{ route('show_article', $el->id) }}">Прочитать</a>
                </div>
        @endforeach
        </div>
        @else
        <h3 class="some-text">Вы еще не создали не одной статьи - <a href="{{ route('add_article') }}">создать статью</a></h3>
    @endif
@endsection
