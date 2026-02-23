<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class MainController extends Controller
{
    public function index(): View
    {
        // Тестові Дані
        $cars = [
            1 => ['brand' => 'Toyota', 'model' => 'Camry', 'year' => 2022],
            2 => ['brand' => 'BMW', 'model' => 'X5', 'year' => 2021],
            3 => ['brand' => 'Tesla', 'model' => 'Model 3', 'year' => 2023],
            4 => ['brand' => 'Audi', 'model' => 'A6', 'year' => 2020]
        ];

        return view('index', compact('cars'));
    }
}