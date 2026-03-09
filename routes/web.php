<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\Admin\CarController as AdminCarController;
// головна сторінка з переліком авто
Route::get('/', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');

// Сторінка адміністрування
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminCarController::class, 'dashboard'])->name('dashboard');
    Route::get('/cars', [AdminCarController::class, 'index'])->name('cars.index');
    Route::get('/cars/create', [AdminCarController::class, 'create'])->name('cars.create');
    Route::post('/cars', [AdminCarController::class, 'store'])->name('cars.store');
    Route::get('/cars/{car}', [AdminCarController::class, 'show'])->name('cars.show');
    Route::delete('/cars/{car}', [AdminCarController::class, 'destroy'])->name('cars.destroy');
    Route::put('/cars/{car}/update-price', [AdminCarController::class, 'updatePrice'])->name('cars.updatePrice');
});