@extends('layouts.admin')
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Vehicles</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Vehicles</a></li>
                                <li class="breadcrumb-item active">List {{ $status }} Vehicle</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                	<div class="card">
                		<div class="card-header">
                            <div class="d-flex">
                                <h4 class="card-title">List {{ $status }} Vehicles</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Lot Number</th>
                                        <th>Vehicle</th>
                                        <th>Reserve Price</th>
                                        <th>Number Of Bids</th>
                                        <th>Highest Bid</th>
                                        <th>Highest Bidder</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cars AS $car)
                                    <tr>
                                        <td>{{ $car->lot->id }}</td>
                                        <td>{{ $car->year.' '.$car->make.' '.$car->model.' '.$car->variant }}</td>
                                        <td>{{ number_format($car->lot->reserve_price,2) }}</td>
                                        <td class="text-end">{{ $car->lot->bids->count() }}</td>
                                        <td class="text-end">R @if($car->lot->highestBid()) {{ number_format($car->lot->highestBid()->bid_amount, 2) }} @else 0.00 @endif</td>
                                        <td>@if($car->lot->highestBid()) {{ ucwords($car->lot->highestBid()->bidder->first_name.' '.$car->lot->highestBid()->bidder->last_name) }} @endif</td>
                                        <td class="text-end">
                                            <a href="{{ url('admin/vehicles/'.$car->id) }}">View</a>
                                        </td>
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
</div>
@endsection