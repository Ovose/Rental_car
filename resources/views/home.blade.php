@extends('layouts.app')

@section('title', 'Аренда автомобилей')

@section('content')
<div class="container">
    <h1>Добро пожаловать в сервис аренды автомобилей</h1>
    <p>Мы предлагаем широкий выбор автомобилей на любой вкус и бюджет. Найдите идеальный автомобиль для ваших нужд.</p>
    
    <div class="car-selection">
        <h2>Наши автомобили</h2>
        <div class="car-list">
            @foreach ($cars as $car)
                <div class="car-item">
                    <h3>{{ $car->model }}</h3>
                    <p>{{ $car->description }}</p>
                    <a href="{{ route('cars.show', $car->id) }}" class="btn">Подробнее</a>
                </div>
            @endforeach
        </div>
    </div>
    
    <div class="contact-info">
        <h2>Свяжитесь с нами</h2>
        <p>Телефон: +123123213123</p>
        <p>Email: info@rental-car.local</p>
    </div>
</div>
@endsection
