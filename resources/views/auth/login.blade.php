@extends('layouts.main')
@section('content')
@section('title', 'Login')
<section class="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 justify-content-center mt-5">
                <h5 class="card-title login-title text-center">LOG IN</h5>
                <h6 class="card-subtitle login-subtitle text-center">Log in to start buying your bakkie on our exclusive 100% online auctions.</h6>
            </div>
            <div class="col-md-12 d-flex justify-content-center">  
                <div class="card login-card">
                    <div class="card-body">
                        <div class="mt-5">
                            @if ($errors->any())
                            <div class="alert alert-warning">
                                <strong>{{ $errors->first() }}</strong> 
                            </div>
                            @endif
                            @if(Session::has('status'))
                            <div class="alert alert-success">
                                {{ Session::get('status') }}
                            </div>
                            @endif
                            <form class="login-form" method="post" action="{{ route('login') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Email Address*">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="input-group mb-3" id="show_hide_password">
                                                <input type="password" class="form-control" name="password" id="password" aria-describedby="basic-addon1" placeholder="Password*">
                                                <div class="input-group-append">
                                                    <a href="" class="input-group-text login-anchor" id="basic-addon1"><i class="fa-regular fa-eye-slash" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 text-left fp-txt">
                                        <a class="" href="{{ route('password.request') }}">Forgot your password?</a>
                                    </div>
                                    <div class="col-md-6 text-right fp-txt">
                                        <span>Not registered?<a class="register-anchor" href="{{ route('register') }}">Click here</a></span>
                                    </div>
                                </div>
                                <div class="mt-1 mb-2 text-left">
                                    <input type="checkbox" class="form-check-input terms-check" id="termsAndConditions" required><p class="ml-4">I accept the <a href="{{ asset('files/WBBO_OnlineAuctionTermsAndConditions_022023_1.pdf') }}" target="_blank">Terms and Conditions</a> and <a href="{{ asset('files/WBBO_OnlineAuctionTermsAndConditions_022023_1.pdf') }}" target="_blank">Privacy Policy</a></p>
                                </div>
                                <div class="d-flex justify-content-center mb-5">
                                    <button type="submit" class="btn btn-primary btn-sm lgn-btn">LOG IN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--@include('includes.assistance')-->
<div class="col-md-12 home-footer-banner mt-5">
    <img class="img-fluid" src="{{ asset('images/wbbonline_img_19.png') }}" alt="assistance-banner-top-img">
</div>
@endsection