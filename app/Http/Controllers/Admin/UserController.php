<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\Company;
use App\Models\CompanyPayment;

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

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->contact_primary = $request->input('contact_primary');
        $user->contact_secondary = $request->input('contact_secondary');
        $user->id_type = $request->input('id_type');
        $user->id_number = $request->input('id_number');
        if($request->input('password')){
            $user->password  = Hash::make($request->input('password'));
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
}
