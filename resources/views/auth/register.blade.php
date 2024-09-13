@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
<div class="container">
    <h1>Регистрация</h1>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label for="name">Имя</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Электронная почта</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
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
            <label for="password_confirmation">Подтвердите пароль</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>

        <div class="form-group">
            <button type="submit">Зарегистрироваться</button>
        </div>
    </form>
</div>
@endsection
