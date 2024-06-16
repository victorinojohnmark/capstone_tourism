<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\APIReservationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware(['auth'])->group(function () {
    Route::middleware(['checkAccountStatus'])->group(function () {

        Route::get('/reservations', [APIReservationController::class, 'index'])->name('api.reservation.index');
        Route::post('/reservations', [APIReservationController::class, 'store'])->name('api.reservation.store');

    });
    
    
});