<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\Admin\CarController as AdminCarController;

// 1. Публічні маршрути
Route::get('/', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');

// 2. Маршрут, який шукає Breeze (Виправляє помилку Route [dashboard] not defined)
Route::get('/dashboard', function () {
    // Якщо користувач адмін — в адмінку, якщо ні — в каталог
    if (auth()->user()->is_admin) {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('cars.index');
})->middleware(['auth'])->name('dashboard');

// 3. Група адмін-панелі (закрита через middleware auth)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminCarController::class, 'dashboard'])->name('dashboard');
    Route::get('/cars', [AdminCarController::class, 'index'])->name('cars.index');
    Route::get('/cars/create', [AdminCarController::class, 'create'])->name('cars.create');
    Route::post('/cars', [AdminCarController::class, 'store'])->name('cars.store');
    Route::get('/cars/{car}', [AdminCarController::class, 'show'])->name('cars.show');
    Route::delete('/cars/{car}', [AdminCarController::class, 'destroy'])->name('cars.destroy');
    Route::put('/cars/{car}/update-price', [AdminCarController::class, 'updatePrice'])->name('cars.updatePrice');
});

require __DIR__.'/auth.php';