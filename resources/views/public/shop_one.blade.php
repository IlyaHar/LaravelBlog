@extends('layout.main')

@section('page-title')Блог@endsection
@section('content')
        <div class="blog-block">
            <h2>{{ $shop->title }}</h2>
            <p>{{ $shop->anons }}</p><br>
            <p>{{ $shop->price }} рублей</p>
            <a href=""><button class="new-btn">Купить</button></a>
        </div>
@endsection
