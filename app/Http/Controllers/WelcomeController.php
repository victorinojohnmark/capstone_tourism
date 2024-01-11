<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class WelcomeController extends Controller
{
    public function index()
    {
        $beaches = User::verified()->where('business_type', 'Beach Resort')->get();
        $restaurants = User::verified()->where('business_type', 'Restaurant')->get();
        $products = User::verified()->where('business_type', 'Products and Delicacies')->get();

        // dd(count($beaches));
        
        return view('welcome', [
            'beaches' => $beaches,
            'restaurants' => $restaurants,
            'products' => $products
        ]);
    }
}
