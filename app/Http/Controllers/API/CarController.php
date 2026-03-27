<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
// Вивід список усіх авто
    public function index()
    {
        $cars = Car::with('details')->get();
        return response()->json([
            'status' => 'success',
            'data' => $cars
        ], 200);
    }

// Виводть дані про конкретне авто
    public function show($id)
    {
        $car = Car::with('details')->where('NumberPlate', $id)->first();

        if (!$car) {
            return response()->json(['message' => 'Автомобіль не знайдено'], 404);
        }

        return response()->json($car, 200);
    }

    // Додавання нового авто
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'NumberPlate' => 'required|unique:car,NumberPlate|max:8',
            'ModelID'     => 'required|integer',
            'Year'        => 'required|integer|min:1900|max:2026',
            'PricePerDay' => 'required|numeric',
            'Status'      => 'required|string',
            'Conditionn'  => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $car = Car::create($request->all());

        return response()->json([
            'message' => 'Автомобіль успішно створено',
            'car' => $car
        ], 201);
    }

    //Редагування інформації про авто
    public function update(Request $request, $id)
    {
        $car = Car::where('NumberPlate', $id)->first();

        if (!$car) {
            return response()->json(['message' => 'Автомобіль не знайдено'], 404);
        }

        $car->update($request->all());

        return response()->json([
            'message' => 'Дані оновлено',
            'car' => $car
        ], 200);
    }

    // Видалення авто
    public function destroy($id)
    {
        $car = Car::where('NumberPlate', $id)->first();

        if (!$car) {
            return response()->json(['message' => 'Автомобіль не знайдено'], 404);
        }

        $car->delete();

        return response()->json(['message' => 'Автомобіль видалено'], 200);
    }
}