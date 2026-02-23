<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    private $cars = [
        1 => ['brand' => 'Toyota', 'model' => 'Camry', 'year' => 2022],
        2 => ['brand' => 'BMW', 'model' => 'X5', 'year' => 2021],
        3 => ['brand' => 'Tesla', 'model' => 'Model 3', 'year' => 2023],
        4 => ['brand' => 'Audi', 'model' => 'A6', 'year' => 2020]
    ];

    public function index()
    // Показати список автомобілів
    {
        return view('index', ['cars' => $this->cars]);
    }

    // Показати деталі конкретного автомобіля
    public function show($id)
    {
        if (isset($this->cars[$id])) {
            $car = $this->cars[$id];
            return view('show', compact('car', 'id'));
        }

        abort(404, 'Автомобіль не знайдено');
    }
}