<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\ReservationController as AdminReservationController;
use App\Http\Middleware\AdminMiddleware; // Імпортуємо прямий клас для надійності

// Публічні маршрути
Route::get('/', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');

Route::get('/dashboard', function () {
    if (auth()->user() && auth()->user()->is_admin) {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('cars.index');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    
    // Основні маршрути для машин
    Route::get('/', [AdminCarController::class, 'dashboard'])->name('dashboard');
    Route::get('/cars', [AdminCarController::class, 'index'])->name('cars.index');
    Route::get('/cars/create', [AdminCarController::class, 'create'])->name('cars.create');
    Route::post('/cars', [AdminCarController::class, 'store'])->name('cars.store');
    Route::get('/cars/{car}', [AdminCarController::class, 'show'])->name('cars.show');
    Route::delete('/cars/{car}', [AdminCarController::class, 'destroy'])->name('cars.destroy');
    Route::put('/cars/{car}/update-price', [AdminCarController::class, 'updatePrice'])->name('cars.updatePrice');
    Route::get('/contacts', [AdminContactController::class, 'index'])->name('contacts');
    
    // Маршрути для управління резерваціями
    Route::get('/reservations', [AdminReservationController::class, 'index'])->name('reservations.index');
    Route::post('/reservations/{id}/complete', [AdminReservationController::class, 'completeReturn'])->name('reservations.complete');
});

require __DIR__.'/auth.php';