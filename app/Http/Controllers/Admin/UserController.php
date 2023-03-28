<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Storage as Storage;
use Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\Company;
use App\Models\CompanyPayment;
use Mail;
use App\Lib\SmsApi;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::whereDoesntHave('roles', function($q){
            return $q->where('name', 'su');
        })
        ->paginate(12);
        return view('admin.users.list', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('admin.users.create', ['user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_primary' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
        ]);
        if($valid->fails()){
            return back()->withErrors($valid)->withInput();
        }
        
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
            $vat_url = Storage::disk('public')->putFile('document', $vat_registration);
        }
        
        $cmp = null;
        if($request->input('company_name')){
            $cmp = Company::create([
                'company_name' => $request->input('company_name'),
                'company_type' => $request->input('company_type'),
                'registration_number' => $request->input('company_registration_number'),
                'contact_number' => $request->input('company_contact_number'),
                'email' => $request->input('company_email'),
                'street' => $request->input('street'),
                'suburb' => $request->input('suburb'),
                'city' => $request->input('city'),
                'province' => $request->input('province'),
                'code' => $request->input('code'),
            ]);
        }
        if($cmp && $request->has('payment_vat_number')){
            CompanyPayment::create([
                'company_id' => $cmp->id,
                'vat_number' => $request->input('payment_vat_number'),
                'street' => $request->input('payment_street'),
                'suburb' => $request->input('payment_suburb'),
                'city' => $request->input('payment_city'),
                'province' => $request->input('payment_province'),
                'code' => $request->input('payment_code'),
            ]);
        }

        $role = Role::where('name', 'user')->first();
        User::create([
            'role_id' => $role->id,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'contact_primary' => $request->input('contact_primary'),
            'contact_secondary' => $request->input('contact_secondary'),
            'id_type' => $request->input('id_type'),
            'id_number' => $request->input('id_number'),
            'company_id' => $cmp->id ?? null,
            'email'  => $request->input('email'),
            'password'  => Hash::make($request->input('password')),
            'proxy_id' => $proxy_url,
            'proof_of_residence' => $proof_url,
            'brm' => $brm_url,
            'vat_registration' => $vat_url,
            'id_document' => $id_url,
            'status' => 'In-Active'
        ]);
        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.view', ['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $valid = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_primary' => 'required',
            'password' => 'sometimes|confirmed',
        ]);
        if($valid->fails()){
            return back()->withErrors($valid)->withInput();
        }
    
        $cur_status = $user->status;
        
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->contact_primary = $request->input('contact_primary');
        $user->contact_secondary = $request->input('contact_secondary');
        $user->id_type = $request->input('id_type');
        $user->id_number = $request->input('id_number');
        $user->status = $request->input('status');
        if($request->input('password')){
            $user->password  = Hash::make($request->input('password'));
        }
        
        $id_document = $request->file('id_document');
        $proxy_id = $request->file('proxy_id');
        $proof_of_residence = $request->file('proof_of_residence');
        $brm = $request->file('brm');
        $vat_registration = $request->file('vat_registration');
        
        if($id_document){
            if($user->id_document){
                Storage::disk('public')->delete($user->id_document);    
            }
            $id_url = Storage::disk('public')->putFile('documents', $id_document);  
            $user->id_document = $id_url;
        }
        
        if($proxy_id){
            if($user->proxy_id){
                Storage::disk('public')->delete($user->proxy_id);   
            }
            $proxy_url = Storage::disk('public')->putFile('documents', $proxy_id);
            $user->proxy_id = $proxy_url;
        }
        
        if($proof_of_residence){
            if($user->proof_of_residence){
                Storage::disk('public')->delete($user->proof_of_residence);   
            }
            $proof_url = Storage::disk('public')->putFile('documents', $proof_of_residence);
            $user->proof_of_residence = $proof_url;
        }
        
        if($brm){
            if($user->brm){
                Storage::disk('public')->delete($user->brm);    
            }
            $brm_url = Storage::disk('public')->putFile('documents', $brm);
            $user->brm = $brm_url;
        }
        
        if($vat_registration){
            if($user->vat_registration){
                Storage::disk('public')->delete($user->vat_registration);   
            }
            $vat_url = Storage::disk('public')->putFile('document', $vat_registration);
            $user->vat_registration = $vat_url; 
        }
        
        $cipro = $request->file('cipro');
        if($cipro){
            if($user->cipro){
                Storage::disk('public')->delete($user->cipro);   
            }
            $cipro_url = Storage::disk('public')->putFile('document', $cipro);
            $user->cipro = $cipro_url; 
        }
        
        $company_letter_head = $request->file('company_letter_head');
        if($company_letter_head){
            if($user->company_letter_head){
                Storage::disk('public')->delete($user->company_letter_head);   
            }
            $company_letter_head_url = Storage::disk('public')->putFile('document', $company_letter_head);
            $user->company_letter_head = $company_letter_head_url; 
        }
        
        $user->save();

        $cmp = null;
        if($request->input('company_name')){
            if($user->company){
                $cmp = $user->company;
            }
            else{
                $cmp = new Company();
            }
            $cmp->company_name = $request->input('company_name');
            $cmp->company_type = $request->input('company_type');
            $cmp->registration_number = $request->input('company_registration_number');
            $cmp->contact_number = $request->input('company_contact_number');
            $cmp->email = $request->input('company_email');
            $cmp->street = $request->input('street');
            $cmp->suburb = $request->input('suburb');
            $cmp->city = $request->input('city');
            $cmp->province = $request->input('province');
            $cmp->code = $request->input('code');
            $cmp->save();
            $user->company_id = $cmp->id;
            $user->save();
        }

        $payment = null;
        if($request->input('payment_vat_number')){
            if($cmp){
                if($cmp->payment){
                    $payment = $cmp->payment;
                }
                else{
                    $payment = new CompanyPayment();
                }
                $payment->company_id = $cmp->id;
                $payment->vat_number = $request->input('payment_vat_number');
                $payment->street = $request->input('payment_street');
                $payment->suburb = $request->input('payment_suburb');
                $payment->city = $request->input('payment_city');
                $payment->province = $request->input('payment_province');
                $payment->code = $request->input('payment_code');
            }
        }
        
        //Send Welcome Email && SMS
        if($cur_status != "Active" && $request->input('status') == "Active"){
            //Email
            $data = [
                'name' => $user->first_name.' '.$user->last_name,
            ];
            Mail::send('mail.welcome', $data, function($message) use($user){
                $message
                ->to($user->email, $user->first_name.' '.$user->last_name)
                ->subject('Welcome to We Buy Bakkies');
                $message->from('info@webuybakkies.co.za','We Buy Bakkies');
            });
            
            //SMS
            $sms = new SmsApi();
            $message = "Thank you for registering on the We Buy Bakkies auction platform, your account has been approved and you are welcome to now log in and start bidding.";
            $cell = $user->contact_primary;
            $res = $sms->sendSms($cell, $message);
        }
        
        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    
    public function updateUserStatus($id, Request $request){
        $status = $request->input('status');
        $user = User::where('id',$id)->update(['status' => $status]);
        
        return back();
    }
}
