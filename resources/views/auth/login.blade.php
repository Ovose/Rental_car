@extends('layouts.app')

@section('title', 'Вход')

@section('content')
<div class="container">
    <h1>Вход в систему</h1>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="email">Электронная почта</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Пароль</label>
            <input id="password" type="password" name="password" required>
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit">Войти</button>
        </div>

        <div class="form-group">
            <a href="{{ route('password.request') }}">Забыли пароль?</a>
        </div>
    </form>
</div>
@endsection
