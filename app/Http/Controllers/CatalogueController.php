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
        
        $auction_date = AuctionGroup::whereDate('date', $date)->first();
        
        $dates = AuctionGroup::whereDate('date', '>=', $date)->orderBy('date', 'ASC')->get();
        
        $catalogue = Vehicle::whereHas('lot', function ($query) use($date){
            $query->whereHas('auction', function ($subQ) use($date){
                $subQ->whereDate('date', '>=', $date);
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
        $filter = '';
        $catalogue='';
        $date = Carbon::now()->toDateString();
        $make = Filter::input('make');
        $model = Filter::input('model');
        $body = Filter::input('body');
        $mileage = Filter::input('mileage');
        $from = Filter::input('from');
        $to = Filter::input('to');
        $sort = Filter::input('sort');
        $paginate = Filter::input('paginate');
        $search = Filter::input('search');
        
        
        $car_list = CarList::distinct()->get(['make']);
        $body_types = VehicleBodyType::all();
        $auction_date = AuctionGroup::whereDate('date', $date)->first();
        $dates = AuctionGroup::whereDate('date','>=' ,$date)->orderBy('date', 'ASC')->get();
        
        if($make != null){
            $catalogue = Vehicle::where('make', $make)
            ->whereHas('lot', function($query) use($date){
                $query->whereHas('auction',function($subQ) use($date){
                   $subQ->whereDate('date', '>=', $date); 
                });
            })->paginate(5);   
        }elseif($body !=null){
           $catalogue = Vehicle::where('body_type', $body)
            ->whereHas('lot', function($query) use($date){
                $query->whereHas('auction',function($subQ) use($date){
                   $subQ->whereDate('date', '>=', $date); 
                });
            })->paginate(5); 
        }elseif($mileage != null){
            $catalogue = Vehicle::where('mileage','>=' ,$mileage)
            ->whereHas('lot', function($query) use($date){
                 $query->whereHas('auction',function($subQ) use($date){
                   $subQ->whereDate('date', '>=', $date); 
                });
            })->paginate(5); 
        }elseif($from != null){
            $catalogue = Vehicle::where('year',$from)
            ->whereHas('lot', function($query) use($date){
              $query->whereHas('auction', function($subQ) use($date){
                $subQ->whereDate('date', '>=', $date);  
              }); 
            })->paginate(5);   
        }elseif($from != null && $to != null){
            $catalogue = Vehicle::whereBetween('year', [$from, $to])
            ->whereHas('lot', function($query) use($date){
                $query->whereHas('auction', function($subQ) use($date){
                    $subQ->whereDate('date', '>=', $date);      
                });
            })->paginate(5); 
        }elseif($make != null && $model != null){
            $catalogue = Vehicle::where('make', $make)
            ->where('model', $model)
            ->whereHas('lot', function($query) use($date){
                $query->whereHas('auction', function($subQ) use($date){
                    $subQ->whereDate('date', '>=', $date);
                });
            })->paginate(5);
        }elseif($make != null && $model != null && $body){
            $catalogue = Vehicle::where('make', $make)
            ->where('model', $model)
            ->where('body_type', $body)
            ->whereHas('lot', function($query) use($date){
                $query->whereHas('auction', function($subQ) use($date){
                   $subQ('date', '>=', $date); 
                });
            })->paginate(5);
        }elseif($make != null && $model != null && $body != null && $mileage != null){
            $catalogue = Vehicle::where('make', $make)
            ->where('model', $model)
            ->where('body_type', $body)
            ->where('mileage','>=' ,$mileage)
            ->whereHas('lot', function($query) use($date){
                $query->whereHas('auction', function($subQ) use($date){
                    $subQ->whereDate('date', $date);    
                });
            })->paginate(5);
        }elseif($make != null && $model != null && $body != null && $mileage != null && $from != null && $to != null){
            $catalogue = Vehicle::where('make', $make)
            ->where('model', $model)
            ->where('body_type', $body)
            ->where('mileage','>=' ,$mileage)
            ->whereBetween('year', [$from, $to])
            ->whereHas('lot', function($query) use($date){
                $query->whereHas('auction', function($subQ) use($date){
                    $subQ->whereDate('date', $date);
                });
            })->paginate(5);
        }elseif($sort != null){
            $catalogue = Vehicle::whereHas('lot')
            ->orderBy('make', $sort)
            ->whereHas('lot', function($query) use($date){
                $query->whereHas('auction', function($subQ) use($date){
                    $subQ->whereDate('date', $date);
                });
            })->paginate(5);   
        }elseif($paginate != null){
             $catalogue = Vehicle::whereHas('lot', function($query) use($date){
                 $query->whereHas('auction', function($subQ) use($date){
                     $subQ->whereDate('date', $date);
                 });
             })->paginate($paginate);  
        }elseif($search != null){
            $catalogue = Vehicle::where('make','like', $search)
            ->whereHas('lot', function($query) use($date){
                $query->whereHas('auction', function($subQ) use($date){
                    $subQ->whereDate('date', $date);
                });
            })->paginate(5);
            
            if($catalogue->isEmpty()){
                $catalogue = Vehicle::where('model', 'like', $search)
                ->whereHas('lot', function($query) use($date){
                    $query->whereHas('auction', function($subQ) use($date){
                        $subQ->whereDate('date', $date);
                    });
                })->paginate(5);
            }elseif($catalogue->isEmpty()){
                $catalogue = Vehicle::where('variant', 'like', $search)
                ->whereHas('lot', function($query) use($date){
                    $query->whereHas('auction', function($subQ) use($date){
                        $subQ->whereDate('date', $date);
                    });
                })->paginate(5);
            }elseif($catalogue->isEmpty()){
                $catalogue = Vehicle::where('body_type', 'like', $search)
                ->whereHas('lot', function($query) use($date){
                    $query->whereHas('auction', function($subQ) use($date){
                        $subQ->whereDate('date', $date);
                    });
                })->paginate(5);
            }
            // ->orWhere('year', 'like', $search)
            // ->orWhere('fuel_type', 'like', $search);
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
        $auction_date = AuctionGroup::whereDate('date', $date)->first();
        $dates = AuctionGroup::whereDate('date','>=' ,$date)->orderBy('date', 'ASC')->get();
        
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
    
    public function filterFavourites()
    {
        $user_id = Auth::id();
        $sort = Filter::input('sort');
        $paginate = Filter::input('paginate');
        $make = Filter::input('make');
        $model = Filter::input('model');
        $body = Filter::input('body');
        $from = Filter::input('from');
        $to = Filter::input('to');
        $mileage = Filter::input('mileage');
        $search = Filter::input('search');
        $items = Favourites::where('user_id', $user_id)->count();
        $car_list = CarList::distinct()->get(['make']);
        $body_types = VehicleBodyType::all();
       
       
        if($sort != null){
           $favourites = Favourites::where('user_id', $user_id)
           ->whereHas('lot', function ($query) use($sort){
               $query->whereHas('vehicle', function ($subQ) use($sort){
                  $subQ->orderBy('make', $sort); 
               });
           })->paginate(5);
        }elseif($paginate != null)
        {
            $favourites = Favourites::where('user_id', $user_id)->paginate($paginate);
        }elseif($make != null)
        {
            $favourites = Favourites::where('user_id', $user_id)
            ->whereHas('lot', function ($query) use($make){
                $query->whereHas('vehicle', function($subQ) use($make){
                    $subQ->where('make', $make);
                });
            })->paginate();
        }elseif($make != null && $model != null){
            $favourites = Favourites::where('user_id', $user_id)
            ->whereHas('lot', function ($query) use($make, $model){
                $query->whereHas('vehicle', function($subQ) use($make, $model){
                    $subQ->where('make', $make)
                    ->where('model', $model);
                });
            })->get();
        }elseif($body != null){
             $favourites = Favourites::where('user_id', $user_id)
            ->whereHas('lot', function ($query) use($body){
                $query->whereHas('vehicle', function($subQ) use($body){
                    $subQ->where('body_type', $body);
                });
            })->paginate(5);
        }elseif($make != null && $model != null && $body != null){
            $favourites = Favourites::where('user_id', $user_id)
            ->whereHas('lot', function ($query) use($make, $model, $body){
                $query->whereHas('vehicle', function($subQ) use($make, $model, $body){
                    $subQ->where('make', $make)
                    ->where('model', $model)
                    ->where('model', $model);
                });
            })->paginate(5);
        }elseif($from != null)
        {
            $favourites = Favourites::where('user_id', $user_id)
            ->whereHas('lot', function ($query) use($from){
                $query->whereHas('vehicle', function($subQ) use($from){
                    $subQ->where('year', $from);
                });
            })->paginate(5);
        }elseif($from != null && $to != null)
        {
             $favourites = Favourites::where('user_id', $user_id)
            ->whereHas('lot', function ($query) use($from, $to){
                $query->whereHas('vehicle', function($subQ) use($from, $to){
                    $subQ->whereBetween('year', [$from, $to]);
                });
            })->paginate(5);
        }elseif($mileage != null){
             $favourites = Favourites::where('user_id', $user_id)
            ->whereHas('lot', function ($query) use($mileage){
                $query->whereHas('vehicle', function($subQ) use($mileage){
                    $subQ->where('mileage', $mileage);
                });
            })->paginate(5);
        }elseif($search != null){
            $favourites =Favourites::where('user_id', $user_id)
            ->whereHas('lot', function($query) use($search){
                $query->whereHas('vehicle', function($subQ) use($search){
                   $subQ->where('make','like', $search)
                    ->orWhere('model', 'like', $search)
                    ->orWhere('variant', 'like', $search)
                    ->orWhere('body_type', 'like', $search)
                    ->orWhere('year', 'like', $search)
                    ->orWhere('fuel_type', 'like', $search);
                });
            })->paginate(5);
        }  
        
        return view('pages.bakkies.favourites')
        ->with([
            'items' => $items,
            'car_list' => $car_list,
            'favourites' => $favourites,
            'body_types' => $body_types
        ]); 
    }
    
    public function sortFavouritesByDate()
    {
        $user_id = Auth::id();
        $dates = AuctionGroup::whereDate('date','>=' ,$date)->orderBy('date', 'ASC')->get();
        $items = Favourites::where('user_id', $user_id)->count();
        $car_list = CarList::distinct()->get(['make']);
        $body_types = VehicleBodyType::all();
        $day = Filter::input('day');
        
        if($day){
            $favourites = Favourites::where('user_id', $user_id)
            ->whereHas('lot', function ($query) use($day){
                $query->whereHas('auction', function ($subQ) use($day){
                    $subQ->whereDate('date', $day);
                });
            })->paginate(5); 
        }
       
        
         return view('pages.bakkies.favourites')
        ->with([
            'dates' => $dates,
            'items' => $items,
            'car_list' => $car_list,
            'favourites' => $favourites,
            'body_types' => $body_types
        ]);
    }
}
