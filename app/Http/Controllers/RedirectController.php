<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Lib\SmsApi;

class RedirectController extends Controller
{
    public function redirects(){
        if (Auth::check()) {
            if(Auth::user()->hasRole(['su','admin'])){
                return redirect('admin/dashboard');
            }
            $sms = new SmsApi();
            $cell = Auth::user()->contact_primary;
            $message = "You have logged in to we Buy Bakkies Online Auctions. If This is not you, contact 0126570234 immediately.";
            $res = $sms->sendSms($cell, $message);
            return redirect('dashboard');
        }
        return redirect('login');
    }
}
