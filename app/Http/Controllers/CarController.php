<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index() 
    {
        // Завантажуємо автомобілі з їхніми назвами
        $cars = Car::with('details')->get();
        return view('index', compact('cars'));
    }

    public function show($id) 
    {
        // Шукаємо за номером і підтягуємо назву бренду/моделі
        $car = Car::with('details')->where('NumberPlate', $id)->firstOrFail();
        return view('show', compact('car'));
    }
}