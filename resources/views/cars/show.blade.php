@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $car->make }} {{ $car->model }}</h1>
        <p><strong>Год:</strong> {{ $car->year }}</p>
        <p><strong>Регистрационный номер:</strong> {{ $car->registration_number }}</p>
        <p><strong>Цена за день:</strong> {{ $car->price_per_day }}</p>

    </div>
@endsection
