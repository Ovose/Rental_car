@extends('layouts.app')

@section('title', 'Book a Car')

@section('content')
<div class="container">
    <h1>Book a Car</h1>

    <form id="bookingForm">
        @csrf
        <div class="form-group">
            <label for="car_id">Select Car</label>
            <select id="car_id" name="car_id" class="form-control">
                @foreach ($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->model }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input id="start_date" type="date" name="start_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="end_date">End Date</label>
            <input id="end_date" type="date" name="end_date" class="form-control" required>
        </div>

        <button type="button" id="calculatePriceButton" class="btn btn-primary">Calculate Price</button>

        <div class="form-group mt-3">
            <label for="price">Total Price</label>
            <input id="price" type="text" class="form-control" readonly>
        </div>

        <button type="submit" class="btn btn-success">Book Now</button>
    </form>
</div>



