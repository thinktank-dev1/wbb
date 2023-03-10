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
                        <a class="btn btn-secondary back-to-cat-btn" href="{{ url()->previous() }}">BACK</a>
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
                            <div class="col-6 text-right mobile-max-width">
                                <button class="btn btn-primary list-view-btn mt-3" id="view-grid" wire:click.prevent="changeView('list')">Full View</button>
                            </div>
                            <div class="col-6 text-left  mobile-max-width">
                                <button class="btn btn-primary table-view-btn mt-3" id="view-list"  wire:click.prevent="changeView('table')">List View</button>
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
                    @if(Auth::user()->status == 'Active')
                        @if($has_auction)
                            @if($lots)
                                @if($view_type == "table")
                                    <div class="col-md-12 mb-4">
                                        <div class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
                                            <table class="table auction-tbl">
                                                <thead>
                                                    <tr>
                                                      <th></th>
                                                      <th class="auction-details-data-text">Vehicle</th>
                                                      <th class="auction-details-data-text">Trade Price</th>
                                                      <th class="auction-details-data-text">Highest Bid</th>
                                                      <th class="auction-details-data-text">Next Bid</th>
                                                      <th></th>
                                                      <th></th>
                                                      <th></th>
                                                      <th class="auction-details-data-text">Time Left</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                @endif
                                @foreach($lots AS $lot)
                                    @if($lot->status == 1)
                                        <livewire:auction-list-item :lot_id="$lot->id" :view_type="$view_type" :wire:key="$lot->id.uniqid()" />
                                    @endif
                                @endforeach
                                
                                @if($this->view_type == "table")
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    @foreach($lots AS $lot)
                                        <div class="modal fade" id="exampleModal{{$lot->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <input type="text" class="form-control" id="bid-amnt" wire:model.lazy="auto_bid_amount.{{ $lot->id }}"  placeholder="Auto Bid Amount">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text decimal-span">.00</span>
                                                    </div>
                                                </div>
                                              </div>
                                              <div class="modal-footer d-flex justify-content-center">
                                                <a href="Javascript:void(0)" class="btn btn-primary" data-dismiss="modal" aria-label="Close">GO</a>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    @endforeach
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
                                            <h2 class="startTimer"></h2>
                                            @else
                                            <h2>THERE ARE NO ACTIVE AUCTIONS</h2>
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
                                    @if(Auth::user()->status == 'In-Active' || Auth::user()->status == NULL)
                                        <div class="alert alert-warning">
                                            <p style="color:#2e2d2c; font-size:18px; font-family:Bold">Your account is not yet active. Please complete your profile and upload all required documents</p> <a class="btn btn-primary ml-4" href="{{ url('dashboard') }}">Profile<i class="bi bi-arrow-right-circle-fill ml-2"></i></a>
                                        </div>
                                    @elseif(Auth::user()->status == 'Rejected')
                                        <div class="alert alert-danger">
                                            <p style="color:#2e2d2c; font-size:18px; font-family:Bold">Sorry, We Buy Bakkies has rejected your registration to the live auction system because of the lack of necessary documents and information. Please complete your profile and upload all required documents</p> <a class="btn btn-primary ml-4" href="{{ url('dashboard') }}">Profile<i class="bi bi-arrow-right-circle-fill ml-2"></i></a>
                                        </div>
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
            startTimer();
        
            window.Echo.channel('auction-chanel').listen('.auction.update', (data) => {
                console.log(data);
                if(data.action == 'bid_placed'){
                    Livewire.emit('reloadCar');
                }
                if(data.action == 'start'){
                    //Livewire.emit('reloadCar');
                    location.reload();
                }
                if(data.action == 'stop'){
                    location.reload();
                    //Livewire.emit('reloadCar');
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
        
        function startTimer(){
            var countDownDate = new Date("{{ $start_time }}").getTime();
            var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
                var start = '<span class="timer_num">' + days + '</span><span class="timer_lt">Days</span> <span class="timer_num">' + hours + '</span><span class="timer_lt">H</span> <span class="timer_num">'+ minutes + '</span><span class="timer_lt">M</span> <span class="timer_num">' + seconds + '</span><span class="timer_lt">S</span> <span>';
                $('.startTimer').html(start);
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