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
use Mail;

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
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'contact_primary' => ['required'],
            'id_type' => ['required'],
            'id_number' => ['required'],
            'email' => ['required', 'confirmed', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:6'],
            'proxy_id' => ['nullable', 'file', 'mimes:pdf,doc,docx,jpg,png'],
            'proof_of_residence' => ['nullable', 'file', 'mimes:pdf,doc,docx,jpg,png'],
            'brm' => ['nullable', 'file', 'mimes:pdf,doc,docx,jpg,png'], 
            'vat_registration' => ['nullable', 'file', 'mimes:pdf,doc,docx,jpg,png'],
            'id_document' => ['nullable', 'file', 'mimes:pdf,doc,docx,jpg,png'],
            'company_letter_head' => ['nullable', 'file', 'mimes:pdf,doc,docx,jpg,png'],
            'cipro' => ['nullable', 'file', 'mimes:pdf,doc,docx,jpg,png'],
        ]);
        
        
            $id_document = $request->file('id_document');
            $proxy_id = $request->file('proxy_id');
            $proof_of_residence = $request->file('proof_of_residence');
            $brm = $request->file('brm');
            $vat_registration = $request->file('vat_registration');
            $cipro = $request->file('cipro');
            $company_letter_head = $request->file('company_letter_head');
            
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
            
            if($cipro){
                $cipro_url = Storage::disk('public')->putFile('documents', $cipro);
            }
            
            if($company_letter_head){
                $company_letter_head_url = Storage::disk('public')->putFile('documents', $company_letter_head);
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
                'cipro' => $cipro_url,
                'company_letter_head' => $company_letter_head_url,
                'status' => 'In-Active'
            ]);
            
            //mailto:francois@webuybakkies.co.za and mailto:
            $data1 = [
                'name' => 'Francois',
                'user_name' => $request->first_name.' '.$request->last_name
            ];
            $data2 = [
                'name' => 'Jean',
                'user_name' => $request->first_name.' '.$request->last_name
            ];
            $data3 = [
                'name' => 'Wilson',
                'user_name' => $request->first_name.' '.$request->last_name
            ];
            
            $arr = [
                'francois@webuybakkies.co.za' => $data1,
                'jean@webuybakkies.co.za' => $data2,
                'wilson@thinktank.co.za' => $data3
            ];
            foreach($arr AS $k=>$v){
                Mail::send('mail.admin', $v, function($message) use($k, $v){
                    $message
                    ->to($k, $v['name'])
                    ->subject('New We Buy Bakkies Registration');
                    $message->from('info@webuybakkies.co.za','We Buy Bakkies');
                });
            }
    
            event(new Registered($user));
    
            Auth::login($user);
    
            // return redirect(RouteServiceProvider::HOME);
            return redirect('register/step2');
    }
}
