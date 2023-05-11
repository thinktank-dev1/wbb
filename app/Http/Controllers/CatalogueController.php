<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\VehicleBodyType;
use App\Models\AuctionGroup;
use App\Models\Favourites;
use App\Models\CarList;
use App\Models\Vehicle;
use App\Models\Lot;

use Carbon\Carbon;
use Request As Filter;

class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function catalogue()
    {
        $date = Carbon::now()->toDateString();
        $time = Carbon::now()->toTimeString();
        $car_list = CarList::distinct()->get(['make']);
        $body_types = VehicleBodyType::all();
        $auction_date = AuctionGroup::whereDate('date','>=' ,$date)->whereNot('status', 2)->first();
        $dates = AuctionGroup::whereDate('date','>=' ,$date)->whereNot('status', 2)->orderBy('date', 'ASC')->get();
        
        $catalogue = Vehicle::whereHas('lot', function ($query) use($date){
            $query->whereHas('auction', function ($subQ) use($date){
                $subQ->whereDate('date', '>=', $date)
                ->whereNot('status', 2);
            });
        })->paginate(5);
        
        return view('pages.bakkies.catalogue')
        ->with([
            'dates' => $dates,
            'car_list' => $car_list,
            'catalogue' => $catalogue,
            'body_types' => $body_types,
            'auction_date' => $auction_date
        ]);   
    }
    
    public function add_to_favourites($id)
    {
            $favourite = new Favourites;
            $favourite->user_id = Auth::id();
            $favourite->lot_id = $id;
            $favourite->save();
            return back();
    }
    
    public function favourites()
    {   
        $user_id = Auth::id();
        $date = Carbon::now()->toDateString();
        $car_list = CarList::distinct()->get(['make']);
        $body_types = VehicleBodyType::all();
        $dates = AuctionGroup::whereDate('date','>=' ,$date)->orderBy('date', 'ASC')->get();
        $items = Favourites::where('user_id', $user_id)->count();
        $favourites = Favourites::where('user_id', $user_id)->paginate(5);
        
            return view('pages.bakkies.favourites')
            ->with([
                'dates' => $dates,
                'items' => $items,
                'car_list' => $car_list,
                'favourites' => $favourites,
                'body_types' => $body_types,
            ]);
    }
    
    public function remove_favourite($id)
    {
            $user_id = Auth::id();
            $favourite = Favourites::where('user_id', $user_id)->where('lot_id', $id)->first();
    
            if($favourite != null){
                $favourite->delete();
                return redirect()->back();
            }
            return back();
    }


    public function getfilteredModels($make)
    {
        $cars = CarList::where('make', $make)->orderBy('model', 'ASC')->distinct()->get(['model']);
        $ret_html = '';
        foreach($cars AS $car){
            $ret_html .= "<option value='".$car->model."'>".$car->model."</option>";
        }
        $ret = [
            'status' => "success",
            'html' => $ret_html
        ];
        return json_encode($ret);
    }
    
    public function filterCatalogue()
    {
        $date = Carbon::now()->toDateString();
        $make = Filter::input('make');
        $model = Filter::input('model');
        $body = Filter::input('body');
        $mileage = Filter::input('mileage');
        $from = Filter::input('from');
        $to = Filter::input('to');
        
        $car_list = CarList::distinct()->get(['make']);
        $body_types = VehicleBodyType::all();
        $auction_date = AuctionGroup::whereDate('date','>=' ,$date)->whereNot('status', 2)->first();
        $dates = AuctionGroup::whereDate('date','>=' ,$date)->whereNot('status', 2)->orderBy('date', 'ASC')->get();
        
        if($mileage == 0){
            if($make){
            $catalogue = Vehicle::where('make', $make)
            ->whereHas('lot', function($query) use($date){
                $query->whereHas('auction',function($subQ) use($date){
                   $subQ->whereDate('date', '>=', $date)
                   ->whereNot('status', 2); 
                });
            })->paginate(5);   
            }elseif($body){
               $catalogue = Vehicle::where('body_type', $body)
                ->whereHas('lot', function($query) use($date){
                    $query->whereHas('auction',function($subQ) use($date){
                       $subQ->whereDate('date', '>=', $date)
                       ->whereNot('status', 2); 
                    });
                })->paginate(5); 
            }elseif($from){
                $catalogue = Vehicle::where('year', $from)
                ->whereHas('lot', function($query) use($date){
                  $query->whereHas('auction', function($subQ) use($date){
                    $subQ->whereDate('date', '>=', $date)
                    ->whereNot('status', 2);  
                  }); 
            })->paginate(5);   
            }elseif($from && $to){
                $catalogue = Vehicle::where(function ($between) use($from, $to) {
                        $$between->where('year', '>=', $from)
                            ->orWhere('year', '<=', $to);
                    })->whereHas('lot', function($query) use($date){
                    $query->whereHas('auction', function($subQ) use($date){
                        $subQ->whereDate('date', '>=', $date)
                        ->whereNot('status', 2);      
                    });
                })->paginate(5); 
            }elseif($make && $model){
                $catalogue = Vehicle::where('make', $make)
                ->where('model', $model)
                ->whereHas('lot', function($query) use($date){
                    $query->whereHas('auction', function($subQ) use($date){
                        $subQ->whereDate('date', '>=', $date)
                        ->whereNot('status', 2);
                    });
                })->paginate(5);
            }elseif($make && $model && $body){
                $catalogue = Vehicle::where('make', $make)
                ->where('model', $model)
                ->where('body_type', $body)
                ->whereHas('lot', function($query) use($date){
                    $query->whereHas('auction', function($subQ) use($date){
                       $subQ('date', '>=', $date)
                       ->whereNot('status', 2); 
                    });
                })->paginate(5);
            }
        }elseif($mileage != 0){
            $catalogue = Vehicle::whereBetween('mileage', [$mileage, 500000])
            ->whereHas('lot', function($query) use($date){
                 $query->whereHas('auction',function($subQ) use($date){
                   $subQ->whereDate('date', '>=', $date)
                   ->whereNot('status', 2); 
                });
            })->paginate(5); 
        }elseif($make && $model && $body && $mileage != 0){
            $catalogue = Vehicle::where('make', $make)
            ->where('model', $model)
            ->where('body_type', $body)
            ->whereBetween('mileage', [$mileage, 500000])
            ->whereHas('lot', function($query) use($date){
                $query->whereHas('auction', function($subQ) use($date){
                    $subQ->whereDate('date', '>=', $date)
                    ->whereNot('status', 2);    
                });
            })->paginate(5);
        }elseif($make && $model && $body && $mileage != 0 && $from && $to){
            $catalogue = Vehicle::where('make', $make)
            ->where('model', $model)
            ->where('body_type', $body)
            ->whereBetween('mileage', [$mileage, 500000])
            ->whereBetween('year', [$from, $to])
            ->whereHas('lot', function($query) use($date){
                $query->whereHas('auction', function($subQ) use($date){
                    $subQ->whereDate('date', '>=', $date)
                    ->whereNot('status', 2);
                });
            })->paginate(5);
        }
        
        if($make == null && $model == null && $body == null && $mileage == 0 && $from == null && $to == null){
            $catalogue = Vehicle::whereHas('lot', function ($query) use($date){
            $query->whereHas('auction', function ($subQ) use($date){
                $subQ->whereDate('date', '>=', $date)
                ->whereNot('status', 2);
            });
            })->paginate(5);
        }
        
        return view('pages.bakkies.catalogue')
        ->with([
            'date' => $date,
            'dates' => $dates,
            'car_list' => $car_list,
            'catalogue' => $catalogue,
            'body_types' => $body_types,
            'auction_date' => $auction_date
        ]);
    }  
    
    public function sortCatalogue()
    {
        $sort = Filter::input('sort');
        $date = Carbon::now()->toDateString();
        $car_list = CarList::distinct()->get(['make']);
        $body_types = VehicleBodyType::all();
        $auction_date = AuctionGroup::whereDate('date','>=' ,$date)->whereNot('status', 2)->first();
        $dates = AuctionGroup::whereDate('date','>=' ,$date)->whereNot('status', 2)->orderBy('date', 'ASC')->get(); 
        
        if($sort){
            $catalogue = Vehicle::orderBy('make', $sort)
            ->whereHas('lot', function($query) use($date){
                $query->whereHas('auction', function($subQ) use($date){
                    $subQ->whereDate('date', '>=', $date)
                    ->whereNot('status', 2);
                });
            })->paginate(5);   
        }
        
        return view('pages.bakkies.catalogue')
        ->with([
            'date' => $date,
            'dates' => $dates,
            'car_list' => $car_list,
            'catalogue' => $catalogue,
            'body_types' => $body_types,
            'auction_date' => $auction_date
        ]);
    }
    
    public function sortCatalogueByDate()
    {
        $day = Filter::input('day');
        $date = $day;
        $car_list = CarList::distinct()->get(['make']);
        $body_types = VehicleBodyType::all();
        $auction_date = AuctionGroup::whereDate('date','>=' ,$date)->whereNot('status', 2)->first();
        $dates = AuctionGroup::whereDate('date','>=' ,$date)->whereNot('status', 2)->orderBy('date', 'ASC')->get();
        
        if($day != null){
             $catalogue = Vehicle::whereHas('lot', function ($query) use($day){
                $query->whereHas('auction', function ($subQ) use($day){
                    $subQ->whereDate('date', $day);
                });
             })->paginate(5);   
        }
        
        return view('pages.bakkies.catalogue')
        ->with([
            'date' => $date,
            'dates' => $dates,
            'car_list' => $car_list,
            'catalogue' => $catalogue,
            'body_types' => $body_types,
            'auction_date' => $auction_date
        ]);
    }
    
    public function searchCatalogue(){
        $date = Carbon::now()->toDateString(); 
        $search = Filter::input('search');
        $car_list = CarList::distinct()->get(['make']);
        $body_types = VehicleBodyType::all();
        $auction_date = AuctionGroup::whereDate('date', '>=',$date)->whereNot('status', 2)->first();
        $dates = AuctionGroup::whereDate('date', '>=', $date)->whereNot('status', 2)->orderBy('date', 'ASC')->get();
       
        if($search){
            $catalogue = Vehicle::where('make', 'LIKE', '%'.$search.'%')
            ->whereHas('lot', function($query) use($date){
                    $query->whereHas('auction', function($subQ) use($date){
                        $subQ->whereDate('date', '>=', $date)
                        ->whereNot('status', 2);
                    });
                })->paginate(5);

            
            if($catalogue->isEmpty()){
              $catalogue = Vehicle::where('model', 'LIKE', '%'.$search.'%')
                ->whereHas('lot', function($query) use($date){
                    $query->whereHas('auction', function($subQ) use($date){
                        $subQ->whereDate('date', '>=', $date)
                        ->whereNot('status', 2);
                    });
                })->paginate(5); 
            }
            
            if($catalogue->isEmpty()){
                $catalogue = Vehicle::where('variant', 'LIKE', '%'.$search.'%')
                ->whereHas('lot', function($query) use($date){
                    $query->whereHas('auction', function($subQ) use($date){
                        $subQ->whereDate('date', '>=', $date)
                        ->whereNot('status', 2);
                    });
                })->paginate(5);
            }
            
            if($catalogue->isEmpty()){
                $catalogue = Vehicle::where('body_type', 'LIKE', '%'.$search.'%')
                ->whereHas('lot', function($query) use($date){
                    $query->whereHas('auction', function($subQ) use($date){
                        $subQ->whereDate('date', '>=', $date)
                        ->whereNot('status', 2);
                    });
                })->paginate(5); 
            }
            
            if($catalogue->isEmpty()){
                $catalogue = Vehicle::where('year', 'LIKE', '%'.$search.'%')
                ->whereHas('lot', function($query) use($date){
                    $query->whereHas('auction', function($subQ) use($date){
                        $subQ->whereDate('date', '>=', $date)
                        ->whereNot('status', 2);
                    });
                })->paginate(5); 
            }
            
            if($catalogue->isEmpty()){
                $catalogue = Vehicle::where('fuel_type', 'LIKE', '%'.$search.'%')
                ->whereHas('lot', function($query) use($date){
                    $query->whereHas('auction', function($subQ) use($date){
                        $subQ->whereDate('date', '>=', $date)
                        ->whereNot('status', 2);
                    });
                })->paginate(5); 
            }
            
        }
        
        return view('pages.bakkies.catalogue')
        ->with([
            'date' => $date,
            'dates' => $dates,
            'car_list' => $car_list,
            'catalogue' => $catalogue,
            'body_types' => $body_types,
            'auction_date' => $auction_date
        ]);
    }
    
    public function paginateCatalogue(){
        $date = Carbon::now()->toDateString();
        $paginate = Filter::input('paginate');
        
        $car_list = CarList::distinct()->get(['make']);
        $body_types = VehicleBodyType::all();
        $auction_date = AuctionGroup::whereDate('date','>=' ,$date)->whereNot('status', 2)->first();
        $dates = AuctionGroup::whereDate('date','>=' ,$date)->whereNot('status', 2)->orderBy('date', 'ASC')->get();
        
        if($paginate){
            $catalogue = Vehicle::whereHas('lot', function($query) use($date){
                $query->whereHas('auction', function($subQ) use($date){
                    $subQ->whereDate('date', '>=', $date)
                    ->whereNot('status', 2);
                });
            })->paginate($paginate);  
        }
        
        return view('pages.bakkies.catalogue')
        ->with([
            'date' => $date,
            'dates' => $dates,
            'car_list' => $car_list,
            'catalogue' => $catalogue,
            'body_types' => $body_types,
            'auction_date' => $auction_date
        ]);
    }
}
