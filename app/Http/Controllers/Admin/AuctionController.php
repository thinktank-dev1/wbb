<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AuctionGroup;

class AuctionController extends Controller
{
    public function index(){
        $groups = AuctionGroup::where('status', 2)->orderBy('date', 'DESC')->paginate(12);
        return view('admin.auction.auction_results', ['groups'=>$groups]);
    }
}
