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
                            <div class="d-flex">
                                <h4 class="card-title">List Vehicles</h4>
                                <div class="ms-auto">
                                    <div class="">
                                        <form method="get">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search Key">
                                                <select class="form-control" id="year-select">
                                                    @php
                                                    $date_start = date("Y", strtotime('-30 year'));
                                                    $date_end = date("Y");
                                                    @endphp
                                                    @for($i = $date_end; $i >= $date_start; $i--)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                                <select class="form-control" id="make-select">
                                                    <option value="" disabled selected>Select Make</option>
                                                    @foreach($car_list AS $list)
                                                    <option value="{{ $list->make }}">{{ $list->make }}</option>
                                                    @endforeach
                                                </select>
                                                <select class="form-control" id="model-select">
                                                    <option value="">Select Make First</option>
                                                </select>
                                                <select class="form-control" id="variant-select">
                                                    <option value="">Select Make & Model First</option>
                                                </select>
                                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="bx bx-search-alt align-middle"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
@push('scripts')
<script>
    //const choices = new Choices('.single-select');
    $(document).ready(function(){
        $('#year-select').on('change', function(){
            var year = $('#year-select').val();
            var make = $('#make-select').val();
            if(year != "" && make != ""){
                getModels();
            }
        });
        $('#make-select').on('change', function(){
            var year = $('#year-select').val();
            var make = $('#make-select').val();
            if(year != "" && make != ""){
                getModels();
            }
        });
        $('#model-select').on('change', function(){
            var year = $('#year-select').val();
            var make = $('#make-select').val();
            var model = $('#model-select').val();
            if(year != "" && make != "" && model != ""){
                getVariants();
            }
        });
    });
    function getModels(){
        var year = $('#year-select').val();
        var make = $("#make-select").val();
        console.log(year);
        console.log(make);
        $.ajax({
            url: "{{ url('getModels') }}/"+year+"/"+make,
            type: 'GET',
            dataType:'json',
            success: function(res) {
                console.log(res);
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
</script>
@endpush
@endsection