@extends('layout.main')

@section('page-title')Добавление статьи@endsection
@section('content')
    <h1>Добавление статьи</h1>
    <a href="/" class="back-button">На главную</a>
    {{ Form::open(['class' => 'article-form']) }}
        {{ Form::label('title', 'Название статьи') }}
        {{ Form::text('title', '', ['placeholder' => 'Введите название статьи']) }}

        {{ Form::label('anons', 'Анонс статьи') }}
        {{ Form::textarea('anons', '', ['placeholder' => 'Введите анонс статьи']) }}

        {{ Form::label('text', 'Основной текст статьи') }}
        {{ Form::textarea('text', '', ['placeholder' => 'Введите текст статьи', 'id' => 'editor']) }}

        {{ Form::submit('Добавить', ['class' => 'add-button']) }}

    {{ Form::close() }}
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector( '#editor' ));
    </script>
@endsection
