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
                                <li class="breadcrumb-item active">Auctions Results</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($groups AS $group)
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ $group->name.' ('.date('d M Y', strtotime($group->date)).')' }}</h4>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Lot Number</th>
                                        <th>Vehicle</th>
                                        <th>Number Of Bids</th>
                                        <th>Reserve Price</th>
                                        <th>Highest Bid</th>
                                        <th>Highest Bidder</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($group->lots AS $lot)
                                    <tr>
                                        @php $color = '#bfbfbf'; @endphp
                                        @if($lot->status())
                                            @if($lot->status() == 'Sold')
                                                @php $color = 'green'; @endphp
                                            @else
                                                @php $color = 'red'; @endphp
                                            @endif
                                        @endif
                                        <td style="color: @php echo $color @endphp">{{ $lot->id }}</td>
                                        <td style="color: @php echo $color @endphp">{{ $lot->vehicle->year.' '.$lot->vehicle->make.' '.$lot->vehicle->model.' '.$lot->vehicle->variant }}</td>
                                        <td style="color: @php echo $color @endphp"class="text-end">{{ $lot->bids->count() }}</td>
                                        <td style=" white-space: nowrap; color: @php echo $color @endphp">{{ number_format($lot->reserve_price, 2)  }}</td>
                                        <td style=" white-space: nowrap; color: @php echo $color @endphp" class="text-end">R&nbsp;@if($lot->highestBid()) {{ number_format($lot->highestBid()->bid_amount, 2) }} @else 0.00 @endif</td>
                                        <td style=" white-space: nowrap; color: @php echo $color @endphp">@if($lot->highestBid()) {{ ucwords($lot->highestBid()->bidder->company->company_name) }} @endif</td>
                                        <td style=" white-space: nowrap; color: @php echo $color @endphp">{{ $lot->status() }}</td>
                                        <td style=" white-space: nowrap;" class="text-end">
                                            <a href="{{ url('admin/vehicles/'.$lot->vehicle->id) }}">View</a>
                                            &nbsp;|&nbsp;
                                            <a href="{{url('admin/reset-car/'.$lot->vehicle->id) }}">Reset</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection