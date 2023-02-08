@extends('layouts.main')
@section('content')
@section('title', 'Dashboard')
<div class="faq">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h5 class="page-title">PAYMENTS</h5>
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
                                @if($payments)
                                <form method="post" action="{{ url('payments') }}" id="payments-frm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">VAT NUmber</label>
                                                        <input type="text" class="form-control" name="vat_number" value="{{ $payments->vat_number }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr />
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5>Billing Address</h5>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Street</label>
                                                        <input type="text" class="form-control" name="street" value="{{ $payments->street }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Suburb</label>
                                                        <input type="text" class="form-control" name="suburb" value="{{ $payments->suburb }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">City</label>
                                                        <input type="text" class="form-control" name="city" value="{{ $payments->city }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Code</label>
                                                        <input type="text" class="form-control" name="code" value="{{ $payments->code }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <input type="submit" class="btn btn-primary btn-sm" value="UPDATE">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @endif
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