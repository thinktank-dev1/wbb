@extends('layouts.main')
@section('content')
@section('title', 'My Favourites')
<section class="catalogue">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <h2 class="catalogue-heading">MY FAVOURITES</h2>
                <div class="card catalogue-card">
                    <div class="col catalogue-title-div">
                        <h5 class="catalogue-card-title">BAKKIE FINDER</h5>
                    </div>
                    <div class="card-body catalogue-card-body">
                        <form method="get" action="{{ url('filter-favourites') }}">
                            @csrf
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
                                    <input type="range" min="0" max="500000" value="10000" id="widget1" name="mileage" step="1">
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
                                    <a class="btn btn-primary finder-reset-btn" href="{{ url('favourites') }}">RESET</a>
                                </div>        
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 catalogue-header">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8 col-xl-8 mt-3">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                    <h6 class="catalogue-title"><span class="date-span">{{ $items }}</span> ITEMS IN LIST</h6>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 col-xl-4  mt-2">
                                    <form method="get" action="{{ url('filter-favourites') }}">
                                         <div class="row">
                                            <div class="col-sm-3">
                                                <label for="staticEmail" class="sort-span">SORT:</label>
                                            </div>
                                            <div class="col-sm-9">
                                             <select class="sort-select" name="sort" onchange="this.form.submit()">
                                                <option value="">Alphabetically</option>
                                                <option value="ASC">A-Z</option>
                                                <option value="DESC">Z-A</option>
                                            </select>
                                            </div>
                                          </div>
                                    </form>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 col-xl-4  mt-2">
                                    <form method="get" action="{{ url('filter-favourites') }}">
                                         <div class="row">
                                            <div class="col-sm-8">
                                                <label for="paginate" class="sort-span">SHOW RESULTS:</label>
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
                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 col-xl-4 mt-3">
                            <div class="row">
                                <div class="col-3 mt-2">
                                    <label class="search-label" for="search">SEARCH</label>
                                </div>
                                <div class="col-9"> 
                                    <form method="get" action="{{ url('filter-favourites') }}"> 
                                        <div class="input-group">
                                            <input class="form-control form-control-sm py-2 mt-1 border search-input" type="search" id="search" name="search">
                                            <span class="input-group-append">
                                                <button class="btn btn-outline-secondary btn-sm mt-1 border search-append" type="submit">
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
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3 mb-5">
                    <div class="row">
                        <div class="col-sm-10 text-right">
                            <span class="sort-span text-right">GO TO PAGE:</span>
                        </div>
                        <div class="col-sm-2">
                            {{ $favourites->appends($_GET)->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 bakkie-card">
                    @foreach($favourites as $favourite)
                        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col-auto d-none d-lg-block">
                        @if($favourite->lot()->exists())
                            @php
                                $image = $favourite->lot->vehicle->images()->first();
                            @endphp
                        @endif
                            @if($image)
                                <img class="img-fluid" src="{{ asset('storage/'.$image->image_url) }}" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" alt="view-catalogue">
                            @else
                                <img class="img-fluid" src="{{ asset('images/wbbonline_img_53.png') }}" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" alt="view-catalogue">
                            @endif    
                        </div>
                        <div class="col p-4 d-flex flex-column position-static">
                            <div class="row">
                                <div class="col-6">
                                    <h4 class="bakkie-make">{{ $favourite->lot->vehicle->make }}</h4>
                                    <h6 class="bakkie-model">{{ $favourite->lot->vehicle->model }}</h6>
                                    <p class="specifications-span">{{ $favourite->lot->vehicle->variant }}</p>
                                    <table class="table">
                                      <tbody>
                                        <tr>
                                          <td class="specifications-text">YEAR</td>
                                          <td class="specifications-span">{{ $favourite->lot->vehicle->year }}</td>
                                        </tr>
                                        <tr>
                                          <td class="specifications-text">BODY TYPE</td>
                                          <td class="specifications-span">{{ $favourite->lot->vehicle->body_type }}</td>
                                        </tr>
                                        <tr>
                                          <td class="specifications-text">MILEAGE</td>
                                          <td class="specifications-span">{{ $favourite->lot->vehicle->mileage }} km</td>
                                        </tr>
                                        <tr>
                                          <td class="specifications-text">FUEL</td>
                                          <td class="specifications-span">{{ $favourite->lot->vehicle->fuel_type }}</td>
                                        </tr>
                                        <tr>
                                          <td class="specifications-text">TRANSMISSION</td>
                                          <td class="specifications-span">{{ $favourite->lot->vehicle->transmission }}</td>
                                        </tr>
                                        <tr>
                                          <td class="specifications-text">COLOUR</td>
                                          <td class="specifications-span">{{ $favourite->lot->vehicle->color }}</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                </div>
                                <div class="col-3">
                                    <p class="lot-text">Lot #<span class="lot-span">{{ str_pad($favourite->lot->id, 4, '0', STR_PAD_LEFT) }}</span></p>
                                    <p class="bid-text">CURRENT BID</p>
                                        <h6 class="bid-price">R -</h6> 
                                    <p class="bid-text starting-bid">STARTING BID</p>
                                    <h6 class="starting-bid-price">R {{ number_format($favourite->lot->start_price,2) }}</h6>
                                    <p class="bid-text trade-price">TADE PRICE</p>
                                    <h6 class="starting-bid-price">R {{ number_format($favourite->lot->reserve_price,2) }}</h6>
                                </div>
                                <div class="col-3">
                                    <p class="time-span">AUCTION STARTS IN</p>
                                    <p class="time-text"><i class="bi bi-stopwatch"></i> @if($favourite->lot->auction){{ $favourite->lot->auction->date }}@endif</p>
                                    <!-- <p class="time-span">AUCTION STARTED</p>
                                    <div class="join-auction-div">
                                        <a href=""><span class="join-auction-text"><i class="bi bi-stopwatch"></i>JOIN AUCTION</span></a>
                                    </div> -->
                                    <div class="catalogue-btn-div">
                                        <a href="{{ url('view-lot/'. $favourite->lot->id) }}">
                                            <img class="img-fluid" src="{{ asset('images/wbbonline_btn_30.png') }}" alt="view-details">
                                        </a>
                                        <a href="">
                                            <img class="img-fluid" src="{{ asset('images/wbbonline_btn_31.png') }}" alt="pre-bid">
                                        </a>
                                        <!-- <a href="">
                                            <img class="img-fluid" src="{{ asset('images/wbbonline_btn_32.png') }}" alt="bid-now">
                                        </a> -->
                                    </div>
                                    <div class="favourite-btn-space">
                                        <p class="added-span">ADDED</p>
                                        <div class="favourite-heart-div">
                                                <a href="{{ url('remove-favourite/'.$favourite->lot->id) }}">
                                                <img class="img-fluid"  src="{{ asset('images/wbbonline_img_32.png') }}" alt="bid-now">
                                            </a> 
                                        </div>
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
                                {{ $favourites->appends($_GET)->links() }}
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
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

initSlider(0, 500000, 10000);
</script>
@endpush
@endsection