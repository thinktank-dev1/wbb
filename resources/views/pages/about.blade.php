@extends('layouts.main')
@section('content')
@section('title', 'FAQs')

<section class="about">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <h2 class="about-heading">FREQUENTLY ASKED QUESTIONS</h2></h2>
                <h4 class="about-subtitle">
                    To provide you with an enjoyable experience, we have developed our auction platform to be as user-friendly and convenient as possible. 
                    However, if you do have any questions or are uncertain about the process, check our FAQs below.  
                </h4>
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
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-5">
                <div class="accordion" id="accordionFAQ">
                    <div class="card faq-card">
                        <div class="card-header" id="headingOne">
                            <h2 class="faq-header">
                            <button class="btn btn-link btn-block accord-btn  text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                HOW DO I USE THE AUTOBID FUNCTION AND HOW DO THE INCREMENTS WORK?
                            </button><span class="plus-btn"><img class="img-fluid" type="button" src="{{ asset('images/wbbonline_img_21.png') }}" alt="plus-img" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"></span>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionFAQ">
                            <div class="card-body">
                            <p class="faq-text">
                               If you are unable to participate in a specific auction or think you might have technical issues during the auction, you are welcome to place an Autobid on a vehicle, for the highest amount you wish to bid.
                               The system will then place a bid on your behalf in the increments as specified, and with each new bid placed by other users. The Autobid will increase automatically, 
                               and the bid will fall on the next increment after the current highest bid. This will happen until the maximum bid has reached a higher offer than your Autobid, 
                               or if the timer has run out and you have the winning bid. 
                            </p>
                            <p class="faq-text">
                                We suggest you bid the amount that you think an item is worth, no matter the current bid. 
                            </p>
                        </div>
                        </div>
                    </div>
                    <div class="card faq-card">
                        <div class="card-header" id="headingTwo">
                        <h2 class="faq-header">
                            <button class="btn btn-link btn-block text-left accord-btn  collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            HOW DOES EXTRA TIME WORK? 
                            </button><span class="plus-btn"><img class="img-fluid" type="button" src="{{ asset('images/wbbonline_img_21.png') }}" alt="plus-img" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"></span>
                        </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionFAQ">
                        <div class="card-body">
                            <p class="faq-text">
                            If a bid is placed in the last 3 (three) minutes of an auction on a specific vehicle, it will reset back to 3 minutes. 
                            If another bid is placed within these 3 minutes, it will reset again to 3 minutes, and so on, until there are no more bids on that item, and the timer has run out. 
                            </p>
                        </div>
                        </div>
                    </div>
                    <div class="card faq-card">
                        <div class="card-header" id="headingThree">
                        <h2 class="faq-header">
                            <button class="btn btn-link btn-block text-left accord-btn   collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            DO THE BID OFFERS INCLUDE VAT?
                            </button><span class="plus-btn"><img class="img-fluid" type="button" src="{{ asset('images/wbbonline_img_21.png') }}" alt="plus-img" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"></span>
                        </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionFAQ">
                        <div class="card-body">
                            <p class="faq-text">
                            All bid offers/increments include VAT, and will reflect as such on your invoice after the auction, along with any additional costs. 
                            </p>
                        </div>
                        </div>
                    </div>
                    <div class="card faq-card">
                        <div class="card-header" id="headingFour">
                        <h2 class="faq-header">
                            <button class="btn btn-link btn-block text-left accord-btn collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            HOW DO I PLACE A BID?
                            </button><span class="plus-btn"><img class="img-fluid" type="button" src="{{ asset('images/wbbonline_img_21.png') }}" alt="plus-img" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"></span>
                            
                        </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionFAQ">
                            <div class="card-body">
                                <p class="faq-text">
                                To place a bid, please follow the process to register by filling in your information, creating your login details and uploading the required documents - and submitting them to us for approval. 
                                Once approved, you are welcome to log in and join the online auction for the vehicles you are interested in. 
                                </p>
                                
                                <p class="faq-text">
                                On the Auction listing of your selected vehicle, make sure you are familiar with the bidding system and details of the car. 
                                The BIDDING INCREMENTS field shows the amount the bidding price will go up with on each new bid, as well as the STARTING BID. 
                                Once the auction starts, the CURRENT BID will be displayed along with the timer. To place your bid in the increment stated, click on the CLICK TO PLACE BID button. 
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card faq-card">
                        <div class="card-header" id="headingFive">
                        <h2 class="faq-header">
                            <button class="btn btn-link btn-block text-left accord-btn collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            WHERE CAN I MANAGE MY PURCHASES?
                            </button><span class="plus-btn"><img class="img-fluid" type="button" src="{{ asset('images/wbbonline_img_21.png') }}" alt="plus-img" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive"></span>
                            
                        </h2>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionFAQ">
                            <div class="card-body">
                                <p class="faq-text">
                                Once you have registered and logged in, you can visit your own personal Dashboard to manage your purchases, 
                                view pending lots, view payments made, and more. You can also check and edit your account information from there.  
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card faq-card">
                        <div class="card-header" id="headingSeven">
                        <h2 class="faq-header">
                            <button class="btn btn-link btn-block text-left accord-btn collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            WHAT ARE THE ADDITIONAL COSTS?
                            </button><span class="plus-btn"><img class="img-fluid" type="button" src="{{ asset('images/wbbonline_img_21.png') }}" alt="plus-img" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven"></span>
                            
                        </h2>
                        </div>
                        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionFAQ">
                            <div class="card-body">
                                <p class="faq-text">
                                There is an Admin fee of R1750 (incl. VAT) on all purchases.
                                Payment and collection must be made within 48 hours after the auction. 
                                A R250 per day storage fee will be levied unless prior arrangements have been made. 
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card faq-card">
                        <div class="card-header" id="headingEight">
                        <h2 class="faq-header">
                            <button class="btn btn-link btn-block text-left accord-btn collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                            WHEN DO THE AUCTIONS RUN?
                            </button><span class="plus-btn"><img class="img-fluid" type="button" src="{{ asset('images/wbbonline_img_21.png') }}" alt="plus-img" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight"></span>
                        </h2>
                        </div>
                        <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionFAQ">
                            <div class="card-body">
                                <p class="faq-text">
                                Our weekly auctions will be run on a Tuesday from 13:30-15:30 unless stated otherwise.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card faq-card">
                        <div class="card-header" id="headingNine">
                        <h2 class="faq-header">
                            <button class="btn btn-link btn-block text-left accord-btn collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                            WILL THE VEHICLES BE AVAILABLE FOR VIEWING AND INSPECTION?
                            </button><span class="plus-btn"><img class="img-fluid" type="button" src="{{ asset('images/wbbonline_img_21.png') }}" alt="plus-img" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine"></span>
                            
                        </h2>
                        </div>
                        <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionFAQ">
                            <div class="card-body">
                                <p class="faq-text">
                                We highly recommend that you physically come to view the vehicles at our Showroom at 81 Sterling Road, Samrand, Centurion. 
                                Optimal viewing times are from Saturdays until Tuesdays prior to the start of the auction.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card faq-card mb-5">
                        <div class="card-header" id="headingTen">
                        <h2 class="faq-header">
                            <button class="btn btn-link btn-block text-left accord-btn collapsed" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                            CAN MY BAKKIE BE TRANSPORTED TO ME?
                            </button><span class="plus-btn"><img class="img-fluid" type="button" src="{{ asset('images/wbbonline_img_21.png') }}" alt="plus-img" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen"></span>
                            
                        </h2>
                        </div>
                        <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionFAQ">
                            <div class="card-body">
                                <p class="faq-text">
                                Should you require transport of your vehicle after purchase, we can recommend service suppliers for this facility, which should be arranged directly and on your own accord. 
                                For further information please contact us at 012 657 0234. 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div>
    </div>
</section>

<!--@include('includes.assistance')-->
<div class="col-md-12 home-footer-banner mt-5">
    <img class="img-fluid" src="{{ asset('images/wbbonline_img_19.png') }}" alt="assistance-banner-top-img">
</div>

@endsection