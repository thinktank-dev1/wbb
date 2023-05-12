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
				<div class="col-md-12">
				<div class="mb-3">
					<label class="form-label">Add Vehicle  To Auction: </label><br />
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" value="yes" id="wr1" name="external_sale" @if(old('external_sale') == "yes") checked @elseif($vehicle->external_sale == "yes") checked @endif required>
						<label class="form-check-label" for="wr1">Yes</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" value="no" id="wr2" name="external_sale" @if(old('external_sale') == "no") checked @elseif($vehicle->external_sale == "no") checked @endif required>
						<label class="form-check-label" for="wr2">No</label>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="mb-3">
					<label class="form-label">Stock Number</label>
					<input type="text" class="form-control" id="stock_number" name="stock_number" value="{{ $vehicle->stock_number }}">
				</div>
			</div>
			<div class="col-md-12">
				<div class="mb-3">
					<label class="form-label">MMCODE</label>
					<input type="text" class="form-control" id="mmcode" name="mmcode" value="{{ $vehicle->mmcode }}">
				</div>
			</div>
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
					{{--
					<input type="text" class="form-control" name="natis" value="@if(old('natis')) {{ old('natis') }} @else {{ $vehicle->natis }} @endif" required>
					--}}
					<select class="form-control" name="natis">
						<option value="">Select Option</option>
						@foreach($natis_options AS $nat_op)
						@php
						$sel = '';
						if(old('natis')){
							if(old('natis') == $nat_op){
								$sel = "selected";
							}
						}
						elseif($vehicle->natis == $nat_op){
							$sel = "selected";
						}
						@endphp
						<option value="{{ $nat_op }}" {{ $sel }}>{{ $nat_op }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Engine Size</label>
					<input type="text" class="form-control" name="engine_type" value="@if(old('engine_type')) {{ old('engine_type') }} @elseif($vehicle->engine_type) {{ $vehicle->engine_type }} @endif" required>
				</div>
			</div>
			<!--<div class="col-md-3">-->
			<!--	<div class="mb-3">-->
			<!--		<label class="form-label">Cylinders</label>-->
			<!--		<input type="text" class="form-control" name="cylinders" id="cylinders-input" value="@if(old('cylinders')) {{ old('cylinders') }} @elseif($vehicle->cylinders) {{ $vehicle->cylinders }} @endif" required>-->
			<!--	</div>-->
			<!--</div>-->
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
					<select class="form-control" name="service_history" required>
						<option value="">Select Option</option>
						@foreach($service_history_options AS $srv)
						@php
						$sel = '';
						if(old('service_history') == $srv){
							$sel = "selected";
						}
						elseif($vehicle->service_history == $srv){
							$sel = "selected";
						}
						@endphp
						<option value="{{ $srv }}" {{ $sel }} >{{ $srv }}</option>
						@endforeach
					</select>
					<!--<div class="form-check form-check-inline">-->
					<!--	<input class="form-check-input" type="radio" value="yes" id="sh1" name="service_history" @if(old('service_history') == "yes") checked @elseif ($vehicle->service_history == "yes") checked @endif required>-->
					<!--	<label class="form-check-label" for="sh1">Yes</label>-->
					<!--</div>-->
					<!--<div class="form-check form-check-inline">-->
					<!--	<input class="form-check-input" type="radio" value="no" id="sh2" name="service_history" @if(old('service_history') == "no") checked @elseif($vehicle->service_history == "no") checked @endif required>-->
					<!--	<label class="form-check-label" for="sh2">No</label>-->
					<!--</div>-->
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
					<div class="col-md-12" style="display: @if(old('service_plan')) @if(old('service_plan') == "yes") block @else none @endif @elseif($vehicle->service_plan) @if($vehicle->service_plan == "yes") block @else none  @endif @else none  @endif" id="service_plan_cont" required>
						<div class="mb-3">
							<label class="form-label">Kilometers</label>
							<input type="text" class="form-control" name="service_km" value="@if(old('service_km')) {{ old('service_km') }} @elseif($vehicle->service_km) {{ $vehicle->service_km }} @endif" required>
						</div>
						<div class="mb-3">
							<label class="form-label">Year</label>
							<select class="form-control" name="service_year" id="year-select" required>
								<option value="">Select Year</option>
								@php
								$date_start = date("Y", strtotime('-30 year'));
								$date_end = date("Y", strtotime('+10 year'));
								@endphp
								@for($i = $date_end; $i >= $date_start; $i--)
								@php
								$sel = '';
								if(old('year') == $i){
									$sel = "selected";
								}
								elseif($vehicle->service_year == $i){
									$sel = 'selected';
								}
								@endphp
								<option value="{{ $i }}" {{ $sel }}>{{ $i }}</option>
								@endfor
							</select>
						</div>
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
					<div class="col-md-12" style="display: @if(old('warranty')) @if(old('warranty') == "yes") block @else none @endif @elseif($vehicle->warranty) @if($vehicle->warranty == "yes") block @else none  @endif @else none  @endif" id="warranty_cont" required>
						<div class="mb-3">
							<label class="form-label">Kilometers</label>
							<input type="text" class="form-control" name="warranty_km" value="@if(old('warranty_km')) {{ old('warranty_km') }} @elseif($vehicle->warranty_km) {{ $vehicle->warranty_km }} @endif" required>
						</div>
						<div class="mb-3">
							<div class="row">
								<div class="col-6">
									<label class="form-label">Year</label>
									<select class="form-control" name="warranty_year" id="year-select" required>
										<option value="">Select Option</option>
										@php
										$date_start = date("Y", strtotime('-30 year'));
										$date_end = date("Y", strtotime('+10 year'));
										@endphp
										@for($i = $date_end; $i >= $date_start; $i--)
										@php
										$sel = '';
										if(old('year') == $i){
											$sel = "selected";
										}
										elseif($vehicle->warranty_year == $i){
											$sel = 'selected';
										}
										@endphp
										<option value="{{ $i }}" {{ $sel }}>{{ $i }}</option>
										@endfor
									</select>
								</div>
								<div class="col-6">
									<label class="form-label">Month</label>
									<select class="form-control" name="warranty_month">
										@if($vehicle->warranty_month)
											<option value="{{ $vehicle->warranty_month }}" selected>{{ $vehicle->warranty_month }}</option>
										@else
										<option value="">Select Month</option>
										@endif
										<option value="January">January</option>
										<option value="February">February</option>
										<option value="March">March</option>
										<option value="April">April</option>
										<option value="May">May</option>
										<option value="June">June</option>
										<option value="July">July</option>
										<option value="August">August</option>
										<option value="September">September</option>
										<option value="October">October</option>
										<option value="November">November</option>
										<option value="December">December</option>
									</select>
								</div>
							</div>
						</div>
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
	<div class="accordion" id="accordionExample">
		<div class="accordion-item">
			<h2 class="accordion-header" id="headingOne">
				<button style="background-color: #efefef" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					Extras
				</button>
			</h2>
			<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
				<div class="accordion-body">
					<div class="row">
						@foreach($extras_options AS $k=>$extra_arr)
						<div class="col-md-3">
							<h5>{{ $k }}</h5>
							@foreach($extra_arr AS $list)
							<div class="mb-3">
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="checkbox" id="{{ $list }}" value="{{ $list }}" name="extras[]" @if(old('extras')) @if( in_array($list, old('extras'))) checked @endif @elseif($vehicle->hasExtra($list)) checked @endif>
									<label class="form-check-label" for="{{ $list }}">{{ $list }}</label>
								</div>
							</div>
							@endforeach
						</div>
						@endforeach
					</div>
				</div>
			</div>
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
					<label class="form-label">Accident History: </label><br />
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
			<div class="col-md-6">
				<div class="mb-3">
					<label class="form-label">Wind Screen Condition</label>
					<select class="form-control" name="windscreen_condition" required>
						<option value="">Select Option</option>
						@foreach($windscreen_list AS $list)
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
			<div class="col-md-6">
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
					<label class="form-label">Rim Condition - Front Left</label>
					<select class="form-control" name="front_left_rim" required>
						<option value="">Select Option</option>
						@foreach($conditions_list AS $list)
						@php
						$sel = '';
						if(old('front_left_rim')){
							if(old('front_left_rim') == $list){
								$sel = "selected";
							}
						}
						elseif($vehicle->report){
							if($vehicle->report->front_left_rim == $list){
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
					<label class="form-label">Rim Condition - Front Right</label>
					<select class="form-control" name="front_right_rim" required>
						<option value="">Select Option</option>
						@foreach($conditions_list AS $list)
						@php
						$sel = '';
						if(old('front_left_rim')){
							if(old('front_left_rim') == $list){
								$sel = "selected";
							}
						}
						elseif($vehicle->report){
							if($vehicle->report->front_left_rim == $list){
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
					<label class="form-label">Rim Condition - Back Left</label>
					<select class="form-control" name="back_left_rim" required>
						<option value="">Select Option</option>
						@foreach($conditions_list AS $list)
						@php
						$sel = '';
						if(old('front_right_rim')){
							if(old('front_right_rim') == $list){
								$sel = "selected";
							}
						}
						elseif($vehicle->report){
							if($vehicle->report->front_right_rim == $list){
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
					<label class="form-label">Rim Condition - Back Right</label>
					<select class="form-control" name="back_right_rim" required>
						<option value="">Select Option</option>
						@foreach($conditions_list AS $list)
						@php
						$sel = '';
						if(old('back_left_rim')){
							if(old('back_left_rim') == $list){
								$sel = "selected";
							}
						}
						elseif($vehicle->report){
							if($vehicle->report->back_left_rim == $list){
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
					<label class="form-label">Tyre Condition - Front Left</label>
					<select class="form-control" name="front_left_tire" required>
						<option value="">Select Option</option>
						@if($tyre_condition)
							@foreach($tyre_condition AS $list)
								@php
								$sel = '';
								if(old('front_left_tire')){
									if(old('front_left_tire') == $list->name){
										$sel = "selected";
									}
								}
								elseif($vehicle->report){
									if($vehicle->report->front_left_tire == $list->name){
										$sel = 'selected';
									}
								}
								@endphp
								<option value="{{ $list->name }}" {{ $sel }}>{{ $list->name }}</option>
							@endforeach
						@endif
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Tyre Condition - Front Right</label>
					<select class="form-control" name="front_right_tire" required>
						<option value="">Select Option</option>
						@if($tyre_condition)
							@foreach($tyre_condition AS $list)
							@php
							$sel = '';
							if(old('front_right_tire')){
								if(old('front_right_tire') == $list->name){
									$sel = "selected";
								}
							}
							elseif($vehicle->report){
								if($vehicle->report->front_right_tire == $list->name){
									$sel = 'selected';
								}
							}
							@endphp
							<option value="{{ $list->name }}" {{ $sel }}>{{ $list->name }}</option>
							@endforeach
						@endif
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Tyre Condition - Back Left</label>
					<select class="form-control" name="back_left_tire" required>
						<option value="">Select Option</option>
						@if($tyre_condition)
							@foreach($tyre_condition AS $list)
							@php
							$sel = '';
							if(old('back_left_tire')){
								if(old('back_left_tire') == $list->name){
									$sel = "selected";
								}
							}
							elseif($vehicle->report){
								if($vehicle->report->back_left_tire == $list->name){
									$sel = 'selected';
								}
							}
							@endphp
							<option value="{{ $list->name }}" {{ $sel }}>{{ $list->name }}</option>
							@endforeach
						@endif
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mb-3">
					<label class="form-label">Tyre Condition - Back Right</label>
					<select class="form-control" name="back_right_tire" required>
						<option value="">Select Option</option>
						@if($tyre_condition)
						@foreach($tyre_condition AS $list)
						@php
						$sel = '';
						if(old('back_right_tire')){
							if(old('back_right_tire') == $list->name){
								$sel = "selected";
							}
						}
						elseif($vehicle->report){
							if($vehicle->report->back_right_tire == $list->name){
								$sel = 'selected';
							}
						}
						@endphp
						<option value="{{ $list->name }}" {{ $sel }}>{{ $list->name }}</option>
						@endforeach
						@endif
					</select>
				</div>
			</div>
		</div>
	</div>
</div>
<div style="background-color: #efefef" class="card">
	<div style="background-color: #efefef" class="card-header">
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

<div style="background-color: #efefef" class="card">
	<div style="background-color: #efefef" class="card-header">
		<div class="d-flex">
			<h4 class="card-title">Videos</h4>
			<div class="ms-auto">
				<a href="#" class="btn btn-primary" id="add-vid-btn"><i class="mdi mdi-car-2-plus"></i> Add Video</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="vid-cont">
			<div class="row mb-3" id="vid-row">
				<div class="mb-3">
					<label class="form-label">Select Video File</label>
					<input type="file" class="form-control" name="videos[]">
				</div>
			</div>
		</div>
		<div class="row">
			@foreach($vehicle->vids AS $vid)
			<div class="col-md-3">
				<video width="320" height="240" controls>
					<source src="{{ asset('storage/'.$vid->video_url) }}" type="video/mp4">
				</video>
				<div class="d-grid">
					<a href="{{ url('admin/remove-video/'.$vid->id) }}" class="btn btn-danger btn-sm">Remove</a>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>

@foreach($damage_positions AS $pos)
	<div class="accordion mb-3" id="accordion{{$pos}}">
		<div class="accordion-item">
			<h2 class="accordion-header" id="heading{{$pos}}">
				<button style="background-color: @if($pos == 'left' || $pos == 'front') #efefef @else #ffffff @endif" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$pos}}" aria-expanded="false" aria-controls="collapse{{$pos}}">
					<h4 class="card-title">Vehicle Inspection Report - {{ ucwords($pos) }}</h4>
				</button>
			</h2>
			<div id="collapse{{$pos}}" class="accordion-collapse collapse" aria-labelledby="heading{{$pos}}" data-bs-parent="#accordion{{$pos}}">
				<div class="accordion-body">
					<div class="d-flex">
						<div class="ms-auto mb-2">
							<a href="#" class="btn btn-primary" id="{{ $pos }}-add-btn">Add More</a>
							<a href="#" class="btn btn-primary" id="{{ $pos }}-add-custom">Add More With Custom Descriptions</a>
						</div>
					</div>
					<div class="card-body {{ $pos }}-damage-cont">
						<div class="row" id="{{ $pos }}-damesges-row">
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label">Upload Damage Image</label>
									<input type="file" class="form-control field" name="{{ $pos }}-damage-images[]">
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label">Position</label>
									<select class="form-control img-input field" name="{{ $pos }}-position[]">
										<option value="">Select Option</option>
										@php
										if($pos == 'top'){
											$list = $top_positions;
										}
										if($pos == 'right' || $pos == 'left'){
											$list = $left_right_positions;
										}
										if($pos == 'back'){
											$list = $back_positions;
										}
										if($pos == 'front'){
											$list = $front_positions;
										}
										@endphp
										@foreach($list AS $ppos)
										<option value="{{ $ppos }}">{{ $ppos }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label">Type Of Damage</label>
									<select class="form-control img-input field" name="{{ $pos }}-type[]">
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
									<select class="form-control img-input field" name="{{ $pos }}-severity[]">
										<option value="">Select Option</option>
										@foreach($damage_severity_list AS $severity)
										<option value="{{ $severity }}">{{ $severity }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="mb-3">
									<label class="form-label">Estimate Damage Cost</label>
									<div class="input-group mb-3">
										<span class="input-group-text" id="basic-addon1">R</span>
										<input type="number" class="form-control" name="{{ $pos }}_estimate_damage_cost[]">
									</div>
								</div>
								<hr />
							</div>
						</div>
						<div class="row" id="{{ $pos }}-custom" style="display:none">
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label">Upload Damage Image</label>
									<input type="file" class="form-control img-input field" name="{{$pos }}-damage-images[]">
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label">Position</label>
									<input type="text" class="form-control img-input field" name="{{ $pos }}-position[]">
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label">Type Of Damage</label>
									<input type="text" class="form-control img-input field" name="{{ $pos }}-type[]">
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label">Severity Of Damage</label>
									<input type="text" class="form-control img-input field" name="{{ $pos }}-severity[]">
								</div>
							</div>
							<div class="col-md-12">
								<div class="mb-3">
									<label class="form-label">Estimate Damage Cost</label>
									<div class="input-group mb-3">
										<span class="input-group-text" id="basic-addon1">R</span>
										<input type="number" class="form-control" name="{{ $pos }}_estimate_damage_cost[]">
									</div>
								</div>
								<hr />
							</div>
						</div>
						@if($vehicle->inspectionBySide($pos)->count() > 0)
						<div class="row">
							<div class="col-md-12">
								<table class="table">
									<thead>
										<th></th>
										<th>Position</th>
										<th>Type Of Damage</th>
										<th>Severity</th>
										<th>Cost</th>
										<th></th>
									</thead>
									<tbody>
										@php
										$damages = $vehicle->inspectionBySide($pos);
										@endphp
										@foreach($damages AS $damage)
										<tr>
											<td><img src="{{ asset('storage/'.$damage->image_url) }}" style="height:50px"></td>
											<td>{{ $damage->poasition }}</td>
											<td>{{ $damage->type }}</td>
											<td>{{ $damage->severity }}</td>
											<td>{{ $damage->estimate_damage_cost }}</td>
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
			</div>
		</div>
	</div>
@endforeach
<div class="accordion mb-3" id="accordionInterior">
		<div class="accordion-item">
			<h2 class="accordion-header" id="headingInterior">
				<button style="background-color: #efefef" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInterior" aria-expanded="false" aria-controls="collapseInterior">
					<h4 class="card-title">Interior Inspection</h4>
				</button>
			</h2>
			<div id="collapseInterior" class="accordion-collapse collapse" aria-labelledby="headingInterior" data-bs-parent="#accordionInterior">
				<div class="accordion-body">
					<div class="d-flex">
						<div class="ms-auto mb-2">
							<a href="#" class="btn btn-primary" id="int-add-btn">Add More</a>
							<a href="#" class="btn btn-primary" id="int-add-custom">Add More With Custom Descriptions</a>
						</div>
					</div>
					<div class="card-body interior-damage-cont">
						<div class="row" id="interior-damages-row">
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label">Upload Damage Image</label>
									<input type="file" class="form-control field" name="interior-damage-images[]">
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label">Position</label>
									<select class="form-control img-input field" name="interior-position[]">
										<option value="">Select Option</option>
										@foreach($interior AS $int)
										<option value="{{ $int->name }}">{{ $int->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label">Type Of Damage</label>
									<select class="form-control img-input field" name="interior-type[]">
										<option value="">Select Option</option>
										@foreach($interior_damages AS $type)
										<option value="{{ $type->name }}">{{ $type->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label">Severity Of Damage</label>
									<select class="form-control img-input field" name="interior-severity[]">
										<option value="">Select Option</option>
										@foreach($damage_severity_list AS $severity)
										<option value="{{ $severity }}">{{ $severity }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="mb-3">
									<label class="form-label">Estimate Damage Cost</label>
									<div class="input-group mb-3">
										<span class="input-group-text" id="basic-addon1">R</span>
										<input type="number" class="form-control" name="interior_estimate_damage_cost[]">
									</div>
								</div>
								<hr />
							</div>
						</div>
						<div class="row" id="interior-custom" style="display:none">
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label">Upload Damage Image</label>
									<input type="file" class="form-control img-input field" name="interior-damage-images[]">
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label">Position</label>
									<input type="text" class="form-control img-input field" name="interior-position[]">
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label">Type Of Damage</label>
									<input type="text" class="form-control img-input field" name="interior-type[]">
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label">Severity Of Damage</label>
									<input type="text" class="form-control img-input field" name="interior-severity[]">
								</div>
							</div>
							<div class="col-md-12">
								<div class="mb-3">
									<label class="form-label">Estimate Damage Cost</label>
									<div class="input-group mb-3">
										<span class="input-group-text" id="basic-addon1">R</span>
										<input type="number" class="form-control" name="interior_estimate_damage_cost[]">
									</div>
								</div>
								<hr />
							</div>
						</div>
						@if($vehicle->inspectionBySide('interior')->count() > 0)
							<div class="row">
								<div class="col-md-12">
									<table class="table">
										<thead>
											<th></th>
											<th>Position</th>
											<th>Type Of Damage</th>
											<th>Severity</th>
											<th>Cost</th>
											<th></th>
										</thead>
										<tbody>
											@php
												$damages = $vehicle->inspectionBySide('interior');
											@endphp
											@foreach($damages AS $damage)
											<tr>
												<td><img src="{{ asset('storage/'.$damage->image_url) }}" style="height:50px"></td>
												<td>{{ $damage->poasition }}</td>
												<td>{{ $damage->type }}</td>
												<td>{{ $damage->severity }}</td>
												<td>{{ $damage->estimate_damage_cost }}</td>
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
			</div>
		</div>
	</div>
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-12">
				<div class="d-grid gap-2">
					<a type="submit" class="btn btn-primary" onclick="$(this).closest('form').submit();">SAVE</a>
				</div>
			</div>
		</div>
	</div>
</div>

@push('scripts')
<script>
	const choices = new Choices('.single-select');
	$(document).ready(function(){
		$('#add-vid-btn').on('click', function(e){
			e.preventDefault();
			var vid_cont = $('#vid-row').clone();
			$(vid_cont).find(".vid-input").val("");
			$('.vid-cont').append(vid_cont);
		});
	
		onLoadValues();
		
		$('#mmcode').on('input', function(){
			getCarByMMCode();
		});
		
		$('input[type=radio][name=mechanical_faults_warnig_lights]').change(function() {
			if($(this).val() == "yes"){
				$("#mechanical_faults_warnig_lights_description_cont").show();
			}
			else{
				$('#mechanical_faults_warnig_lights_description_cont').hide();
			}
		})
		
		$('input[type=radio][name=service_plan]').change(function() {
			if($(this).val() == "yes"){
				$("#service_plan_cont").show();
			}
			else{
				$('#service_plan_cont').hide();
			}
		})
		
		$('input[type=radio][name=warranty]').change(function() {
			if($(this).val() == "yes"){
				$("#warranty_cont").show();
			}
			else{
				$('#warranty_cont').hide();
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
		
		$('#int-add-btn').on('click', function(e){
			e.preventDefault();
			var row = $('#interior-damages-row').clone();
			$(row).find('.field').each(function(){
				$(this).val("");
			});
			$('.interior-damage-cont').append(row);
		});
		
		$('#int-add-custom').on('click', function(e){
			e.preventDefault();
			var row = $('#interior-custom').clone();
			$(row).find('.field').each(function(){
				$(this).val("");
			});
			$(row).css('display','flex');
			$('.interior-damage-cont').append(row);
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
			async: 'false',
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
		model = model.replaceAll('/', '_');
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
		variant = variant.replaceAll('/', '_');
		$.ajax({
			url: "{{ url('getCarInfo') }}/"+year+"/"+make+"/"+model+"/"+variant,
			type: 'GET',
			dataType:'json',
			success: function(res) {
				if(res.status == "success"){
					var data = res.data;
					$('#transmission-select option[value="'+data.transmission+'"]').attr("selected", "selected");
					$('#fuel_type-select option[value="'+data.fuel_type+'"]').attr("selected", "selected");
					/**$('#cylinders-input').val(data.cylinders);**/
					$('#body_type-select option[value="'+data.body_type+'"]').attr("selected", "selected");
				}
			}
		});

	}
	
	function getCarByMMCode(){
		var mmcode = $('#mmcode').val();
		if(mmcode != ""){
			$.ajax({
				url: "{{ url('getCarByMMCode') }}/"+mmcode,
				type: 'GET',
				dataType:'json',
				success: function(res) {
					if(res.status == "success"){
						var dd = res.data;
						$('#year-select').val(res.data.year);
						$("#make-select").val(res.data.make);
						choices.setChoiceByValue(res.data.make);
						
						var make = dd.make;
						var year = dd.year;
						var model = dd.model;
						
						$.ajax({
							url: "{{ url('getModels') }}/"+year+"/"+make,
							type: 'GET',
							dataType:'json',
							success: function(res) {
								if(res.status == "success"){
									$('#model-select').html(res.html);
									var model = dd.model;
									console.log("THE" + model);
									if(model != ""){
										$('#model-select option[value="'+model+'"]').attr("selected", "selected");
										
										//Get Variants
										$.ajax({
											url: "{{ url('getVariants') }}/"+year+"/"+make+"/"+model,
											type: 'GET',
											dataType:'json',
											success: function(res2) {
												if(res2.status == "success"){
													$('#variant-select').html(res2.html);
													var variant = dd.variant;
													if(variant != ""){
														$('#variant-select option[value="'+variant+'"]').attr("selected", "selected");
														
														getCarInfo();
													}
												}
											}
										});
										
									}
								}
							}
						});
					}
				}
			});
		}
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