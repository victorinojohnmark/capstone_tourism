<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BusinessInformationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('user')->group(function () {
        Route::get('/about-us', [BusinessInformationController::class, 'show'])->name('user.business.show');
        Route::post('/about-us', [BusinessInformationController::class, 'store'])->name('user.business.store');
        Route::post('/about-us/{information}', [BusinessInformationController::class, 'update'])->name('user.business.update');

    });
});
