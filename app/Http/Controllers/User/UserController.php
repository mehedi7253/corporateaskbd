<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $page_name = 'My Profile';
        return view('user.index', compact('page_name'));
    }
    public function edit(){
        $page_name = "Update Profile";
        $user_data = Auth::user();
        return view('user.profile.edit', compact('user_data', 'page_name'));
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'first_name'   => 'required | regex:/^[a-zA-Z-.\s]+$/',
            'last_name'    => 'required | regex:/^[a-zA-Z-.\s]+$/',
            'phone'        => 'required|min:11|max:11 | regex:/^[-0-9\+]+$/',
            'gender'       => 'required',
            'birth_date'   => 'required',
            'organization' => 'required | regex:/^[a-zA-Z0-9-.\s]+$/',
            'designation'  => 'required | regex:/^[a-zA-Z0-9-.\s]+$/',
            'address'      => 'required',
            'image'        => 'mimes:jpg,png,jpeg|max:7048'
        ],[
            'first_name.required'          => 'please Enter First Name',
            'first_name.regex'             => 'Please Enter Only Character Value',
            'last_name.required'           => 'please Enter Last Name',
            'last_name.regex'              => 'Please Enter Only Character Value',
            'phone.required'               => 'please Enter Phone Number',
            'phone.min'                    => 'Phone Number Must Be 11 Digit',
            'phone.max'                    => 'Phone Number Must Be 11 Digit',
            'phone.regex'                  => 'Phone Number Must Be 11 Digit Long Numeric Value',
            'gender.required'              => 'Please Select One',
            'birth_date.required'          => 'please Enter Date Of Birth',
            'organization.required'        => 'please Enter Organization Name',
            'designation.required'         => 'please Enter Designation',
            'address.required'             => 'please Enter address',
            'image.mimes'                  => 'Image Must Be jpg, jpeg, png'
        ]);

        $profile = Auth::user();
        $profile->first_name    = $request->first_name;
        $profile->last_name     = $request->last_name;
        $profile->phone         = $request->phone;
        $profile->gender        = $request->gender;
        $profile->address       = $request->address;
        $profile->birth_date    = $request->birth_date;
        $profile->organization  = $request->organization;
        $profile->designation   = $request->designation;

        if($request->image == ''){
            // $office->update($request->all());
            // $office->save();
        }else{
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extension;
                $file->move('user/images/', $fileName);
                $profile->image = $fileName;
            } else {
                return $request;
                $profile->image = '';
            }
        }
        $profile->save();
        return redirect()->route('user.index')->with('message','Profile Update Successful');

    }

    public function changePass(){
        $page_name = "Change Your Password";
        $users = User::find(Auth::user()->id);
        return view('user.profile.change-password', compact('page_name'));
    }

    public function store(Request $request){
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

       return back()->with('message','Password Change Successful');
    }
}
