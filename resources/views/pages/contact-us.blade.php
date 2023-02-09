@extends('layouts.main')
@section('content')
@section('title', 'Contact Us')
<section class="contact-us">
    <div class="container-fluid">
        <div class="row contact-txt-block">
            <div class="col-md-12 mt-5 ml-5 contact-txt-block">
                <h2 class="contact-title">contact us</h2>
                <h4 class="contact-subtitle">Please feel free to send us an email for more information</h4>
                <a href="mailto:info@webuybakkiesonline.co.za" class="contact-email"><img class="img-fluid" src="{{ asset('images/wbbonline_img_50.png') }}" alt="mail"> info@webuybakkiesonline.co.za</a>
                <h4 class="contact-subtitle mt-4">OR fill in your details below and we will get in touch with you.</h4>
            </div>
            <div class="col-md-5 ml-5 contact-txt-block">
                <form method="get" action="{{ url('') }}">
                    <div class="row">
                        <div class="col-md-6 mb-3 ">
                            <label for="name" class="contact-label">First Name</label>
                            <input type="text" name="first-name" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="surname" class="contact-label">Last Name</label>
                            <input type="text" name="last-name" class="form-control form-control-sm">
                        </div>
                         <div class="col-md-6 mb-3">
                            <label for="number" class="contact-label">Contact Number</label>
                            <input type="text" name="number" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="contact-label">Email</label>
                            <input type="email" name="email" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-12">
                            <label for="message" class="contact-label">Message</label>
                            <textarea name="message" class="form-control form-control-sm"></textarea>
                        </div>
                        <div class="col-md-12 mt-4 ml-1">
                            <button type="submit" class="btn btn-primary">SUBMIT</button>
                        </div>
                        <div class="col-md-12 mt-4 ml-1">
                            <p class="contact-disclaimer">
                                *By clicking SUBMIT you grant We Buy Bakkies Online permission to collect and 
                                manage your information according to the POPI Act. 
                                Read more about our Privacy Policy <a href="">here</a>. 
                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <img class="img-fluid contact-bakkies" src="{{ asset('images/wbbonline_img_48.png') }}" alt="">
            </div>
            <div class="col-md-12 contact-us-btn-section">
                <div class="row contact-txt-block">
                    <div class="col-md-12 d-flex justify-content-center get-ready-title-section">
                        <h4 class="get-started-title mt-5">Ready to get started?</h4>
                    </div>
                    <div class="col-sm-4 d-flex justify-content-end contact-button-section">
                        <a href="{{ route('login') }}"><img class="img-fluid" src="{{ asset('images/wbbonline_btn_43.png') }}" alt="login"></a>
                    </div>
                    <div class="col-sm-4 d-flex justify-content-center contact-button-section">
                        <a href="{{ route('catalogue') }}"><img class="img-fluid" src="{{ asset('images/wbbonline_btn_44.png') }}" alt="view-catalogue"></a>
                    </div>
                    <div class="col-sm-4 d-flex justify-content-start contact-button-section">
                        <a href="{{ route('auction') }}"><img class="img-fluid" src="{{ asset('images/wbbonline_btn_45.png') }}" alt="register"></a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 contact-footer-banner">
                <img class="img-fluid" src="{{ asset('images/wbbonline_img_19.png') }}" alt="assistance-banner-top-img">
            </div>
        </div>
    </div>
</section>
<section class="getting-started">

</section>

@endsection