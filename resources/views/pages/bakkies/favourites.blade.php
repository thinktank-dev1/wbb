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
                        <form>
                            <div class="row">
                                <div class="col-4">
                                    <label class="catalogue-label" for="make">Make</label>
                                </div>
                                <div class="col-8">
                                    <select id="make" name="make" class="form-control form-control-sm finder-input">
                                        <option></option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label class="catalogue-label" for="model">Model</label>
                                </div>
                                <div class="col-8">
                                    <select id="model" name="model" class="form-control form-control-sm finder-input">
                                        <option></option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label class="catalogue-label" for="body">Body Type</label>
                                </div>
                                <div class="col-8">
                                    <select id="body" name="body" class="form-control form-control-sm finder-input">
                                        <option></option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label class="catalogue-label" for="mileage">Mileage</label>
                                </div>
                                <div class="col-8">
                                    <input class="multi-range" id="mileage" name="mileage" type="range"/>
                                </div>  
                                <div class="col-4">
                                    <label class="catalogue-label" for="year">Year</label>
                                </div>
                                <div class="col-8">
                                    <div class="row">
                                        <div class="col-5">
                                            <select id="from" name="from" class="form-control form-control-sm w-30 finder-input">
                                                <option></option>
                                            </select>
                                        </div>
                                        <div class="col-2">
                                            <span class="catalogue-label">to</span>
                                        </div>
                                        <div class="col-5">
                                            <select id="from" name="from" class="form-control form-control-sm w-30 finder-input">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>  
                                <div class="col-4">
                                    <label class="catalogue-label" for="lot">Lot #</label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control form-control-sm" type="text" name="lot" id="lot">
                                </div>   
                                <div class="col-6 justify-content-left catalogue-btn">
                                    <a type="submit"><img class="img-fluid" src="{{ asset('images/wbbonline_btn_25.png') }}" alt="search-catalogue"></a></a>
                                </div>        
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 catalogue-header">
                    <div class="row">
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 mt-3">
                            <h6 class="catalogue-title"><span class="date-span">3</span> ITEMS IN LIST</h6>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 mt-2">
                            <form>
                                <div class="row">
                                    <div class="col-3 mt-2">
                                        <label class="search-label" for="search">SEARCH</label>
                                    </div>
                                    <div class="col-9"> 
                                        <div class="input-group"> 
                                            <input class="form-control form-control-sm py-2 mt-1 border search-input" type="search" id="search">
                                            <span class="input-group-append">
                                                <button class="btn btn-outline-secondary btn-sm mt-1 border search-append" type="button">
                                                    <i style="color:#2e2d2c" class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="row">
                        <div class="col-8 mt-3 mb-4">
                            <div class="row">
                                <div class="col-4">
                                    <span class="sort-span">SORT:</span>
                                    <div class="btn-group">
                                        <a type="button" class="dropdown-toggle sort-anchor" data-toggle="dropdown" aria-expanded="false">
                                            Alphabetically
                                        </a>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button">Action</button>
                                            <button class="dropdown-item" type="button">Another action</button>
                                            <button class="dropdown-item" type="button">Something else here</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <span class="sort-span">SHOW RESULTS:</span>
                                    <div class="btn-group">
                                        <a type="button" class="dropdown-toggle results-anchor" data-toggle="dropdown" aria-expanded="false">
                                            10
                                        </a>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button">Action</button>
                                            <button class="dropdown-item" type="button">Another action</button>
                                            <button class="dropdown-item" type="button">Something else here</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mt-3 mb-4">
                            <span class="sort-span">GO TO PAGE:</span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 bakkie-card">
                    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col-auto d-none d-lg-block">
                            <img class="img-fluid"  width="300" height="250" src="{{ asset('images/wbbonline_img_22.png') }}" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" alt="view-catalogue">
                        </div>
                        <div class="col p-4 d-flex flex-column position-static">
                           <div class="row">
                                <div class="col-6">
                                    <h4 class="bakkie-make">TOYOTA</h4>
                                    <h6 class="bakkie-model">HILUX 2.8 GD-6 RAIDER</h6>
                                    <div class="row">
                                        <div class="col-5">
                                            <p class="specifications-text">YEAR</p>
                                            <p class="specifications-text">BODY TYPE</p>
                                            <p class="specifications-text">MILEAGE</p>
                                            <p class="specifications-text">FUEL</p>
                                            <p class="specifications-text">TRANSMISSION</p>
                                            <p class="specifications-text">COLOUR</p>
                                        </div>
                                        <div class="col-7">
                                            <p class="specifications-span">2019</p>
                                            <p class="specifications-span">Double Cap</p>
                                            <p class="specifications-span">96000 km</p>
                                            <p class="specifications-span">Diesel</p>
                                            <p class="specifications-span">Automatic</p>
                                            <p class="specifications-span">White</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <p class="lot-text">Lot #<span class="lot-span">2340</span></p>
                                    <p class="bid-text">CURRENT BID</p>
                                    <!-- <h6 class="bid-price">R -</h6> -->
                                    <h6 class="bid-price">R 480000</h6>
                                    <p class="bid-text starting-bid">STARTING BID</p>
                                    <h6 class="starting-bid-price">R -</h6>
                                    <!-- <h6 class="starting-bid-price">R 480000</h6> -->
                                    <p class="bid-text trade-price">TADE PRICE</p>
                                    <h6 class="starting-bid-price">R 480000</h6>
                                </div>
                                <div class="col-3">
                                    <p class="time-span">AUCTION STARTS IN</p>
                                    <p class="time-text"><i class="bi bi-stopwatch"></i> 1:16:20:25</p>
                                    <!-- <p class="time-span">AUCTION STARTED</p>
                                    <div class="join-auction-div">
                                        <a href=""><span class="join-auction-text"><i class="bi bi-stopwatch"></i>JOIN AUCTION</span></a>
                                    </div> -->
                                    <div class="catalogue-btn-div">
                                        <a href="">
                                            <img class="img-fluid" src="{{ asset('images/wbbonline_btn_30.png') }}" alt="view-details">
                                        </a>
                                        <a href="">
                                            <img class="img-fluid" src="{{ asset('images/wbbonline_btn_31.png') }}" alt="pre-bid">
                                        </a>
                                        <!-- <a href="">
                                            <img class="img-fluid" src="{{ asset('images/wbbonline_btn_32.png') }}" alt="bid-now">
                                        </a> -->
                                    </div>
                                    <div class="">
                                        <p class="favourite-span">ADD TO FAVOURITES</p>
                                        <div class="heart-div">
                                            <a href="">
                                                <img class="img-fluid" height="20px" width="20px" src="{{ asset('images/wbbonline_img_31.png') }}" alt="bid-now">
                                            </a>
                                        </div>
                                        
                                        <!--<p class="favourite-span">ADD TO FAVOURITES</p>
                                            <div class="heart-div">
                                             <a href="">
                                            <img class="img-fluid" height="20px" width="20px"  src="{{ asset('images/wbbonline_img_32.png') }}" alt="bid-now">
                                        </a> 
                                        </div>-->
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>
                    <div class="mt-4 mb-4 ml-1">
                        <span class="pagination-span">GO TO PAGE:</span>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-6 mt-2 d-flex justify-content-end">
                            <a href=""><img width="100%" src="{{ asset('images/wbbonline_btn_28.png') }}" alt="share-catalogue"></a>
                        </div>
                        <div class="col-6 mt-2 d-flex justify-content-center">
                            <a href=""><img width="100%" src="{{ asset('images/wbbonline_btn_29.png') }}" alt="download-catalogue"></a>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</section>
@include('includes.assistance')
@endsection