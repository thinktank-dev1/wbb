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
                                <li class="breadcrumb-item active">View Vehicle</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                	<div class="card">
                		<div class="card-header">
                			<h4 class="card-title">Vehicle Details</h4>
                		</div>
                		<div class="card-body">
                			<ul class="list-group">
                				<li class="list-group-item d-flex">
                					<span class="label">MM Code:</span>
                					<span class="ms-auto"><b>{{ $vehicle->mmcode }}</b></span>
                				</li>
                				<li class="list-group-item d-flex">
                					<span class="label">Year:</span>
                					<span class="ms-auto"><b>{{ $vehicle->year }}</b></span>
                				</li>
                				<li class="list-group-item d-flex">
                					<span class="label">Make:</span>
                					<span class="ms-auto"><b>{{ $vehicle->make }}</b></span>
                				</li>
                				<li class="list-group-item d-flex">
                					<span class="label">Model:</span>
                					<span class="ms-auto"><b>{{ $vehicle->model }}</b></span>
                				</li>
                				<li class="list-group-item d-flex">
                					<span class="label">Varinat:</span>
                					<span class="ms-auto"><b>{{ $vehicle->variant }}</b></span>
                				</li>
                				<li class="list-group-item d-flex">
                					<span class="label">Body Type:</span>
                					<span class="ms-auto"><b>{{ $vehicle->body_type }}</b></span>
                				</li>
                				<li class="list-group-item d-flex">
                					<span class="label">Mileage:</span>
                					<span class="ms-auto"><b>{{ $vehicle->mileage }}</b></span>
                				</li>
                				<li class="list-group-item d-flex">
                					<span class="label">Fuel Type:</span>
                					<span class="ms-auto"><b>{{ $vehicle->fuel_type }}</b></span>
                				</li>
                				<li class="list-group-item d-flex">
                					<span class="label">Transmission:</span>
                					<span class="ms-auto"><b>{{ $vehicle->transmission }}</b></span>
                				</li>
                				<li class="list-group-item d-flex">
                					<span class="label">Color:</span>
                					<span class="ms-auto"><b>{{ $vehicle->color }}</b></span>
                				</li>
                				<li class="list-group-item d-flex">
                					<span class="label">Engine Type:</span>
                					<span class="ms-auto"><b>{{ $vehicle->engine_type }}</b></span>
                				</li>
                				<li class="list-group-item d-flex">
                					<span class="label">Cylinders:</span>
                					<span class="ms-auto"><b>{{ $vehicle->cylinders }}</b></span>
                				</li>
                				<li class="list-group-item d-flex">
                					<span class="label">VIN:</span>
                					<span class="ms-auto"><b>{{ $vehicle->vin_number}}</b></span>
                				</li>
                				<li class="list-group-item d-flex">
                					<span class="label">Engine Number:</span>
                					<span class="ms-auto"><b>{{ $vehicle->engine_number }}</b></span>
                				</li>
                				<li class="list-group-item d-flex">
                					<span class="label">NATIS:</span>
                					<span class="ms-auto"><b>{{ $vehicle->natis }}</b></span>
                				</li>
                			</ul>
                		</div>
                	</div>
                </div>
                <div class="col-md-8">
                	<div class="mb-3">
            			<table class="table table-bordered">
            				<tr>
            					<td><div class="d-flex">Service History: <strong class="ms-auto">{{ ucwords($vehicle->service_history) }}</strong></div></td>
            					<td><div class="d-flex">Service Book: <strong class="ms-auto">{{ ucwords($vehicle->service_book) }}</strong></div></td>
            					<td><div class="d-flex">Service Plan: <strong class="ms-auto">{{ ucwords($vehicle->service_plan) }}</strong></div></td>
            					<td><div class="d-flex">Warranty: <strong class="ms-auto">{{ ucwords($vehicle->warranty) }}</strong></div></td>
            				</tr>
            				<tr>
            					<td><div class="d-flex">Prevoius Body Repairs: <strong class="ms-auto">{{ ucwords($vehicle->report->previous_body_repairs) }}</strong></div></td>
            					<td><div class="d-flex">Previous Cosmetic Repairs: <strong class="ms-auto">{{ ucwords($vehicle->report->previous_cosmetic_repairs) }}</strong></div></td>
            					<td colspan="2"><div class="d-flex">Mechanical Faults / Warnig Lights: <strong class="ms-auto">{{ ucwords($vehicle->report->mechanical_faults_warnig_lights) }}</strong></div></td>
            				</tr>
            				@if($vehicle->report->mechanical_faults_warnig_lights_description)
            				<tr>
            					<td colspan="4">
            						Mechanical Faults / Warnig Lights Description<br />
            						<strong>{{ $vehicle->report->mechanical_faults_warnig_lights_description }}</strong>
            					</td>
            				</tr>
            				@endif
            				<tr>
            					<td><div class="d-flex">Windscreen Condition: <strong class="ms-auto">{{ $vehicle->report->windscreen_condition }}</strong></div></td>
            					<td><div class="d-flex">Rims Condition: <strong class="ms-auto">{{ $vehicle->report->rims_condition }}</strong></div></td>
            					<td colspan="2"><div class="d-flex">Interior Condition: <strong class="ms-auto">{{ $vehicle->report->interior_condition }}</strong></div></td>
            				</tr>
            				<tr>
            					<td><div class="d-flex">Front Left Tire: <strong class="ms-auto">{{ $vehicle->report->front_left_tire }}</strong></div></td>
            					<td><div class="d-flex">Front Right Tire: <strong class="ms-auto">{{ $vehicle->report->front_right_tire }}</strong></div></td>
            					<td><div class="d-flex">Back Left Tire: <strong class="ms-auto">{{ $vehicle->report->back_left_tire }}</strong></div></td>
            					<td><div class="d-flex">Back Right Tire: <strong class="ms-auto">{{ $vehicle->report->back_right_tire }}</strong></div></td>
            				</tr>
            			</table>
                	</div>
                	@if($vehicle->extras->count() > 0)
                	<div class="card">
                		<div class="card-body">
                			<h4>Extras</h4>
                			<div class="row">
                				@foreach($vehicle->extras AS $extra)
                				<div class="col-md-2">
                					<span class="badge bg-soft-primary text-dark">{{ $extra->extra }}</span>
                				</div>
                				@endforeach
                			</div>
                		</div>
                	</div>
                	@endif
                	<div class="card">
                		<div class="card-body">
                			<h4>Inspection Report</h4>
                			<table class="table">
								<thead>
									<th></th>
									<th>Side</th>
									<th>Position</th>
									<th>Type Of Damage</th>
									<th>Severity</th>
									<th></th>
								</thead>
								<tbody>
									@foreach($vehicle->inspection AS $damage)
									<tr>
										<td><img src="{{ asset('storage/'.$damage->image_url) }}" style="height:50px"></td>
										<td>{{ $damage->side }}</td>
										<td>{{ $damage->poasition }}</td>
										<td>{{ $damage->type }}</td>
										<td>{{ $damage->severity }}</td>
										<td class="text-end">
											<a href="{{ url('admin/delete-report/'.$damage->id) }}"><i class="mdi mdi-car-off"></i> Delete</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
                		</div>
                	</div>
                	@if($vehicle->images->count() > 0)
                	<div class="card">
                		<div class="card-body">
                			<div class="row">
	                			@foreach($vehicle->images AS $img)
								<div class="col-md-2">
									<div class="d-grid gap-2 mb-2">
										<a href="{{ url('admin/delete-vehicle-image/'.$img->id) }}" class="btn btn-danger btn-sm">REMOVE</a>
									</div>
									<img src="{{ asset('storage/'.$img->image_url) }}" class="img-thumbnail">
								</div>
								@endforeach
							</div>
                		</div>
                	</div>
                	@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection