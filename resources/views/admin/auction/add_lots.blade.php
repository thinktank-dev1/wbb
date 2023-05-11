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
                                <li class="breadcrumb-item active">Edit Auctions Group</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Lots To Auction Group</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ url('admin/save-lots') }}">
                                @csrf
                                <input type="hidden" name="group_id" value="{{ $group_id }}">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Values</th>
                                            <th>Stock No - Year - Make - Model - Variant</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cars AS $car)
                                        <tr>
                                            <input class="form-check-input" type="checkbox" value="1" name="car[{{ $car->id }}]['show_reseve_price]" hidden>
                                             
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Lot Number" name="car[{{ $car->id }}][lot_number]">
                                                    <input type="text" class="form-control" placeholder="Start Price" name="car[{{ $car->id }}][start_price]">
                                                    <input type="text" class="form-control" placeholder="Increment Value" name="car[{{ $car->id }}][increament_value]">
                                                    <input type="text" class="form-control" placeholder="Reserve Price" name="car[{{ $car->id }}][reserve_price]">
                                                    <input type="text" class="form-control" placeholder="Trade Price" name="car[{{ $car->id }}][trade_price]">
                                                </div>
                                            </td>
                                            <td>{{ $car->stock_number.' - '.$car->year.' - '.$car->make.' - '.$car->model.' - '.$car->variant }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-3">
                                    <div class="d-grid gap-2">
                                        <input type="submit" class="btn btn-primary" value="SAVE LOTS">
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
@endsection