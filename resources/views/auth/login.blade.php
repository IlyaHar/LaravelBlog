@extends('layout.main')
@section('page-title')Авторизация@endsection
@section('content')
    <h1>Авторизация</h1>
    <a href="/" class="back-button">На главную</a>
    <form method="POST" action="{{ route('login') }}" class="article-form">
        @csrf
        <label for="email">Email</label>
        <input id="email" type="email"  name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

        <label for="password">Пароль</label>
        <input id="password" type="password" name="password"  value="{{ old('password') }}" >

        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label for="remember">Запомнить меня</label>

        <input type="submit" value="Войти" class="login-btn">

        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
    </form>
@endsection
