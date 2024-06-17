<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

use App\Notifications\ReservationCreatedNotification;

use App\Http\Requests\Reservation\StoreReservationRequest;
use App\Models\Reservation;

class APIReservationController extends Controller
{

    public function store(StoreReservationRequest $request)
    {
        $reservation = Reservation::create($request->all());
        Notification::send($reservation->vendor, new ReservationCreatedNotification($reservation));

        return response()->json($reservation, 201);
    }

}
