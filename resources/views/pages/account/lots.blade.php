@extends('layouts.main')
@section('content')
@section('title', 'Dashboard')
<div class="faq">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h5 class="page-title">MY LOTS</h5>
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
                                <table class="table account-tbl">
                                    <thead>
                                        <tr>
                                            <th>Lot Number</th>
                                            <th>Make</th>
                                            <th>Model</th>
                                            <th>Year</th>
                                            <th>Acution Date</th>
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
                @include('pages.account.partials.account_foot')
            </div>
        </div>
    </div>
    <div class="col-md-12 mt-5 home-footer-banner">
        <img class="img-fluid" src="{{ asset('images/wbbonline_img_19.png') }}" alt="assistance-banner-top-img">
    </div>
</div>
@endsection