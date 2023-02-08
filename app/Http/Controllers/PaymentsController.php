<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use Session;

use Auth;
use App\Models\User;

class PaymentsController extends Controller
{
    public function index(){
        $cmp = Auth::user()->company;
        $payments = null;
        if($cmp){
            $payments = $cmp->payment;
        }
        return view('pages.account.payments', compact('payments'));
    }

    public function updatePayments(){
        $valid = Validator::make(Request::all(), [
            'vat_number' => 'required',
            'street' => 'required',
            'suburb' => 'required',
            'city' => 'required',
            'code' => 'required',
        ]);
        if($valid->fails()){
            return back()->withErrors($valid)->withInput();
        }

        $cmp = Auth::user()->company;
        $payments = $cmp->payementDetails;

        $payments->vat_number = Request::input('vat_number');
        $payments->street = Request::input('street');
        $payments->suburb = Request::input('suburb');
        $payments->city = Request::input('city');
        $payments->code = Request::input('code');
        $payments->save();

        Session::flash('message', 'Payment details have been updated');
        return back();
    }
}
