<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\AuctionGroup;
use App\Models\Vehicle;
use App\Models\Lot;

class LotsController extends Controller
{
    public function user_lots(){
        $cars_bought = Lot::where('winner_id',Auth::user()->id)->get();
        return view('pages.account.lots', ['cars_bought'=>$cars_bought]);
    }

    public function view_lot($id){
        $lot = Lot::find($id);
        return view('pages.lots.view-lot')
        ->with([
            'lot' => $lot
        ]);
    }
}
