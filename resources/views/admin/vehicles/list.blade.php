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
                                <li class="breadcrumb-item active">List Vehicle</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                	<div class="card">
                		<div class="card-header">
                			<h4 class="card-title">List Vehicles</h4>
                		</div>
                		<div class="card-body">
                			<table class="table">
                				<thead>
                					<tr>
                						<th>MM Code</th>
                						<th>Year</th>
                						<th>Make</th>
                						<th>Model</th>
                						<th>Variant</th>
                						<th></th>
                					</tr>
                				</thead>
                				<tbody>
                					@foreach($vehicles AS $vehicle)
                					<tr>
                						<td>{{ $vehicle->mmcode }}</td>
                						<td>{{ $vehicle->year }}</td>
                						<td>{{ $vehicle->make }}</td>
                						<td>{{ $vehicle->model }}</td>
                						<td>{{ $vehicle->variant }}</td>
                						<td class="text-end">
                							<a href="{{ url('admin/vehicles/'.$vehicle->id.'/edit') }}"><i class="mdi mdi-car-wrench"></i> Edit</a>
                							&nbsp;|&nbsp;
                							<a href="{{ url('admin/vehicles/'.$vehicle->id) }}"><i class="mdi mdi-car-info"></i> View</a>
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