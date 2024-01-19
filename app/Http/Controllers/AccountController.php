<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class AccountController extends Controller
{
    public function index(Request $request)
    {
       
        if($request->query('type') || $request->query('business_type')) {
            $users = User::verified()->where(function($query) use($request) {
                if($request->query('type')) {
                    $query->where('type', $request->query('type'));
                }

                if($request->query('business_type')) {
                    $query->where('business_type', $request->query('business_type'));
                }
            
            })->get();
        } else {
            $users = User::verified()->where('type', '!=', 'Admin')->get();
        }

        return view('account.index', [
            'users' => $users
        ]);
    }

    public function destroy(Request $request, User $user)
    {
        $user->delete();

        return redirect()->back()->with('sucess', 'Account has been deleted');
    }
}
