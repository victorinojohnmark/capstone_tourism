<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

use App\Models\Reservation;
use App\Notifications\ReservationApprovedNotification;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $reservations = auth()->user()->is_beach_resort_owner ? auth()->user()->clientReservations : auth()->user()->reservations;
        
        return view('reservation.reservation-list', [
            'reservations' => $reservations
        ]);
    }

    public function destroy(Request $request, Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->back()->with('success', 'Reservation deleted successfully');
    }

    public function approve(Request $request, Reservation $reservation)
    {
        $reservation->is_approved = true;
        $reservation->save();

        Notification::send($reservation->tourist, new ReservationApprovedNotification($reservation));
        return redirect()->back()->with('success', 'Reservation approved successfully');
    }
    
   
}
