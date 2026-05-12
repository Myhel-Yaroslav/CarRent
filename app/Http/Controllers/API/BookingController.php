<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Reservation;
use App\Models\Car;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'NumberPlate' => 'required|string|exists:car,NumberPlate',
            'DateFrom' => 'required|date',
            'DateTo' => 'required|date|after:DateFrom',
        ]);

        $car = Car::where('NumberPlate', $request->NumberPlate)->first();
        
        $rawStatus = Str::lower($car->Status ?? '');
        $isAvailable = Str::contains($rawStatus, 'avail') || Str::contains($rawStatus, 'доступ');

        if (!$car || !$isAvailable) {
            return response()->json([
                'message' => 'Цей автомобіль зараз недоступний для бронювання.'
            ], 422);
        }

        $reservation = Reservation::create([
            'user_id' => auth()->id(), 
            'NumberPlate' => $request->NumberPlate,
            'DateFrom' => $request->DateFrom,
            'DateTo' => $request->DateTo,
            'Status' => 'Active',
            'StartMileageAtRent' => 0,
            'EndMileageAtEnd' => 0,
        ]);

        if ($car) {
            $car->update(['Status' => 'rented']); 
        }

        return response()->json([
            'message' => 'Автомобіль успішно заброньовано!',
            'reservation' => $reservation
        ], 201);
    }

    public function userReservations(Request $request) 
    {
        $active = Reservation::where('user_id', auth()->id())
            ->where('Status', 'Active')
            ->with(['car.details'])
            ->get();

        $history = Reservation::where('user_id', auth()->id())
            ->where('Status', 'completed')
            ->with(['car.details'])
            ->get();

        return response()->json([
            'active' => $active,
            'history' => $history
        ]);
    }
}