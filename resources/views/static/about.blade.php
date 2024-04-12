@extends('layout.main')

@section('page-title')Про нас@endsection
@section('content')
    <div class="block">
        <h1>Про нас</h1>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus sint incidunt voluptate a? Reprehenderit, harum in? Nemo rem, repellendus, nostrum quisquam nisi consectetur doloribus omnis accusamus saepe reiciendis culpa laboriosam!</p>

        @if(count($params) > 0)
            <ul>
                @foreach($params as $el)
                    <li>{{ $el }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
