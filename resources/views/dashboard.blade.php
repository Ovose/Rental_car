@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome, {{ Auth::user()->name }}!</h1>
        <div class="list-group">
            <a href="{{ route('rentals.index') }}" class="list-group-item list-group-item-action">Аренда автомобиля</a>
            <a href="{{ route('cars.index') }}" class="list-group-item list-group-item-action">Автомобили</a>
        </div>
    </div>
@endsection
