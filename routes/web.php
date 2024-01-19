<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BusinessInformationController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AccountController;

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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/vendors', [VendorController::class, 'index'])->name('vendor-list');
Route::get('/vendors/{vendor}', [VendorController::class, 'show'])->name('vendor-show');
// Route::get('/about-ternate', function() {
//     return view('about-ternate');
// })->name('about-ternate');

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('user')->group(function () {
        Route::get('/about-us', [BusinessInformationController::class, 'show'])->name('user.business.show');
        Route::post('/about-us', [BusinessInformationController::class, 'store'])->name('user.business.store');
        Route::post('/about-us/{information}', [BusinessInformationController::class, 'update'])->name('user.business.update');

        Route::get('/galleries', [GalleryController::class, 'index'])->name('user.gallery.index');
        Route::post('/galleries', [GalleryController::class, 'store'])->name('user.gallery.store');
        Route::delete('/galleries/{gallery}', [GalleryController::class, 'destroy'])->name('user.gallery.destroy');
        Route::post('/galleries/{gallery}', [GalleryController::class, 'setDefault'])->name('user.gallery.setDefault');

        Route::get('/profile', [ProfileController::class, 'view'])->name('user.profile.view');
        Route::post('/profile/update', [ProfileController::class, 'update'])->name('user.profile.update');
    });

    Route::prefix('admin')->group(function () {
        Route::get('/accounts', [AccountController::class, 'index'])->name('admin.account.index');
        Route::delete('/accounts/{user}', [AccountController::class, 'destroy'])->name('admin.account.delete');
    });

});
