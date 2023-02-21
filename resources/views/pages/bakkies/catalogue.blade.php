@extends('layouts.main')
@section('content')
@section('title', 'Catalogue')
<section class="catalogue">
    <div class="container-fluid">
        <div class="row">
            @if(Auth::user()->status == 'Active')
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <h2 class="catalogue-heading">CATALOGUE</h2>
                    <div class="card catalogue-card">
                        <div class="col catalogue-title-div">
                            <h5 class="catalogue-card-title">BAKKIE FINDER</h5>
                        </div>
                        <div class="card-body catalogue-card-body">
                            <form method="GET" action="{{ url('filter-catalogue') }}">
                                <div class="row">
                                     <div class="col-4">
                                        <label class="catalogue-label" for="make">Make</label>
                                    </div>
                                    <div class="col-8">
                                        <select id="make" name="make" class="form-control form-control-sm finder-input">
                                            <option value="">Select Make</option>
                                            @foreach($car_list as $list)
                                                <option value="{{ $list->make }}">{{ $list->make }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label class="catalogue-label" for="model">Model</label>
                                    </div>
                                    <div class="col-8">
                                        <select id="model" name="model" class="form-control form-control-sm finder-input">
                                            <option value="">Select Model</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label class="catalogue-label" for="body">Body Type</label>
                                    </div>
                                    <div class="col-8">
                                        <select id="body" name="body" class="form-control form-control-sm finder-input">
                                              <option value="">Select Body Type</option>
                                                @foreach($body_types as $body_type)
                                                    <option value="{{ $body_type->name }}">{{ $body_type->name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label class="catalogue-label" for="mileage">Mileage</label>
                                    </div>
                                    <div class="col-8 slider-wrapper">
                                        <output class="mileage-output" for="widget1" aria-hidden="true"></output><span class="ml-1">km</span>
                                        <input type="range" min="0" max="500000" id="widget1" name="mileage" step="1000">
                                    </div>  
                                    <div class="col-4">
                                        <label class="catalogue-label" for="year">Year</label>
                                    </div>
                                    <div class="col-8">
                                        <div class="row">
                                            <div class="col-12">
                                                <select id="from" name="from" class="form-control form-control-sm w-30 finder-input">
                                                    	<option value="">From</option>
                                						@php
                                						    $date_start = date("Y", strtotime('-30 year'));
                                						    $date_end = date("Y");
                                						@endphp
                                						@for($i = $date_end; $i >= $date_start; $i--)
                                						    @php
                                						        $sel = '';
                                						        if(old('year') == $i){
                                							        $sel = "selected";
                                						        }
                                						    @endphp
                                						    <option value="{{ $i }}" {{ $sel }}>{{ $i }}</option>
                                						@endfor
                                                </select>
                                            </div>
                                            <div class="col-12 text-center">
                                                <span class="catalogue-label">to</span>
                                            </div>
                                            <div class="col-12">
                                                <select id="to" name="to" class="form-control form-control-sm w-30 finder-input">
                                                    <option value="">To</option>
                                                	@for($i = $date_end; $i >= $date_start; $i--)
                            						    @php
                            						        $sel = '';
                            						        if(old('year') == $i){
                            							        $sel = "selected";
                            						        }
                            						    @endphp
                            						    <option value="{{ $i }}" {{ $sel }}>{{ $i }}</option>
                            						@endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="col-6 justify-content-left catalogue-btn">
                                        <button class="btn btn-primary finder-search-btn" type="submit">SEARCH</button>
                                    </div>
                                    <div class="col-6 justify-content-left catalogue-btn">
                                        <a class="btn btn-primary finder-reset-btn" href="{{ url('catalogue') }}">RESET</a>
                                    </div>        
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col text-center mt-4">
                        <span class="finder-span">OR</span>
                    </div>
                    <div class="col text-center mt-2">
                        <a class="view-fav-btn" href="{{ route('favourites', 'favourite') }}"> <img class="img-fluid" src="{{ asset('images/wbbonline_btn_27.png') }}" alt="favourites"></a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 catalogue-header">
                            <div class="row">
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 mt-3">
                                    <h6 class="catalogue-title">AUCTION DATE: 
                                    <span class="date-span ml-2">
                                        @if($auction_date)
                                        {{ $auction_date->date }} | {{ $auction_date->start_time }}
                                        @else
                                        No Auction 
                                        @endif
                                    </span></h6>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 mt-3">
                                    <div class="row">
                                        <div class="col-3 mt-2 ">
                                            <label class="catalogue-search-label" for="search">SEARCH</label>
                                        </div>
                                        <div class="col-9"> 
                                            <form method="GET" action="{{ url('filter-catalogue') }}"> 
                                                <div class="input-group">
                                                    <input class="form-control form-control-sm py-2 mt-1 border search-input" type="search" id="search" name="search">
                                                    <span class="input-group-append">
                                                        <button class="btn btn-outline-secondary btn-sm mt-1 border search-append" type="submit" onclick="this.form.submit()">
                                                            <i style="color:#2e2d2c" class="fa fa-search"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="row">
                                <div class="col-sm-12 col-lg-8 mt-3 mb-4">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-4 col-lg-4">
                                            <form method="get" action="{{ url('sort-catalogue') }}">
                                                 <div class="row">
                                                    <div class="col-sm-2">
                                                        <label for="staticEmail" class="sort-span">SORT:</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <select class="sort-select" name="day" onchange="this.form.submit()">
                                                          <option value="">Auction Dates</option>
                                                          @foreach($dates as $date)
                                                            <option value="{{ $date->date }}">{{ $date->date }}</option>
                                                          @endforeach
                                                        </select>
                                                    </div>
                                                  </div>
                                            </form>
                                        </div>
                                        <div class="col-sm-12 col-md-4 col-lg-4">
                                            <form method="get" action="{{ url('filter-catalogue') }}">
                                                 <div class="row">
                                                    <div class="col-sm-2">
                                                        <label for="staticEmail" class="sort-span">SORT:</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                     <select class="sort-select" name="sort" onchange="this.form.submit()">
                                                        <option value="">Alphabetically</option>
                                                        <option value="ASC">A-Z</option>
                                                        <option value="DESC">Z-A</option>
                                                    </select>
                                                    </div>
                                                  </div>
                                            </form>
                                        </div>
                                        <div class="col-sm-12 col-md-4 col-lg-4">
                                            <form method="get" action="{{ url('filter-catalogue') }}">
                                                
                                                 <div class="row">
                                                    <div class="col-sm-6">
                                                        <label for="staticEmail" class="sort-span">SHOW RESULTS:</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                     <select class="sort-select" name="paginate" onchange="this.form.submit()">
                                                        <option value="10">10</option>
                                                        <option value="15">15</option>
                                                        <option value="20">20</option>
                                                    </select>
                                                    </div>
                                                  </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-4 mt-3 mb-4">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <span class="sort-span text-right">GO TO PAGE:</span>
                                        </div>
                                        <div class="col-sm-8">
                                            {{ $catalogue->appends($_GET)->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         @foreach($catalogue as $vehicle)
                            <div class="col-md-12 col-lg-12 col-xl-12 d-block bakkie-card">
                                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                    <div class="col-auto d-lg-block">
                                        
                                        @php
                                            $image = $vehicle->images()->first();
                                        @endphp
                                        @if($image)
                                            <img class="img-fluid" src="storage/{{$image->image_url}}" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" alt="view-catalogue">
                                        @else
                                            <img class="img-fluid" src="{{ asset('images/wbbonline_img_53.png') }}" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" alt="view-catalogue">
                                        @endif
                                        
                                    </div>
                                    <div class="col p-4 d-flex flex-column position-static">
                                       <div class="row">
                                            <div class="col-6">
                                                <h4 class="bakkie-make">{{ $vehicle->make }}</h4>
                                                <h6 class="bakkie-model">{{ $vehicle->model }}</h6>
                                                <p class="specifications-span variant-spec-span">{{ $vehicle->variant }}</p>
                                                <table class="table catalogue-details-table">
                                                  <tbody>
                                                    <tr>
                                                      <th class="specifications-text">YEAR</th>
                                                      <td class="specifications-span">{{ $vehicle->year }}</td>
                                                    </tr>
                                                    <tr>
                                                      <th class="specifications-text">BODY TYPE</th>
                                                      <td class="specifications-span">{{ $vehicle->body_type }}</td>
                                                    </tr>
                                                    <tr>
                                                      <th class="specifications-text">MILEAGE</th>
                                                      <td class="specifications-span">{{ $vehicle->mileage }} km</td>
                                                    </tr>
                                                    <tr>
                                                      <th class="specifications-text">FUEL</th>
                                                      <td class="specifications-span">{{ $vehicle->fuel_type }}</td>
                                                    </tr>
                                                    <tr>
                                                      <th class="specifications-text">TRANSMISSION</th>
                                                      <td class="specifications-span">{{ $vehicle->transmission }}</td>
                                                    </tr>
                                                    <tr>
                                                      <th class="specifications-text">COLOUR</th>
                                                      <td class="specifications-span">{{ $vehicle->color }}</td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                            </div>
                                            <div class="col-3">
                                                <p class="lot-text">Lot #<span class="lot-span">{{ str_pad($vehicle->lot->id, 4, '0', STR_PAD_LEFT) }}</span></p>
                                                <p class="bid-text">CURRENT BID</p>
                                                <h6 class="bid-price">R @if($vehicle->lot->highestBid()) {{ number_format($vehicle->lot->highestBid()->bid_amount, 2) }} @else 0.00 @endif</h6> 
                                                <p class="bid-text starting-bid">OPENING BID</p>
                                                <h6 class="starting-bid-price">R {{ number_format($vehicle->lot->start_price,2) }}</h6>
                                                <p class="bid-text trade-price">TRADE PRICE</p>
                                                <h6 class="starting-bid-price">R {{ number_format($vehicle->lot->reserve_price,2) }}</h6>
                                                <p class="bid-text starting-bid">EST REPAIR COST</p>
                                                <h6 class="starting-bid-price">R{{ $vehicle->lot->repairTotal() }}</h6>
                                            </div>
                                            <div class="col-3">
                                                <p class="time-span">AUCTION STARTS IN</p>
                                                <p class="time-text"><i class="bi bi-stopwatch"></i> {{ $vehicle->lot->auction->date }} | {{ $vehicle->lot->auction->start_time }}</p>
                                                <!-- <p class="time-span">AUCTION STARTED</p>
                                                <div class="join-auction-div">
                                                    <a href=""><span class="join-auction-text"><i class="bi bi-stopwatch"></i>JOIN AUCTION</span></a>
                                                </div> -->
                                                <div class="catalogue-btn-div">
                                                    <a class="btn btn-primary mt-2" href="{{ url('view-lot/'. $vehicle->lot->id) }}">
                                                        VIEW DETAILS 
                                                    </a>
                                                    <a class="btn btn-secondary mt-2" href="{{ url('view-lot/'. $vehicle->lot->id) }}">
                                                       AUTO BID
                                                    </a>
                                                    <!-- <a href="">
                                                        <img class="img-fluid" src="{{ asset('images/wbbonline_btn_32.png') }}" alt="bid-now">
                                                    </a> -->
                                                </div>
                                                <div class="favourite-btn-space">
                                                    @if($vehicle->lot->favourite(Auth::user()->id, $vehicle->lot->id))
                                                        <a href="{{ url('remove-favourite/'.$vehicle->lot->id) }}"><p class="favourite-span">REMOVE FAVOURITES</p></a>
                                                        <div class="heart-div">
                                                             <a href="{{ url('remove-favourite/'.$vehicle->lot->id) }}">
                                                                <img class="img-fluid"  src="{{ asset('images/wbbonline_img_32.png') }}" alt="bid-now">
                                                            </a> 
                                                        </div>
                                                    @else    
                                                        <a href="{{ url('add-to-favourites/'.$vehicle->lot->id) }}"><p class="favourite-span">ADD TO FAVOURITES</p></a>
                                                        <div class="heart-div">
                                                            <a href="{{ url('add-to-favourites/'.$vehicle->lot->id) }}">
                                                                <img class="img-fluid" src="{{ asset('images/wbbonline_img_31.png') }}" alt="bid-now">
                                                            </a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                       </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 mt-3 d-none mobile-bakkie-card">
                                <div class="card mobile-catalogue-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-2">
                                                @if($vehicle->images->count() > 0)
                                                    <img src="{{ asset('storage/'.$vehicle->images->first()->image_url) }}" class="w-100">
                                                @endif
                                            </div>
                                            <div class="col-sm-12">
                                                <p class="lot-text mt-3">Lot #<span class="lot-span">{{ str_pad($vehicle->lot->id, 4, '0', STR_PAD_LEFT) }}</span></p>
                                                <table class="table catalogue-details-table">
                                                  <tbody>
                                                     <tr>
                                                      <th class="time-span">AUCTION STARTS IN</th>
                                                      <td class="time-text"><i class="bi bi-stopwatch"></i> {{ $vehicle->lot->auction->date }} | {{ $vehicle->lot->auction->start_time }}</td>
                                                    </tr>
                                                    <tr>
                                                      <th class="specifications-text">YEAR</th>
                                                      <td class="specifications-span">{{ $vehicle->year }}</td>
                                                    </tr>
                                                    <tr>
                                                      <th class="specifications-text">BODY TYPE</th>
                                                      <td class="specifications-span">{{ $vehicle->body_type }}</td>
                                                    </tr>
                                                    <tr>
                                                      <th class="specifications-text">MILEAGE</th>
                                                      <td class="specifications-span">{{ $vehicle->mileage }} km</td>
                                                    </tr>
                                                    <tr>
                                                      <th class="specifications-text">FUEL</th>
                                                      <td class="specifications-span">{{ $vehicle->fuel_type }}</td>
                                                    </tr>
                                                    <tr>
                                                      <th class="specifications-text">TRANSMISSION</th>
                                                      <td class="specifications-span">{{ $vehicle->transmission }}</td>
                                                    </tr>
                                                    <tr>
                                                      <th class="specifications-text">COLOUR</th>
                                                      <td class="specifications-span">{{ $vehicle->color }}</td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                            </div>
                                            <div class="col-sm-12">
                                                <table class="table catalogue-details-table">
                                                        <tbody>
                                                            <tr>
                                                              <th class="specifications-text">CURRENT BID</th>
                                                              <td class="starting-bid-price">R @if($vehicle->lot->highestBid()) {{ number_format($vehicle->lot->highestBid()->bid_amount, 2) }} @else 0.00 @endif</td>
                                                            </tr>
                                                            <tr>
                                                              <th class="specifications-text">OPENING BID</th>
                                                              <td class="starting-bid-price">R {{ number_format($vehicle->lot->start_price,2) }}</td>
                                                            </tr>
                                                            <tr>
                                                              <th class="specifications-text">TRADE PRICE</th>
                                                              <td class="starting-bid-price">R {{ number_format($vehicle->lot->reserve_price,2) }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                            </div>
                                            <div class="col-sm-6">
                                                <a class="btn btn-primary mt-2" href="{{ url('view-lot/'. $vehicle->lot->id) }}">
                                                    VIEW DETAILS 
                                                </a>
                                                <a class="btn btn-secondary mt-2" href="{{ url('view-lot/'. $vehicle->lot->id) }}">
                                                    AUTO BID
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-sm-7 mt-4 mb-4 ml-1">
                            <div class="row">
                                <div class="col-sm-4">
                                    <span class="sort-span">GO TO PAGE:</span>
                                </div>
                                <div class="col-sm-8">
                                    {{ $catalogue->appends($_GET)->links() }}
                                </div>
                            </div>
                        </div>
                </div>
            @else
                <div class="col-md-12 mt-5">
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
        </div>
    </div>
</section>
@include('includes.assistance')
@push('scripts')
<script>
$(document).ready(function(){
    $('#make').on('change', function(e){
        var make = $(this).val();
        getModels();
    });
});
function getModels(){
    var make = $('#make').val();
    if(make !== ""){
        $.ajax({
			url: "{{ url('getModels2') }}/"+make,
			type: 'GET',
			dataType:'json',
			success: function(res) {
				if(res.status == "success"){
					$('#model').html(res.data);
				}
			}
		});
    }
}

const slider = document.querySelector('.slider-wrapper'),
      sliderInput = slider.querySelector('input'),
      sliderOutput = slider.querySelector('output'),
      sliderThumb = slider.querySelector('.custom-thumb'),
      sliderFill = slider.querySelector('.custom-fill');
      
function initSlider(min, max, startValue) {
  sliderInput.setAttribute('min', min);
  sliderInput.setAttribute('max', max);
  sliderInput.value = startValue;
  
  const onSliderChange = function(event) {
    let value = event.target.value;
    sliderOutput.innerHTML = value;
    sliderThumb.style.left = (value/max * 100) + '%';
    sliderFill.style.width = (value/max * 100) + '%';
  }
  
  sliderInput.addEventListener('input', onSliderChange);
  sliderInput.addEventListener('change', onSliderChange);
  
  // set slider to initial value
  const initialInput = new Event('input', {
    'target': { 'value': startValue }
  });
  sliderInput.dispatchEvent(initialInput);
}

initSlider(0, 500000, 0);
</script>
@endpush
@endsection