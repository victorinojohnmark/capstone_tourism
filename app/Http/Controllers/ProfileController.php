<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class ProfileController extends Controller
{
    public function view()
    {
        return view('user.profile.profileview', [
            'user' => auth()->user()
        ]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $accountTypes = ['Tourist', 'Vendor'];
        $businessType = ['Beach Resort', 'Restaurant', 'Products and Delicacies'];

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'contact_no' => ['required', 'max:255'],
            'type' => ['required', Rule::in($accountTypes)],
            'business_type' => [
                Rule::when($request->input('type') == 'Vendor', ['required', Rule::in($businessType)]),
                'nullable',
            ],
            'business_name' => [
                Rule::when($request->input('type') == 'Vendor', 'required|max:255'),
                'nullable',
            ],
        ]);

        // if ($data['password']) {
        //     $data['password'] = bcrypt($data['password']);
        // } else {
        //     unset($data['password']);
        //     unset($data['password_confirmation']);
        // }

        if($data['type'] == 'Tourist') {
            $data['business_type'] = null;
            $data['business_name'] = null;
        }

        $user->update($data);

        return redirect()->route('user.profile.view')->with('success', 'Profile Updated Successfully');
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user();

        //check current password if match

        if(!Hash::check($request->input('current_password'), $user->password)) {
            return back()->withErrors(['current_password' => 'Current password does not match']);
        }

        $data = $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        
        

        $user->fill($data);
        $user->save();

        return redirect()->route('user.profile.view')->with('success', 'Password Updated Successfully');
    }
}
