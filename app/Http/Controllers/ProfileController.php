<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
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

        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
            unset($data['password_confirmation']);
        }

        if($data['type'] == 'Tourist') {
            $data['business_type'] = null;
            $data['business_name'] = null;
        }

        $user->update($data);

        return redirect()->route('user.profile.view')->with('success', 'Profile Updated Successfully');
    }
}
