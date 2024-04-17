@extends('layout.main')

@section('page-title')Главная@endsection
@section('content')
    <div class="presentation"></div>
    <div class="articles">
        @foreach($articles as $el)
            <div class="post">
                <h2>{{ $el->title }}</h2>
                <p>{{ $el->anons }}</p>
                <a href="{{ route('show_article', $el->id) }}">Прочитать</a>
            </div>
        @endforeach
    </div>
@endsection
