@section('title', 'Auction')
<div >
<style>
    .timer_num{
        font-weight: 900;
        font-size: 30px;
    }
    .timer_lt{
        font-size: 15px;
    }
</style>
<section class="lot ">
    <div class="container-fluid">
        <div class="row justify-content-center mt-5 lot-top-bar">
            <div class="col mt-4">
                <div class="row lot-top-bar">
                    <div class="col d-flex justify-content-start mobile-center">
                        @if($is_fvourite)
                        <h3 class="auction-heading ml-5"> FAVOURITES</h3>
                        @else
                        <h3 class="auction-heading ml-5"> LIVE AUCTION</h3>
                        @endif
                    </div>
                    <div class="col d-flex justify-content-end mr-5 mobile-center">
                        <a class="btn btn-secondary back-to-cat-btn" href="{{ route('catalogue') }}">BACK TO CATALOGUE</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col lot-title-div mt-3">
                <div class="row lot-top-bar">
                    <div class="col-8 mobile-max-width">
                        <h3 class="lot-number-title mt-3"> AUCTION NAME<span class="lot-number-span ml-3">@if($has_auction) {{ $group->name }} @endif</span></h3>
                    </div>
                    <div class="col-4 text-right mobile-max-width">
                        <div class="row lot-top-bar">
                            <div class="col-9 text-right mobile-max-width">
                                <button class="btn btn-primary mt-3" id="view-grid" wire:click.prevent="changeView('list')"><i class="bi bi-grid-1x2-fill"></i></button>
                            </div>
                            <div class="col-3 text-left mobile-max-width">
                                <button class="btn btn-primary mt-3" id="view-list"  wire:click.prevent="changeView('table')"><i class="bi bi-table"></i></button>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>    
            </div>
        </div>
        
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-12 mt-5 lot-details">
                <div class="row">
                    @if($has_auction)
                        @if($lots)
                            @if($view_type == "list")
                                @foreach($lots AS $lot)
                                    <div class="col-md-12 mb-4">
                                        <div class="card w-100 top-card">
                                            <div class="col-md-12 justify-content-center next-lot-header">
                                                <h5 class="top-title mt-3">{{ $lot->vehicle->year.' '.$lot->vehicle->make.' '.$lot->vehicle->model }}</h5>
                                            </div>
                                            <div class="card-body top-body">
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-2">
                                                        @if($lot->vehicle->images->count() > 0)
                                                            <img src="{{ asset('storage/'.$lot->vehicle->images->first()->image_url) }}" class="w-100">
                                                        @endif
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-3 border-right">
                                                        <p style="font-weight: 800;" class="prev-lot-no"> lot no<span class="prev-lot-span"> {{ str_pad($lot->id, 4, '0', STR_PAD_LEFT) }}</span></p>
                                                        <p class="prev-lot-make-model">{{ $lot->vehicle->make }}</p>
                                                        <p class="prev-lot-make-model">{{ $lot->vehicle->model }}</p>
                                                        <p class="prev-lot-make-model">{{ $lot->vehicle->variant }}</p>
                                                        <br />
                                                        <a href="{{ url('view-lot/'.$lot->id) }}" class="btn btn-primary mt-2">VIEW DETAILS</a>
                                                        @if($lot->favourite(Auth::user()->id, $lot->id))
                                                        <a href="{{ url('remove-favourite/'.$lot->id) }}" class="btn btn-secondary mt-2">REMOVE FAVOURITES</a>
                                                        @else
                                                        <a href="{{ url('remove-favourite/'.$lot->id) }}" class="btn btn-primary mt-2">ADD TO FAVOURITES</a>
                                                        @endif
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-4 border-right">
                                                       <dl class="row mt-3 prev-lot-dl live-bid-section mb-4">
                                                            <dt class="col-sm-6">
                                                                <p style="font-size: 18px; border-bottom: 1px solid #8cd50a; padding-bottom: 10px;" class="prev-lot-details-text text-left">Your Bid</p>
                                                                <p class="prev-lot-details-text text-left">winning bid</p>
                                                                <p class="prev-lot-details-text text-left">opening bid</p>
                                                                <p class="prev-lot-details-text text-left">Next Bid</p>
                                                            </dt>
                                                            <dd class="col-sm-6">
                                                                <p style="font-size: 18px; border-bottom: 1px solid #8cd50a; padding-bottom: 10px;"  class="prev-lot-details-desc text-white text-left">R @if($lot->userHighestBid()) {{ number_format($lot->userHighestBid()->bid_amount, 2) }} @else 0.00 @endif</p>
                                                                <p class="prev-lot-details-desc text-white text-left">R @if($lot->highestBid()) {{ number_format($lot->highestBid()->bid_amount, 2) }} @else 0.00 @endif</p>
                                                                <p class="prev-lot-details-desc text-white text-left">R {{ number_format($lot->start_price,2) }}</p>
                                                                <p class="prev-lot-details-desc text-white text-left">R @if($lot->nextBidAmount()) {{ number_format($lot->nextBidAmount(), 2) }} @else 0.00 @endif</p>
                                                            </dd>
                                                        </dl>
                                                        <dl class="row mt-3 prev-lot-dl">
                                                            <dt class="col-sm-6">
                                                                <p class="prev-lot-details-text text-left"> year</p>
                                                                <p class="prev-lot-details-text text-left"> body type</p>
                                                                <p class="prev-lot-details-text text-left"> mileage</p>
                                                                <p class="prev-lot-details-text text-left"> fuel</p>
                                                                <p class="prev-lot-details-text text-left"> transmission</p>
                                                                <p class="prev-lot-details-text text-left"> colour</p>
                                                                <p class="prev-lot-details-text text-left">trade price</p>
                                                                
                                                            </dt>
                                                            <dd class="col-sm-6">
                                                                <p class="prev-lot-details-desc text-left">{{ $lot->vehicle->year }}</p>
                                                                <p class="prev-lot-details-desc text-left">{{ $lot->vehicle->body_type }}</p>
                                                                <p class="prev-lot-details-desc text-left">{{ $lot->vehicle->mileage }}</p>
                                                                <p class="prev-lot-details-desc text-left">{{ $lot->vehicle->fuel_type }}</p>
                                                                <p class="prev-lot-details-desc text-left">{{ $lot->vehicle->transmission }}</p>
                                                                <p class="prev-lot-details-desc text-left">{{ $lot->vehicle->color }}</p>
                                                                <p class="prev-lot-details-desc text-left">R 0.00</p>
                                                            </dd>
                                                        </dl>
                                                        
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <dl class="row mt-3 prev-lot-dl">
                                                            <dd class="col-sm-12">
                                                                <small>Auction will close in:</small>
                                                                <div class="lot-number-title timer"></div>
                                                                <div class="mb-3 mt-3">
                                                                    <label style="font-weight: 800;" class="form-label">Custom Bid Amount</label>
                                                                    <input type="number" class="form-control" wire:model.lazy="custom_amount">
                                                                    <small>Leave blank to use asking price</small><br />
                                                                    <a href="#" class="btn btn-secondary mt-3" wire:click.prevent="placeBid({{ $lot->id }})">PLACE BID</a>
                                                                </div>
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 next-lot-footer">
                                            </div>
                                        
                                        </div>
                                    </div>
                                @endforeach
                                
                            @elseif($view_type == "table")
                                <div class="col-md-12 mb-4">
                                    <div class="row">
                                        <div class="col-4"><h3 class="lot-number-title mt-2">Auction will close in:</h3></div>
                                        <div class="col-2">
                                            <div class="lot-number-title timer"></div>
                                        </div>
                                    </div>
                                    <table class="table">
                                      <thead>
                                        <tr>
                                          <th class="auction-details-data-text" scope="col">auction No</th>
                                          <th class="auction-details-data-text" scope="col">Year</th>
                                          <th class="auction-details-data-text" scope="col">Vehicle</th></th>
                                          <th class="auction-details-data-text" scope="col">KM</th>
                                          <th class="auction-details-data-text" scope="col">Color</th>
                                          <th class="auction-details-data-text" scope="col">Trade</th>
                                          <th class="auction-details-data-text" scope="col">Opening Bid</th>
                                          <th class="auction-details-data-text" scope="col">Highest Bid</th>
                                          <th class="auction-details-data-text" scope="col">Next Bid</th>
                                          <th class="auction-details-data-text" scope="col">Bid</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($lots AS $lot)
                                        <tr>
                                            <th>#{{ str_pad($lot->id, 4, '0', STR_PAD_LEFT) }}</th>
                                            <td>{{ $lot->vehicle->year}}</td>
                                            <td>{{$lot->vehicle->make.' '.$lot->vehicle->model.''.$lot->vehicle->variant }}</td>
                                            <td>{{ $lot->vehicle->mileage }}</td>
                                            <th>{{ $lot->vehicle->color }}</th>
                                            <td>R 0.00</td>
                                            <td class="lot-amounts-data-text">R {{ number_format($lot->start_price,2) }}</td>
                                            <td class="lot-amounts-data-text">R @if($lot->userHighestBid()) {{ number_format($lot->userHighestBid()->bid_amount, 2) }} @else 0.00 @endif</td>
                                            <th class="lot-amounts-data-text">R @if($lot->nextBidAmount()) {{ number_format($lot->nextBidAmount(), 2) }} @else 0.00 @endif</th>
                                            <th>
                                              <a href="#" class="btn btn-secondary" wire:click.prevent="placeBid({{ $lot->id }})"><img class"fluid" src="{{ asset('images/wbbonline_img_44.png') }}" alt="bid-now"></a>
                                              <a href="{{ url('view-lot/'.$lot->id) }}" class="btn btn-primary icon-btn"><i class="bi bi-eye-fill"></i></a>
                                            </th>
                                        </tr>
                                        @endforeach
                                      </tbody>
                                    </table>
                                </div>
                            @endif
                            {{ $lots->links() }}
                        @else
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center">
                                            @if($is_fvourite)
                                                <h2>YOU HAVE NOT ADDED VEHICLES TO FAVOURITES</h2>
                                            @else
                                                <h2>NO LOTS FOUND</h2>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        @if($next_auction_time)
                                        <h2>Next Auction Starts: {{ $next_auction_time }}</h2>
                                        @else
                                        <h2>THERE ARE NO ACTIVE AUCTIONS</h2>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    <div class="col-md-12 mt-5 d-flex justify-content-center back-catalogue-btn">
                        <a href="{{ route('catalogue') }}" class="btn btn-secondary">BACK TO CATALOGUE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    @vite('resources/js/app.js')
    <script src="//{{ Request::getHost() }}:{{env('LARAVEL_ECHO_PORT')}}/socket.io/socket.io.js"></script>
    @vite('resources/js/laravel_echo_setup.js')
    <script>
        $(document).ready(function(){
            window.Echo.channel('auction-chanel').listen('.auction.update', (data) => {
                console.log(data);
                if(data.action == 'bid_placed'){
                    Livewire.emit('reloadCar');
                }
                if(data.action == 'start'){
                    Livewire.emit('reloadCar');
                }
                if(data.action == 'end'){
                    Livewire.emit('reloadCar');
                }
            });    
        });
        window.addEventListener('toast', event => {
            //alert('Name updated to: ' + event.detail.message);
            if(event.detail.type == "success"){
                $.toast({
                    heading: 'Success',
                    text: event.detail.message,
                    showHideTransition: 'slide',
                    icon: 'success',
                    position: 'mid-center',
                });
            }
        });
    
        $(document).ready(function(){
            showTimer();
        });
        function showTimer(){
            var countDownDate = new Date("{{ $end_time }}").getTime();
            var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
                var time = '<span class="timer_num">' + hours + '</span><span class="timer_lt">H</span> <span class="timer_num">'+ minutes + '</span><span class="timer_lt">M</span> <span class="timer_num">' + seconds + '</span><span class="timer_lt">S</span> <span>';
                $('.timer').html(time);
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("demo").innerHTML = "EXPIRED";
                }
            }, 1000);
        }
    </script>
    @endpush
</section>

@include('includes.assistance')
</div>