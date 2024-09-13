@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Автомобили</h1>
        <div class="list-group">
            @foreach($cars as $car)
                <a href="{{ route('cars.show', $car->id) }}" class="list-group-item list-group-item-action">
                    {{ $car->make }} {{ $car->model }} ({{ $car->year }})
                </a>
            @endforeach
        </div>
    </div>
@endsection
