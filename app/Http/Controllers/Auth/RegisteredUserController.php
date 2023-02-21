<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

use App\Models\Role;
use Storage;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'contact_primary' => ['required'],
            'id_type' => ['required'],
            'id_number' => ['required'],
            'email' => ['required', 'confirmed', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);
        
        $id_document = $request->file('id_document');
        $proxy_id = $request->file('proxy_id');
        $proof_of_residence = $request->file('proof_of_residence');
        $brm = $request->file('brm');
        $vat_registration = $request->file('vat_registration');
        
        if($id_document){
            $id_url = Storage::disk('public')->putFile('documents', $id_document);  
        }
        
        
        if($proxy_id){
            $proxy_url = Storage::disk('public')->putFile('documents', $proxy_id);
        }
        
        if($proof_of_residence){
            $proof_url = Storage::disk('public')->putFile('documents', $proof_of_residence);
        }
        
        if($brm){
        
            $brm_url = Storage::disk('public')->putFile('documents', $brm);
        }
        
        if($vat_registration){
            $vat_url = Storage::disk('public')->putFile('documents', $vat_registration);
        }
    
        $role = Role::where('name', 'user')->first();
        $user = User::create([
            'role_id' => $role->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'contact_primary' => $request->contact_primary,
            'contact_secondary' => $request->contact_secondary,
            'id_type' => $request->id_type,
            'id_number' => $request->id_number,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'proxy_id' => $proxy_url,
            'proof_of_residence' => $proof_url,
            'brm' => $brm_url,
            'vat_registration' => $vat_url,
            'id_document' => $id_url,
            'status' => 'In-Active'
        ]);

        event(new Registered($user));

        Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
        return redirect('register/step2');
    }
}
