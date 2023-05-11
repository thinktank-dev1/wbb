<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuctionGroup;
use Illuminate\Http\Request;
use Validator;

use App\Models\Vehicle;
use App\Models\Lot;

class AuctionGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $groups = AuctionGroup::orderBy('date', 'DESC')->paginate(12);
        return view('admin.auction.auction_group_list', ['groups'=>$groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $auctionGroup = new AuctionGroup();
        return view('admin.auction.auction_group_create', ['auctionGroup'=>$auctionGroup]);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(),[
            // 'name' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);
        if($valid->fails()){
            return back()->withErrors($valid)->withInput();
        }
        $index = AuctionGroup::count();
        $index++;
        AuctionGroup::create([
            'name' => 'WBB '.$index,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time
        ]);
        return redirect('admin/auction-groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AuctionGroup  $auctionGroup
     * @return \Illuminate\Http\Response
     */
    public function show(AuctionGroup $auctionGroup)
    {
        return view('admin.auction.auction_group_view', ['auctionGroup'=>$auctionGroup]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AuctionGroup  $auctionGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(AuctionGroup $auctionGroup)
    {
        return view('admin.auction.auction_goup_edit', ['auctionGroup'=>$auctionGroup]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AuctionGroup  $auctionGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuctionGroup $auctionGroup)
    {
        $valid = Validator::make($request->all(),[
            // 'name' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);
        if($valid->fails()){
            return back()->withErrors($valid)->withInput();
        }
        
        // $auctionGroup->name = $request->name;
        $auctionGroup->date = $request->date;
        $auctionGroup->start_time = $request->start_time;
        $auctionGroup->end_time = $request->end_time;
        $auctionGroup->save();
        return redirect('admin/auction-groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AuctionGroup  $auctionGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuctionGroup $auctionGroup)
    {
        //
    }
    
    public function showAddLots($id){
        $cars = Vehicle::whereDoesntHave('lot')->where('external_sale', 'no')->get();
        return view('admin.auction.add_lots', ['group_id'=>$id, 'cars'=>$cars]);
    }

    public function saveLots(Request $request){
        $group_id = $request->group_id;
        $cars = $request->car;
        
        foreach($cars AS $k=>$car){
            if($car['lot_number'] && $car['start_price'] && $car['increament_value'] && $car['reserve_price']){
                $show = 0;
                if(isset($car['show_reseve_price'])){
                    if($car['show_reseve_price']){
                        $show = 1;
                    }
                }
                Lot::create([
                    'auction_group_id' => $group_id,
                    'lot_number' => $car['lot_number'],
                    'vehicle_id' => $k,
                    'start_price' => $car['start_price'],
                    'increament_value' => $car['increament_value'],
                    'reserve_price' => $car['reserve_price'],
                    'trade_price' => $car['trade_price'],
                    'show_reseve_price' => $show
                    
                ]);
            }
        }
        return redirect('admin/auction-groups/'.$group_id);
    }

    public function removeLot($id){
        $lot = Lot::find($id);
        $lot->delete();
        return back();
    }
}
