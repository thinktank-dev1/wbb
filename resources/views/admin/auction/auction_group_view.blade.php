@extends('layouts.admin')
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Auctions</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Auctions</a></li>
                                <li class="breadcrumb-item active">View Auction Group</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex">
                                <div class="ms-auto">
                                    @if($auctionGroup->status == 1)
                                        <a href="javascript:void(0)" class="btn btn-primary btn-sm">Edit</a>
                                    @else
                                        <a href="{{ url('admin/auction-groups/'.$auctionGroup->id.'/edit') }}" class="btn btn-primary btn-sm">Edit</a>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item d-flex">
                                    Name: <span class="ms-auto"><b>{{ $auctionGroup->name }}</b></span>
                                </li>
                                <li class="list-group-item d-flex">
                                    Date: <span class="ms-auto"><b>{{ date('d M Y', strtotime($auctionGroup->date)) }}</b></span>
                                </li>
                                <li class="list-group-item d-flex">
                                    Start Time: <span class="ms-auto"><b>{{ date('H:i', strtotime($auctionGroup->start_time)) }}</b></span>
                                </li>
                                <li class="list-group-item d-flex">
                                    End Time: <span class="ms-auto"><b>{{ date('H:i', strtotime($auctionGroup->end_time)) }}</b></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex">
                                <h4 class="card-title">Lots</h4>
                                <span class="ms-auto">
                                    @if($auctionGroup->status == 1)
                                        <a href="javascript:void(0)" class="btn btn-primary btn-sm">Add Lots</a>
                                    @else
                                        <a href="{{ url('admin/add-lots-to-auction-group/'.$auctionGroup->id) }}" class="btn btn-primary btn-sm">Add Lots</a>
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            @if($auctionGroup->status == 1)
                            <div class="alert alert-warning text-center">
                                <strong>Disclaimer: Once an auction has started, you can no longer remove a car that has been assigned.</strong> 
                            </div>
                            @endif
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Lot No</th>
                                        <th>Stock No</th>
                                        <th>Year</th>
                                        <th>Make</th>
                                        <th>Model</th>
                                        <th>Variant</th>
                                        <th>Start Price</th>
                                        <th>Increment</th>
                                        <th>Reserve</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($auctionGroup->lots AS $lot)
                                    @if($lot->vehicle)
                                    <tr>
                                        <td>{{ $lot->lot_number }}</td>
                                        <td>{{ $lot->vehicle->stock_number }}</td>
                                        <td>{{ $lot->vehicle->year }}</td>
                                        <td>{{ $lot->vehicle->make }}</td>
                                        <td>{{ $lot->vehicle->model }}</td>
                                        <td>{{ $lot->vehicle->variant }}</td>
                                        <td class="text-end">{{ number_format($lot->start_price,2) }}</td>
                                        <td class="text-end">{{ number_format($lot->increament_value,2) }}</td>
                                        <td class="text-end">{{ number_format($lot->reserve_price,2) }}</td>
                                        <th class="text-end">@if($auctionGroup->status == 0)<a style="color:#8cd50a" href="{{ url('admin/remove-lot/'.$lot->id) }}" class="text-danger">Remove</a>@else
                                        <a style="color:#8cd50a" href="javascript:void(0)" class="text-danger">Remove</a>@endif</th>
                                    </tr>
                                    @endif
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