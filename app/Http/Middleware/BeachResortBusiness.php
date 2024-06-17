<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class BeachResortBusiness
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // Check if the user's account is on hold

            // dd(['is_tourist' => !Auth::user()->is_tourist, 'is_beach_owner' => !Auth::user()->is_beach_resort_owner]);
            if (!Auth::user()->is_tourist && !Auth::user()->is_beach_resort_owner) {
                abort(403);
            }

            // if (!Auth::user()->is_tourist) {
            //     abort(403);
            // }
        }


        return $next($request);
    }
}
