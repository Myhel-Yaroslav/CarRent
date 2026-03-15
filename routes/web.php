<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\Admin\CarController as AdminCarController;

//Публічні маршрути
Route::get('/', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');

Route::get('/dashboard', function () {

    if (auth()->user()->is_admin) {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('cars.index');
})->middleware(['auth'])->name('dashboard');

//Група адмін-панелі
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