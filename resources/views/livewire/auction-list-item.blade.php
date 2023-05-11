@if($view_type == "list")
    <div style="width:100%">
        <style>
            .timer_num{
                font-weight: 900;
                font-size: 30px;
            }
            .timer_lt{
                font-size: 15px;
            }
        </style>
        <div class="col-md-12 mb-4">
            <div class="card w-100 top-card">
                <div class="col-md-12 justify-content-center next-lot-header">
                    <h5 class="top-title mt-3">{{ $lot->vehicle->year.' '.$lot->vehicle->make.' '.$lot->vehicle->model }}</h5>
                </div>
                <div class="card-body top-body">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-2">
                            @if($lot->vehicle->images->count() > 0)
                                <img loading="lazy" src="{{ asset('storage/'.$lot->vehicle->images->first()->image_url) }}" class="w-100">
                            @else
                                <img loading="lazy" src="{{ asset('../images/wbbonline_img_53.png') }}" class="w-100">
                            @endif
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 border-right">
                            <p style="font-weight: 800;" class="prev-lot-no"> lot no<span class="prev-lot-span"> {{ str_pad($lot->lot_number, 4, '0', STR_PAD_LEFT) }}</span></p>
                            <p class="prev-lot-make-model">{{ $lot->vehicle->make }}</p>
                            <p class="prev-lot-make-model">{{ $lot->vehicle->model }}</p>
                            <p class="prev-lot-make-model">{{ $lot->vehicle->variant }}</p>
                            <br />
                            <a href="{{ url('view-lot/'.$lot->id) }}" class="btn btn-primary lv-dt-btn mt-2">VIEW DETAILS</a>
                            @if($lot->favourite(Auth::user()->id, $lot->id))
                            <a href="#" class="btn btn-secondary mt-2" wire:click.prevent="removeFavourite({{ $lot->id }})"><i class="bi bi-heart"></i> REMOVE FAVOURITES</a>
                            @else
                            <a href="#" class="btn btn-primary lv-dt-btn mt-2" wire:click.prevent="addToFavourites({{ $lot->id }})">ADD TO FAVOURITES</a>
                            @endif
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 border-right">
                            <div class="row mt-3 prev-lot-dl live-bid-section mb-4">
                                <table class="table">
                                  <tbody>
                                    <tr>
                                      <td style="font-size: 18px !important; border-bottom: 1px solid #ffffff !important; padding-bottom: 15px !important; color:#ffffff" class="prev-lot-details-text text-left">Your Bid</td>
                                      <td style="font-size: 18px !important; border-bottom: 1px solid #ffffff !important; padding-bottom: 15px !important; color:#ffffff"  class="prev-lot-details-desc text-white text-left">R @if($lot->userHighestBid()) {{ number_format($lot->userHighestBid()->bid_amount, 2) }} @else 0.00 @endif</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @if($lot->bids->count() == 0)
                                    </tr>
                                      <td style="font-size: 18px !important;" class="prev-lot-details-text text-left">opening bid</td>
                                      <td style="font-size: 18px !important;" class="prev-lot-details-desc text-white text-left">R {{ number_format($lot->start_price,2) }}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                      <td class="prev-lot-details-text text-left">bid increment</td>
                                      <td class="prev-lot-details-desc text-white text-left mb-2">R {{ number_format($lot->increament_value, 2) }}</td>
                                    </tr>
                                    <tr>
                                      <td class="prev-lot-details-text text-left"></td>
                                      <td class="prev-lot-details-desc text-white text-left mb-2"></td>
                                    </tr>
                                      <td style="font-size: 18px !important;" class="prev-lot-details-text text-left">Next Bid</td>
                                      <td style="font-size: 18px !important;" class="prev-lot-details-desc text-white text-left">R @if($lot->nextBidAmount()) {{ number_format($lot->nextBidAmount(), 2) }} @else 0.00 @endif</td>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>
                            <div class="row mt-3 prev-lot-dl">
                                <table class="table lot-dt-tbl">
                                  <tbody>
                                     <tr>
                                      <td class="prev-lot-details-text text-left">est repair cost</td>
                                      <td class="prev-lot-details-desc text-left">R {{ number_format($lot->repairTotal(), 2) }}</td>
                                     </tr>
                                    <!-- <tr>-->
                                    <!--  <td class="prev-lot-details-text text-left">trade price</td>-->
                                    <!--  <td class="prev-lot-details-desc text-left">R {{ $lot->trade_price }}</td>-->
                                    <!--</tr>-->
                                    <tr>
                                      <td class="prev-lot-details-text text-left"> year</td>
                                      <td class="prev-lot-details-desc text-left">{{ $lot->vehicle->year }}</td>
                                    </tr>
                                    <tr>
                                      <td class="prev-lot-details-text text-left"> body type</td>
                                      <td class="prev-lot-details-desc text-left">{{ $lot->vehicle->body_type }}</td>
                                    </tr>
                                    <tr>
                                      <td class="prev-lot-details-text text-left"> mileage</td>
                                      <td class="prev-lot-details-desc text-left">{{ $lot->vehicle->mileage }}</td>
                                    </tr>
                                      <tr>
                                      <td class="prev-lot-details-text text-left"> fuel</td>
                                      <td class="prev-lot-details-desc text-left">{{ $lot->vehicle->fuel_type }}</td>
                                    </tr>
                                    <tr>
                                      <td class="prev-lot-details-text text-left"> transmission</td>
                                      <td class="prev-lot-details-desc text-left">{{ $lot->vehicle->transmission }}</td>
                                    </tr>
                                    <tr>
                                      <td class="prev-lot-details-text text-left"> colour</td>
                                      <td class="prev-lot-details-desc text-left">{{ $lot->vehicle->color }}</td>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <dl class="row mt-3 prev-lot-dl">
                                <dd class="col-sm-12">
                                    <div class="d-flex justify-content-between">
                                        <div class="winning-bid-title">
                                            <h5 style="font-weight:600">Highest Bid: R @if($lot->highestBid()) {{ number_format($lot->highestBid()->bid_amount, 2) }} @else 0.00 @endif</h5>
                                            @if($lot->highestBid())
                                                @if($lot->highestBid()->user_id == Auth::user()->id)
                                                    <h5 style="font-weight:600" class="text-success">You Are Winning</h5>
                                                @else
                                                    <h5 style="font-weight:600" class="text-danger">You Are Losing</h5>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 mt-3">
                                        <p class="timer_{{ $lot->id }} timer_num timer_full_view" wire:poll.1000ms="gettimeLeft" >{{ $count_down }}</p>
                                        @if($lot->status == 1)
                                        <a href="#" class="btn btn-secondary mt-3" wire:click.prevent="placeBid">PLACE BID</a>
                                        @endif
                                    </div>
                                </dd>
                            </dl>
                            <div class="col-md-12 auto-bid-section bid-info-blk">
                                <h3 class="auto-bid-title mt-2">
                                    Auto Bid
                                </h3>
                                <p class=" auto-max-bid-label mb-2">BID UP TO MAXIMUM</p>
                                <form class="form">
                                    <div class="form-group row">
                                        <div class="input-group input-group-section col-sm-12">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text decimal-span">R</span>
                                            </div>
                                            <input type="text" class="form-control list-maximum-bid-input" id="bid-amnt" wire:model.lazy="auto_bid_amount"  placeholder="Auto Bid">
                                            <div class="input-group-append">
                                                <span class="input-group-text decimal-span">.00</span>
                                            </div>
                                        </div>
                                        <div id="no-padding" class="col-sm-12 mt-3 mb-2">
                                            <a href="Javascript:void(0)" class="btn btn-primary go-btn mb-2" wire:click.prevent="testAutoBidAmount">GO</a>
                                            <p style="font-size:16px !important" class="auto-max-bid-label">YOUR AUTO BID: R @if($lot->userHighestAutoBid()) {{ number_format($lot->userHighestAutoBid()->bid_amount, 2) }} @else 0.00 @endif</p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 next-lot-footer">
                </div>
            </div>
        </div>
    </div>
@elseif($view_type == "table")
        <tr id="{{ $lot->id }}">
            @php
            $color = '';
            if($lot->highestBid()){
                if($lot->highestBid()->user_id == Auth::user()->id){
                    $color = 'text-success';
                }
                else{
                    $color = 'text-danger';
                }
            }
            @endphp 
            <td style="width: 5%" class="{{ $color }} make-td">{{$lot->vehicle->year }}</td>
            <td style="width: 5%">
                @if($lot->vehicle->images->count() > 0)
                    <img loading="lazy" class="img-fluid" style="border-radius:.5em" src="{{ asset('storage/'.$lot->vehicle->images->first()->image_url) }}">
                @endif
            </td>
            <td style="width: 15%" class="{{ $color }} make-td">{{$lot->vehicle->make.' '.$lot->vehicle->model.''.$lot->vehicle->variant }}</td>
            <!--<td class="{{ $color }} lot-amounts-data-text">R {{ $lot->trade_price }}</td>-->
            <td class="lot-amounts-data-text {{ $color }}">R @if($lot->userHighestBid()) {{ number_format($lot->userHighestBid()->bid_amount, 2) }} @else 0.00 @endif</td>
            <td class="lot-amounts-data-text {{ $color }}">
                R @if($lot->highestBid()) {{ number_format($lot->highestBid()->bid_amount, 2) }} @else 0.00 @endif
            </td>
            <td class="lot-amounts-data-text {{ $color }}">R @if($lot->nextBidAmount()) {{ number_format($lot->nextBidAmount(), 2) }} @else 0.00 @endif</td>
            
            <td>
              <a href="#" class="btn btn-secondary lv-bid-btn" wire:click.prevent="placeBid">BID</a>
            </td>
            <td >
                <button type="button" class="btn btn-secondary lv-auto-btn" data-toggle="modal"  data-target="#staticBackdrop{{ $lot->id }}">AUTO BID</button>
            </td>
            <td>
                 <a href="{{ url('view-lot/'.$lot->id) }}" class="btn btn-primary lv-auto-btn">VIEW</a>
            </td>
            <td class="{{ $color }}"><p class="timer_{{ $lot->id }} timer_num" wire:poll.1000ms="gettimeLeft" >{{ $count_down }}</p><td>
                <div class="modal fade" id="staticBackdrop{{$lot->id}}" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Auto Bid</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                         <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text decimal-span">R</span>
                            </div>
                            <input type="text" class="form-control" id="bid-amnt" wire:model.defer="auto_bid_amount.{{ $lot->id }}"  placeholder="Auto Bid Amount">
                            <div class="input-group-append">
                                <span class="input-group-text decimal-span">.00</span>
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer d-flex justify-content-center">
                        <a href="Javascript:void(0)" class="btn btn-primary" data-dismiss="modal" wire:click.prevent="testAutoBidAmount" aria-label="Close">GO</a>
                      </div>
                    </div>
                  </div>
                </div>
            </td>
        </tr>
    @endif
    
    @push('scripts')
    <script>
        /*
        $(document).ready(function(){
            var countDownDate = new Date("{{ $time_left }}").getTime();
            var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
                <!--var formatDays = days.toString().padStart(2,'0');-->
                <!--var formatHours = hours.toString().padStart(2,'0');-->
                <!--var formatMinutes = minutes.toString().padStart(2,'0');-->
                <!--var formatSeconds = seconds.toString().padStart(2,'0');-->
                
                var time = '<span class="timer_num">' + hours + '</span><span class="timer_lt">H</span> <span class="timer_num">'+ minutes + '</span><span class="timer_lt">M</span> <span class="timer_num">' + seconds + '</span><span class="timer_lt">S</span> <span>';
                $('.timer_{{ $lot->id }}').html(time);
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("demo").innerHTML = "EXPIRED";
                    $(".{{ $lot->id }}").hide();
                }
            }, 1000);
        });
        */
        window.addEventListener('timer-reset', event => {
            location.reload();
            //Livewire.emit('reloadSingle', [{{ $lot->id }}]);
        })
    </script>
    @endpush
