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
        $car_arr = [];
        $goups = AuctionGroup::where('status', 2)->get();
        foreach($goups AS $group){
            foreach($group->lots AS $lot){
                $high = $lot->highestBid();
                if($high){
                    if($high->user_id == Auth::user()->id){
                        $car_arr[] = $lot->vehicle_id;
                    }
                }
            }
        }
        $cars = Vehicle::whereIn('id', $car_arr)->get();
        return view('pages.account.home', ['cars'=>$cars]);
    }
}
