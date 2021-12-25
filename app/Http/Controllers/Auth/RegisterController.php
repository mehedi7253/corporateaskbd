<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

        return Validator::make($data, [
            'first_name'   => ['required', 'string', 'max:255','regex:/^[a-zA-Z-.\s]+$/'],
            'last_name'    => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z-.\s]+$/'],
            'email'        => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'        => ['required', 'string', 'min:11', 'max:11','regex:/^[-0-9\+]+$/'],
            'gender'       => ['string', 'max:255'],
            'birth_date'   => ['string', 'max:255'],
            'organization' => ['string', 'max:255'],
            'designation'  => ['string', 'max:255'],
            'address'      => ['string', 'max:255'],
            'password'     => 'required|string|min:7|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        ],[
            'first_name.required'          => "please Enter First Name",
            'first_name.regex'             => 'Please Enter Only Character Value',
            'last_name.required'           => "please Enter Last Name",
            'last_name.regex'              => 'Please Enter Only Character Value',
            'email.required'               => 'Please Enter Email Address',
            'email.unique'                 => "This Email Already Registered",
            'phone.required'               => "please Enter Phone Number",
            'phone.min'                    => "Phone Number Must Be 11 Digit",
            'phone.max'                    => "Phone Number Must Be 11 Digit",
            'phone.regex'                  => "Phone Number Must Be 11 Digit Long Numeric Value",
            'gender.required'              => "Please Select One",
            'birth_date.required'          => "please Enter Date Of Birth",
            'organization.required'        => "please Enter Organization Name",
            'designation.required'         => "please Enter Designation",
            'address.required'             => "please Enter address",
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
            'first_name'   => $data['first_name'],
            'last_name'    => $data['last_name'],
            'email'        => $data['email'],
            'phone'        => $data['phone'],
            'birth_date'   => $data['birth_date'],
            'organization' => $data['organization'],
            'designation'  => $data['designation'],
            'address'      => $data['address'],
            'password'     => Hash::make($data['password']),
            'role'         => '2',
            'status'       => '0',
        ]);
    }
}
