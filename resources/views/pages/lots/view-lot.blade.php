@extends('layouts.main')
@section('content')
@section('title', 'Lot')

<section class="lot">
    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <div class="col-12">
                <div class="row">
                    <div class="col-5">
                        <h3 class="lot-heading ml-5">LOT: <span class="lot-heading-span">2340</span> </h3>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <a href=""><img class="img-fluid " src="{{ asset('images/wbbonline_btn_46.png') }}" alt="share"></a>
                        <a href="{{ route('favourites') }}"><img class="img-fluid" src="{{ asset('images/wbbonline_btn_47.png') }}" alt="add-to-favourites"></a>
                        <a href="{{ route('catalogue') }}"><img class="img-fluid" scr="{{ asset('images/wbbonline_btn_48.png') }}" alt="back-to-catalogue"></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col lot-title-div mt-3">
                <div class="row">
                    <div class="col d-flex justify-content-start mt-2">
                        <h3 class="lot-make"> TOYOTA<span class="lot-model ml-3">| HILUX 2.8 GD RAIDER</span> </h3> 
                    </div>
                    <div class="col d-flex justify-content-end mt-3">
                        <h3 class="lot-start-head">AUCTION STARTS IN <i class="bi bi-stopwatch"></i><span class="lot-start-span ml-3">01:16:20:25</span></h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12 mt-5 lot-details">
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <div class="card lot-card">
                            <div class="lot-slide mb-2">
                                <div class="zoom-in"> <a class="btn btn-primary zoomin-btn" onclick="zoomin()"><i class="bi bi-zoom-in"></i> Click image to Zoom</a> </div>
                                <img id="lot-car" class="img-fluid" src="{{ asset('images/wbbonline_img_22.png') }}" alt="favourites">
                                <div class="view-all"> <a class="btn btn-primary view-all-btn" href=""> VIEW ALL</a> </div>
                            </div>

                            <div class="lot-slide mb-2">
                                <div class="zoom-in"> <a class="btn btn-primary zoomin-btn" href=""><i class="bi bi-zoom-in"></i> Click image to Zoom</a> </div>
                                <img id="lot-car" class="img-fluid" src="{{ asset('images/wbbonline_img_22.png') }}" alt="favourites">
                                <div class="view-all"> <a class="btn btn-primary view-all-btn" href=""> VIEW ALL</a> </div>
                            </div>

                            <div class="lot-slide mb-2">
                                <div class="zoom-in"> <a class="btn btn-primary zoomin-btn" href=""><i class="bi bi-zoom-in"></i> Click image to Zoom</a> </div>
                                <img id="lot-car" class="img-fluid" src="{{ asset('images/wbbonline_img_22.png') }}" alt="favourites">
                                <div class="view-all"> <a class="btn btn-primary view-all-btn" href=""> VIEW ALL</a> </div>
                            </div>
        
                            <div class="lot-slide mb-2">
                                <div class="zoom-in"> <a class="btn btn-primary zoomin-btn" href=""><i class="bi bi-zoom-in"></i> Click image to Zoom</a> </div>
                                <img id="lot-car" class="img-fluid" src="{{ asset('images/wbbonline_img_22.png') }}" alt="favourites">
                                <div class="view-all"> <a class="btn btn-primary view-all-btn" href=""> VIEW ALL</a> </div>
                            </div>

                            <div class="lot-slide mb-2">
                                <div class="zoom-in"> <a class="btn btn-primary zoomin-btn" href=""><i class="bi bi-zoom-in"></i> Click image to Zoom</a> </div>
                                <img id="lot-car" class="img-fluid" src="{{ asset('images/wbbonline_img_22.png') }}" alt="favourites">
                                <div class="view-all"> <a class="btn btn-primary view-all-btn" href=""> VIEW ALL</a> </div>
                            </div>
        
                            <div class="lot-slide mb-2">
                                <div class="zoom-in"> <a class="btn btn-primary zoomin-btn" href=""><i class="bi bi-zoom-in"></i> Click image to Zoom</a> </div>
                                <img id="lot-car" class="img-fluid" src="{{ asset('images/wbbonline_img_22.png') }}" alt="favourites">
                                <div class="view-all"> <a class="btn btn-primary view-all-btn" href=""> VIEW ALL</a> </div>
                            </div>
                            <div class="lot-slide mb-2">
                                <div class="zoom-in"> <a class="btn btn-primary zoomin-btn" href=""><i class="bi bi-zoom-in"></i> Click image to Zoom</a> </div>
                                <img id="lot-car" class="img-fluid" src="{{ asset('images/wbbonline_img_22.png') }}" alt="favourites">
                                <div class="view-all"> <a class="btn btn-primary view-all-btn" href=""> VIEW ALL</a> </div>
                            </div>
                            <div class="lot-slide mb-2">
                                <div class="zoom-in"> <a class="btn btn-primary zoomin-btn" href=""><i class="bi bi-zoom-in"></i> Click image to Zoom</a> </div>
                                <img id="lot-car" class="img-fluid" src="{{ asset('images/wbbonline_img_22.png') }}" alt="favourites">
                                <div class="view-all"> <a class="btn btn-primary view-all-btn" href=""> VIEW ALL</a> </div>
                            </div>
                            <a class="next" onclick="plusSlides(1)"><img class="img-fluid lot-thumbnail cursor" src="{{ asset('images/wbbonline_btn_54.png') }}" alt="next-button"></a>

                            <div class="row row-thumnail mt-3">
                                <div class="col-3 column mb-2">
                                    <img class="img-fluid lot-thumbnail cursor" src="{{ asset('images/wbbonline_img_22.png') }}"  onclick="currentSlide(1)" alt="Image1">
                                </div>
                                <div class="col-3 column mb-2">
                                    <img class="img-fluid lot-thumbnail cursor" src="{{ asset('images/wbbonline_img_22.png') }}"onclick="currentSlide(2)" alt="Image2">
                                </div>
                                <div class="col-3 column mb-2">
                                    <img class="img-fluid lot-thumbnail cursor" src="{{ asset('images/wbbonline_img_22.png') }}"  onclick="currentSlide(3)" alt="Image3">
                                </div>
                                <div class="col-3 column mb-2">
                                    <img class="img-fluid lot-thumbnail cursor" src="{{ asset('images/wbbonline_img_22.png') }}"  onclick="currentSlide(4)" alt="Image4">
                                </div>
                                <div class="col-3 column mb-2">
                                    <img class="img-fluid lot-thumbnail cursor" src="{{ asset('images/wbbonline_img_22.png') }}"  onclick="currentSlide(5)" alt="Image5">
                                </div>    
                                <div class="col-3 column mb-2">
                                    <img class="img-fluid lot-thumbnail cursor" src="{{ asset('images/wbbonline_img_22.png') }}"  onclick="currentSlide(6)" alt="Image6">
                                </div>
                                <div class="col-3 column mb-2">
                                    <img class="img-fluid lot-thumbnail cursor" src="{{ asset('images/wbbonline_img_22.png') }}"  onclick="currentSlide(7)" alt="Image7">
                                </div>
                                <div class="col-3 column mb-2">
                                    <img class="img-fluid lot-thumbnail cursor" src="{{ asset('images/wbbonline_img_22.png') }}"  onclick="currentSlide(8)" alt="Image8">
                                </div>
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
                    <div class="col-md-3 mb-4">
                        <div class="card lot-details-card mb-4">
                            <div class="col lot-details-header">
                                <h3 class="lot-details-heading mt-2">BID INFORMATION</h3>
                            </div>
                            <div class="card-body lot-details-body lot-auto-body">
                                <dl class="row">
                                    <dt class="col-sm-8">
                                        <p class="lot-details-text text-left"> trade price</p>
                                        <p class="lot-details-text text-left"> starting bid <i class="bi bi-question-circle-fill question-mark"></i></p>
                                    </dt>
                                    <dd class="col-sm-4">
                                        <p class="lot-details-desc text-right">R 660000</p>
                                        <p class="lot-details-desc text-right">R 450000</p>
                                    </dd>
                                </dl>
                                <div class="bids-block">
                                    <dl class="row">
                                        <dt class="col-sm-8">
                                            <p class="lot-current-bid-text text-left ml-2"> Current bid</p>
                                            <p class="lot-bid-increment-text text-left ml-2"> Bid increment</p>
                                        </dt>
                                        <dd class="col-sm-4">
                                            <p class="lot-current-bid-desc text-right">R 520000</p>
                                            <p class="lot-bid-increment-desc text-right mr-2">R 10000</p>
                                        </dd>
                                    </dl> 
                                </div>
                                <dl class="row">
                                    <dt class="col-sm-8">
                                        <p class="lot-reserve-price-text text-left mt-4 ml-2">reserve price met <i class="bi bi-question-circle-fill question-mark"></i></p>
                                        <p class="lot-total-bids-text text-left ml-2">total bids</p>
                                        <p class="lot-next-bid-text text-left ml-2">next bid</p>
                                    </dt>
                                    <dd class="col-sm-4">
                                        <p class="lot-reserve-price-desc text-right mt-4 mr-2">NO</p>
                                        <p class="lot-total-bids-desc text-right mr-2">13</p>
                                        <p class="lot-next-bid-desc text-right">R 520000</p>
                                    </dd>
                                </dl> 
                                <div class="col-md-12 bid-now-btn-section d-flex justify-content-end mb-1">
                                    <button class="btn btn-primary bid-now-btn">BID NOW</button>
                                </div>
                                <div class="col-md-12 auto-bid-section">
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
                                                <input type="text" class="form-control maximum-bid-input" id="bid-amnt">
                                                <div class="input-group-append">
                                                    <span class="input-group-text decimal-span">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-12 bid-disclaimer-section">
                                    <p class="bid-disclaimer-text">All bids are legally binding and all sales are final. <a href="">Learn more</a></p>
                                </div>
                            </div>
                        </div>
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
                    </div>
                    <div class="col-md-6 mb-5">
                        <div class="card lot-details-card">
                            <div class="col lot-details-header">
                                <h3 class="lot-details-heading mt-2">EXTRAS</h3>
                            </div>
                            <div class="card-body extras-details-body">
                                <table class="table lot-details-table">
                                    <tbody>
                                        <tr>
                                            <td class="lot-details-data-text text-left">spare keys</td>
                                            <td class="lot-details--data-desc text-right">Yes</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">digital info display</td>
                                            <td class="lot-details--data-desc text-right">Yes</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">canopy</td>
                                            <td class="lot-details--data-desc text-right">Yes</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">leather seats</td>
                                            <td class="lot-details--data-desc text-right">Yes</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">nudge bar</td>
                                            <td class="lot-details--data-desc text-right">Yes</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">pano roof</td>
                                            <td class="lot-details--data-desc text-right">Yes</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">satellite navigation</td>
                                            <td class="lot-details--data-desc text-right">Yes</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">sunroof</td>
                                            <td class="lot-details--data-desc text-right">Yes</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">towbar</td>
                                            <td class="lot-details--data-desc text-right">Yes</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">multifunction steering wheel</td>
                                            <td class="lot-details--data-desc text-right">Yes</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">winch</td>
                                            <td class="lot-details--data-desc text-right">Yes</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <div class="card lot-details-card">
                            <div class="col lot-details-header">
                                <h3 class="lot-details-heading mt-2">ACCIDENT REPORT</h3>
                            </div>
                            <div class="card-body report-details-body">
                                <table class="table lot-details-table">
                                    <tbody>
                                        <tr>
                                            <td class="lot-details-data-text text-left">previous body repairs</td>
                                            <td class="lot-details--data-desc text-right">No</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">previous cosmetic repairs</td>
                                            <td class="lot-details--data-desc text-right">No</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">mechanical issues, faults or warning lights</td>
                                            <td class="lot-details--data-desc text-right">No</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">specify</td>
                                            <td class="lot-details--data-desc text-right">-</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">windscreen condition</td>
                                            <td class="lot-details--data-desc text-right">Excellent</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">rims condition</td>
                                            <td class="lot-details--data-desc text-right">Excellent</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">interior condition</td>
                                            <td class="lot-details--data-desc text-right">Good</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">tyre condition - front left</td>
                                            <td class="lot-details--data-desc text-right">Excellent</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">tyre condition - front right</td>
                                            <td class="lot-details--data-desc text-right">Excellent</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">tyre condition - rear left</td>
                                            <td class="lot-details--data-desc text-right">Good</td>
                                        </tr>
                                        <tr>
                                            <td class="lot-details-data-text text-left">tyre condition - rear right</td>
                                            <td class="lot-details--data-desc text-right">Good</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 d-flex justify-start inspection-report-header mb-4">
                        <h3 class="inspection-title mt-3">
                            Inspection Report
                        </h3>
                    </div>
                    <div class="col-md-12 mb-4">
                        <div class="card w-100 top-card">
                            <div class="col-md-12 d-flex justify-start top-card-header">
                                <h5 class="top-title mt-3">Top</h5>
                            </div>
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
                            <div class="col-md-12 top-card-footer">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <div class="card w-100 top-card">
                            <div class="col-md-12 d-flex justify-start top-card-header">
                                <h5 class="top-title mt-3">Left</h5>
                            </div>
                            <div class="card-body top-body">
                                <div class="row top-row">
                                    <div class="col-sm-2 mb-3">
                                        <div class="magnify"> <a class="btn btn-primary magnify-btn" ><i class="bi bi-search" ></i></a> </div>
                                        <img class="img-fluid inspection-img" src="{{ asset('images/test-img.jpg') }}" alt="no report">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <p class="insp-text ml-2 mt-4"> POSITION</p>
                                        <p class="insp-text ml-2"> Front Fender</p>
                                        <hr class="line-three">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <form method="" action="">
                                            <div class="row">
                                                <div class="col">
                                                    <label class="insp-text mt-4" for="my-select">TYPE OF DAMAGE</label>
                                                    <select id="my-select" class="form-control form-control-sm" name="">
                                                        <option>Small dent</option>
                                                        <option>Large dent</option>
                                                        <option>Small scratch</option>
                                                        <option>Large scratch</option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label class="insp-text mt-4" for="my-select">DAMAGE SEVERITY</label>
                                                    <select id="my-select" class="form-control form-control-sm" name="">
                                                        <option>Severe</option>
                                                        <option>Minor</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 top-card-footer">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <div class="card w-100 top-card">
                            <div class="col-md-12 d-flex justify-start top-card-header">
                                <h5 class="top-title mt-3">Right</h5>
                            </div>
                            <div class="card-body top-body">
                                <div class="row top-row">
                                    <div class="col-sm-2 mb-3">
                                        <div class="magnify"> <a class="btn btn-primary magnify-btn" ><i class="bi bi-search" ></i></a> </div>
                                        <img class="img-fluid inspection-img" src="{{ asset('images/test-img.jpg') }}" alt="no report">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <p class="insp-text ml-2 mt-4"> POSITION</p>
                                        <p class="insp-text ml-2"> Headlight</p>
                                        <hr class="line-three">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <form method="" action="">
                                            <div class="row">
                                                <div class="col">
                                                    <label class="insp-text mt-4" for="my-select">TYPE OF DAMAGE</label>
                                                    <select id="my-select" class="form-control form-control-sm" name="">
                                                        <option>Small dent</option>
                                                        <option>Large dent</option>
                                                        <option>Small scratch</option>
                                                        <option>Large scratch</option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label class="insp-text mt-4" for="my-select">DAMAGE SEVERITY</label>
                                                    <select id="my-select" class="form-control form-control-sm" name="">
                                                        <option>Severe</option>
                                                        <option>Minor</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 top-card-footer">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <div class="card w-100 top-card">
                            <div class="col-md-12 d-flex justify-start top-card-header">
                                <h5 class="top-title mt-3">Front</h5>
                            </div>
                            <div class="card-body top-body">
                                <div class="row top-row">
                                    <div class="col-sm-2 mb-3">
                                        <div class="magnify"> <a class="btn btn-primary magnify-btn" ><i class="bi bi-search" ></i></a> </div>
                                        <img class="img-fluid inspection-img" src="{{ asset('images/test-img.jpg') }}" alt="no report">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <p class="insp-text ml-2 mt-4"> POSITION</p>
                                        <p class="insp-text ml-2"> Bonnet left front corner</p>
                                        <hr class="line-three">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <form method="" action="">
                                            <div class="row">
                                                <div class="col">
                                                    <label class="insp-text mt-4" for="my-select">TYPE OF DAMAGE</label>
                                                    <select id="my-select" class="form-control form-control-sm" name="">
                                                        <option>Small dent</option>
                                                        <option>Large dent</option>
                                                        <option>Small scratch</option>
                                                        <option>Large scratch</option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label class="insp-text mt-4" for="my-select">DAMAGE SEVERITY</label>
                                                    <select id="my-select" class="form-control form-control-sm" name="">
                                                        <option>Severe</option>
                                                        <option>Minor</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 top-card-footer">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <div class="card w-100 top-card">
                            <div class="col-md-12 d-flex justify-start top-card-header">
                                <h5 class="top-title mt-3">Back</h5>
                            </div>
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
                            <div class="col-md-12 top-card-footer">
                            </div>
                        </div>
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