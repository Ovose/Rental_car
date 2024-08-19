<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TableController;
// начальнвй экран
Route::get('/', [HomeController::class, 'index'])->name('home');

//  about
Route::get('/about', [AboutController::class, 'show'])->name('about');

// Маршруты для работы с таблицами
Route::get('/tables', [TableController::class, 'list'])->name('tables');
Route::get('/table/{table}', [TableController::class, 'data'])->name('table_data');
Route::get('/table/{table}/create', [TableController::class, 'create'])->name('create_row');
Route::post('/table/{table}/store', [TableController::class, 'store'])->name('store_row');
Route::get('/table/{table}/edit/{id}', [TableController::class, 'edit'])->name('edit_row');
Route::post('/table/{table}/update/{id}', [TableController::class, 'update'])->name('update_row');
Route::post('/table/{table}/delete/{id}', [TableController::class, 'destroy'])->name('delete_row');
