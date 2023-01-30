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
<div class="card">
	<div class="card-header">
		<h4 class="card-title">Vehicle Information</h4>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Year</label>
					<select class="form-control" name="year" id="year-select" required>
						<option value="">Select Option</option>
						@php
						$date_start = date("Y", strtotime('-30 year'));
						$date_end = date("Y");
						@endphp
						@for($i = $date_end; $i >= $date_start; $i--)
						@php
						$sel = '';
						if(old('year') == $i){
							$sel = "selected";
						}
						elseif($vehicle->year == $i){
							$sel = 'selected';
						}
						@endphp
						<option value="{{ $i }}" {{ $sel }}>{{ $i }}</option>
						@endfor
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Make</label>
					<select class="form-control single-select" name="make" id="make-select" data-trigger required>
						<option value="">Select Option</option>
						@foreach($car_list AS $list)
						@php
						$sel = '';
						if(old('make') == $list->make){
							$sel = "selected";
						}
						elseif($vehicle->make == $list->make){
							$sel = "selected";
						}
						@endphp
						<option value="{{ $list->make }}" {{ $sel }}>{{ $list->make }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Model</label>
					<select class="form-control" name="model" id="model-select" value="{{ $vehicle->model }}" required>
						<option value="">Select Year & Make First</option>
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Variant</label>
					<select class="form-control" name="variant" id="variant-select" value="{{ $vehicle->make }}" required>
						<optioin value="">Select Year, Make & Model First</optioin>
					</select>
				</div>
			</div>
			<div class="col-md-2">
				<div class="mb-3">
					<label class="form-label">Body Type</label>
					<select class="form-control" name="body_type" id="body_type-select" required>
						<option value="">Select Option</option>
						@foreach($body_types AS $type)
						@php
						$sel = '';
						if(old('body_type') == $type->name){
							$sel = "selected";
						}
						elseif($vehicle->body_type == $type->name){
							$sel = 'selected';
						}
						@endphp
						<option value="{{ $type->name }}" {{ $sel }}>{{ $type->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-2">
				<div class="mb-3">
					<label class="form-label">Mileage</label>
					<input type="text" class="form-control" name="mileage" value="@if(old('mileage')) {{ old('mileage') }} @elseif($vehicle->mileage) {{ $vehicle->mileage }} @endif" required>
				</div>
			</div>
			<div class="col-md-2">
				<div class="mb-3">
					<label class="form-label">Fuel Type</label>
					<select class="form-control" name="fuel_type" id="fuel_type-select" required>
						<option value="">Select Option</option>
						@foreach($fuel_types AS $type)
						@php
						$sel = '';
						if(old('fuel_type') == $type){
							$sel = "selected";
						}
						elseif($vehicle->fuel_type == $type){
							$sel = 'selected';
						}
						@endphp
						<option value="{{ $type }}" {{ $sel }}>{{ $type }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-2">
				<div class="mb-3">
					<label class="form-label">Transmission</label>
					<select class="form-control" name="transmission" id="transmission-select" required>
						<option value="">Select Option</option>
						@foreach($transmission_types AS $type)
						@php
						$sel = '';
						if(old('transmission') == $type){
							$sel = "selected";
						}
						elseif($vehicle->transmission == $type){
							$sel = 'selected';
						}
						@endphp
						<option value="{{ $type }}" {{ $sel }}>{{ $type }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-2">
				<div class="mb-3">
					<label class="form-label">Color</label>
					<input type="text" class="form-control" name="color" value="@if(old('color')) {{ old('color') }} @else {{ $vehicle->color }} @endif" required>
				</div>
			</div>
			<div class="col-md-2">
				<div class="mb-3">
					<label class="form-label">NATIS</label>
					<input type="text" class="form-control" name="natis" value="@if(old('natis')) {{ old('natis') }} @else {{ $vehicle->natis }} @endif" required>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Engine Type</label>
					<input type="text" class="form-control" name="engine_type" value="@if(old('engine_type')) {{ old('engine_type') }} @elseif($vehicle->engine_type) {{ $vehicle->engine_type }} @endif" required>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Cylinders</label>
					<input type="text" class="form-control" name="cylinders" id="cylinders-input" value="@if(old('cylinders')) {{ old('cylinders') }} @elseif($vehicle->cylinders) {{ $vehicle->cylinders }} @endif" required>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">VIN Number</label>
					<input type="text" class="form-control" name="vin_number" value="@if(old('vin_number')) {{ old('vin_number') }} @elseif($vehicle->vin_number) {{ $vehicle->vin_number }} @endif" required>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Engine Number</label>
					<input type="text" class="form-control" name="engine_number" value="@if(old('engine_number')) {{ old('engine_number') }} @elseif($vehicle->engine_number) {{ $vehicle->engine_number }} @endif" required>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Service History: </label><br />
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" value="yes" id="sh1" name="service_history" @if(old('service_history') == "yes") checked @elseif ($vehicle->service_history == "yes") checked @endif required>
						<label class="form-check-label" for="sh1">Yes</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" value="no" id="sh2" name="service_history" @if(old('service_history') == "no") checked @elseif($vehicle->service_history == "no") checked @endif required>
						<label class="form-check-label" for="sh2">No</label>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Service Book: </label><br />
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" value="yes" id="sb1" name="service_book" @if(old('service_book') == "yes") checked @elseif($vehicle->service_book == "yes") checked @endif required>
						<label class="form-check-label" for="sb1">Yes</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" value="no" id="sb2" name="service_book" @if(old('service_book') == "no") checked @elseif($vehicle->service_book == "no") checked @endif required>
						<label class="form-check-label" for="sb2">No</label>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Service Plan: </label><br />
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" value="yes" id="sp1" name="service_plan" @if(old('service_plan') == "yes") checked @elseif($vehicle->service_plan == "yes") checked @endif required>
						<label class="form-check-label" for="sp1">Yes</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" value="no" id="sp2" name="service_plan" @if(old('service_plan') == "no") checked @elseif($vehicle->service_plan == "no") checked @endif required>
						<label class="form-check-label" for="sp2">No</label>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Warranty: </label><br />
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" value="yes" id="wr1" name="warranty" @if(old('warranty') == "yes") checked @elseif($vehicle->warranty == "yes") checked @endif required>
						<label class="form-check-label" for="wr1">Yes</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" value="no" id="wr2" name="warranty" @if(old('warranty') == "no") checked @elseif($vehicle->warranty == "no") checked @endif required>
						<label class="form-check-label" for="wr2">No</label>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="mb-3">
					<label class="form-label">Notes</label>
					<textarea class="form-control" name="notes">@if(old('notes')) {{ old('notes') }} @else {{ $vehicle->notes }} @endif</textarea>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="card">
	<div class="card-header">
		<h4 class="card-title">Vehicle Extras</h4>
	</div>
	<div class="card-body">
		<div class="row">
			@foreach($extras_list AS $list)
			<div class="col-md-3">
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" id="{{ $list }}" value="{{ $list }}" name="extras[]" @if(old('extras')) @if( in_array($list, old('extras'))) checked @endif @elseif($vehicle->hasExtra($list)) checked @endif>
					<label class="form-check-label" for="{{ $list }}">{{ $list }}</label>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
<div class="card">
	<div class="card-header">
		<h4 class="card-title">Vehicle Accident Report</h4>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-4">
				<div class="mb-3">
					<label class="form-label">Previous Body Repairs: </label><br />
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" value="yes" id="pbr1" name="previous_body_repairs" @if(old('previous_body_repairs')) @if(old('previous_body_repairs') == "yes") checked @endif  @elseif($vehicle->report) @if($vehicle->report->previous_body_repairs == "yes") checked @endif @endif required>
						<label class="form-check-label" for="pbr1">Yes</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" value="no" id="pbr2" name="previous_body_repairs" @if(old('previous_body_repairs')) @if(old('previous_body_repairs') == "no") checked @endif  @elseif($vehicle->report) @if($vehicle->report->previous_body_repairs == "no") checked @endif @endif required>
						<label class="form-check-label" for="pbr2">No</label>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="mb-3">
					<label class="form-label">Previous Cosmetic Repairs: </label><br />
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" value="yes" id="pcr1" name="previous_cosmetic_repairs" @if(old('previous_cosmetic_repairs')) @if(old('previous_cosmetic_repairs') == "yes") checked @endif  @elseif($vehicle->report) @if($vehicle->report->previous_cosmetic_repairs == "yes") checked @endif @endif required>
						<label class="form-check-label" for="pcr1">Yes</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" value="no" id="pcr2" name="previous_cosmetic_repairs" @if(old('previous_cosmetic_repairs')) @if(old('previous_cosmetic_repairs') == "no") checked @endif  @elseif($vehicle->report) @if($vehicle->report->previous_cosmetic_repairs == "no") checked @endif @endif required>
						<label class="form-check-label" for="pcr2">No</label>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="mb-3">
					<label class="form-label">Mechanical Faults / Warning Lights: </label><br />
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" value="yes" id="mfwl1" name="mechanical_faults_warnig_lights" @if(old('mechanical_faults_warnig_lights')) @if(old('mechanical_faults_warnig_lights') == "yes") checked @endif  @elseif($vehicle->report) @if($vehicle->report->mechanical_faults_warnig_lights == "yes") checked @endif @endif required>
						<label class="form-check-label" for="mfwl1">Yes</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" value="no" id="mfwl2" name="mechanical_faults_warnig_lights" @if(old('mechanical_faults_warnig_lights')) @if(old('mechanical_faults_warnig_lights') == "no") checked @endif  @elseif($vehicle->report) @if($vehicle->report->mechanical_faults_warnig_lights == "no") checked @endif @endif required>
						<label class="form-check-label" for="mfwl2">No</label>
					</div>
				</div>
			</div>
			<div class="col-md-12" style="display: @if(old('mechanical_faults_warnig_lights')) @if(old('mechanical_faults_warnig_lights') == "yes") block @else none @endif @elseif($vehicle->report) @if($vehicle->report->mechanical_faults_warnig_lights == "yes") block @else none  @endif @else none  @endif" id="mechanical_faults_warnig_lights_description_cont" required>
				<div class="mb-3">
					<label class="form-label">Describe Mechanical Faults / Warning Lights</label>
					<textarea class="form-control" name="mechanical_faults_warnig_lights_description"> @if(old('mechanical_faults_warnig_lights_description')) {{ old('mechanical_faults_warnig_lights_description') }} @elseif($vehicle->report) {{ $vehicle->report->mechanical_faults_warnig_lights_description }} @endif</textarea>
				</div>
			</div>
			<div class="col-md-4">
				<div class="mb-3">
					<label class="form-label">Wind Screen Condition</label>
					<select class="form-control" name="windscreen_condition" required>
						<option value="">Select Option</option>
						@foreach($conditions_list AS $list)
						@php
						$sel = '';
						if(old('windscreen_condition')){
							if(old('windscreen_condition') == $list){
								$sel = "selected";
							}
						}
						elseif($vehicle->report){
							if($vehicle->report->windscreen_condition == $list){
								$sel = 'selected';
							}
						}
						@endphp
						<option value="{{ $list }}" {{ $sel }}>{{ $list }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="mb-3">
					<label class="form-label">Rims Condition</label>
					<select class="form-control" name="rims_condition" required>
						<option value="">Select Option</option>
						@foreach($conditions_list AS $list)
						@php
						$sel = '';
						if(old('rims_condition')){
							if(old('rims_condition') == $list){
								$sel = "selected";
							}
						}
						elseif($vehicle->report){
							if($vehicle->report->rims_condition == $list){
								$sel = 'selected';
							}
						}
						@endphp
						<option value="{{ $list }}" {{ $sel }}>{{ $list }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="mb-3">
					<label class="form-label">Interior Condition</label>
					<select class="form-control" name="interior_condition" required>
						<option value="">Select Option</option>
						@foreach($conditions_list AS $list)
						@php
						$sel = '';
						if(old('interior_condition')){
							if(old('interior_condition') == $list){
								$sel = "selected";
							}
						}
						elseif($vehicle->report){
							if($vehicle->report->interior_condition == $list){
								$sel = 'selected';
							}
						}
						@endphp
						<option value="{{ $list }}" {{ $sel }}>{{ $list }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Tire Condition - Front Left</label>
					<select class="form-control" name="front_left_tire" required>
						<option value="">Select Option</option>
						@foreach($conditions_list AS $list)
						@php
						$sel = '';
						if(old('front_left_tire')){
							if(old('front_left_tire') == $list){
								$sel = "selected";
							}
						}
						elseif($vehicle->report){
							if($vehicle->report->front_left_tire == $list){
								$sel = 'selected';
							}
						}
						@endphp
						<option value="{{ $list }}" {{ $sel }}>{{ $list }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Tire Condition - Front Right</label>
					<select class="form-control" name="front_right_tire" required>
						<option value="">Select Option</option>
						@foreach($conditions_list AS $list)
						@php
						$sel = '';
						if(old('front_right_tire')){
							if(old('front_right_tire') == $list){
								$sel = "selected";
							}
						}
						elseif($vehicle->report){
							if($vehicle->report->front_right_tire == $list){
								$sel = 'selected';
							}
						}
						@endphp
						<option value="{{ $list }}" {{ $sel }}>{{ $list }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Tire Condition - Back Left</label>
					<select class="form-control" name="back_left_tire" required>
						<option value="">Select Option</option>
						@foreach($conditions_list AS $list)
						@php
						$sel = '';
						if(old('back_left_tire')){
							if(old('back_left_tire') == $list){
								$sel = "selected";
							}
						}
						elseif($vehicle->report){
							if($vehicle->report->back_left_tire == $list){
								$sel = 'selected';
							}
						}
						@endphp
						<option value="{{ $list }}" {{ $sel }}>{{ $list }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Tire Condition - Back Right</label>
					<select class="form-control" name="back_right_tire" required>
						<option value="">Select Option</option>
						@foreach($conditions_list AS $list)
						@php
						$sel = '';
						if(old('back_right_tire')){
							if(old('back_right_tire') == $list){
								$sel = "selected";
							}
						}
						elseif($vehicle->report){
							if($vehicle->report->back_right_tire == $list){
								$sel = 'selected';
							}
						}
						@endphp
						<option value="{{ $list }}" {{ $sel }}>{{ $list }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="card">
	<div class="card-header">
		<div class="d-flex">
			<h4 class="card-title">Featured Images</h4>
			<div class="ms-auto">
				<a href="#" class="btn btn-primary" id="add-image-btn"><i class="mdi mdi-car-2-plus"></i> Add Image</a>
			</div>
		</div>
	</div>
	<div class="card-body image-cont">
		<div class="row" id="images-row">
			<div class="col-md-12">
				<div class="mb-3">
					<label class="form-label">Upload Car Image</label>
					<input type="file" class="form-control img-input" name="images[]">
				</div>
			</div>
		</div>
		@if($vehicle->images->count() > 0)
		<div class="row">
			<div class="col-md-12">
				<hr />
				<h4>Current Images</h4>
			</div>
		</div>
		<div class="row">
			@foreach($vehicle->images AS $img)
			<div class="col-md-2">
				<div class="d-grid gap-2 mb-2">
					<a href="{{ url('admin/delete-vehicle-image/'.$img->id) }}" class="btn btn-danger btn-sm">REMOVE</a>
				</div>
				<img src="{{ asset('storage/'.$img->image_url) }}" class="w-100">
			</div>
			@endforeach
		</div>
		@endif
	</div>
</div>
<div class="card">
	<div class="card-header">
		<div class="d-flex">
			<h4 class="card-title">Vehicle Inspection Report - TOP</h4>
			<div class="ms-auto">
				<a href="#" class="btn btn-primary" id="top-add-btn">Add More</a>
				<a href="#" class="btn btn-primary" id="top-add-custom">Add More With Custom Descriptions</a>
			</div>
		</div>
	</div>
	<div class="card-body top-damage-cont">
		<div class="row" id="top-damesges-row">
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Upload Damage Image</label>
					<input type="file" class="form-control field" name="top-damage-images[]">
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Position</label>
					<select class="form-control img-input field" name="top-position[]">
						<option value="">Select Option</option>
						@foreach($top_positions AS $pos)
						<option value="{{ $pos }}">{{ $pos }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Type Of Damage</label>
					<select class="form-control img-input field" name="top-type[]">
						<option value="">Select Option</option>
						@foreach($damage_types AS $type)
						<option value="{{ $type }}">{{ $type }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Severity Of Damage</label>
					<select class="form-control img-input field" name="top-severity[]">
						<option value="">Select Option</option>
						@foreach($damage_severity_list AS $severity)
						<option value="{{ $severity }}">{{ $severity }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		<div class="row" id="top-custom" style="display:none">
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Upload Damage Image</label>
					<input type="file" class="form-control img-input field" name="top-damage-images[]">
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Position</label>
					<input type="text" class="form-control img-input field" name="top-position[]">
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Type Of Damage</label>
					<input type="text" class="form-control img-input field" name="top-type[]">
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Severity Of Damage</label>
					<input type="text" class="form-control img-input field" name="top-severity[]">
				</div>
			</div>
		</div>
		@if($vehicle->inspectionBySide('top')->count() > 0)
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<th></th>
						<th>Position</th>
						<th>Type Of Damage</th>
						<th>Severity</th>
						<th></th>
					</thead>
					<tbody>
						@php
						$damages = $vehicle->inspectionBySide('top');
						@endphp
						@foreach($damages AS $damage)
						<tr>
							<td><img src="{{ asset('storage/'.$damage->image_url) }}" style="height:50px"></td>
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
		@endif
	</div>
</div>
<div class="card">
	<div class="card-header">
		<div class="d-flex">
			<h4 class="card-title">Vehicle Inspection Report - LEFT</h4>
			<div class="ms-auto">
				<a href="#" class="btn btn-primary" id="left-add-btn">Add More</a>
				<a href="#" class="btn btn-primary" id="left-add-custom">Add More With Custom Descriptions</a>
			</div>
		</div>
	</div>
	<div class="card-body left-damage-cont">
		<div class="row" id="left-damesges-row">
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Upload Damage Image</label>
					<input type="file" class="form-control field" name="left-damage-images[]">
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Position</label>
					<select class="form-control img-input field" name="left-position[]">
						<option value="">Select Option</option>
						@foreach($left_right_positions AS $pos)
						<option value="{{ $pos }}">{{ $pos }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Type Of Damage</label>
					<select class="form-control img-input field" name="left-type[]">
						<option value="">Select Option</option>
						@foreach($damage_types AS $type)
						<option value="{{ $type }}">{{ $type }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Severity Of Damage</label>
					<select class="form-control img-input field" name="left-severity[]">
						<option value="">Select Option</option>
						@foreach($damage_severity_list AS $severity)
						<option value="{{ $severity }}">{{ $severity }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		<div class="row" id="left-custom" style="display:none">
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Upload Damage Image</label>
					<input type="file" class="form-control img-input field" name="left-damage-images[]">
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Position</label>
					<input type="text" class="form-control img-input field" name="left-position[]">
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Type Of Damage</label>
					<input type="text" class="form-control img-input field" name="left-type[]">
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Severity Of Damage</label>
					<input type="text" class="form-control img-input field" name="left-severity[]">
				</div>
			</div>
		</div>
		@if($vehicle->inspectionBySide('left')->count() > 0)
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<th></th>
						<th>Position</th>
						<th>Type Of Damage</th>
						<th>Severity</th>
						<th></th>
					</thead>
					<tbody>
						@php
						$damages = $vehicle->inspectionBySide('left');
						@endphp
						@foreach($damages AS $damage)
						<tr>
							<td><img src="{{ asset('storage/'.$damage->image_url) }}" style="height:50px"></td>
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
		@endif
	</div>
</div>
<div class="card">
	<div class="card-header">
		<div class="d-flex">
			<h4 class="card-title">Vehicle Inspection Report - RIGHT</h4>
			<div class="ms-auto">
				<a href="#" class="btn btn-primary" id="right-add-btn">Add More</a>
				<a href="#" class="btn btn-primary" id="right-add-custom">Add More With Custom Descriptions</a>
			</div>
		</div>
	</div>
	<div class="card-body right-damage-cont">
		<div class="row" id="right-damesges-row">
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Upload Damage Image</label>
					<input type="file" class="form-control field" name="right-damage-images[]">
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Position</label>
					<select class="form-control img-input field" name="right-position[]">
						<option value="">Select Option</option>
						@foreach($left_right_positions AS $pos)
						<option value="{{ $pos }}">{{ $pos }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Type Of Damage</label>
					<select class="form-control img-input field" name="right-type[]">
						<option value="">Select Option</option>
						@foreach($damage_types AS $type)
						<option value="{{ $type }}">{{ $type }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Severity Of Damage</label>
					<select class="form-control img-input field" name="right-severity[]">
						<option value="">Select Option</option>
						@foreach($damage_severity_list AS $severity)
						<option value="{{ $severity }}">{{ $severity }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		<div class="row" id="right-custom" style="display:none">
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Upload Damage Image</label>
					<input type="file" class="form-control img-input field" name="right-damage-images[]">
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Position</label>
					<input type="text" class="form-control img-input field" name="right-position[]">
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Type Of Damage</label>
					<input type="text" class="form-control img-input field" name="right-type[]">
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Severity Of Damage</label>
					<input type="text" class="form-control img-input field" name="right-severity[]">
				</div>
			</div>
		</div>
		@if($vehicle->inspectionBySide('right')->count() > 0)
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<th></th>
						<th>Position</th>
						<th>Type Of Damage</th>
						<th>Severity</th>
						<th></th>
					</thead>
					<tbody>
						@php
						$damages = $vehicle->inspectionBySide('right');
						@endphp
						@foreach($damages AS $damage)
						<tr>
							<td><img src="{{ asset('storage/'.$damage->image_url) }}" style="height:50px"></td>
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
		@endif
	</div>
</div>
<div class="card">
	<div class="card-header">
		<div class="d-flex">
			<h4 class="card-title">Vehicle Inspection Report - FRONT</h4>
			<div class="ms-auto">
				<a href="#" class="btn btn-primary" id="front-add-btn">Add More</a>
				<a href="#" class="btn btn-primary" id="front-add-custom">Add More With Custom Descriptions</a>
			</div>
		</div>
	</div>
	<div class="card-body front-damage-cont">
		<div class="row" id="front-damesges-row">
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Upload Damage Image</label>
					<input type="file" class="form-control field" name="front-damage-images[]">
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Position</label>
					<select class="form-control img-input field" name="front-position[]">
						<option value="">Select Option</option>
						@foreach($front_positions AS $pos)
						<option value="{{ $pos }}">{{ $pos }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Type Of Damage</label>
					<select class="form-control img-input field" name="front-type[]">
						<option value="">Select Option</option>
						@foreach($damage_types AS $type)
						<option value="{{ $type }}">{{ $type }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Severity Of Damage</label>
					<select class="form-control img-input field" name="front-severity[]">
						<option value="">Select Option</option>
						@foreach($damage_severity_list AS $severity)
						<option value="{{ $severity }}">{{ $severity }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		<div class="row" id="front-custom" style="display:none">
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Upload Damage Image</label>
					<input type="file" class="form-control img-input field" name="front-damage-images[]">
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Position</label>
					<input type="text" class="form-control img-input field" name="front-position[]">
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Type Of Damage</label>
					<input type="text" class="form-control img-input field" name="front-type[]">
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Severity Of Damage</label>
					<input type="text" class="form-control img-input field" name="front-severity[]">
				</div>
			</div>
		</div>
		@if($vehicle->inspectionBySide('front')->count() > 0)
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<th></th>
						<th>Position</th>
						<th>Type Of Damage</th>
						<th>Severity</th>
						<th></th>
					</thead>
					<tbody>
						@php
						$damages = $vehicle->inspectionBySide('front');
						@endphp
						@foreach($damages AS $damage)
						<tr>
							<td><img src="{{ asset('storage/'.$damage->image_url) }}" style="height:50px"></td>
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
		@endif
	</div>
</div>
<div class="card">
	<div class="card-header">
		<div class="d-flex">
			<h4 class="card-title">Vehicle Inspection Report - BACK</h4>
			<div class="ms-auto">
				<a href="#" class="btn btn-primary" id="back-add-btn">Add More</a>
				<a href="#" class="btn btn-primary" id="back-add-custom">Add More With Custom Descriptions</a>
			</div>
		</div>
	</div>
	<div class="card-body back-damage-cont">
		<div class="row" id="back-damesges-row">
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Upload Damage Image</label>
					<input type="file" class="form-control field" name="back-damage-images[]">
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Position</label>
					<select class="form-control img-input field" name="back-position[]">
						<option value="">Select Option</option>
						@foreach($back_positions AS $pos)
						<option value="{{ $pos }}">{{ $pos }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Type Of Damage</label>
					<select class="form-control img-input field" name="back-type[]">
						<option value="">Select Option</option>
						@foreach($damage_types AS $type)
						<option value="{{ $type }}">{{ $type }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Severity Of Damage</label>
					<select class="form-control img-input field" name="back-severity[]">
						<option value="">Select Option</option>
						@foreach($damage_severity_list AS $severity)
						<option value="{{ $severity }}">{{ $severity }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		<div class="row" id="back-custom" style="display:none">
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Upload Damage Image</label>
					<input type="file" class="form-control img-input field" name="back-damage-images[]">
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Position</label>
					<input type="text" class="form-control img-input field" name="back-position[]">
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Type Of Damage</label>
					<input type="text" class="form-control img-input field" name="back-type[]">
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Severity Of Damage</label>
					<input type="text" class="form-control img-input field" name="back-severity[]">
				</div>
			</div>
		</div>
		@if($vehicle->inspectionBySide('back')->count() > 0)
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<th></th>
						<th>Position</th>
						<th>Type Of Damage</th>
						<th>Severity</th>
						<th></th>
					</thead>
					<tbody>
						@php
						$damages = $vehicle->inspectionBySide('tbackp');
						@endphp
						@foreach($damages AS $damage)
						<tr>
							<td><img src="{{ asset('storage/'.$damage->image_url) }}" style="height:50px"></td>
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
		@endif
	</div>
</div>
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-12">
				<div class="d-grid gap-2">
					<input type="submit" class="btn btn-primary" value="SAVE">
				</div>
			</div>
		</div>
	</div>
</div>

@push('scripts')
<script>
	const choices = new Choices('.single-select');
	$(document).ready(function(){
		onLoadValues();

		$('input[type=radio][name=mechanical_faults_warnig_lights]').change(function() {
			if($(this).val() == "yes"){
				$("#mechanical_faults_warnig_lights_description_cont").show();
			}
			else{
				$('#mechanical_faults_warnig_lights_description_cont').hide();
			}
		})

		$('#back-add-custom').on('click', function(e){
			e.preventDefault();
			var row = $('#back-custom').clone();
			$(row).find('.field').each(function(){
				$(this).val("");
			});
			$(row).css('display','flex');
			$('.back-damage-cont').append(row);
		});
		$('#back-add-btn').on('click', function(e){
			e.preventDefault();
			var row = $('#back-damesges-row').clone();
			$(row).find('.field').each(function(){
				$(this).val("");
			});
			$('.back-damage-cont').append(row);
		});
		$('#front-add-custom').on('click', function(e){
			e.preventDefault();
			var row = $('#front-custom').clone();
			$(row).find('.field').each(function(){
				$(this).val("");
			});
			$(row).css('display','flex');
			$('.front-damage-cont').append(row);
		});
		$('#front-add-btn').on('click', function(e){
			e.preventDefault();
			var row = $('#front-damesges-row').clone();
			$(row).find('.field').each(function(){
				$(this).val("");
			});
			$('.front-damage-cont').append(row);
		});
		$('#right-add-custom').on('click', function(e){
			e.preventDefault();
			var row = $('#right-custom').clone();
			$(row).find('.field').each(function(){
				$(this).val("");
			});
			$(row).css('display','flex');
			$('.right-damage-cont').append(row);
		});
		$('#right-add-btn').on('click', function(e){
			e.preventDefault();
			var row = $('#right-damesges-row').clone();
			$(row).find('.field').each(function(){
				$(this).val("");
			});
			$('.right-damage-cont').append(row);
		});
		$('#left-add-custom').on('click', function(e){
			e.preventDefault();
			var row = $('#left-custom').clone();
			$(row).find('.field').each(function(){
				$(this).val("");
			});
			$(row).css('display','flex');
			$('.left-damage-cont').append(row);
		});
		$('#left-add-btn').on('click', function(e){
			e.preventDefault();
			var row = $('#left-damesges-row').clone();
			$(row).find('.field').each(function(){
				$(this).val("");
			});
			$('.left-damage-cont').append(row);
		});
		$('#top-add-custom').on('click', function(e){
			e.preventDefault();
			var row = $('#top-custom').clone();
			$(row).find('.field').each(function(){
				$(this).val("");
			});
			$(row).css('display','flex');
			$('.top-damage-cont').append(row);
		});
		$('#top-add-btn').on('click', function(e){
			e.preventDefault();
			var row = $('#top-damesges-row').clone();
			$(row).find('.field').each(function(){
				$(this).val("");
			});
			$('.top-damage-cont').append(row);

		});
		$('#add-image-btn').on('click', function(e){
			e.preventDefault();
			var image_cont = $('#images-row').clone();
			$(image_cont).find(".img-input").val("");
			$('.image-cont').append(image_cont);

		});
		$('#year-select').on('change', function(e){
			var year = $(this).val();
			var make = $('#make-select').val();
			if(make != "" && year != ""){
				getModels();
			}
		});
		$('#make-select').on('change', function(e){
			var make = $(this).val();
			var year = $('#year-select').val();
			if(make != "" && year != ""){
				getModels();
			}
		});
		$('#model-select').on('change', function(){
			getVariants();
		});
		$('#variant-select').on('change', function(){
			getCarInfo();
		});
	});

	function onLoadValues(){
		if($('#make-select').val() != "" && $('#year-select').val() != ""){
			getModels();
		}
	}

	function getModels(){
		var make = $("#make-select").val();
		var year = $('#year-select').val();
		$.ajax({
			url: "{{ url('getModels') }}/"+year+"/"+make,
			type: 'GET',
			dataType:'json',
			success: function(res) {
				if(res.status == "success"){
					$('#model-select').html(res.html);
					var model = "{{ old('model') ?? $vehicle->model }}";
					if(model != ""){
						$('#model-select option[value="'+model+'"]').attr("selected", "selected");
						getVariants();
					}
				}
			}
		});
	}
	function getVariants(){
		var make = $("#make-select").val();
		var year = $('#year-select').val();
		var model = $('#model-select').val();
		$.ajax({
			url: "{{ url('getVariants') }}/"+year+"/"+make+"/"+model,
			type: 'GET',
			dataType:'json',
			success: function(res) {
				if(res.status == "success"){
					$('#variant-select').html(res.html);
					var variant = "{{ old('variant') ?? $vehicle->variant }}";
					if(variant != ""){
						$('#variant-select option[value="'+variant+'"]').attr("selected", "selected");
					}
				}
			}
		});
	}
	function getCarInfo(){
		var year = $('#year-select').val();
		var make = $("#make-select").val();
		var model = $('#model-select').val();
		var variant = $('#variant-select').val();

		$.ajax({
			url: "{{ url('getCarInfo') }}/"+year+"/"+make+"/"+model+"/"+variant,
			type: 'GET',
			dataType:'json',
			success: function(res) {
				if(res.status == "success"){
					var data = res.data;
					$('#transmission-select option[value="'+data.transmission+'"]').attr("selected", "selected");
					$('#fuel_type-select option[value="'+data.fuel_type+'"]').attr("selected", "selected");
					$('#cylinders-input').val(data.cylinders);
					$('#body_type-select option[value="'+data.body_type+'"]').attr("selected", "selected");
				}
			}
		});

	}

	(function(){
		'use strict'
		var forms = document.querySelectorAll('.needs-validation');
		Array.prototype.slice.call(forms)
		.forEach(function (form) {
			form.addEventListener('submit', function (event) {
				if (!form.checkValidity()) {
					event.preventDefault()
					event.stopPropagation()
				}
				form.classList.add('was-validated')
			}, false)
		})
	})()
</script>
@endpush