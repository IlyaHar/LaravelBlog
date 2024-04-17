@extends('layout.main')

@section('page-title')Изменение статьи@endsection
@section('content')
    <h1>Изменение статьи</h1>
    <a href="/" class="back-button">На главную</a>
    {{ Form::open(['class' => 'article-form', 'method' => 'PUT']) }}
    {{ Form::label('title', 'Название статьи') }}
    {{ Form::text('title', $article->title, ['placeholder' => 'Введите название статьи']) }}

    {{ Form::label('anons', 'Анонс статьи') }}
    {{ Form::textarea('anons', $article->anons, ['placeholder' => 'Введите анонс статьи']) }}

    {{ Form::label('text', 'Основной текст статьи') }}
    {{ Form::textarea('text', $article->text, ['placeholder' => 'Введите текст статьи', 'id' => 'editor']) }}

    {{ Form::submit('Изменить', ['class' => 'add-button']) }}

    {{ Form::close() }}
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector( '#editor' ));
    </script>
@endsection
