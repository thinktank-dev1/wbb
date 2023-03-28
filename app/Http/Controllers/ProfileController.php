<?php

namespace App\Http\Controllers;

use Session;
use Request;
use Validator;
use Hash;
use Auth;
use App\Models\User;
use App\Models\Lot;
use Illuminate\Support\Facades\Storage as Storage;

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
            'registration_number' => 'required_with:password',
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
        
        $id_document = Request::file('id_document');
        $proxy_id = Request::file('proxy_id');
        $proof_of_residence = Request::file('proof_of_residence');
        $brm = Request::file('brm');
        $vat_registration = Request::file('vat_registration');
        
        $cipro = Request::file('vat_registration');
        $company_letter_head = Request::file('vat_registration');
        
        if($cipro){
            if($usr->cipro){
               Storage::disk('public')->delete($usr->cipro); 
            }
            $cipro_url = Storage::disk('public')->putFile('documents', $cipro);  
            $usr->cipro = $cipro_url;
        }
        
        if($company_letter_head){
            if($usr->company_letter_head){
               Storage::disk('public')->delete($usr->company_letter_head); 
            }
            $company_letter_head_url = Storage::disk('public')->putFile('documents', $company_letter_head);  
            $usr->company_letter_head = $company_letter_head_url;
        }
        
        if($id_document){
            if($usr->id_document){
               Storage::disk('public')->delete($usr->id_document); 
            }
            
            $id_url = Storage::disk('public')->putFile('documents', $id_document);  
            $usr->id_document = $id_url;
        }
        
        if($proxy_id){
            if($usr->proxy_id){
                Storage::disk('public')->delete($usr->proxy_id);   
            }
            $proxy_url = Storage::disk('public')->putFile('documents', $proxy_id);
            $usr->proxy_id = $proxy_url;
        }
        
        if($proof_of_residence){
            if($usr->proof_of_residence){
             Storage::disk('public')->delete($usr->proof_of_residence);   
            }
            
            $proof_url = Storage::disk('public')->putFile('documents', $proof_of_residence);
            $usr->proof_of_residence = $proof_url;
        }
        
        if($brm){
            if($usr->brm){
              Storage::disk('public')->delete($usr->brm); 
            }
            
            $brm_url = Storage::disk('public')->putFile('documents', $brm);
            $usr->brm = $brm_url;
        }
        
        if($vat_registration){
            if($usr->vat_registration){
              Storage::disk('public')->delete($usr->vat_registration);  
            }
            
            $vat_url = Storage::disk('public')->putFile('document', $vat_registration);
            $usr->vat_registration = $vat_url; 
        }
        $usr->save();

        $usr->company->company_name = Request::input('company_name');
        $usr->company->company_type = Request::input('company_type');
        $usr->company->registration_number = Request::input('registration_number');
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
