<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Auth;

// Главная страница
Route::get('/', [HomeController::class, 'index'])->name('home');

// Страница с деталями автомобиля
Route::get('cars/{id}', [CarController::class, 'show'])->name('cars.show');

// Страница "О нас"
Route::get('/about', [AboutController::class, 'show'])->name('about');

// Регистрация
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Подтверждение почты
Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');
Route::post('/email/verification-notification', [VerificationController::class, 'resend'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.resend');

// Логин
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Личный кабинет (требует подтверждения почты)
Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Аренда автомобилей (требует авторизации)
Route::middleware(['auth'])->group(function () {
    Route::get('/rentals', [RentalController::class, 'index'])->name('rentals.index');
    Route::get('/rentals/create', [RentalController::class, 'create'])->name('rentals.create');
    Route::post('/rentals', [RentalController::class, 'store'])->name('rentals.store');
    Route::get('/rentals/calculate-price', [RentalController::class, 'calculatePrice'])->name('rentals.calculatePrice');
});

// Автомобили (доступно всем)
Route::get('cars', [CarController::class, 'index'])->name('cars.index');

// Laravel Auth Routes (если необходимо)
Auth::routes(['verify' => true]); // Убедитесь, что включена поддержка email подтверждения
