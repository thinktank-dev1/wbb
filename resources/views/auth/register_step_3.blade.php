@extends('layouts.main')
@section('content')
@section('title', 'Register')
<section class="login">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h5 class="card-title login-title">Register</h5>
                <p>Please fill in your information to create your account and have exclusive access to top quality bakkies on our online auctions.</p>
            </div>
            <div class="col-md-12 mb-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="rg_step_cont">
                                    <li class="rg_step"><div class="rg_step_text">Account Holder Info</div></li>
                                    <li class="rg_step"><div class="rg_step_text">Company Info</div></li>
                                    <li class="rg_step"><div class="rg_step_text active">Payment Info</div></li>
                                </ul>
                            </div>
                            <div class="col-md-8 offset-md-2">
                                <form method="post" action="{{ url('register/step3') }}">
                                    @csrf
                                    <div class="row mt-3">
                                        <div class="col-md-12 mb-3">
                                            @if ($errors->any())
                                            <div class="alert alert-danger">
                                                {{ $errors->first() }}
                                            </div>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Vat Number</label>
                                                <input type="text" class="form-control" name="vat_number" value="{{ old('vat_number') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Billing Address</label>
                                                <div class="row">
                                                    <div class="col-md-12 mb-2">
                                                        <input type="text" class="form-control" name="street" value="{{ old('street') }}" placeholder="Street">
                                                    </div>
                                                    <div class="col-md-12 mb-2">
                                                        <input type="text" class="form-control" name="suburb" value="{{ old('suburb') }}" placeholder="Suburb">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="city" value="{{ old('city') }}" placeholder="City">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="code" value="{{ old('code') }}" placeholder="Code">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <input type="submit" value="Register Now" class="btn btn-primary btn-sm">
                                            <div class="mt-3">
                                                <p>By clicking 'Register Now' you agree to our <a href="#">Terms and Conditions</a> and <a href="">Privacy Policy</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('includes.assistance')
@endsection