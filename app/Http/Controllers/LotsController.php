<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LotsController extends Controller
{
    public function user_lots(){
        return view('pages.account.lots');
    }

    public function view_lot(){
        return view('pages.lots.view-lot');
    }
}
