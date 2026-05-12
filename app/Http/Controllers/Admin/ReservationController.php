<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Car;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // Метод для відображення списку оренд на окремій сторінці (опціонально)
    public function index()
    {
        $activeReservations = Reservation::with(['user', 'car.details'])
            ->where('Status', 'Active')
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('admin.reservations.index', compact('activeReservations'));
    }

    // Метод для зняття авто з бронювання
    public function completeReturn($id)
    {
        $reservation = Reservation::findOrFail($id);
        
        if (strtolower($reservation->Status) === 'completed') {
            return redirect()->back()->with('error', 'Ця оренда вже була закрита.');
        }

        $reservation->update(['Status' => 'Completed']);
        
        $car = Car::where('NumberPlate', $reservation->NumberPlate)->first();
        if ($car) {
            $car->update(['Status' => 'Available']);
        }

        return redirect()->back()->with('success', 'Автомобіль успішно відв\'язано від клієнта та повернуто в автопарк!');
    }
}