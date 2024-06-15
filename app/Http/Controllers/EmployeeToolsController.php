<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Reservation;

class EmployeeToolsController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        $cars = Car::all();
        return view('employee.tools', compact('reservations', 'cars'));
    }

    public function updateReservationStatus(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = $request->input('status');
        $reservation->save();

        return redirect()->route('employee.tools')->with('success', 'Status rezerwacji zaktualizowany.');
    }

    public function destroyReservation($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('employee.tools')->with('success', 'Rezerwacja usunięta.');
    }
}
