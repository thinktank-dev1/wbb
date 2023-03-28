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
                    However, if you do have any questions or are unclear about how it works, check our FAQs below. 
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
                                If you are unable to participate in a specific auction, or think you might have technical issues during the auction, 
                                you are welcome to place an Autobid on an item, for the highest amount you wish to bid. 
                                The system will then place a bid on your behalf in the increments as specified, and with each new bid placed by other users, 
                                until the maximum bid has reached a higher offer then your Autobid, or if the timer has run out and you have the winning bid. 
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
                            If a bid is placed in the last 3 (three) minutes of an auction on a specific item, additional time will be added, up to 5 minutes. 
                            If another bid is placed in the last 3 minutes, another 5 minutes will be added, and so on, until there are no more bids on that item, and the timer has run out. 
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
                            All bid offers/increments do include VAT, and will reflect as such on your invoice after the auction, along with any additional costs. 
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
                                To place a bid, please register and follow the process to get approved, after which you will receive your login details. 
                                Once logged in, you are welcome to join the online auction for the bakkie you are interested in.
                                </p>
                                
                                <p class="faq-text">
                                On the Auction listing of your selected vehicle, make sure you are familiar with the bidding system and details of the car.
                                The BIDDING INCREMENTS field shows the amount the bidding price will go up with on each new bid, as well as the STARTING BID. 
                                Once the auction starts, the CURRENT BID will be displayed along with the timer. To place your bid in the increment stated, 
                                click on the CLICK TO PLACE BID button. 
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
                                Once you have registered and logged in, you can visit your own personal Dashboard to manage your purchases, view pending lots, view payments made and more. 
                                You can also check and edit your account information from there. 
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card faq-card">
                        <div class="card-header" id="headingSix">
                        <h2 class="faq-header">
                            <button class="btn btn-link btn-block text-left accord-btn collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            WHAT IS A MAXIMUM BID?
                            </button><span class="plus-btn"><img class="img-fluid" type="button" src="{{ asset('images/wbbonline_img_21.png') }}" alt="plus-img" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix"></span>
                            
                        </h2>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionFAQ">
                            <div class="card-body">
                                <p class="faq-text">
                                A maximum bid (also called a proxy bid) is set to determine the highest amount that you're willing to pay for the bakkie on auction. 
                                We suggest you bid the amount that you think an item is worth, no matter the current bid. 
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card faq-card mb-5">
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
                                There is an Admin fee of R1750 (incl. VAT) on all purchases, as well as a R250 per day storage fee on vehicles that have not been collected after payment, for longer than 48 hours. 
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