<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $accountTypes = ['Tourist', 'Vendor'];
        $businessType = ['Beach Resort', 'Restaurant', 'Products and Delicacies'];

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'contact_no' => ['required', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'type' => ['required', Rule::in($accountTypes)],
            'business_type' => ['nullable', Rule::in($businessType)],
            'business_name' => ['nullable', 'max:255']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'contact_no' => $data['contact_no'],
            'password' => Hash::make($data['password']),
            'type' => $data['type'],
            'is_on_hold' => $data['type'] == 'Tourist' ? false : true,
            'business_type' => $data['type'] == 'Tourist' ? null : $data['business_type'] ?? null,
            'business_name' => $data['type'] == 'Tourist' ? null : $data['business_name'] ?? null,
        ]);
    }

    // public function register(Request $request)
    // {
    //     $validator = $this->validator($request->all());

    //     if ($validator->fails()) {
    //         return redirect()->back()
    //             ->withErrors($validator)
    //             ->withInput();
    //     }

    //     $user = $this->create($request->all());

    //     // You can add custom logic here after successful registration if needed

    //     return redirect($this->redirectPath());
    // }
}
