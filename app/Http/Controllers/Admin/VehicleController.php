<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator;
use Storage;

use App\Models\Vehicle;
use App\Models\VehicleBodyType;
use App\Models\CarList;
use App\Models\VehicleExtras;
use App\Models\VehicleAccidentReport;
use App\Models\VehicleImages;
use App\Models\VehicleInspection;
use App\Models\Lot;
use App\Models\Bid;

use App\Lib\TransUnionApi;

class VehicleController extends Controller
{
    
    public $fuel_types, $transmission_types, $car_list, $extras_list, $conditions_list, $damage_types, $damage_severity_list;
    public $top_positions, $left_right_positions, $front_positions, $back_positions;
    public $service_history_options = [];
    public $extras_options = [];
    public $damage_positions = [];
    public $natis_options = [];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setClassValues();
        $vehicles = Vehicle::paginate(12);
        return view('admin.vehicles.list', [
            'vehicles'=>$vehicles,
            'car_list' => $this->car_list,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setClassValues();
        $vehicle = new Vehicle();
        $body_types = VehicleBodyType::orderBy('name', 'ASC')->get();
        return view('admin.vehicles.create', [
            'vehicle'=>$vehicle, 
            'body_types'=>$body_types,
            'fuel_types' => $this->fuel_types,
            'transmission_types' => $this->transmission_types,
            'car_list' => $this->car_list,
            'extras_list' => $this->extras_list,
            'conditions_list' => $this->conditions_list,
            'top_positions' => $this->top_positions,
            'damage_types' => $this->damage_types,
            'damage_severity_list' => $this->damage_severity_list,
            'left_right_positions' => $this->left_right_positions,
            'front_positions' => $this->front_positions,
            'back_positions' => $this->back_positions,
            'service_history_options' => $this->service_history_options,
            'extras_options' => $this->extras_options,
            'damage_positions' => $this->damage_positions,
            'natis_options' => $this->natis_options
        ]);
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
            'year' => 'required',
            'make' => 'required',
            'model' => 'required',
            'variant' => 'required',
            'body_type' => 'required',
            'mileage' => 'required',
            'fuel_type' => 'required',
            'transmission' => 'required',
            'color' => 'required',
            'engine_type' => 'required',
            'cylinders' => 'required',
            'vin_number' => 'required',
            'engine_number' => 'required',
            // 'natis' => 'required',
            'service_history' => 'required',
            'service_book' => 'required',
            'service_plan' => 'required',
            'warranty' => 'required',

            'previous_body_repairs' => 'required',
            'previous_cosmetic_repairs' => 'required',
            'mechanical_faults_warnig_lights' => 'required',
            'mechanical_faults_warnig_lights_description' => 'required_if:mechanical_faults_warnig_lights,yes',
            'windscreen_condition' => 'required',
            'rims_condition' => 'required',
            'interior_condition' => 'required',
            'front_left_tire' => 'required',
            'front_right_tire' => 'required',
            'back_left_tire' => 'required',
            'back_right_tire' => 'required'
        ]);

        if($valid->fails()){
            return back()->withErrors($valid)->withInput();
        }

        $car = CarList::where('year', $request->year)->where('make', $request->make)->where('model', $request->model)->where('variant', $request->variant)->first();
        
        /*
        $api = new TransUnionApi();
        $car_info = $api->getCarData($car->mmcode, $request->year, $request->mileage);
        dd($car_info);
        */
        
        $vehicle = Vehicle::create([
            'mmcode' => $car->mmcode,
            'stock_number' => $request->stock_number,
            'year' => $request->year,
            'make' => $request->make,
            'model' => $request->model,
            'variant' => $request->variant,
            'body_type' => $request->body_type,
            'mileage' => $request->mileage,
            'fuel_type' => $request->fuel_type,
            'transmission' => $request->transmission,
            'color' => $request->color,
            'engine_type' => $request->engine_type,
            'cylinders' => $request->cylinders,
            'vin_number' => $request->vin_number,
            'engine_number' => $request->engine_number,
            'natis' => $request->natis,
            'service_history' => $request->service_history,
            'service_book' => $request->service_book,
            'service_plan' => $request->service_plan,
            'warranty' => $request->warranty,
            'notes' => $request->notes
        ]);

        $extras = $request->extras;
        foreach($extras AS $extra){
            VehicleExtras::create([
                'vehicle_id' => $vehicle->id,
                'extra' => $extra
            ]);
        }
        VehicleAccidentReport::create([
            'vehicle_id' => $vehicle->id,
            'previous_body_repairs' => $request->previous_body_repairs,
            'previous_cosmetic_repairs' => $request->previous_cosmetic_repairs,
            'mechanical_faults_warnig_lights' => $request->mechanical_faults_warnig_lights,
            'mechanical_faults_warnig_lights_description' => $request->mechanical_faults_warnig_lights_description,
            'windscreen_condition' => $request->windscreen_condition,
            'rims_condition' => $request->rims_condition,
            'interior_condition' => $request->interior_condition,
            'front_left_tire' => $request->front_left_tire,
            'front_right_tire' => $request->front_right_tire,
            'back_left_tire' => $request->back_left_tire,
            'back_right_tire' => $request->back_right_tire
        ]);

        foreach($request->file('images') AS $image){
            if($image->isValid()){
                $path = Storage::disk('public')->putFile('featured_images', $image);
                VehicleImages::create([
                    'vehicle_id' => $vehicle->id,
                    'image_url' => $path
                ]);
            }
        }

        $sides = ['top', 'left', 'right', 'front', 'back'];
        foreach($sides AS $side){
            $po_name = $side.'-position';
            $tp_name = $side."-type";
            $sv_name = $side."-severity";
            $cost_name = $side."_estimate_damage_cost";
            
            $pos = $request->input($po_name);
            $type = $request->input($tp_name);
            $severity = $request->input($sv_name);
            $cost = $request->input($cost_name);
            for($i = 0; $i < count($pos); $i++){
                if($pos[$i] && $type[$i] && $severity[$i]){

                    $path = "";
                    $img_name = $side."-damage-images";
                    if($request->has($img_name)){
                        $image = $request->file($img_name)[$i];
                        if($image->isValid()){
                            $path = Storage::disk('public')->putFile('damages_images', $image);
                        }
                    }

                    VehicleInspection::create([
                        'vehicle_id' => $vehicle->id,
                        'image_url' => $path,
                        'side' => $side,
                        'poasition' => $pos[$i],
                        'type' => $type[$i],
                        'severity' => $severity[$i],
                        'estimate_damage_cost'=>$cost[$i]
                    ]);        
                }
            }
        }
        return redirect('admin/vehicles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        return view("admin.vehicles.view", ['vehicle'=>$vehicle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        $this->setClassValues();
        $body_types = VehicleBodyType::orderBy('name', 'ASC')->get();
        return view('admin.vehicles.edit', [
            'vehicle'=>$vehicle, 
            'body_types'=>$body_types,
            'fuel_types' => $this->fuel_types,
            'transmission_types' => $this->transmission_types,
            'car_list' => $this->car_list,
            'extras_list' => $this->extras_list,
            'conditions_list' => $this->conditions_list,
            'top_positions' => $this->top_positions,
            'damage_types' => $this->damage_types,
            'damage_severity_list' => $this->damage_severity_list,
            'left_right_positions' => $this->left_right_positions,
            'front_positions' => $this->front_positions,
            'back_positions' => $this->back_positions,
            'service_history_options' => $this->service_history_options,
            'extras_options' => $this->extras_options,
            'damage_positions' => $this->damage_positions,
            'natis_options' => $this->natis_options
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $valid = Validator::make($request->all(),[
            'year' => 'required',
            'make' => 'required',
            'model' => 'required',
            'variant' => 'required',
            'body_type' => 'required',
            'mileage' => 'required',
            'fuel_type' => 'required',
            'transmission' => 'required',
            'color' => 'required',
            'engine_type' => 'required',
            'cylinders' => 'required',
            'vin_number' => 'required',
            'engine_number' => 'required',
            // 'natis' => 'required',
            'service_history' => 'required',
            'service_book' => 'required',
            'service_plan' => 'required',
            'warranty' => 'required',

            'previous_body_repairs' => 'required',
            'previous_cosmetic_repairs' => 'required',
            'mechanical_faults_warnig_lights' => 'required',
            'windscreen_condition' => 'required',
            'rims_condition' => 'required',
            'interior_condition' => 'required',
            'front_left_tire' => 'required',
            'front_right_tire' => 'required',
            'back_left_tire' => 'required',
            'back_right_tire' => 'required'
        ]);

        if($valid->fails()){
            return back()->withErrors($valid)->withInput();
        }

        $car = CarList::where('year', $request->year)->where('make', $request->make)->where('model', $request->model)->where('variant', $request->variant)->first();
        
        $vehicle->mmcode = $car->mmcode;
        $vehicle->stock_number = $request->stock_number;
        $vehicle->year = $request->year;
        $vehicle->make = $request->make;
        $vehicle->model = $request->model;
        $vehicle->variant = $request->variant;
        $vehicle->body_type = $request->body_type;
        $vehicle->mileage = $request->mileage;
        $vehicle->fuel_type = $request->fuel_type;
        $vehicle->transmission = $request->transmission;
        $vehicle->color = $request->color;
        $vehicle->engine_type = $request->engine_type;
        $vehicle->cylinders = $request->cylinders;
        $vehicle->vin_number = $request->vin_number;
        $vehicle->engine_number = $request->engine_number;
        $vehicle->natis = $request->natis;
        $vehicle->service_history = $request->service_history;
        $vehicle->service_book = $request->service_book;
        $vehicle->service_plan = $request->service_plan;
        $vehicle->warranty = $request->warranty;
        $vehicle->notes = $request->notes;
        $vehicle->save();

        $cur_extras = $vehicle->extras;
        foreach($cur_extras AS $extra){
            $extra->delete();
        }
        $extras = $request->extras;
        foreach($extras AS $extra){
            VehicleExtras::create([
                'vehicle_id' => $vehicle->id,
                'extra' => $extra
            ]);
        }
        
        $report = $vehicle->report;
        $report->vehicle_id = $vehicle->id;
        $report->previous_body_repairs = $request->previous_body_repairs;
        $report->previous_cosmetic_repairs = $request->previous_cosmetic_repairs;
        $report->mechanical_faults_warnig_lights = $request->previous_cosmetic_repairs;
        $report->mechanical_faults_warnig_lights_description = $request->mechanical_faults_warnig_lights_description;
        $report->windscreen_condition = $request->windscreen_condition;
        $report->rims_condition = $request->rims_condition;
        $report->interior_condition = $request->interior_condition;
        $report->front_left_tire = $request->front_left_tire;
        $report->front_right_tire = $request->front_right_tire;
        $report->back_left_tire = $request->back_left_tire;
        $report->back_right_tire = $request->back_right_tire;
        $report->save();

        if($request->has('images')){
            //if(count($request->file('images')) > 0){
                foreach($request->file('images') AS $image){
                    if($image->isValid()){
                        $path = Storage::disk('public')->putFile('featured_images', $image);
                        VehicleImages::create([
                            'vehicle_id' => $vehicle->id,
                            'image_url' => $path
                        ]);
                    }
                }
            //}
        }

        $sides = ['top', 'left', 'right', 'front', 'back'];
        foreach($sides AS $side){
            $po_name = $side.'-position';
            $tp_name = $side."-type";
            $sv_name = $side."-severity";
            $cost_name = $side."_estimate_damage_cost";
            
            $pos = $request->input($po_name);
            $type = $request->input($tp_name);
            $severity = $request->input($sv_name);
            $cost = $request->input($cost_name);
            //dd($request->all());
            for($i = 0; $i < count($pos); $i++){
                if($pos[$i] && $type[$i] && $severity[$i]){
                    //dd($pos[$i], $type[$i], $severity[$i]);
                    //dd($cost_name, $side, $cost);    
                    $path = "";
                    $img_name = $side."-damage-images";
                    if($request->has($img_name)){
                        $image = $request->file($img_name)[$i];
                        if($image->isValid()){
                            $path = Storage::disk('public')->putFile('damages_images', $image);
                        }
                    }

                    VehicleInspection::create([
                        'vehicle_id' => $vehicle->id,
                        'image_url' => $path,
                        'side' => $side,
                        'poasition' => $pos[$i],
                        'type' => $type[$i],
                        'severity' => $severity[$i],
                        'estimate_damage_cost'=>$cost[$i]
                    ]);        
                }
            }
        }
        return redirect('admin/vehicles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }

    public function setClassValues(){
        $this->fuel_types = ['Petrol', 'Diesel', 'Electric', 'Hybrid', 'Gas'];
        $this->transmission_types = ['Manual', 'Automatic'];
        $this->car_list = CarList::distinct()->get(['make']);
        $this->extras_list = ['Spare Keys', 'Digital Info Display', 'Canopy', 'Leather Seats', 'Nudge Bar', 'Roll Bar', 'Pano Roof', 'Satellite Navigation', 'Sunroof', 'Towbar', 'Multifunctional Steering wheel', 'Winch'];
        $this->conditions_list = ['Excelent', 'Good', 'Fair', "Bad"];
        $this->damage_types = ['Dent', 'Scratch', 'Chip', 'Crack'];
        $this->damage_severity_list = ['Minor','Fair','Bad','Very Bad','Severe' ];
        $this->top_positions = ['Head Panel','Hood','Roof Panel', 'Pano Roof', 'Sunroof', 'Truck Bed', 'Wheel Tub','Tail Gate'];
        $this->left_right_positions = ['Bumper End', 'Fender','Front Door','Front Glass','Front Quarter', 'Lower Front Door Skin','Back Door','Back Door Glass', 'Lower Back Door Skin','Back Quarter', 'Valance panel', 'Inner Fender', 'Cowl Panel', 'Rocker Panel', 'Cab Coner', 'Bedside','Rear Panel','Wheel Arch Panel','Wheel House','Lower Rear Bedside', 'Miror', 'Front Door Handle', 'Back Door Handle'];
        $this->front_positions = ['Hood','Bumper','Grille','Crash Guards','Left Head Lights', 'Right Head Lights', 'Left Fog Lamp', 'Right Fog Lamp', 'Left Indicator Lights', 'Right Indicator Lights', 'Left Wiper Blade', 'Right Wiper Blade', 'Radiator', 'Radiator Supports', 'Cowl Panel'];
        $this->back_positions = ['Windishield','Tail Gate', 'Right Tail Light', 'Left Tail Light', 'Boot', 'Rear Bamper'];
        $this->damage_positions = ['top', 'left', 'right','front','back'];
        $this->natis_options = ['Bank', 'Dealer'];
        $this->service_history_options = [
            'Full history with agent',
            'Full history with agent and independent workshop',
            'Partial service history',
            'No history',
        ];
        $this->extras_options = [
            'Basic' => [
                'ABS Brake',
                'Air Conditioning',
                'Alarm',
                'Alloy Wheel',
                'Automatic',
                'Balance Of Factory warranty',
                'Central Locking',
                'Electric Windows',
                'Front Electric Windows',
                'Full Service History',
                'Immobilizer',
                'iPod Input',
                'Maintanance Plan',
                'Manual',
                'Power Steering',
                'Service Plan',
                'USB Input',
            ],
            'Exterior' => [
                'Bullbar',
                'Canopy',
                'Locknuts',
                'Nudge Bar',
                'Rollbar',
                'Roof Rack',
                'Roof Rails',
                'Rubberized Load Body',
                'Running Boards',
                'Skylights',
                'Sunroof',
                'Towbar',
                'Winch'
            ],
            'Standard' => [
                '4x2',
                '4x4',
                'Airbags',
                'All Wheel Drive',
                'Auxiliary Audio Input',
                'CD Multi Changer',
                'Descent Control',
                'Diff Lock',
                'Drink Cooler',
                'Drink Holder',
                'EBD Electric Brake Distribution',
                'Electric Mirrors',
                'ESP Electric Stability Programe',
                'Fog Lights',
                'Front Wheel Drive',
                'Full House',
                'Full Spare wheel',
                'Radio',
                'Radio/CD',
                'Radio/CD/MP3',
                'Rear windshield Defroster',
                'Tinted Windows',
                'Tonneau Cover'
            ],
            'Top Spec' => [
                'Adjustable Suspension',
                'Auto Dim Rear View Mirrors',
                'Automatic Start Stop',
                'Bluetooth Ready',
                'Climate Controll',
                'Cruise Controll',
                'Detachable Tow Bar',
                'DVD Vidio System',
                'Electric Memory Seats',
                'Headlight Washers',
                'Heated Electric Mirrors',
                'Keyless Go',
                'Leather',
                'LED Daytime Lights',
                'Multifunctional Steering',
                'Panoramic Roof',
                'Rain Sensor',
                'Rear Air Conditioning',
                'Rear View Camera',
                'Run-Flat Tires',
                'Sat Nav',
                'Seat Heaters',
                'S-Line Package',
                'Smash And Grab Windows ...',
                'Sports Pack',
                'Sports Seats',
                'Third Rear Seat',
                'Tracker',
                'Traction Controll',
                'Trip Computer',
                'Tyre Presure Monitor',
                'Voice Command',
                'Xenon Headlights'
            ]
        ];
    }
    
    public function getCarByMMCode($code){
        $car = CarList::where('mmcode', $code)->first();
        if($car){
            return [
                'status' => 'success',
                'data' => [
                    'year' => $car->year,
                    'make' => $car->make,
                    'model' => $car->model,
                    'variant' => $car->variant
                ]
            ];
        }
        return [
            'status' => 'error',
            'message' => 'Car not found'
        ];
    }

    public function getModels($year, $make){
        $cars = CarList::where('year', $year)->where('make', $make)->orderBy('model', 'ASC')->distinct()->get(['model']);
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
    
    public function getModels2($make){
        $vehicles = CarList::where('make', $make)->orderBy('model', 'ASC')->distinct()->get(['model']);
        $options = '';
        foreach($vehicles AS $vehicle){
            $options .= "<option value='".$vehicle->model."'>".$vehicle->model."</option>";
        }
        $ret = [
            'status' => 'success',
            'data' => $options
        ];
        
        return json_encode($ret);
    }

    public function getVariants($year, $make, $model){
        $cars = CarList::where('year', $year)->where('make', $make)->where('model', $model)->orderBy('variant', 'ASC')->get();
        $ret_html = '';
        foreach($cars AS $car){
            $ret_html .= "<option value='".$car->variant."'>".$car->variant."</option>";
        }
        $ret = [
            'status' => "success",
            'html' => $ret_html
        ];
        return json_encode($ret);
    }

    public function getCarInfo($year,$make,$model,$variant){
        $car = CarList::where('year', $year)->where('make', $make)->where('model', $model)->where('variant',$variant)->first();
        $ret = [];
        if($car){
            $trans = "";
            if($car->transmission == "A"){
                $trans = "Automatic";
            }
            if($car->transmission == "M"){
                $trans = "Manual";
            }

            $fuel_type = "";
            if($car->fuel_type == "P"){
                $fuel_type = "Petrol";
            }
            if($car->fuel_type == "D"){
                $fuel_type = "Diesel";
            }
            if($car->fuel_type == "H"){
                $fuel_type = "Hybrid";
            }
            if($car->fuel_type == "E"){
                $fuel_type = "Electric";
            }

            $body_types = [
                'C/P' => 'Coupe',
                'S/C' => '',
                '4/W' => 'Wagon/Sport Utility 4 DR',
                'R/D' => 'Roadster',
                'H/B' => 'Hatchback',
                'C/B' => 'Cab and Chassis',
                'S/D' => 'Sedan',
                'S/W' => 'Station Wagon',
                'SUV' => 'SUV',
                '3/W' => '3-Wheel Vehicle',
                'C/C' => 'Conventional Cab',
                'B/S' => 'Bus',
                'O/F' => '',
                'S/P' => 'Special',
                'D/P' => 'Dump',
                'E/D' => '',
                'S/S' => '',
                'MPV' => 'Moped',
                'SAV' => '',
                '6/W' => '',
                'P/V' => '',
                'D/S' => 'Tractor Truck (Diesel)',
                'D/C' => '',
                'TIP' => '',
                'C/V' => 'Convertible'
            ];

            $ret = [
                'status' => "success",
                'data' => [
                    'transmission' => $trans,
                    'fuel_type' => $fuel_type,
                    'cylinders' => $car->cylinders,
                    'body_type' => $body_types[$car->body_type]
                ]
            ];
        }
        else{
            $ret = [
                'status' => "error"
            ];
        }
        return json_encode($ret);
    }

    public function deleteVehicleImage($id){
        $img = VehicleImages::find($id);
        unlink("storage/".$img->image_url);
        $img->delete();
        return back();
    }

    public function deleteReport($id){
        $report = VehicleInspection::find($id);
        unlink('storage/'.$report->image_url);
        $report->delete();
        return back();
    }
    
    public function listByStatus($status){
        $car_arr = [];
        $lots = Lot::whereHas('bids',function($q){
            return $q->where('bid_type', 'live');
        })->get();
        
        if($status == "not-sold"){
            foreach($lots AS $lot){
                if($lot->reserve_price > $lot->highestBid()->bid_amount){
                    $car_arr[] = $lot->vehicle_id;    
                }
            }
        }
        if($status == "sold"){
            foreach($lots AS $lot){
                if($lot->reserve_price < $lot->highestBid()->bid_amount){
                    $car_arr[] = $lot->vehicle_id;    
                }
            }
        }
        
        $cars = Vehicle::whereIn('id', $car_arr)->paginate(12);
        return view('admin.vehicles.list_by_status', ['cars'=>$cars, 'status'=>$status]);
    }
    
    public function resetCar($id){
        $car = Vehicle::find($id);
        $lot = Lot::where('vehicle_id', $car->id)->first();
        $bids = Bid::where('lot_id', $lot->id)->get();
        foreach($bids AS $bid){
            $bid->delete();
        }
        $lot->delete();
        return back();
    }
}
