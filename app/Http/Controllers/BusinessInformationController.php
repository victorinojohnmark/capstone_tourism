<?php

namespace App\Http\Controllers;

use App\Models\BusinessInformation;
use Illuminate\Http\Request;

class BusinessInformationController extends Controller
{
    
    public function index()
    {
       
    }

    public function store(Request $request)
    {
        //
    }

    public function show(BusinessInformation $businessInformation)
    {
        return view('user.business-information.business-information-view', [
            'information' => auth()->user()->information
        ]);
    }

    public function update(Request $request, BusinessInformation $businessInformation)
    {
        //
    }
}
