@extends('layouts.main')
@section('content')
@section('title', 'Dashboard')
<div class="faq">
    <div class="container">
        <div class="row mt-5 mobile-center btm-padding">
            <div class="col-md-12">
                <h5 class="page-title">MY ACCOUNT</h5>
            </div>
        </div>
        <div class="row m-0 p-0">
            @include('pages.account.partials.menu')
            <div class="col-md-9 home-main m-0 p-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            @include('pages.account.partials.account_header')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            {{ $errors->first() }} 
                                        </div>
                                        @endif
                                        @if(Session::has('message'))
                                        <div class="alert alert-success">
                                            {{ Session::get('message') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <form method="post" action="{{ url('profile') }}" id="profile-frm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">First Name</label>
                                                        <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Primary Contact Number</label>
                                                        <input type="text" class="form-control" name="contact_primary" value="{{ $user->contact_primary }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Secondary Contact Number</label>
                                                        <input type="text" class="form-control" name="contact_secondary" value="{{ $user->contact_secondary }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                    				<div class="form-group">
                                    					<label class="form-label">Identity Document</label>
                                    					<input type="file" class="form-control" name="id_document">
                                    				</div>
                                    				@if($user->id_document)
                                    					<div class="mb-3">
                                    						<a href="{{ url('storage/'.$user->id_document) }}" target="_blank">
                                    							<i style="font-size:30px; color:#8cd50a" class="bi bi-file-earmark-pdf-fill"></i>
                                    						</a>
                                    					</div>
                                    				@endif
                                    			</div>
                                    			<div class="col-md-6">
                                    				<div class="form-group">
                                    					<label class="form-label">Proof Of Residence</label>
                                    					<input type="file" class="form-control" name="proof_of_residence">
                                    				</div>
                                    				@if($user->proof_of_residence)
                                    					<div class="mb-3">
                                    						<a href="{{ url('storage/'.$user->proof_of_residence) }}" target="_blank">
                                    							<i style="font-size:30px; color:#8cd50a" class="bi bi-file-earmark-pdf-fill"></i>
                                    						</a>
                                    					</div>
                                    				@endif
                                    			</div>
                                    			<div class="col-md-6">
                                    				<div class="form-group">
                                    					<label class="form-label">VAT Registration</label>
                                    					<input type="file" class="form-control" name="vat_registration">
                                    				</div>
                                    				@if($user->vat_registration)
                                    					<div class="mb-3">
                                    						<a href="{{ url('storage/'.$user->vat_registration) }}" target="_blank">
                                    							<i style="font-size:30px; color:#8cd50a" class="bi bi-file-earmark-pdf-fill"></i>
                                    						</a>
                                    					</div>
                                    				@endif
                                    			</div>
                                    			<div class="col-md-6">
                                    				<div class="form-group">
                                    					<label class="form-label">BRM</label>
                                    					<input type="file" class="form-control" name="brm">
                                    				</div>
                                    				@if($user->brm)
                                    					<div class="mb-3">
                                    						<a href="{{ url('storage/'.$user->brm) }}" target="_blank">
                                    							<i style="font-size:30px; color:#8cd50a" class="bi bi-file-earmark-pdf-fill"></i>
                                    						</a>
                                    					</div>
                                    				@endif
                                    			</div>
                                    			<div class="col-md-6">
                                    				<div class="form-group">
                                    					<label class="form-label">Proxy ID</label>
                                    					<input type="file" class="form-control" name="proxy_id">
                                    				</div>
                                    				@if($user->proxy_id)
                                    					<div class="mb-3">
                                    						<a href="{{ url('storage/'.$user->proxy_id) }}" target="_blank">
                                    							<i style="font-size:30px; color:#8cd50a" class="bi bi-file-earmark-pdf-fill"></i>
                                    						</a>
                                    					</div>
                                    				@endif
                                    			</div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Password</label>
                                                        <input type="password" class="form-control" name="password">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Confirm Password</label>
                                                        <input type="password" class="form-control" name="password_confirmation">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr />
                                            @if($user->company)
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label clas="form-label">Company Name</label>
                                                            <input type="text" class="form-control" name="company_name" value="{{ $user->company->company_name }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label clas="form-label">Company Type</label>
                                                            <input type="text" class="form-control" name="company_type" value="{{ $user->company->company_type }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label clas="form-label">Company registration</label>
                                                            <input type="text" class="form-control" name="registration_number" value="{{ $user->company->registration_number }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label clas="form-label">Contact Number</label>
                                                            <input type="text" class="form-control" name="contact_number" value="{{ $user->company->contact_number }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label clas="form-label">Email</label>
                                                            <input type="text" class="form-control" name="email" value="{{ $user->company->email }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label clas="form-label">Street</label>
                                                            <input type="text" class="form-control" name="street" value="{{ $user->company->street }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label clas="form-label">Suburb</label>
                                                            <input type="text" class="form-control" name="suburb" value="{{ $user->company->suburb }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label clas="form-label">City</label>
                                                            <input type="text" class="form-control" name="city" value="{{ $user->company->city }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label clas="form-label">Code</label>
                                                            <input type="text" class="form-control" name="code" value="{{ $user->company->code }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <input type="submit" class="btn btn-primary btn-sm" value="UPDATE">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @include('pages.account.partials.account_foot')
            </div>
        </div>
    </div>
    <div class="col-md-12 mt-5 home-footer-banner">
        <img class="img-fluid" src="{{ asset('images/wbbonline_img_19.png') }}" alt="assistance-banner-top-img">
    </div>
</div>
@endsection