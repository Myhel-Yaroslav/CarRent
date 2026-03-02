<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index() {
        $cars = Car::all();
        return view('admin.index', compact('cars'));
    }
    public function show(Car $car) {
        return view('admin.show', compact('car'));
    }

    public function destroy(Car $car) {
        $car->delete();
        return redirect()->route('admin.cars.index')->with('success', 'Автомобіль видалено');
    }

    // Метод для зміни ціни
    public function updatePrice(Request $request, Car $car) {
        $request->validate([
            'PricePerDay' => 'required|numeric|min:0'
        ]);

        $car->update([
            'PricePerDay' => $request->PricePerDay
        ]);

        return redirect()->back()->with('success', 'Вартість оренди успішно оновлено!');
    }
}