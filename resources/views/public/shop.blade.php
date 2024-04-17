@extends('layout.main')

@section('page-title')Блог@endsection
@section('content')
    @foreach($shop as $el)
        <div class="blog-block">
            <h2>{{ $el->title }}</h2>
            <p>{{ $el->anons }}</p><br>
            <p>{{ $el->price }} рублей</p>
            <a href="{{ route('show_product', $el->id) }}"><button class="blog-btn">Детальнее</button></a>
        </div>
    @endforeach
@endsection
