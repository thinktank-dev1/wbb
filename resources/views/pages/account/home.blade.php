@extends('layouts.main')
@section('content')
@section('title', 'Dashboard')
<div class="faq">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h5 class="page-title">Dashboard</h5>
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
                                <h5>User / Company Profile</h5>
                                <div class="row">
                                    <div class="col-md-8">
                                        <table class="table table-borderless table-sm client-detail-tbl">
                                            <tbody>
                                                <tr>
                                                    <td>NAME</td>
                                                    <td>{{ Auth::user()->first_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>SURNAME</td>
                                                    <td>{{ Auth::user()->last_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>EMAIL</td>
                                                    <td>{{ Auth::user()->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td>BUSINESS NAME</td>
                                                    @if(Auth::user()->company)
                                                    <td>{{ Auth::user()->company->company_name }}</td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td>NUMBER</td>
                                                    <td>{{ Auth::user()->contact_primary }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-4 mt-5">
                                        <a href="{{ url('profile') }}" class="">
                                            <div class="circle">
                                                <span class="fa-stack fa-lg">                 
                                                    <i class="fa fa-circle fa-stack-2x" style="color: #FFF;"></i>                 
                                                    <i class="fa fa-edit fa-stack-1x" style="color: #8cd50a"></i>
                                                </span>
                                            </div>
                                        </a>
                                        <br />
                                        <a href="{{ url('profile') }}" class="btn btn-secondary btn-sm">SEE ALL DETAILS</a>
                                    </div>
                                </div>
                                <div class="row account-cont">
                                    <div class="col-md-12">
                                        <h5 class="ml-3">My Lots Bought</h5>
                                        <table class="table account-tbl">
                                            <thead>
                                                <tr>
                                                    <th>Lot Number</th>
                                                    <th>Make</th>
                                                    <th>Model</th>
                                                    <th>Year</th>
                                                    <th>Auction Date</th>
                                                    <th>Price</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($cars_bought as $car)
                                                    <tr>
                                                        <td>{{ $car->id }}</td>
                                                        <td>{{ $car->vehicle->make }}</td>
                                                        <td>{{ $car->vehicle->model }}</td>
                                                        <td>{{ $car->vehicle->year }}</td>
                                                        <td>{{ $car->group->date }}</td>
                                                        <td>R {{ $car->highestBid()->bid_amount }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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