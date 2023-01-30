<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class RedirectController extends Controller
{
    public function redirects(){
        if (Auth::check()) {
            if(Auth::user()->hasRole(['su','admin'])){
                return redirect('admin/dashboard');
            }
            return redirect('dashboard');
        }
        return redirect('login');
    }
}
