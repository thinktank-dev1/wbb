<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\AuctionGroup;
use App\Models\Lot;

class AuctionMonitor extends Component
{
    public $auction_group;
    public $cur_lot;
    
    public function mount(){
        $this->getAuction();   
    }
    
    public function getAuction(){
        $this->auction_group = AuctionGroup::where('date', date('Y-m-d'))->where('status', 1)->orderBy('start_time')->first();
        if($this->auction_group){
            $lot = $this->auction_group->lots->first();
            if($lot){
                $this->cur_lot = $lot;
            }
        }
    }
    
    public function showLotBids($id){
        $this->cur_lot = Lot::find($id);
    }
    
    public function render(){
        return view('livewire.admin.auction-monitor')->extends('layouts.admin');
    }
}
