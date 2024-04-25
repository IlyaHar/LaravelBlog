@extends('layout.main')

@section('page-title'){{ $article->title }}@endsection
@section('content')
    <h1>{{ $article->title }} / Статья на Blog Spot</h1>
    <a href="/" class="back-button">На главную</a>
    <div class="articles one">
        <div class="post">
            <img src="/storage/img/articles/{{ $article->image }}" alt="">
            <h2>{{ $article->title }}</h2>
            <p>{{ $article->anons }}</p><br>
            <p>{!! $article->text !!}</p>
            <p><b>Автор: </b>{{ $article->user->name }}</p>
            @auth()
                @if(Auth::user()->id === $article->author_id)
                    <br><hr>
                    <a href="{{ route('edit_article', $article->id) }}">Изменить</a>
                    {!! Form::open(['method' => 'DELETE', 'action' => ['App\Http\Controllers\ArticleController@destroy', $article->id]]) !!}
                    {{ Form::submit('Удалить', ['class' => 'delete-button']) }}
                    {!! Form::close() !!}
                @endif
            @endauth
        </div>
    </div>
    @foreach($article->comments as $el)
        <div class="comment-block">
            <div>
                <p><strong>{{ $el->user->name }}</strong></p>
                <p>{{ $el->text }}</p>
            </div>
            @auth()
                @if(Auth::user()->id === $el->user_id)
            <div class="comment-actions">
                {!! Form::open(['method' => 'DELETE', 'action' => ['App\Http\Controllers\CommentController@destroy', $article->id, $el->id]]) !!}
                {{ Form::submit('Удалить', ['class' => 'delete-comment']) }}
                {!! Form::close() !!}
            </div>
                @endif
            @endauth
        </div>
    @endforeach
    @auth()
    {!! Form::open(['method' => 'POST', 'class' => 'article-form', 'action' => ['App\Http\Controllers\CommentController@store', $article->id]]) !!}
    {!! Form::label('comment', 'Комментарий') !!}
    {!! Form::textarea('comment', '', ['placeholder' => 'Введите текст комментария']) !!}
    {{ Form::submit('Добавить', ['class' => 'add-button']) }}
    {!! Form::close() !!}
        @else
        <p class="some-text"><b>Что бы оставить комментарий авторизируйтесь в аккаунт</b></p>
    @endauth
@endsection

