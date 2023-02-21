@extends('layouts.admin')
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Users</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                                <li class="breadcrumb-item active">View User</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">User Information</h4>
                        </div>
                        <div class="card-body">
                        	<ul class="list-group">
                        		<li class="list-group-item d-flex justify-content-between align-items-center">
                        			Name:
                        			<span class="">{{ $user->first_name.' '.$user->last_name }}</span>
                        		</li>
                        		<li class="list-group-item d-flex justify-content-between align-items-center">
                        			Email:
                        			<span class="">{{ $user->email }}</span>
                        		</li>
                        		<li class="list-group-item d-flex justify-content-between align-items-center">
                        			Primary Contact:
                        			<span class="">{{ $user->contact_primary }}</span>
                        		</li>
                        		<li class="list-group-item d-flex justify-content-between align-items-center">
                        			Secondary Contact:
                        			<span class="">{{ $user->contact_secondary }}</span>
                        		</li>
                        		<li class="list-group-item d-flex justify-content-between align-items-center">
                        			{{ ucwords($user->id_type) }} Number:
                        			<span class="">{{ $user->id_number }}</span>
                        		</li>
                        		<li class="list-group-item d-flex justify-content-between align-items-center">
                        		    Status:
                                    <span class="">{{ $user->status }}</span>
                        		</li>
                        		<li class="list-group-item d-flex justify-content-between align-items-center">
                        		    Identity Documnent:
                        		    @if($user->id_document)
                						<a href="{{ url('storage/'.$user->id_document) }}" target="_blank">
                							<i style="font-size:20px; color:#8cd50a" class="mdi mdi-file"></i>
                						</a>
                					@endif
                        		</li>
                        		<li class="list-group-item d-flex justify-content-between align-items-center">
                        		    Proof Of Residence:
                        			@if($user->proof_of_residence)
                						<a href="{{ url('storage/'.$user->proof_of_residence) }}" target="_blank">
                							<i style="font-size:20px; color:#8cd50a" class="mdi mdi-file"></i>
                						</a>
                    				@endif
                    			</li>
                    			<li class="list-group-item d-flex justify-content-between align-items-center">
                        		    VAT Registration:
                        			@if($user->vat_registration)
                						<a href="{{ url('storage/'.$user->vat_registration) }}" target="_blank">
                							<i style="font-size:20px; color:#8cd50a" class="mdi mdi-file"></i>
                						</a>
                    				@endif
                    		    </li>
                    		    <li class="list-group-item d-flex justify-content-between align-items-center">
                        		    BRM:
                        		    @if($user->brm)
                						<a href="{{ url('storage/'.$user->brm) }}" target="_blank">
                							<i style="font-size:20px; color:#8cd50a" class="mdi mdi-file"></i>
                						</a>
                    				@endif
                				</li>
                				<li class="list-group-item d-flex justify-content-between align-items-center">
                        		    Proxy ID:
                					@if($user->proxy_id)
                						<a href="{{ url('storage/'.$user->proxy_id) }}" target="_blank">
                							<i style="font-size:20px; color:#8cd50a" class="mdi mdi-file"></i>
                						</a>
                    				@endif
                    			</li>
                        	</ul>
                        	
                        </div>
                    </div>
                    @if($user->company)
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Company Information</h4>
                        </div>
                        <div class="card-body">
                        	<ul class="list-group">
                        		<li class="list-group-item d-flex justify-content-between align-items-center">
                        			Company Name:
                        			<span class="">{{ $user->company->company_name }}</span>
                        		</li>
                        		<li class="list-group-item d-flex justify-content-between align-items-center">
                        			Company type:
                        			<span class="">{{ $user->company->company_type }}</span>
                        		</li>
                        		<li class="list-group-item d-flex justify-content-between align-items-center">
                        			Registration Number:
                        			<span class="">{{ $user->company->registration_number }}</span>
                        		</li>
                        		<li class="list-group-item d-flex justify-content-between align-items-center">
                        			Tel:
                        			<span class="">{{ $user->company->contact_number }}</span>
                        		</li>
                        		<li class="list-group-item d-flex justify-content-between align-items-center">
                        			Email:
                        			<span class="">{{ $user->company->email }}</span>
                        		</li>
                        		<li class="list-group-item">
                        			Address:<br />
                        			<span class="">
                        				{{ $user->company->street }}<br />
                        				{{ $user->company->suburb }}<br />
                        				{{ $user->company->city }}<br />
                        				{{ $user->company->province }}<br />
                        				{{ $user->company->code }}<br />
                        			</span>
                        		</li>
                        	</ul>
                        </div>
                    </div>
                    @endif
                    @if($user->company->payment)
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Billing Information</h4>
                        </div>
                        <div class="card-body">
                        	<ul class="list-group">
                        		<li class="list-group-item d-flex justify-content-between align-items-center">
                        			VAT Number:
                        			<span class="">{{ $user->company->payment->vat_number }}</span>
                        		</li>
                        		<li class="list-group-item">
                        			Billing Address:<br />
                        			<span class="">
                        				{{ $user->company->payment->street }}<br />
                        				{{ $user->company->payment->suburb }}<br />
                        				{{ $user->company->payment->city }}<br />
                        				{{ $user->company->payment->province }}<br />
                        				{{ $user->company->payment->code }}<br />
                        			</span>
                        		</li>
                        	</ul>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-md-8">
                	<div class="card">
                		<div class="card-header">
                            <h4 class="card-title">Cars Bought</h4>
                        </div>
                        <div class="card-body">

                        </div>
                	</div>
                	<div class="card">
                		<div class="card-header">
                            <h4 class="card-title">Bids Placed</h4>
                        </div>
                        <div class="card-body">

                        </div>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection