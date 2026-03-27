<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarController;

// Отримати всі автомобілі
Route::get('/cars', [CarController::class, 'index']);

// Отримати конкретний автомобіль за номером 
Route::get('/cars/{id}', [CarController::class, 'show']);

// Додати новий автомобіль
Route::post('/cars/store', [CarController::class, 'store']);

// Редагувати автомобіль
Route::put('/cars/{id}', [CarController::class, 'update']);

// Видалити автомобіль
Route::delete('/cars/{id}', [CarController::class, 'destroy']);