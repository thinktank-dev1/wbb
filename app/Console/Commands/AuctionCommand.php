<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\AuctionGroup;
use App\Events\AuctionEvent;

class AuctionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auction:monitor';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //$this->init();
        $this->sendComm(1);
    }
    
    public function init(){
        date_default_timezone_set("Africa/Johannesburg");
        
        $date = date('Y-m-d');
        $time = date("H:i:s");
        
        //Start Auctions
        $groups = AuctionGroup::where('status', 0)->where('date', $date)->where('start_time', '<', $time)->get();
        foreach($groups AS $group){
            $group->status = 1;
            $group->save();
            
            $data = ['action' => 'start'];
            broadcast(new AuctionEvent($data));
        }
        
        //Stop Auctions
        $groups = AuctionGroup::where('status', 1)->where('date', $date)->where('end_time', '<', $time)->get();
        foreach($groups AS $group){
            $group->status = 2;
            $group->save();
            
            $data = ['action' => 'stop'];
            broadcast(new AuctionEvent($data));
            
            $this->sendComm($group->id);
        }
    }
    
    public function sendComm($id){
        $group = AuctionGroup::find($id);
        $lots = $group->lots;
        foreach($lots AS $lot){
            if($lot->highestBid()->bid_amount >= $lot->reserve_price){
                $bid = $lot->highestBid();
                $user = $bid->bidder;
                dd($user);
                
            }
        }
    }
}
