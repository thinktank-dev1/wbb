<?php

namespace App\Http\Controllers;

use Session;
use Request;
use Validator;
use Hash;
use Auth;
use App\Models\User;
use App\Models\Lot;

class ProfileController extends Controller
{
    public function index(){
        $user = User::find(Auth::user()->id);
        return view('pages.account.profile', compact('user'));
    }

    public function updateProfile(){
        $valid = Validator::make(Request::all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_primary' => 'required',

            'password' => 'sometimes|nullable|string|min:6',
            'password_confirmation' => 'sometimes|required_with:password|same:password',

            'company_name' => 'required',
            'company_type' => 'required',
            'company_registration_number' => 'required_with:password',
            'contact_number' => 'required',
            'email' => 'required',
            'street' => 'required',
            'suburb' => 'required',
            'city' => 'required',
            'code' => 'required',
        ]);
        if($valid->fails()){
            return back()->withErrors($valid)->withInput();
        }
        $usr = User::find(Auth::user()->id);
        $usr->first_name = Request::input('first_name');
        $usr->last_name = Request::input('last_name');
        $usr->contact_primary = Request::input('contact_primary');
        $usr->contact_secondary = Request::input('contact_secondary');
        if(Request::input('password') != ""){
            $usr->password = Hash::make(Request::input('password'));
        }
        $usr->save();

        $usr->company->company_name = Request::input('company_name');
        $usr->company->company_type = Request::input('company_type');
        $usr->company->company_registration_number = Request::input('company_registration_number');
        $usr->company->contact_number = Request::input('contact_number');
        $usr->company->email = Request::input('email');
        $usr->company->street = Request::input('street');
        $usr->company->suburb = Request::input('suburb');
        $usr->company->city = Request::input('city');
        $usr->company->code = Request::input('code');
        $usr->company->save();

        Session::flash('message', 'Profile has been updated');
        return back();

    }
}
