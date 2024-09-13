@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Забронировать автомобиль</h1>

        <form action="{{ route('rentals.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="car_id" class="form-label">Выберите автомобиль</label>
                <select id="car_id" name="car_id" class="form-select" required>
                    @foreach($cars as $car)
                        <option value="{{ $car->id }}">{{ $car->make }} {{ $car->model }} ({{ $car->year }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">Дата начала</label>
                <input type="date" id="start_date" name="start_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">Дата окончания</label>
                <input type="date" id="end_date" name="end_date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Забронировать автомобиль</button>
        </form>

        <h2>Ваши аренды</h2>

        @if($rentals->isEmpty())
            <p>У вас нет текущих аренд.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Автомобиль</th>
                        <th>Дата начала</th>
                        <th>Дата окончания</th>
                        <th>Статус</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rentals as $rental)
                        <tr>
                            <td>{{ $rental->car->make }} {{ $rental->car->model }}</td>
                            <td>{{ $rental->start_date }}</td>
                            <td>{{ $rental->end_date }}</td>
                            <td>{{ $rental->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
