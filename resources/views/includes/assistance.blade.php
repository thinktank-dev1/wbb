<section class="assistance">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 assistance-banner">
            <img class="img-fluid assistance-banner-img" src="{{ asset('images/wbbonline_img_6.png') }}" alt="assistance-banner-top-img">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 assistance-info">
            <img class="img-fluid assistance-bakkie" src="{{ asset('images/wbbonline_img_22.png') }}" alt="assistance-section-bakkie">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 assistance-info form-assist-blck">
            <div class="card assistance-form-card mb-5">
                <div class="card-body">
                    <h5 class="card-title assistance-card-title">NEED ASSISTANCE OR WANT TO FIND OUT MORE ABOUT OUR AUCTIONS?</h5>
                    <h6 class="card-subtitle assistance-card-subtitle mb-2">Get in touch with us</h6>
                    <div class="row scl-lnk-icon">
                        <div class="col-5 assistance-icons">
                            <a href=""><img class="img-fluid card-icons" src="{{ asset('images/wbbonline_img_11.png') }}" alt="phone-icon"></a><span class="card-span">CALL US</span>
                        </div>
                        <div class="col-7 assistance-icons"> 
                            <a href=""><img class="img-fluid card-icons" src="{{ asset('images/wbbonline_img_10.png') }}" alt="email-icon"></a><span class="card-span">SEND AN EMAIL</span>
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
                        <center><button class="btn btn-primary assist-btn mb-2 sbmt-btn" type="submit">SUBMIT</button></center>
                    </form>
                    <p class="card-disclaimer">
                        *By clicking SUBMIT you grant We Buy Bakkies Online permission
                        to collect and manage your information according to the POPI Act.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 assistance-info">
            <div class="row justify-content-center">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 assistance-btn">
                    <a href="{{ route('login') }}"><img class="img-fluid" src="{{ asset('images/wbbonline_btn_16.png') }}" alt="login"></a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 assistance-btn">
                    <a href="{{ url('catalogue') }}"><img class="img-fluid " src="{{ asset('images/wbbonline_btn_17.png') }}" alt="view-catalogue"></a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 assistance-btn">
                    <a href="{{ url('auction') }}"><img class="img-fluid" src="{{ asset('images/wbbonline_btn_18.png') }}" alt="join-auction"></a>
                </div>
            </div>
        </div>
        <div class="col-md-12 contact-footer-banner">
            <img class="img-fluid" src="{{ asset('images/wbbonline_img_19.png') }}" alt="assistance-banner-top-img">
        </div>
    </div>
</section>