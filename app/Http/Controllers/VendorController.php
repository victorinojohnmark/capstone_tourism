<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class VendorController extends Controller
{
    public function index(Request $request)
    {
        $users = User::notOnHold()->vendor()
        ->where(function($query) use($request){
            if($request->query('type')) {
                $query->where('business_type', $request->query('type'));
            }
        })->get();

        return view('user.vendor.index', [
            'users' => $users
        ]);
    }

    public function show(User $vendor)
    {
        if($vendor->is_on_hold) {
            return abort(404) ;
        }
        return view('user.vendor.view', [
            'user' => $vendor
        ]);
    }
}
