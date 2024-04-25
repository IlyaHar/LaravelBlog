@extends('layout.main')
@section('page-title')Регистрация@endsection
@section('content')
    <h1>Регистрация</h1>
    <a href="/" class="back-button">На главную</a>
    <form method="POST" action="{{ route('register') }}" class="article-form" novalidate>
        @csrf

        <label for="name">Имя</label>
        <input id="name" type="text"  name="name" value="{{ old('name') }} " autocomplete="name">

        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email">

        <label for="password" >Пароль</label>
        <input id="password" type="password" name="password" value="{{ old('password') }}" autocomplete="new-password">

        <label for="password-confirm" >Подтверждение пароля</label>
        <input id="password-confirm" name="password_confirmation" type="password" value="{{ old('password_confirmation') }}" autocomplete="new-password">

        <input type="submit" value="Зарегистрироваться" style="width: 170px">
    </form>
@endsection
