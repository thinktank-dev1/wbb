<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Auth;
use Session;
use App\Models\AuctionGroup;
use App\Models\Lot;
use App\Lib\AuctionFunctions;
use Livewire\WithPagination;

class Auction extends Component
{
    
     use WithPagination;
     
    public $group;
    public $end_time;
    public $start_time;
    public $has_auction;
    public $custom_amount;
    public $view_type;
    public $next_auction_time;
    public $is_fvourite;
    public $auto_bid_amount;
    
    //protected $listeners = ['refreshComponent' => '$refresh'];
    
    public function mount($favs = null){
        if($favs){
            $this->is_fvourite = true;
        }
        
        if(Session::has('view_type')){
            $this->view_type = Session::get('view_type');
        }
        else{
            $this->view_type = "list";
        }
        
        $this->has_auction = null;
        $this->group = $group = AuctionGroup::where('status', 1)->first();
        if($group){
            $this->has_auction = true;
            $end_time = $this->group->date.' '.$this->group->end_time;
            $this->end_time = date('M d, Y H:i:s', strtotime($end_time));
        }
        
        if($favs){
            $this->group = AuctionGroup::where('status', 0)->orWhere('status', 1)->first();
            $this->has_auction = true;
        }
        $now = date('Y-m-d');
        $next_auction = AuctionGroup::where('status', 0)->where('date', '=', $now)->orWhere('date', '>', $now)->first();
        if($next_auction){
            $this->next_auction_time = $next_auction->date.' '.$next_auction->start_time;
            $start_time = $next_auction->date.' '.$next_auction->start_time;
            $this->start_time = date('M d, Y H:i:s', strtotime($start_time));
        }
    }
    
    public function changeView($view){
        $this->view_type = $view;
        Session::put('view_type', $view);
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
            'lots' => $lots,
        ])->extends('layouts.main');
    }
}
