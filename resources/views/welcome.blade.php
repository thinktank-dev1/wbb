@extends('layouts.main')
@section('content')
@section('title', 'Home')
<!-- BANNER START -->
<section class="banner">
    <img class="img-fluid" src="{{ asset('images/wbbonline_img_5.png') }}" alt="banner">
    <div class="container-fluid buttons-container">
        <div class="row align-items-center buttons banner-btns">
            <div class="col banner-btn-col">
                <a href="{{ route('login') }}"><img class="img-fluid" src="{{ asset('images/wbbonline_btn_4.png') }}" alt="login"></a>
            </div>
            <div class="col">
                <a href="{{ route('catalogue') }}"><img class="img-fluid" src="{{ asset('images/wbbonline_btn_5.png') }}" alt="view-catalogue"></a>
            </div>
            <div class="col">
                <a href="{{ route('auction') }}"><img class="img-fluid" src="{{ asset('images/wbbonline_btn_6.png') }}" alt="register"></a>
            </div>
        </div>
    </div>
</section>
<!-- BANNER END -->

<!-- SECTION ONE START -->
<section class="online-auction-info-section">
    <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 online-auction-section-img">
            <img class="img-fluid" src="{{ asset('images/wbbonline_img_6.png') }}" alt="section-two-img">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 text-left online-auction-info">
            <h2 class="info-heading mb-4">100% ONLINE BAKKIE AUCTIONS</h2>
            <p class="info-paragraph">
                Our passion for bakkies inspired us to become a destination in the Bakkie Industry,  thus enabling us to provide our Dealer partners with easy access to quality bakkies at the click of a button. 
            </p>            
            <p class="info-paragraph info-paragraph-two">
                The executive team of the Company collectively brings more than 75 years of hands-on experience to the table, while our personnel were brought up in the industry we are so passionate about. Our expertise and focus assures consistency and quality in our performance We believe in - values, principles, integrity, honesty and human dignity. 
            </p>
            <p class="info-paragraph info-paragraph-three">
                Over many years, our daily interaction with retailers, wholesalers, fleet owners, financial institutions and Corporate businesses have provided us with the inside knowledge of the latest market, price, consumer and industry trends.
            </p>
            <p class="info-paragraph info-paragraph-three">
                Our mission is to create opportunities for everyone we interact with, enabling:
            </p>
            <p class="info-paragraph">
                • Our CUSTOMERS to build their businesses
            </p>
            <p class="info-paragraph">
                • Our EMPLOYEES to build their future
            </p>
            <p class="info-paragraph">
                • Our SHAREHOLDERS to build their wealth
            </p>
            <p class="info-paragraph info-paragraph-three mb-5">
                WE ENCOURAGE YOU TO WALK THE JOURNEY WITH US - "Living the Bakkie Life"
            </p>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 online-auction-info online-auction-image">
            <img class="img-fluid online-auction-bakkie mb-5" src="{{ asset('images/wbbonline_img_7.png') }}" alt="section-two-img">
        </div>
        <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 text-center procedure-div">
            <p class="procedure-heading">OUR PROCEDURE</p>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9 text-center procedure-div">
            <img class="img-fluid steps steps-two" src="{{ asset('images/wbbonline_img_61.png') }}" alt="step-one-img">
            <span><img class="img-fluid registering-steps-arrow-img" src="{{ asset('images/wbbonline_img_60.png') }}" alt="registering-arrow"></span>
            <img class="img-fluid steps steps-two registering-steps-img" src="{{ asset('images/wbbonline_img_62.png') }}" alt="step-two-img">
            <span><img class="img-fluid registering-steps-arrow-img" src="{{ asset('images/wbbonline_img_60.png') }}" alt="registering-arrow"></span>
            <img class="img-fluid steps steps-two registering-steps-img" src="{{ asset('images/wbbonline_img_63.png') }}" alt="step-three-img">
        </div>
    </div>
</section>

<section class="registration-info-section">
    <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 green-banner"></div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 text-left registration-info">
            <h3 class="register-info-heading">REGISTER NOW TO START BIDDING!</h3>
            <ul class="bullet">
                <li>
                    <p class="reg-paragraph ml-3">
                        Exclusive access to top quality bakkies.  
                    </p>
                </li>
                <li>
                    <p class="reg-paragraph ml-3">
                        Detailed inspection reports and photos to show the conditions of the vehicles from top to bottom.   
                    </p>
                </li>
                <li>
                    <p class="reg-paragraph ml-3">
                        Friendly customer support for assistance with the processes and setting up your account.    
                    </p>
                </li>
                <li>
                    <p class="reg-paragraph ml-3">
                        Bid from anywhere, on any smart device or web-browser.    
                    </p>
                </li>
            </ul>      
        </div>
        <div id="reg-info" class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 registration-info">
            <div class="card form-card">
                <div class="card-body">
                    <h5 class="card-title assistance-card-title">NEED ASSISTANCE OR WANT TO FIND OUT MORE ABOUT OUR AUCTIONS?</h5>
                    <h6 class="card-subtitle assistance-card-subtitle mb-2">Get in touch with us</h6>
                    <div class="row scl-lnk-icon">
                        <div id="grid-lnks" class="col-5 assistance-icons">
                            <a href=""><img class="img-fluid card-icons" src="{{ asset('images/wbbonline_img_11.png') }}" alt="phone-icon"></a><span class="card-span">CALL US</span>
                        </div>
                        <div id="grid-lnks" class="col-7 assistance-icons"> 
                            <a href="mailto:info@webuybakkiesonline.co.za"><img class="img-fluid card-icons" src="{{ asset('images/wbbonline_img_10.png') }}" alt="email-icon"></a><span class="card-span">SEND AN EMAIL</span>
                        </div>
                    </div>
                    <p class="assistance-text"><span class="reg-paragraph">OR</span> Fill in the form and we will contact you.</p>
                    <form method="get" action="{{ url('') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="first-name" class="form-control form-control-sm" type="text" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="last-name" class="form-control form-control-sm" type="text" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="number" class="form-control form-control-sm" type="text" placeholder="Contact Number">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-sm" aria-describedby="emailHelp" placeholder="Email">
                        </div>
                        <center><button class="btn btn-primary assist-btn mt-2 mb-3 sbmt-btn" type="submit">SUBMIT</button></center>
                    </form>
                    <p class="card-disclaimer">
                        *By clicking SUBMIT you grant We Buy Bakkies Online permission
                        to collect and manage your information according to the POPI Act.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 reg-bottom-img">
            <img class="img-fluid" src="{{ asset('images/wbbonline_img_13.png') }}" alt="section-two-img">
        </div>
    </div>
</section>

<section class="registering-steps-section">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                <h2 class="registering-steps-heading">REGISTERING IS EASY!</h2>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                <img class="img-fluid steps" src="{{ asset('images/wbbonline_img_14.png') }}" alt="step-one-img"><span><img class="img-fluid registering-steps-arrow-img" src="{{ asset('images/wbbonline_img_12.png') }}" alt="registering-arrow"></span>
                <img class="img-fluid steps registering-steps-img" src="{{ asset('images/wbbonline_img_15.png') }}" alt="step-two-img"><span><img class="img-fluid registering-steps-arrow-img" src="{{ asset('images/wbbonline_img_12.png') }}" alt="registering-arrow"></span>
                <img class="img-fluid steps registering-steps-img" src="{{ asset('images/wbbonline_img_16.png') }}" alt="step-three-img"><span><img class="img-fluid registering-steps-arrow-img" src="{{ asset('images/wbbonline_img_12.png') }}" alt="registering-arrow"></span>
                <img class="img-fluid steps registering-steps-img" src="{{ asset('images/wbbonline_img_17.png') }}" alt="step-four-img"><span>
            </div>
        </div>
    </div>
</section>

<section class="join-auction-section">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 join-auction-banner">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="row align-items-center">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card join-auction-card">
                            <div class="card-body">
                                <a href="{{ url('auction') }}"><img class="img-fluid" src="{{ asset('images/wbbonline_btn_9.png') }}" alt="join-auction-img"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card view-catalogue-card">
                            <div class="card-body">
                                <a href="{{ url('catalogue') }}"><img class="img-fluid" src="{{ asset('images/wbbonline_btn_10.png') }}" alt="view-catalogue-img"></a>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="col-md-12 home-footer-banner">
    <img class="img-fluid" src="{{ asset('images/wbbonline_img_19.png') }}" alt="assistance-banner-top-img">
</div>
<!-- SECTION ONE END -->
@endsection