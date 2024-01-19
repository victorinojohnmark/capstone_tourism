<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $restaurants = 0;
        $resorts = 0;
        $products = 0;
        $touristCount = 0;

        if(auth()->user()->type == 'Admin') {
            $restaurants = User::restaurantAccounts()->count();
            $resorts = User::beachAccounts()->count();
            $products = User::productAccounts()->count();
            $touristCount = User::tourist()->count();
        }
        return view('home', [
            'restaurants' => $restaurants,
            'resorts' => $resorts,
            'products' => $products,
            'touristCount' => $touristCount
        ]);
    }
}
