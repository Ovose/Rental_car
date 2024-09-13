@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Аренда №{{ $rental->id }}</h1>
        <p>Пользователь ID: {{ $rental->user_id }}</p>
        <p>Автомобиль ID: {{ $rental->car_id }}</p>
        <p>Дата начала: {{ $rental->start_date }}</p>
        <p>Дата окончания: {{ $rental->end_date }}</p>
        <a href="{{ route('rentals.index') }}">Вернуться к списку</a>
        <a href="{{ route('rentals.edit', $rental->id) }}">Редактировать</a>
        <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
    </div>
@endsection
