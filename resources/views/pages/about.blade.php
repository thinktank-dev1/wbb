@extends('layouts.main')
@section('content')
@section('title', 'About Us')

<section class="about">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <h2 class="about-heading">ABOUT US</h2>
                <h4 class="about-subtitle">
                    As the only bakkie experts with over 35 years experience, we have grown into a national leader and the premier source for quality vehicles.
                </h4>
                <p class="about-text">
                    With our extensive inventory of top brands and models including single cabs, double cabs, super cabs, extended cabs, SUV’s, 
                    panel vans, mini buses and commercial cars - we want to help you find the best possible vehicle at the lowest price. 
                </p>
                <p class="about-text">
                    In our effort to create a positive experience for our customers while saving them money, we have developed a convenient portal for everybody, 
                    from dealers to private individuals to buy bakkies on our 100% online live and exciting auctions and easy bidding system.
                    We invite you to register or contact us now, our team is available to provide support and assistance
                </p>
                <p class="about-text">
                    We want to change the way bakkie auctions are done! 
                </p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <img class="img-fluid about-img" src="{{ asset('images/wbbonline_img_20.png') }}" alt="about-img">
            </div>
        </div>
    </div>
</section>

<section class="faq">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h2 class="about-heading">FAQs</h2>
                <div class="accordion" id="accordionFAQ">
                    <div class="card faq-card">
                        <div class="card-header" id="headingOne">
                            <h2 class="faq-header">
                            <button class="btn btn-link btn-block accord-btn  text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                HOW DO I PLACE A BID?
                            </button><span class="plus-btn"><img class="img-fluid" type="button" src="{{ asset('images/wbbonline_img_21.png') }}" alt="plus-img" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"></span>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionFAQ">
                        <div class="card-body">
                            <p class="faq-text">
                            To place a bid, please register and follow the process to get approved, after which you will receive your login details. 
                            Once logged in, you are welcome to join the online auction for the bakkie you are interested in.
                            </p>
                            <p class="faq-text">
                            On the Auction listing of your selected vehicle, make sure you are familiar with the bidding system and details of the car. 
                            The BIDDING INCREMENTS field shows the amount the bidding price will go up with on each new bid, as well as the STARTING BID. Once the auction starts, 
                            the CURRENT BID will be displayed along with the timer. To place your bid in the increment stated, click on the CLICK TO PLACE BID button. 
                            </p>
                        </div>
                        </div>
                    </div>
                    <div class="card faq-card">
                        <div class="card-header" id="headingTwo">
                        <h2 class="faq-header">
                            <button class="btn btn-link btn-block text-left accord-btn  collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            WHERE CAN I MANAGE MY PURCHASES? 
                            </button><span class="plus-btn"><img class="img-fluid" type="button" src="{{ asset('images/wbbonline_img_21.png') }}" alt="plus-img" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"></span>
                        </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionFAQ">
                        <div class="card-body">
                            <p class="faq-text">
                            Once you have registered and logged in, you can visit your own personal Dashboard to manage your purchases, view pending lots, view payments made and more.
                            You can also check and edit your account information from there.
                            </p>
                        </div>
                        </div>
                    </div>
                    <div class="card faq-card">
                        <div class="card-header" id="headingThree">
                        <h2 class="faq-header">
                            <button class="btn btn-link btn-block text-left accord-btn   collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            WHAT IS A MAXIMUM BID?
                            </button><span class="plus-btn"><img class="img-fluid" type="button" src="{{ asset('images/wbbonline_img_21.png') }}" alt="plus-img" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"></span>
                        </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionFAQ">
                        <div class="card-body">
                            <p class="faq-text">
                           A maximum bid (also called a proxy bid) is set to determine the highest amount that you're willing to pay for the bakkie on auction. 
                           We suggest you bid the amount that you think an item is worth, no matter the current bid.
                            </p>
                        </div>
                        </div>
                    </div>
                    <div class="card faq-card">
                        <div class="card-header" id="headingFour">
                        <h2 class="faq-header">
                            <button class="btn btn-link btn-block text-left accord-btn collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            WHAT ARE THE ADDITIONAL COSTS? 
                            </button><span class="plus-btn"><img class="img-fluid" type="button" src="{{ asset('images/wbbonline_img_21.png') }}" alt="plus-img" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"></span>
                            
                        </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionFAQ">
                        <div class="card-body">
                            <p class="faq-text">
                            Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod
                            tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis
                            nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        <div>
    </div>
</section>

@include('includes.assistance')

@endsection