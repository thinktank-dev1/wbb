@extends('layouts.main')
@section('content')
@section('title', 'Live Auction')

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
                <h3 class="lot-number-title mt-3"> LOT NO<span class="lot-number-span ml-3"> 2340</span></h3> 
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12 mt-5 lot-details">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-5 mb-3">
                        <div class="card lot-card">
                            <div class="lot-slide mb-2">
                                <div class="zoom-in"> <a class="btn btn-primary zoomin-btn" onclick="zoomin()"><i class="bi bi-zoom-in"></i> Click image to Zoom</a> </div>
                                <img id="lot-car" class="img-fluid lot-vehicle" src="{{ asset('images/wbbonline_img_22.png') }}" alt="favourites">
                            </div>

                            <div class="lot-slide mb-2">
                                <div class="zoom-in"> <a class="btn btn-primary zoomin-btn" href=""><i class="bi bi-zoom-in"></i> Click image to Zoom</a> </div>
                                <img id="lot-car" class="img-fluid" src="{{ asset('images/wbbonline_img_22.png') }}" alt="favourites">
                            </div>

                            <div class="lot-slide mb-2">
                                <div class="zoom-in"> <a class="btn btn-primary zoomin-btn" href=""><i class="bi bi-zoom-in"></i> Click image to Zoom</a> </div>
                                <img id="lot-car" class="img-fluid" src="{{ asset('images/wbbonline_img_22.png') }}" alt="favourites">
                            </div>
        
                            <div class="lot-slide mb-2">
                                <div class="zoom-in"> <a class="btn btn-primary zoomin-btn" href=""><i class="bi bi-zoom-in"></i> Click image to Zoom</a> </div>
                                <img id="lot-car" class="img-fluid" src="{{ asset('images/wbbonline_img_22.png') }}" alt="favourites">
                            </div>

                            <div class="lot-slide mb-2">
                                <div class="zoom-in"> <a class="btn btn-primary zoomin-btn" href=""><i class="bi bi-zoom-in"></i> Click image to Zoom</a> </div>
                                <img id="lot-car" class="img-fluid" src="{{ asset('images/wbbonline_img_22.png') }}" alt="favourites">
                            </div>
        
                            <div class="lot-slide mb-2">
                                <div class="zoom-in"> <a class="btn btn-primary zoomin-btn" href=""><i class="bi bi-zoom-in"></i> Click image to Zoom</a> </div>
                                <img id="lot-car" class="img-fluid" src="{{ asset('images/wbbonline_img_22.png') }}" alt="favourites">
                            </div>

                            <div class="lot-slide mb-2">
                                <div class="zoom-in"> <a class="btn btn-primary zoomin-btn" href=""><i class="bi bi-zoom-in"></i> Click image to Zoom</a> </div>
                                <img id="lot-car" class="img-fluid" src="{{ asset('images/wbbonline_img_22.png') }}" alt="favourites">
                            </div>

                            <div class="lot-slide mb-2">
                                <div class="zoom-in"> <a class="btn btn-primary zoomin-btn" href=""><i class="bi bi-zoom-in"></i> Click image to Zoom</a> </div>
                                <img id="lot-car" class="img-fluid" src="{{ asset('images/wbbonline_img_22.png') }}" alt="favourites">
                            </div>
                            <a class="prev" onclick="plusSlides(-1)"><img class="img-fluid lot-thumbnail cursor" src="{{ asset('images/wbbonline_btn_55.png') }}" alt="prev-button"></a>
                            <a class="next" onclick="plusSlides(1)"><img class="img-fluid lot-thumbnail cursor" src="{{ asset('images/wbbonline_btn_54.png') }}" alt="next-button"></a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-7 mb-3">
                        <div class="card lot-details-card auction-card">
                            <div class="col lot-details-header">
                                <h3 class="lot-details-heading mt-2">BID INFORMATION</h3>
                            </div>
                            <div class="card-body lot-details-body lot-auto-body">
                                <div class="row">
                                    <div class="col-sm-6 border-right">
                                        <p class="closing-time-title">bidding closes in</p>
                                        <p class="auction-timer">
                                            <i class="bi bi-stopwatch" style="font-size:35px; color:#bfbfbf"></i> 00:00:03:15
                                        </p>
                                        <dl class="row">
                                            <dt class="col-sm-6">
                                                <p class="lot-reserve-price-text text-left mb-4">reserve price met <i class="bi bi-question-circle-fill question-mark"></i></p>
                                                <p class="lot-details-text text-left mb-4"> trade price</p>
                                                <p class="lot-total-bids-text text-left mb-4">total bids</p>
                                            </dt>
                                            <dd class="col-sm-6">
                                                <p class="auction-reserve-price-desc text-left mb-4">NO</p>
                                                <p class="auction-details-desc text-left mb-4">R 660000</p>
                                                <p class="auction-total-bids-desc text-left mb-4">13</p>
                                            </dd>
                                        </dl>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <div class="col auction-bids-block mt-1">
                                            <dl class="row">
                                                <dt class="col-md-6">
                                                    <p class="auction-current-bid-text text-left ml-2"> Current bid</p>
                                                    <p class="auction-current-bid-text text-left ml-2"> user</p>
                                                </dt>
                                                <dd class="col-md-6">
                                                    <p class="auction-current-bid-desc text-left">R 520000</p>
                                                    <p class="auction-bid-increment-desc text-left">1453</p>
                                                </dd>
                                            </dl> 
                                        </div>
                                        <div class="col asking-bid-block mt-3">
                                            <form method="" action="">
                                                <div class="input-group input-group-sm input-group-md input-group-lg">
                                                    <input style="height: calc(1.5em + 3.3rem + 2px);" type="text" class="form-control" aria-describedby="inputGroup-sizing-lg">
                                                    <div class="input-group-prepend bid-prepend">
                                                        <button class="btn btn-primary asking-bid-btn" type="submit" id="button-addon1"> 
                                                            <i class="bi bi-check-circle-fill asking-bid-check"></i>
                                                            <p class="click-text">click to</p>
                                                            <p class="place-bid-text">place bid</p>
                                                        </button>

                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <dl class="row mt-4">
                                            <dt class="col-sm-6">
                                                <p class="lot-reserve-price-text text-left ml-1">bidding increments</p>
                                                <p class="lot-reserve-price-text text-left ml-1"> starting bid <i class="bi bi-question-circle-fill question-mark"></i></p>
                                            </dt>
                                            <dd class="col-sm-6">
                                                <p class="bid-increment-desc text-left">R 20000</p>
                                                <p class="staring-bid-desc text-left">R 600000</p>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 auction-auto-bid-block mt-3">
                                <h3 class="auction-auto-bid mt-3">Auto bid</h3>
                                <form>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="auto-bid-label" for="max-bid">bid up to maximum</label>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text auction-max-bid-text">R</span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                                <div class="input-group-append">
                                                    <span class="input-group-text auction-max-bid-text">.00</span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-5">
                                            <button class="btn btn-primary bid-now-btn mt-1">PLACE MAX BID</button>
                                        </div>
                                    </div>  
                                </form>
                            </div>
                            <div class="col auto-bid-footer">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="card lot-details-card">
                            <div class="col lot-details-header">
                                <h3 class="lot-details-heading mt-2">LOT DETAILS</h3>
                            </div>
                            <div class="card-body lot-details-body">
                                <table class="table lot-details-table">
                                    <tbody>
                                        <tr>
                                            <td class="lot-details-data-text text-left">make</td>
                                            <td class="lot-details--data-desc text-right">Toyota</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">model</td>
                                            <td class="lot-details--data-desc text-right">Hilux 2.8 GD-6 Raider</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">year</td>
                                            <td class="lot-details--data-desc text-right">2019</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">body type</td>
                                            <td class="lot-details--data-desc text-right">Double Cap</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">mileage</td>
                                            <td class="lot-details--data-desc text-right">96000 Km</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">fuel</td>
                                            <td class="lot-details--data-desc text-right">Diesel</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">transmission</td>
                                            <td class="lot-details--data-desc text-right">Automatic</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">engine type</td>
                                            <td class="lot-details--data-desc text-right">2.8l</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">cylinders</td>
                                            <td class="lot-details--data-desc text-right">6</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">colour</td>
                                            <td class="lot-details--data-desc text-right">White</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">vin</td>
                                            <td class="lot-details--data-desc text-right">DFGH5fg45df45df</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">engine no</td>
                                            <td class="lot-details--data-desc text-right">qwerty6540</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">natis</td>
                                            <td class="lot-details--data-desc text-right">Used</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">service history</td>
                                            <td class="lot-details--data-desc text-right">Yes</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">service book</td>
                                            <td class="lot-details--data-desc text-right">Yes</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">service plan / warranty active</td>
                                            <td class="lot-details--data-desc text-right">No</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">notes</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-5 mb-5">
                        <div class="row">
                            <div class="col d-flex justify-content-end">
                               <a class="btn btn-primary" href="">
                                 VIEW MORE INFO ON THIS LOT   
                               </a> 
                            </div>
                            <div class="col d-flex justify-content-start">
                                <a class="btn btn-primary" href="">
                                    VIEW THE INSPECTION REPORT
                                </a>  
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <div class="card w-100 top-card">
                            <div class="col-md-12 d-flex justify-content-center previous-lot-header">
                                <h5 class="top-title mt-3">previous lot</h5>
                            </div>
                            <div class="card-body top-body">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-2 d-flex justify-content-start">
                                        <img class="img-fluid" src="{{ asset('images/test-img.jpg') }}" alt="no report">
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-3 border-right">
                                        <p class="prev-lot-no"> lot no<span class="prev-lot-span"> 2351</span></p>
                                        <p class="prev-lot-make-model">VOLKSWAGEN</p>
                                        <p class="prev-lot-make-model">AMAROK 2.0 BiTDi HIGHLINE</p>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-3 border-right">
                                        <dl class="row prev-lot-dl">
                                            <dt class="col-sm-6">
                                                <p class="prev-lot-details-text text-left"> year</p>
                                                <p class="prev-lot-details-text text-left"> body type</p>
                                                <p class="prev-lot-details-text text-left"> mileage</p>
                                                <p class="prev-lot-details-text text-left"> fuel</p>
                                                <p class="prev-lot-details-text text-left"> transmission</p>
                                                <p class="prev-lot-details-text text-left"> colour</p>
                                            </dt>
                                            <dd class="col-sm-6">
                                                <p class="prev-lot-details-desc text-left">2019</p>
                                                <p class="prev-lot-details-desc text-left">Double Cap</p>
                                                <p class="prev-lot-details-desc text-left">96000 Km</p>
                                                <p class="prev-lot-details-desc text-left">Diesel</p>
                                                <p class="prev-lot-details-desc text-left">Automatic</p>
                                                <p class="prev-lot-details-desc text-left">White</p>
                                            </dd>
                                        </dl>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-2 border-right">
                                        <dl class="row prev-lot-dl">
                                            <dt class="col-sm-5">
                                                <p class="prev-lot-status mb-4">status</p>
                                            </dt>
                                            <dd class="col-sm-7">
                                                <p class="prev-lot-status-span text-left"> SOLD</p>
                                            </dd>
                                            <dt class="col-sm-12">
                                                <p class="prev-lot-status">TOTAL BIDS</p>
                                                <p class="prev-lot-bids">16</p>
                                                <p class="prev-lot-status">Reserve price met</p>
                                                <p class="prev-lot-bids">Yes</p>
                                            </dt>
                                        </dl>
                                        
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-2">
                                        <dl class="row prev-lot-dl">
                                            <dt class="col-sm-12">
                                                <p class="prev-lot-status">trade price</p>
                                                <p class="prev-lot-bids">R 450000</p>
                                                <p class="prev-lot-status">starting bid</p>
                                                <p class="prev-lot-bids">R 320000</p>
                                                <p class="prev-lot-status">winning bid</p>
                                                <p class="prev-lot-bids">R 420000</p>
                                            </dt>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 top-card-footer">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <div class="card w-100 top-card">
                            <div class="col-md-12 d-flex justify-content-center next-lot-header">
                                <h5 class="top-title mt-3">next lot</h5>
                            </div>
                            <div class="card-body top-body">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-2 d-flex justify-content-start">
                                        <img class="img-fluid" src="{{ asset('images/test-img.jpg') }}" alt="no report">
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-3 border-right">
                                        <p class="prev-lot-no"> lot no<span class="prev-lot-span"> 2351</span></p>
                                        <p class="prev-lot-make-model">VOLKSWAGEN</p>
                                        <p class="prev-lot-make-model">AMAROK 2.0 BiTDi HIGHLINE</p>
                                        <a class="btn btn-primary mt-2">VIEW DETAILS</a>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-3 border-right">
                                        <dl class="row mt-3 prev-lot-dl">
                                            <dt class="col-sm-6">
                                                <p class="prev-lot-details-text text-left"> year</p>
                                                <p class="prev-lot-details-text text-left"> body type</p>
                                                <p class="prev-lot-details-text text-left"> mileage</p>
                                                <p class="prev-lot-details-text text-left"> fuel</p>
                                                <p class="prev-lot-details-text text-left"> transmission</p>
                                                <p class="prev-lot-details-text text-left"> colour</p>
                                            </dt>
                                            <dd class="col-sm-6">
                                                <p class="prev-lot-details-desc text-left">2019</p>
                                                <p class="prev-lot-details-desc text-left">Double Cap</p>
                                                <p class="prev-lot-details-desc text-left">96000 Km</p>
                                                <p class="prev-lot-details-desc text-left">Diesel</p>
                                                <p class="prev-lot-details-desc text-left">Automatic</p>
                                                <p class="prev-lot-details-desc text-left">White</p>
                                            </dd>
                                        </dl>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                        <dl class="row mt-3 prev-lot-dl">
                                            <dt class="col-sm-6">
                                                <p class="prev-lot-status">trade price</p>
                                                <p class="prev-lot-bids">R 450000</p>
                                                <p class="prev-lot-status">starting bid</p>
                                                <p class="prev-lot-bids">R 320000</p>
                                                <p class="prev-lot-status">winning bid</p>
                                                <p class="prev-lot-bids">R 420000</p>
                                            </dt>
                                            <dd class="col-sm-6">
                                                <a class="btn btn-secondary mt-5">PRE-BID</a>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 next-lot-footer">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-5 d-flex justify-content-center">
                        <a class="btn btn-secondary">BACK TO CATALOGUE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('includes.assistance')


<script>
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

@endsection