<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\AuctionGroup;
use App\Events\AuctionEvent;

use App\Models\Favourites;

use Mail;

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
        $this->init();
        //$this->sendComm(1);
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
            $this->removeFavourites($group->id);
        }
    }
    
    public function sendComm($id){
        $group = AuctionGroup::find($id);
        $lots = $group->lots;
        foreach($lots AS $lot){
            
            if($lot->highestBid()){
                $this->info("BID AMOUNT: ".$lot->highestBid()->bid_amount);
                
                if($lot->highestBid()->bid_amount >= $lot->reserve_price){
                    $bid = $lot->highestBid();
                    $user = $bid->bidder;
                    $car = $lot->vehicle;
                    
                    
                    $data = [
                        'name' => $user->first_name.' '.$user->last_name,
                        'year' => $car->year,
                        'make' => $car->make,
                        'model' => $car->model,
                        'variant' => $car->variant,
                        'amount' => number_format($bid->bid_amount, 2)    
                    ];
                    //dd($data);
                    
                    Mail::send('mail.comm1', $data, function($message) use($user){
                        $message
                        ->to($user->email, $user->first_name.' '.$user->last_name)
                        ->cc('ndlovu28@gmail.com', 'We Buy Bakkies')
                        ->subject('We Buy Bakkies Auction Results');
                        $message->from('info@webuybakkies.co.za','We Buy Bakkies');
                    });
                }
            }
            else{
                $this->warn("Lot # ".$lot->id);
            }
        }
    }
    
    public function removeFavourites($id){
        $group = AuctionGroup::find($id);
        foreach($group->lots AS $lot){
            $favs = Favourites::where('lot_id', $lot->id);
            foreach($favs AS $fav){
                $fav->delete();
            }
        }
    }
}
