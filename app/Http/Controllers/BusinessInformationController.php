<?php

namespace App\Http\Controllers;

use App\Models\BusinessInformation;
use Illuminate\Http\Request;

use App\Http\Requests\StoreInformationRequest;
use App\Http\Requests\UpdateInformationRequest;

class BusinessInformationController extends Controller
{
    
    public function index()
    {
       
    }

    public function store(StoreInformationRequest $request)
    {
        array_push($request->validated, [
            'user_id' => auth()->user()->id
        ]);

        $information = BusinessInformation::create($request->validated());

        return redirect()->route('user.business.show')->with('success', 'About us content created successfully.');
    }

    public function show()
    {
        return view('user.business-information.business-information-view', [
            'information' => auth()->user()->information
        ]);
    }

    public function update(UpdateInformationRequest $request, BusinessInformation $information)
    {
        $information->fill($request->validated());
        $information->save();

        return redirect()->route('user.business.show')->with('success', 'About us content updated successfully.');
    }
}
