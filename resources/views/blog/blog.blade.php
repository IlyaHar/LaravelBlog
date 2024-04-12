@extends('layout.main')

@section('page-title')Блог@endsection
@section('content')
    @for($i = 0; $i < 5; $i++)
        <div class="blog-block">
            <h2>Запись на сайте</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium alias consequatur deserunt distinctio est ex impedit iste iusto.</p>
            <button class="blog-btn">Детальнее</button>
        </div>
    @endfor
@endsection
