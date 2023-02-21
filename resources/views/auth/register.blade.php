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
                                    <li class="rg_step"><div class="rg_step_text active">Account Holder Info</div></li>
                                    <li class="rg_step"><div class="rg_step_text">Company Info</div></li>
                                    <li class="rg_step"><div class="rg_step_text">Payment Info</div></li>
                                </ul>
                            </div>
                            <div class="col-md-8 offset-md-2">
                                <form method="post" action="register" enctype="multipart/form-data">
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
                                                <label>First Name</label>
                                                <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contact Number (Primary)</label>
                                                <input type="text" class="form-control" name="contact_primary" value="{{ old('contact_primary') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contact Number (Secondary)</label>
                                                <input type="text" class="form-control" name="contact_secondary" value="{{ old('contact_secondary') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Confirm Email</label>
                                                <input type="text" class="form-control" name="email_confirmation" value="{{ old('email_confirmation') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>ID Type</label>
                                                <select class="form-control" name="id_type">
                                                    <option value="">Select Option</option>
                                                    <option value="SA ID Number" @if(old('id_type')) @if(old('id_type') == 'SA ID Number') selected @endif @endif >SA ID Number</option>
                                                    <option value="Passport" @if(old('id_type')) @if(old('id_type') == 'Passport') selected @endif @endif >Passport Number</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>ID Number</label>
                                                <input type="text" class="form-control" name="id_number" value="{{ old('id_number') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" class="form-control" name="password_confirmation">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                    		<hr />
                                    	</div>
                            			<div class="col-md-12">
                            				<h5>Documents</h5>
                            			</div>
                            			<div class="col-md-6">
                            				<div class="mb-3">
                            					<label class="form-label">Identity Document</label>
                            					<input type="file" class="form-control" name="id_document">
                            				</div>
                            			</div>
                            			<div class="col-md-6">
                            				<div class="mb-3">
                            					<label class="form-label">Proof Of Residence</label>
                            					<input type="file" class="form-control" name="proof_of_residence">
                            				</div>
                            			</div>
                            			<div class="col-md-6">
                            				<div class="mb-3">
                            					<label class="form-label">VAT Registration</label>
                            					<input type="file" class="form-control" name="vat_registration">
                            				</div>
                            			</div>
                            			<div class="col-md-6">
                            				<div class="mb-3">
                            					<label class="form-label">BRM</label>
                            					<input type="file" class="form-control" name="brm">
                            				</div>
                            			</div>
                            			<div class="col-md-6">
                            				<div class="mb-3">
                            					<label class="form-label">Proxy ID</label>
                            					<input type="file" class="form-control" name="proxy_id">
                            				</div>
                            			</div>
                                        <div class="col-md-12 text-center">
                                            <input type="submit" value="NEXT" class="btn btn-primary btn-sm">
                                            <div class="mt-3">
                                                <p>Already have an account? <a href="{{ url('login') }}">Log In</a></p>
                                            </div>
                                            <div class="mt-1 mb-2 text-center">
                                                <input type="checkbox" class="form-check-input register-terms-check" id="termsAndConditions" required><p class="ml-4">I accept the <a href="{{ asset('files/WBBO_OnlineAuctionTermsAndConditions_022023_1.pdf') }}" target="_blank">Terms and Conditions</a> and <a href="{{ asset('files/WBBO_OnlineAuction_PrivacyPolicy_022023_1.pdf') }}" target="_blank">Privacy Policy</a></p>
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