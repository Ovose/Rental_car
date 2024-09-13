<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProtectedController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request; // Добавь это
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\RentalController;

// Маршруты для автомобилей
Route::get('/cars', [CarController::class, 'index']);
Route::get('/cars/{id}', [CarController::class, 'show']);

// Маршруты для аренд
Route::get('/rentals', [RentalController::class, 'index']);
Route::get('/rentals/{id}', [RentalController::class, 'show']);


Route::post('/register', [RegisterController::class, 'register']);
// Вход
Route::post('login', [LoginController::class, 'login']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/protected-data', [ProtectedController::class, 'showProtectedData']);

