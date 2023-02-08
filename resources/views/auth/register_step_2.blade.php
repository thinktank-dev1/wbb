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
                <div class="card register-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="rg_step_cont">
                                    <li class="rg_step"><div class="rg_step_text">Account Holder Info</div></li>
                                    <li class="rg_step"><div class="rg_step_text active">Company Info</div></li>
                                    <li class="rg_step"><div class="rg_step_text">Payment Info</div></li>
                                </ul>
                            </div>
                            <div class="col-md-8 offset-md-2">
                                <form method="post" action="{{ url('register/step2') }}">
                                    @csrf
                                    <div class="row mt-3">
                                        <div class="col-md-12 mb-3">
                                            @if ($errors->any())
                                            <div class="alert alert-danger">
                                                {{ $errors->first() }}
                                            </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Company Name</label>
                                                <input type="text" class="form-control" name="company_name" value="{{ old('company_name') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Company Type</label>
                                                <select  class="form-control" name="company_type">
                                                    <option value="">Select Option</option>
                                                    <option value="Pty Ltd" @if(old('company_type')) @if(old('company_type') == 'Pty Ltd') selected @endif @endif >Pty Ltd</option>
                                                    <option value="Sole Proprietorship" @if(old('company_type')) @if(old('company_type') == 'Sole Proprietorship') selected @endif @endif >Sole Proprietorship</option>
                                                    <option value="Partnership" @if(old('company_type')) @if(old('company_type') == 'Partnership') selected @endif @endif >Partnership</option>
                                                    <option value="Public Company" @if(old('company_type')) @if(old('company_type') == 'Public Company') selected @endif @endif >Public Company</option>
                                                    <option value="Franchise" @if(old('company_type')) @if(old('company_type') == 'Franchise') selected @endif @endif >Franchise</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Company Registration Number</label>
                                                <input type="text" class="form-control" name="company_registration_number" value="{{ old('company_registration_number') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contact Number</label>
                                                <input type="text" class="form-control" name="contact_number" value="{{ old('contact_number') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Registered Address</label>
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
                                            <input type="submit" value="NEXT" class="btn btn-primary btn-sm">
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