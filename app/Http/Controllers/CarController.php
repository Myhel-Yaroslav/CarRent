<?php

namespace App\Http\Controllers;

class CarController extends Controller
{
    // Простий список авто
    public function index() {
        $cars = ['Toyota Camry', 'BMW X5', 'Tesla Model 3', 'Audi A6'];
        return "Наш автопарк: " . implode(', ', $cars);
    }

    // Інфо про одне авто
    public function show($id) {
        return "Ви дивитесь автомобіль під номером: " . $id;
    }
}