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
        return view('pages.account.lots', ['cars'=>$cars]);
    }

    public function view_lot($id){
        $lot = Lot::find($id);
        return view('pages.lots.view-lot')
        ->with([
            'lot' => $lot
        ]);
    }
}
