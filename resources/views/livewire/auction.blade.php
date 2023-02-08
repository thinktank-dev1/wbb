@section('title', 'Auction')
<div>
<style>
    .timer_num{
        font-weight: 900;
        font-size: 30px;
    }
    .timer_lt{
        font-size: 15px;
    }
</style>
<section class="lot">
    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <div class="col mt-4">
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <h3 class="auction-heading ml-5"> LIVE AUCTION</h3>
                    </div>
                    <div class="col d-flex justify-content-end mr-5">
                        <a class="btn btn-secondary back-to-cat-btn" href="{{ route('catalogue') }}">BACK TO CATALOGUE</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col lot-title-div d-flex justify-content-start mt-3">
                <h3 class="lot-number-title mt-3"> AUCTION NAME<span class="lot-number-span ml-3">@if($has_auction) {{ $group->name }} @endif</span></h3>
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
                                        <p class="prev-lot-no"> lot no<span class="prev-lot-span"> {{ str_pad($lot->id, 4, '0', STR_PAD_LEFT) }}</span></p>
                                        <p class="prev-lot-make-model">{{ $lot->vehicle->make }}</p>
                                        <p class="prev-lot-make-model">{{ $lot->vehicle->model }}</p>
                                        <p class="prev-lot-make-model">{{ $lot->vehicle->variant }}</p>
                                        <br />
                                        <a href="{{ url('view-lot/'.$lot->id) }}" class="btn btn-primary mt-2">VIEW DETAILS</a>
                                        <a href="{{ url('add-to-favourites/'.$lot->id) }}" class="btn btn-primary mt-2">ADD TO FAVOURITES</a>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-3 border-right">
                                       <dl class="row mt-3 prev-lot-dl live-bid-section mb-4">
                                            <dt class="col-sm-6">
                                                <p class="prev-lot-details-text text-left">starting bid</p>
                                                <p class="prev-lot-details-text text-left">winning bid</p>
                                                <p class="prev-lot-details-text text-left">Your Bid</p>
                                                <p class="prev-lot-details-text text-left">Next Bid</p>
                                            </dt>
                                            <dd class="col-sm-6">
                                                <p class="prev-lot-details-desc text-white text-left">R {{ number_format($lot->start_price,2) }}</p>
                                                <p class="prev-lot-details-desc text-white text-left">R @if($lot->highestBid()) {{ number_format($lot->highestBid()->bid_amount, 2) }} @else 0.00 @endif</p>
                                                <p class="prev-lot-details-desc text-white text-left">R @if($lot->userHighestBid()) {{ number_format($lot->userHighestBid()->bid_amount, 2) }} @else 0.00 @endif</p>
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
                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                        <dl class="row mt-3 prev-lot-dl">
                                            <dd class="col-sm-12">
                                                <small>Auction will close in:</small>
                                                <div class="lot-number-title timer"></div>
                                                <div class="mb-3 mt-3">
                                                    <label class="form-label">Custom Bid Amount</label>
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
                    {{ $lots->links() }}
                    @else
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h2>THERE ARE NO ACTIVE AUCTIONS</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    <div class="col-md-12 mt-5 d-flex justify-content-center">
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
                if(data.action == 'bid_placed'){
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