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
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex">
                                <div class="ms-auto">
                                    <a href="{{ url('admin/auction-groups/'.$auctionGroup->id.'/edit') }}" class="btn btn-primary btn-sm">Edit</a>
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
            </div>
        </div>
    </div>
</div>
@endsection