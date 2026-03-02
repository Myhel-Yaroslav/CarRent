<?php

namespace App\Http\Controllers;

use App\Models\Car;

class CarController extends Controller
{
    public function index() {
        $cars = Car::all();
        return view('index', compact('cars'));
    }

    public function show(Car $car) {
        return view('show', compact('car'));
    }
}