<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Reservation\StoreReservationRequest;

use App\Models\Reservation;

class APIReservationController extends Controller
{
    public function index(Request $request)
    {

    }

    public function store(StoreReservationRequest $request)
    {
        // dd($request->all());
        $reservation = Reservation::create($request->all());
        return response()->json($reservation, 201);
    }

    public function show(Request $request, Reservation $reservation)
    {

    }
}
