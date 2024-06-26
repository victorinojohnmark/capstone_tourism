<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class WelcomeController extends Controller
{
    public function index()
    {
        $beaches = User::verified()->notOnHold()->beachAccounts()->get();
        $restaurants = User::verified()->notOnHold()->restaurantAccounts()->get();
        $products = User::verified()->notOnHold()->productAccounts()->get();

        // dd(count($beaches));
        
        return view('welcome', [
            'beaches' => $beaches,
            'restaurants' => $restaurants,
            'products' => $products
        ]);
    }

    public function showMessage($userid = null)
    {
        // dd('hello');
        return view('messages.message-index', [
            'userid' => $userid
        ]);
    }
}




