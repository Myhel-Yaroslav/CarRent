<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\Admin\CarController as AdminCarController;

// Користувацька частина
Route::get('/', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');

// Адмін-панель
Route::get('/admin/cars', [AdminCarController::class, 'index'])->name('admin.cars.index');
Route::get('/admin/cars/{car}', [AdminCarController::class, 'show'])->name('admin.cars.show');
Route::delete('/admin/cars/{car}', [AdminCarController::class, 'destroy'])->name('admin.cars.destroy');

// Маршрут для оновлення вартості
Route::put('/admin/cars/{car}/update-price', [AdminCarController::class, 'updatePrice'])->name('admin.cars.updatePrice');