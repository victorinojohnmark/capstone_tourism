<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class WelcomeController extends Controller
{
    public function index()
    {
        $beaches = User::verified()->beachAccounts()->get();
        $restaurants = User::verified()->restaurantAccounts()->get();
        $products = User::verified()->productAccounts()->get();

        // dd(count($beaches));
        
        return view('welcome', [
            'beaches' => $beaches,
            'restaurants' => $restaurants,
            'products' => $products
        ]);
    }

    public function showMessage()
    {
        return view('messages.message-index');
    }
}




