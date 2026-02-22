<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AboutController;

Route::get('/', [MainController::class, 'index']);
Route::get('/cars', [CarController::class, 'index']);
Route::get('/cars/{id}', [CarController::class, 'show']);
Route::get('/about', [AboutController::class, 'index']);