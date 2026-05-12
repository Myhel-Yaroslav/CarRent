<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public function dashboard() {
        $stats = [
            'total' => Car::count(), 
            'available' => Car::where('Status', 'Available')->count()
        ];
        
        $activeReservations = \App\Models\Reservation::with(['user', 'car.details'])
            ->where('Status', 'Active')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.dashboard', compact('stats', 'activeReservations'));
    }

    public function index() {
        $cars = Car::all();
        return view('admin.index', compact('cars'));
    }

    public function create() {
        return view('admin.create');
    }
// Зберігання нового автомобіля в базі даних
    public function store(Request $request) {
        $validated = $request->validate([
            'NumberPlate' => 'required|unique:car,NumberPlate|max:8',
            'ModelID'     => 'required|integer',
            'Year'        => 'required|integer|min:1900|max:2026',
            'PricePerDay' => 'required|numeric|min:0.01',
            'Status'      => 'required|string',
            'Conditionn'  => 'required|string|max:50',
        ]);

        Car::create($validated);

        return redirect()->route('admin.cars.index')->with('success', 'Автомобіль успішно додано!');
    }

    public function show(Car $car) {
        return view('admin.show', compact('car'));
    }

    public function destroy(Car $car) {
        DB::transaction(function () use ($car) {
            DB::table('reservation')->where('NumberPlate', $car->NumberPlate)->delete();
            DB::table('technicalinspection')->where('NumberPlate', $car->NumberPlate)->delete();
            $car->delete();
        });

        return redirect()->route('admin.cars.index')->with('success', 'Автомобіль видалено!');
    }
// Оновлення вартості оренди
    public function updatePrice(Request $request, Car $car) {
        $request->validate(['PricePerDay' => 'required|numeric|min:0.01']);
        $car->update(['PricePerDay' => $request->PricePerDay]);
        return redirect()->back()->with('success', 'Ціну оновлено!');
    }
}