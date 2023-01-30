<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuctionGroup;
use Illuminate\Http\Request;
use Validator;

class AuctionGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $groups = AuctionGroup::orderBy('date', 'DESC')->orderBy('start_time', 'ASC')->paginate(12);
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
            'name' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);
        if($valid->fails()){
            return back()->withErrors($valid)->withInput();
        }
        AuctionGroup::create([
            'name' => $request->name,
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
            'name' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);
        if($valid->fails()){
            return back()->withErrors($valid)->withInput();
        }
        
        $auctionGroup->name = $request->name;
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
    
    public function showAddLots(){
        return view('admin.auction.add_lots');
    }
}
