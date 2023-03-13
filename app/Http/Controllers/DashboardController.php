<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\Lot;
use App\Models\AuctionGroup;
use App\Models\Vehicle;

class DashboardController extends Controller
{
    public function index(){
        $cars_bought = Lot::where('winner_id',Auth::user()->id)->get();
        return view('pages.account.home', ['cars_bought'=>$cars_bought]);
    }
}
