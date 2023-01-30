<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use Auth;
use App\Models\Company;
use App\Models\CompanyPayment;

class RegisterController extends Controller
{
    public function showStep2(){
        return view('auth.register_step_2');
    }

    public function saveStep2(){
        $valid = Validator::make(Request::all(),[
            'company_name' => 'required',
            'company_type' => 'required',
            'company_registration_number' => 'required',
            'contact_number' => 'required',
            'email' => 'required|email',
            'street' => 'required',
            'suburb' => 'required',
            'city' => 'required',
            'code' => 'required'
        ]);
        if($valid->fails()){
            return back()->withErrors($valid)->withInput();
        }

        $cmp = Company::create([
            'user_id' => Auth::user()->id,
            'company_name' => Request::input('company_name'),
            'company_type' => Request::input('company_type'),
            'company_registration_number' => Request::input('company_registration_number'),
            'contact_number' => Request::input('contact_number'),
            'email' => Request::input('email'),
            'street' => Request::input('street'),
            'suburb' => Request::input('suburb'),
            'city' => Request::input('city'),
            'code' => Request::input('code')
        ]);
        Auth::user()->company_id = $cmp->id;
        Auth::user()->save();

        return redirect('register/step3');
    }

    public function showStep3(){
        return view('auth.register_step_3');
    }

    public function saveStep3(){
        $valid = Validator::make(Request::all(), [
            'vat_number' => 'required',
            'street' => 'required',
            'suburb' => 'required',
            'city' => 'required',
            'code' => 'required'
        ]);
        if($valid->fails()){
            return back()->withErrors($valid)->withInput();
        }

        CompanyPayment::create([
            'company_id' => Auth::user()->company->id,
            'vat_number' => Request::input('vat_number'),
            'street' => Request::input('street'),
            'suburb' => Request::input('suburb'),
            'city' => Request::input('city'),
            'code' => Request::input('code')
        ]);

        return redirect('dashboard');
    }
}
