<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Lot;
use Auth;
use App\Lib\AuctionFunctions;

class ViewLot extends Component
{
    public $lot, $auto_bid_amount;
    
    protected $listeners = ['reloadCar' => 'reloadCar'];
    
    public function mount($id){
        $this->lot = Lot::find($id);
    }
    
    public function reloadCar(){
        $id = $this->lot->id;
        $this->lot = Lot::find($id);
    }
    
    public function placeBid(){
        $bid_amount = $this->lot->nextBidAmount();
        
        $functions = new AuctionFunctions();
        $bid = $functions->placeBid($this->lot->id, Auth::user()->id, $bid_amount, 'live');
        if($bid['status'] == "success"){
            $this->dispatchBrowserEvent('toast', ['type' => 'success', 'message' => $bid['message']]);
        }
    }
    
    public function updatedAutoBidAmount(){
        $bid_amount = $this->auto_bid_amount;
        $functions = new AuctionFunctions();
        $bid = $functions->placeBid($this->lot->id, Auth::user()->id, $bid_amount, 'auto');
        if($bid['status'] == "success"){
            $this->dispatchBrowserEvent('toast', ['type' => 'success', 'message' => $bid['message']]);
        }
        if($bid['status'] == "error"){
            $this->dispatchBrowserEvent('toast', ['type' => 'error', 'message' => $bid['message']]);
        }
    }
    
    public function render(){
        return view('livewire.view-lot')->extends('layouts.main');
    }
}
