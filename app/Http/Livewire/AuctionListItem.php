<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Auth;
use App\Models\AuctionGroup;
use App\Lib\AuctionFunctions;
use App\Models\Lot;
use App\Models\Favourites;

class AuctionListItem extends Component
{
    public $view, $lot_id, $view_type;
    public $lot;
    public $custom_amount, $auto_bid_amount;
    public $time_left;
    
    public function mount(){
        date_default_timezone_set("Africa/Johannesburg");
        $this->lot = Lot::find($this->lot_id);
        $group = $this->lot->group;
        
        $end_time = $group->date.' '.$group->end_time;
        $start_time = $group->date.' '.$group->start_time;
        if($this->lot->extra_time){
            $end_time = date('Y-m-d H:i:s', strtotime("+".$this->lot->extra_time." minutes ".$end_time));
        }
        if($group->status == 1){
            $this->time_left = date('M d, Y H:i:s', strtotime($end_time));
        }
        else{
            $this->time_left = date('M d, Y H:i:s', strtotime($start_time));
        }
        //dd($this->time_left);
    }
    
    public function addToFavourites($id){
            $favourite = new Favourites;
            $favourite->user_id = Auth::id();
            $favourite->lot_id = $id;
            $favourite->save();
            return back();
    }
    
    public function removeFavourite($id){
            $user_id = Auth::id();
            $favourite = Favourites::where('user_id', $user_id)->where('lot_id', $id)->first();
    
            if($favourite != null){
                $favourite->delete();
                return redirect()->back();
            }
            return back();
    }
    
    public function updatedViewType(){
        dd($this->view_type);
    }
    
    public function placeBid(){
        $lot = $this->lot;
        $group = $lot->group;
        
        if($lot->status = 1){
            if($this->custom_amount){
                $bid_amount = $this->custom_amount;
                $this->custom_amount = null;
            }
            else{
                $bid_amount = $lot->nextBidAmount();
            }
            $functions = new AuctionFunctions();
            $bid = $functions->placeBid($lot->id, Auth::user()->id, $bid_amount, 'live');
            if($bid['status'] == "success"){
                $this->dispatchBrowserEvent('toast', ['type' => 'success', 'message' => $bid['message']]);
                
                date_default_timezone_set("Africa/Johannesburg"); 
                $now = date("Y-m-d H:i");    
                $end_time = $group->date.' '.$group->end_time;
                
                if($this->lot->extra_time){
                    $end_time = date('Y-m-d H:i', strtotime("+".$this->lot->extra_time." minutes ".$end_time));
                }
                
                if($end_time > $now){
                    $end_time = strtotime($end_time);
                    $now = strtotime($now);
                    //dd($end_time, $now);
                    $diff = ($end_time - $now) / 60;
                    if($diff < 6){
                        $added_time = $this->lot->extra_time;
                        $added_time += 5;
                        
                        $this->lot->extra_time = $added_time;
                        $this->lot->save();
                        
                        $this->resetTimer();
                    }
                }
                
                
            }
            if($bid['status'] == "error"){
                $this->dispatchBrowserEvent('toast', ['type' => 'error', 'message' => $bid['message']]);
            }
        }
        else{
            $this->dispatchBrowserEvent('toast', ['type' => 'error', 'message' => "Auction has closed"]);    
        }
    }
    public function resetTimer(){
        $group = $this->lot->group;
        
        $end_time = $group->date.' '.$group->end_time;
        if($this->lot->extra_time){
            $end_time = date('Y-m-d H:i:s', strtotime("+".$this->lot->extra_time." minutes ".$end_time));
            //dd($end_time);
        }
        $this->time_left = date('M d, Y H:i:s', strtotime($end_time));
        
        //$this->emit('refreshComponent');
        //$this->render();
        $this->dispatchBrowserEvent('timer-reset');
    }
    
    public function updatedAutoBidAmount(){
        $lot = $this->lot;
        $bid_amount = $this->auto_bid_amount;
        
        if(is_array($bid_amount)){
            $bid_amount = $bid_amount[$lot->id];
        }
        if($lot->status == 1 || $lot->status == 0){
            $functions = new AuctionFunctions();
            $bid = $functions->placeBid($lot->id, Auth::user()->id, $bid_amount, 'auto');
            if($bid['status'] == "success"){
                $this->dispatchBrowserEvent('toast', ['type' => 'success', 'message' => $bid['message']]);
            }
            if($bid['status'] == "error"){
                $this->dispatchBrowserEvent('toast', ['type' => 'error', 'message' => $bid['message']]);
            }
        }
        $this->auto_bid_amount = null;
    }
    
    public function render(){
        return view('livewire.auction-list-item');
    }
}
