@section('title', 'Lot')
<div>
<section class="lot">
    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <div class="col-12">
                <div class="row lot-row">
                    <div class="col-5 col-lot-box">
                        <h3 class="lot-heading ml-5">LOT: <span class="lot-heading-span">#{{ str_pad($lot->id, 4, '0', STR_PAD_LEFT) }}</span> </h3>
                    </div>
                    <div class="col-6 d-flex justify-content-end col-5 col-lot-box">
                        <!--<a href=""><img class="img-fluid " src="{{ asset('images/wbbonline_btn_46.png') }}" alt="share"></a>-->
                        <a href="{{ url('add-to-favourites/'.$lot->id) }}"><img class="img-fluid" src="{{ asset('images/wbbonline_btn_47.png') }}" alt="add-to-favourites"></a>
                        <a href="{{ route('auction') }}"><img class="img-fluid" src="{{ asset('images/wbbonline_btn_19.png') }}" alt="add-to-favourites"></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col lot-title-div mt-3">
                <div class="row">
                    <div class="col d-flex justify-content-start mt-2">
                        <h3 class="lot-make"> {{ $lot->vehicle->make }}<span class="lot-model ml-3">| {{ $lot->vehicle->model }} | {{ $lot->vehicle->variant }}</span> </h3> 
                    </div>
                    <div class="col d-flex justify-content-end mt-3">
                        <h3 class="lot-start-head">AUCTION STARTS IN <i class="bi bi-stopwatch"></i><span class="lot-start-span ml-3">{{ $lot->auction->date }}</span></h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12 mt-5 lot-details">
                <div class="row">
                    <div class="col-md-5 mb-3" wire:ignore>
                        <div class="card lot-card">
                            @foreach($lot->vehicle->images as $image)
                                <div class="lot-slide mb-2">
                                <div class="zoom-in"> <a class="btn btn-primary zoomin-btn zb" href="{{ asset('storage/'.$image->image_url) }}" ><i class="bi bi-zoom-in"></i> Click image to Zoom</a> </div>
                                <img id="lot-car" class="img-fluid" src="{{ asset('storage/'.$image->image_url) }}" alt="favourites">
                            </div>
                            @endforeach
                            <a class="next" onclick="plusSlides(1)"><img class="img-fluid lot-thumbnail cursor" src="{{ asset('images/wbbonline_btn_54.png') }}" alt="next-button"></a>

                            <div class="row row-thumnail mt-3">
                                @php
                                    $c = 1;
                                    $num = $lot->vehicle->images->count();
                                    $images = $lot->vehicle->images;
                                @endphp
                                @for ($i = 0; $i < $num; $i++)
                                    <div class="col-3 column mb-2">
                                        <img class="img-fluid lot-thumbnail cursor" src="{{ asset('storage/'.$images[$i]->image_url) }}"  onclick="currentSlide({{ $i }})" alt="Image1">
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card lot-details-card">
                            <div class="col lot-details-header">
                                <h3 class="lot-details-heading mt-2">LOT DETAILS</h3>
                            </div>
                            <div class="card-body lot-details-body">
                                <table class="table lot-details-table">
                                    <tbody>
                                        <tr>
                                            <td class="lot-details-data-text text-left">year</td>
                                            <td class="lot-details--data-desc text-right">{{ $lot->vehicle->year }}</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">body type</td>
                                            <td class="lot-details--data-desc text-right">{{ $lot->vehicle->body_type }}</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">mileage</td>
                                            <td class="lot-details--data-desc text-right">{{ $lot->vehicle->mileage }} Km</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">fuel</td>
                                            <td class="lot-details--data-desc text-right">{{ $lot->vehicle->fuel_type }}</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">transmission</td>
                                            <td class="lot-details--data-desc text-right">{{ $lot->vehicle->transmission }}</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">engine type</td>
                                            <td class="lot-details--data-desc text-right">{{ $lot->vehicle->engine_type }}</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">cylinders</td>
                                            <td class="lot-details--data-desc text-right">{{ $lot->vehicle->cylinders }}</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">colour</td>
                                            <td class="lot-details--data-desc text-right">{{ $lot->vehicle->color }}</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">vin</td>
                                            <td class="lot-details--data-desc text-right">{{ $lot->vehicle->vin_number }}</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">engine no</td>
                                            <td class="lot-details--data-desc text-right">{{ $lot->vehicle->engine_number }}</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">natis</td>
                                            <td class="lot-details--data-desc text-right">{{ $lot->vehicle->natis }}</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">service history</td>
                                            <td class="lot-details--data-desc text-right">{{ $lot->vehicle->service_history }}</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">service book</td>
                                            <td class="lot-details--data-desc text-right">{{ $lot->vehicle->service_book }}</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">service plan / warranty active</td>
                                            <td class="lot-details--data-desc text-right">{{ $lot->vehicle->service_plan  }}</td>
                                        </tr>
                                        @if($lot->vehicle->notes)
                                        <tr>
                                            <td class="lot-details-data-text text-left">notes</td>
                                            <td></td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                                 <p class="lot-details--data-desc text-left">{{ $lot->vehicle->notes }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card lot-details-card mb-4">
                            <div class="col lot-details-header">
                                <h3 class="lot-details-heading mt-2">BID INFORMATION</h3>
                            </div>
                            <div class="card-body lot-details-body lot-auto-body bid-info-block">
                                <dl class="row bid-info-row">
                                    <dt class="col-sm-8">
                                        <p class="lot-details-text text-left"> trade price</p>
                                        <p class="lot-details-text text-left"> opening bid <i class="bi bi-question-circle-fill question-mark"></i></p>
                                    </dt>
                                    <dd class="col-sm-4">
                                        <p class="lot-details-desc text-right">R 0.00</p>
                                        <p class="lot-details-desc text-right">R {{ $lot->start_price  }}</p>
                                    </dd>
                                </dl>
                                <div class="bids-block">
                                    <dl class="row bid-current-block">
                                        <dt class="col-sm-6"style="align-self: center;">
                                            <p class="lot-current-bid-text text-left ml-2"> Current bid</p>
                                            <p class="lot-bid-increment-text text-left ml-2"> Bid increment</p>
                                        </dt>
                                        <dd class="col-sm-6">
                                            <p class="lot-current-bid-desc text-right">R @if($lot->highestBid()) {{ number_format($lot->highestBid()->bid_amount, 2) }} @else 0.00 @endif</p>
                                            <p class="lot-bid-increment-desc text-right mr-2">R {{ $lot->increament_value }}</p>
                                        </dd>
                                    </dl> 
                                </div>
                                <table class="table mt-4">
                                  <tbody>
                                    <tr>
                                      <td class="lot-reserve-price-text text-left">reserve price met <i class="bi bi-question-circle-fill question-mark"></i></td>
                                      <td class="lot-reserve-price-desc text-right">@if($lot->highestBid()) @if($lot->highestBid()->bid_amount >= $lot->reserve_price) Yes @else No @endif @else No @endif </td>
                                    </tr>
                                    <tr>
                                      <td class="lot-total-bids-text text-left">total bids</td>
                                      <td class="lot-total-bids-desc text-right">{{ $lot->bids->count() }}</td>
                                    </tr>
                                    <tr>
                                      <td class="lot-next-bid-text text-left">next bid</td>
                                      <td class="lot-next-bid-desc text-right">R {{ number_format($lot->nextBidAmount(), 2) }}</td>
                                    </tr>
                                  </tbody>
                                </table>
                                <div class="col-md-12 bid-now-btn-section d-flex justify-content-end mb-1 bid-btn-row">
                                    <button class="btn btn-primary bid-now-btn web-btn" wire:click.prevent="placeBid" >BID NOW</button>
                                </div>
                                <div class="col-md-12 auto-bid-section bid-info-blk">
                                    <h3 class="auto-bid-title mt-2">
                                        Auto Bid
                                    </h3>

                                    <form class="form-inline">
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label justify-content-start auto-max-bid-label">BID UP TO MAXIMUM</label>
                                            <div class="input-group input-group-section col-sm-10">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text decimal-span">R</span>
                                                </div>
                                                <input type="text" class="form-control maximum-bid-input" id="bid-amnt" wire:model.lazy="auto_bid_amount">
                                                <div class="input-group-append">
                                                    <span class="input-group-text decimal-span">.00</span>
                                                </div>
                                                <div class="col-sm-12 mt-3 ml-4">
                                                    <a href="Javascript:void(0)" class="btn btn-primary">GO</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-12 bid-disclaimer-section bid-info-t-c">
                                    <p class="bid-disclaimer-text">All bids are legally binding and all sales are final. <a href="">Learn more</a></p>
                                </div>
                            </div>
                        </div>
                        {{--
                        <div class="card lot-details-card">
                            <div class="col lot-details-header">
                                <h3 class="lot-details-heading mt-2">ALERT FOR SIMILAR LOTS</h3>
                            </div>
                            <div class="card-body similar-lot-body">
                                <div class="col-md-12 similar-lot-section">
                                    <form>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <select class="form-control form-control-sm alert-input-field mb-2">
                                                    <option readonly>Alert Type</option>  
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <select class="form-control form-control-sm alert-input-field mb-2">
                                                    <option readonly>-</option>  
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-sm alert-input-field mb-2" placeholder="First Name">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-sm alert-input-field mb-2" placeholder="Last Name">
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-center mt-2">
                                                <button class="btn btn-secondary">SUBMIT</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col lot-details-footer">
                            </div>
                        </div>
                        --}}
                    </div>
                    
                    <div class="col-md-6 mb-5">
                        <div class="card lot-details-card">
                            <div class="col lot-details-header">
                                <h3 class="lot-details-heading mt-2">EXTRAS</h3>
                            </div>
                            <div class="card-body extras-details-body">
                                <table class="table lot-details-table">
                                    <tbody>
                                        @foreach($lot->vehicle->extras as $extra)
                                            <tr>
                                                <td class="lot-details-data-text text-left">{{ $extra->extra }}</td>
                                                <td class="lot-details--data-desc text-right">Yes</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <div class="card lot-details-card">
                            <div class="col lot-details-header">
                                <h3 class="lot-details-heading mt-2">VEHICLE CONDITION REPORT</h3>
                            </div>
                            <div class="card-body report-details-body">
                                <table class="table lot-details-table">
                                    <tbody>
                                        @php
                                            $report = $lot->vehicle->report()->first();
                                        @endphp
                                        <tr>
                                            <td class="lot-details-data-text text-left">previous body repairs</td>
                                            <td class="lot-details--data-desc text-right">{{ $report->previous_body_repairs }}</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">previous cosmetic repairs</td>
                                            <td class="lot-details--data-desc text-right">{{ $report->previous_cosmetic_repairs }}</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">mechanical issues, faults or warning lights</td>
                                            <td class="lot-details--data-desc text-right">{{ $report->mechanical_faults_warnig_lights  }}</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">specify</td>
                                            <td class="lot-details--data-desc text-right">{{ $report->mechanical_faults_warnig_lights_description  }}</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">windscreen condition</td>
                                            <td class="lot-details--data-desc text-right">{{ $report->windscreen_condition }}</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">rims condition</td>
                                            <td class="lot-details--data-desc text-right">{{ $report->rims_condition  }}</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">interior condition</td>
                                            <td class="lot-details--data-desc text-right">{{ $report->interior_condition  }}</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">tyre condition - front left</td>
                                            <td class="lot-details--data-desc text-right">{{ $report->front_left_tire  }}</td></td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">tyre condition - front right</td>
                                            <td class="lot-details--data-desc text-right">{{ $report->front_right_tire  }}</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">tyre condition - rear left</td>
                                            <td class="lot-details--data-desc text-right">{{ $report->back_left_tire  }}</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">tyre condition - rear right</td>
                                            <td class="lot-details--data-desc text-right">{{ $report->back_right_tire  }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 inspection-report-header mb-4">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="inspection-title mt-3">
                                    Inspection Report
                                </h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <h3 class="mt-3 mr-5 estimate-title">Estimated Repair Cost: R{{ $lot->repairTotal() }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p class="est-text ml-2 mt-2 mb-4"> 
                            This estimate repair cost is to be used as a guide only.
                            We strongly suggest that you view the car before you bid.
                        </p>
                    </div>
                    <div class="col-md-12 mb-4">
                        <div class="card w-100 top-card">
                            <div class="col-md-12 d-flex justify-start top-card-header">
                                <h5 class="top-title mt-3">Top</h5>
                            </div>
                            @php
                                $inspections = $lot->vehicle->inspectionBySide('top');
                            @endphp
                            @if($inspections)
                                @foreach($inspections as $inspection)
                                    <div class="card-body top-body">
                                        <div class="row top-row">
                                            <div class="col-sm-2 mb-3">
                                                <div class="magnify"> <a class="btn btn-primary magnify-btn zb" href="{{ asset('storage/'.$inspection->image_url) ?? '' }}"><i class="bi bi-search" ></i></a> </div>
                                                <img class="img-fluid inspection-img" src="{{ asset('storage/'.$inspection->image_url) ?? '' }}" alt="no report">
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <p class="insp-text ml-2 mt-4"> POSITION</p>
                                                <p class="insp-text ml-2"> {{ $inspection->poasition  }}</p>
                                                <hr class="line-three">
                                                <p class="insp-text ml-2 mt-4"> ESTIMATED REPAIR COST</p>
                                                <p class="insp-text ml-2"> R {{ $inspection->estimate_damage_cost   }}</p>
                                            </div>
                                            <div class="col-sm-3 mb-3">
                                                <p class="insp-text ml-2 mt-4"> TYPE OF DAMAGE</p>
                                                <p class="insp-text ml-2"> {{ $inspection->type  }}</p>
                                            </div>
                                            <div class="col-sm-3 mb-3">
                                                <p class="insp-text ml-2 mt-4"> DAMAGE SEVERITY</p>
                                                <p class="insp-text ml-2">{{ $inspection->severity   }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="card-body top-body">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="magnify"> <a class="btn btn-primary magnify-btn" ><i class="bi bi-search" ></i></a> </div>
                                            <img class="img-fluid" src="{{ asset('images/wbbonline_img_53.png') }}" alt="no report">
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="no-insp-text mt-5"> Nothing to report</p>
                                        </div>
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-3"></div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-12 top-card-footer">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <div class="card w-100 top-card">
                            <div class="col-md-12 d-flex justify-start top-card-header">
                                <h5 class="top-title mt-3">Left</h5>
                            </div>
                             @php
                                $inspections = $lot->vehicle->inspectionBySide('left');
                            @endphp
                            @if($inspections)
                                @foreach($inspections as $inspection)
                                    <div class="card-body top-body">
                                        <div class="row top-row">
                                            <div class="col-sm-2 mb-3">
                                                <div class="magnify"> <a class="btn btn-primary magnify-btn zb" href="{{ asset('storage/'.$inspection->image_url) ?? '' }}" ><i class="bi bi-search" ></i></a> </div>
                                                <img class="img-fluid inspection-img" src="{{ asset('storage/'.$inspection->image_url) ?? '' }}" alt="no report">
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <p class="insp-text ml-2 mt-4"> POSITION</p>
                                                <p class="insp-text ml-2"> {{ $inspection->poasition  }}</p>
                                                <hr class="line-three">
                                                <p class="insp-text ml-2 mt-4"> ESTIMATED REPAIR COST</p>
                                                <p class="insp-text ml-2"> R {{ $inspection->estimate_damage_cost   }}</p>
                                            </div>
                                            <div class="col-sm-3 mb-3">
                                                <p class="insp-text ml-2 mt-4"> TYPE OF DAMAGE</p>
                                                <p class="insp-text ml-2"> {{ $inspection->type  }}</p>
                                            </div>
                                            <div class="col-sm- mb-3">
                                                <p class="insp-text ml-2 mt-4"> DAMAGE SEVERITY</p>
                                                <p class="insp-text ml-2">{{ $inspection->severity   }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="card-body top-body">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="magnify"> <a class="btn btn-primary magnify-btn" ><i class="bi bi-search" ></i></a> </div>
                                            <img class="img-fluid" src="{{ asset('images/wbbonline_img_53.png') }}" alt="no report">
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="no-insp-text mt-5"> Nothing to report</p>
                                        </div>
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-3"></div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-12 top-card-footer">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <div class="card w-100 top-card">
                            <div class="col-md-12 d-flex justify-start top-card-header">
                                <h5 class="top-title mt-3">Right</h5>
                            </div>
                             @php
                                $inspections = $lot->vehicle->inspectionBySide('right');
                            @endphp
                            @if($inspections)
                                @foreach($inspections as $inspection)
                                    <div class="card-body top-body">
                                        <div class="row top-row">
                                            <div class="col-sm-2 mb-3">
                                                <div class="magnify"> <a class="btn btn-primary magnify-btn zb" href="{{ asset('storage/'.$inspection->image_url) ?? ''}}" ><i class="bi bi-search" ></i></a> </div>
                                                <img class="img-fluid inspection-img" src="{{ asset('storage/'.$inspection->image_url) ?? ''}}" alt="no report">
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <p class="insp-text ml-2 mt-4"> POSITION</p>
                                                <p class="insp-text ml-2"> {{ $inspection->poasition  }}</p>
                                                <hr class="line-three">
                                                <p class="insp-text ml-2 mt-4"> ESTIMATED REPAIR COST</p>
                                                <p class="insp-text ml-2"> R {{ $inspection->estimate_damage_cost   }}</p>
                                            </div>
                                            <div class="col-sm-3 mb-3">
                                                <p class="insp-text ml-2 mt-4"> TYPE OF DAMAGE</p>
                                                <p class="insp-text ml-2"> {{ $inspection->type  }}</p>
                                            </div>
                                            <div class="col-sm- mb-3">
                                                <p class="insp-text ml-2 mt-4"> DAMAGE SEVERITY</p>
                                                <p class="insp-text ml-2">{{ $inspection->severity   }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="card-body top-body">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="magnify"> <a class="btn btn-primary magnify-btn" ><i class="bi bi-search" ></i></a> </div>
                                            <img class="img-fluid" src="{{ asset('images/wbbonline_img_53.png') }}" alt="no report">
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="no-insp-text mt-5"> Nothing to report</p>
                                        </div>
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-3"></div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-12 top-card-footer">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <div class="card w-100 top-card">
                            <div class="col-md-12 d-flex justify-start top-card-header">
                                <h5 class="top-title mt-3">Front</h5>
                            </div>
                             @php
                                $inspections = $lot->vehicle->inspectionBySide('front');
                            @endphp
                            @if($inspections)
                                @foreach($inspections as $inspection)
                                    <div class="card-body top-body">
                                        <div class="row top-row">
                                            <div class="col-sm-2 mb-3">
                                                <div class="magnify"> <a class="btn btn-primary magnify-btn zb" href="{{ asset('storage/'.$inspection->image_url) ?? ''}}" ><i class="bi bi-search" ></i></a> </div>
                                                <img class="img-fluid inspection-img" src="{{ asset('storage/'.$inspection->image_url) ?? ''}}" alt="no report">
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <p class="insp-text ml-2 mt-4"> POSITION</p>
                                                <p class="insp-text ml-2"> {{ $inspection->poasition  }}</p>
                                                <hr class="line-three">
                                                <p class="insp-text ml-2 mt-4"> ESTIMATED REPAIR COST</p>
                                                <p class="insp-text ml-2"> R {{ $inspection->estimate_damage_cost   }}</p>
                                            </div>
                                            <div class="col-sm-3 mb-3">
                                                <p class="insp-text ml-2 mt-4"> TYPE OF DAMAGE</p>
                                                <p class="insp-text ml-2"> {{ $inspection->type  }}</p>
                                            </div>
                                            <div class="col-sm- mb-3">
                                                <p class="insp-text ml-2 mt-4"> DAMAGE SEVERITY</p>
                                                <p class="insp-text ml-2">{{ $inspection->severity   }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="card-body top-body">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="magnify"> <a class="btn btn-primary magnify-btn" ><i class="bi bi-search" ></i></a> </div>
                                            <img class="img-fluid" src="{{ asset('images/wbbonline_img_53.png') }}" alt="no report">
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="no-insp-text mt-5"> Nothing to report</p>
                                        </div>
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-3"></div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-12 top-card-footer">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <div class="card w-100 top-card">
                            <div class="col-md-12 d-flex justify-start top-card-header">
                                <h5 class="top-title mt-3">Back</h5>
                            </div>
                             @php
                                $inspections = $lot->vehicle->inspectionBySide('back');
                            @endphp
                            @if($inspections)
                                @foreach($inspections as $inspection)
                                    <div class="card-body top-body">
                                        <div class="row top-row">
                                            <div class="col-sm-2 mb-3">
                                                <div class="magnify"> <a class="btn btn-primary magnify-btn zb" href="{{ asset('storage/'.$inspection->image_url) ?? ''}}" ><i class="bi bi-search" ></i></a> </div>
                                                <img class="img-fluid inspection-img" src="{{ asset('storage/'.$inspection->image_url) ?? ''}}" alt="no report">
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <p class="insp-text ml-2 mt-4"> POSITION</p>
                                                <p class="insp-text ml-2"> {{ $inspection->poasition  }}</p>
                                                <hr class="line-three">
                                                <p class="insp-text ml-2 mt-4"> ESTIMATED REPAIR COST</p>
                                                <p class="insp-text ml-2"> R {{ $inspection->estimate_damage_cost   }}</p>
                                            </div>
                                            <div class="col-sm-3 mb-3">
                                                <p class="insp-text ml-2 mt-4"> TYPE OF DAMAGE</p>
                                                <p class="insp-text ml-2"> {{ $inspection->type  }}</p>
                                            </div>
                                            <div class="col-sm- mb-3">
                                                <p class="insp-text ml-2 mt-4"> DAMAGE SEVERITY</p>
                                                <p class="insp-text ml-2">{{ $inspection->severity   }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="card-body top-body">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="magnify"> <a class="btn btn-primary magnify-btn" ><i class="bi bi-search" ></i></a> </div>
                                            <img class="img-fluid" src="{{ asset('images/wbbonline_img_53.png') }}" alt="no report">
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="no-insp-text mt-5"> Nothing to report</p>
                                        </div>
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-3"></div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-12 top-card-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('scripts')
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('zbox/jquery.zbox.css') }}" />
    <script type="text/javascript" src="{{ asset('zbox/jquery.zbox.min.js') }}"></script>
    
    @vite('resources/js/app.js')
    <script src="//{{ Request::getHost() }}:{{env('LARAVEL_ECHO_PORT')}}/socket.io/socket.io.js"></script>
    @vite('resources/js/laravel_echo_setup.js')
    <script>
        $(document).ready(function(){
            window.Echo.channel('auction-chanel').listen('.auction.update', (data) => {
                if(data.action == 'bid_placed'){
                    Livewire.emit('reloadCar');
                }
                if(data.action == 'start'){
                    Livewire.emit('reloadCar');
                }
                if(data.action == 'stop'){
                    //Livewire.emit('reloadCar');
                    location.reload();
                }
                if(data.action == "outbid"){
                    id = data.user_id;
                    cur_id = {{ Auth::user()->id }};
                    if(id == cur_id){
                        $.toast({
                            heading: 'Error',
                            text: "Your Auto Bid Has Been out bid",
                            showHideTransition: 'slide',
                            icon: 'error',
                            position: 'mid-center',
                        });
                    }
                }
            });   
            
            $(document).ready(function(){
                $(".zb").zbox( { margin:40 } );
            });
        });
        
        window.addEventListener('toast', event => {
            if(event.detail.type == "success"){
                $.toast({
                    heading: 'Success',
                    text: event.detail.message,
                    showHideTransition: 'slide',
                    icon: 'success',
                    //position: 'top-center',
                    position: 'mid-center',
                });
            }
            if(event.detail.type == "error"){
                $.toast({
                    heading: 'Error',
                    text: event.detail.message,
                    showHideTransition: 'slide',
                    icon: 'error',
                    //position: 'top-center',
                    position: 'mid-center',
                });
            }
        });
        
        let slideIndex = 1;
        showSlides(slideIndex);
        
        function plusSlides(n) {
          showSlides(slideIndex += n);
        }
        
        function currentSlide(n) {
          showSlides(slideIndex = n);
        }
        
        function showSlides(n) {
          let i;
          let slides = document.getElementsByClassName("lot-slide");
          let dots = document.getElementsByClassName("lot-thumbnail");
          if (n > slides.length) {slideIndex = 1}
          if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
          }
          for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";
          dots[slideIndex-1].className += " active";
        }
        
        function zoomin(){
            var lotImg = document.getElementById("lot-car");
            var currWidth = lotImg.clientWidth;
            if(currWidth == 2500) return false;
                else{
                lotImg.style.width = (currWidth + 100) + "px";
            } 
        }
    </script>
@endpush
@include('includes.assistance')
</div>