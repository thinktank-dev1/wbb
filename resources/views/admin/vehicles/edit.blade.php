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
                                <li class="breadcrumb-item"><a href="{{ url('admin/vehicles') }}">Vehicles</a></li>
                                <li class="breadcrumb-item active">Edit Vehicle</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form method="post" action="{{ url('admin/vehicles/'.$vehicle->id) }}" enctype="multipart/form-data" class="needs-validation">
                        @csrf
                        @method('PATCH')
                        @include('admin.vehicles.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection