<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use Auth;
use App\Models\AuctionGroup;
use App\Models\Lot;
use App\Lib\AuctionFunctions;

class Auction extends Component
{
    use WithPagination;
    
    public $group;
    public $end_time;
    public $has_auction;
    public $custom_amount;
    public $view_type;
    public $next_auction_time;
    public $is_fvourite;
    
    protected $listeners = ['reloadCar' => '$refresh'];
    
    public function mount($favs = null){
        if($favs){
            $this->is_fvourite = true;
        }
        $this->view_type = "list";
        $this->has_auction = null;
        $this->group = $group = AuctionGroup::where('status', 1)->first();
        if($group){
            $this->has_auction = true;
            $end_time = $this->group->date.' '.$this->group->end_time;
            $this->end_time = date('M d, Y H:i:s', strtotime($end_time));
        }
        $now = date('Y-m-d');
        $next_auction = AuctionGroup::where('status', 0)->where('date', '>=', $now)->first();
        if($next_auction){
            $this->next_auction_time = $next_auction->date.' '.$next_auction->start_time;
        }
    }
    
    public function changeView($view){
        $this->view_type = $view;
    }
    
    public function placeBid($lot_id){
        $lot = Lot::find($lot_id);
        if($this->custom_amount){
            $bid_amount = $this->custom_amount;
            $this->custom_amount = null;
        }
        else{
            $bid_amount = $lot->nextBidAmount();
        }
        
        $functions = new AuctionFunctions();
        $bid = $functions->placeBid($lot_id, Auth::user()->id, $bid_amount, 'live');
        if($bid['status'] == "success"){
            $this->dispatchBrowserEvent('toast', ['type' => 'success', 'message' => $bid['message']]);
        }
    }
    
    public function render(){
        $lots = null;
        if($this->has_auction){
            if($this->is_fvourite){
                if(Auth::user()->favourites->count() > 0){
                    $fav_arr = [];
                    foreach(Auth::user()->favourites AS $fav){
                        $fav_arr[] = $fav->lot_id;    
                    }
                    $lots = Lot::whereIn('id', $fav_arr)->paginate(12);
                }
            }
            else{
                $lots = $this->group->lots()->paginate(12);
            }
        }
        return view('livewire.auction', [
            'lots' => $lots
        ])->extends('layouts.main');
    }
}
