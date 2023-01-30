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
                                <li class="breadcrumb-item active">List Auctions Group</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                    	<div class="card-header">
                    		<h4 class="card-title">List Form Groups</h4>
                    	</div>
                    	<div class="card-body">
                    		<table class="table table-striped">
                    			<thead>
                    				<tr>
                    					<th>Date</th>
                    					<th>Name</th>
                    					<th>Time</th>
                    					<th>Number Of Lots</th>
                    					<th></th>
                    				</tr>
                    			</thead>
                    			<tbody>
                    				@foreach($groups AS $group)
                    				<tr>
                    					<td>{{ date('d M Y', strtotime($group->date)) }}</td>
                    					<td>{{ $group->name }}</td>
                    					<td>{{ $group->start_time.' - '.$group->end_time }}</td>
                    					<td></td>
                    					<th class="text-end">
                    						<a href="#">Lots</a>
                    						&nbsp;|&nbsp;
                    						<a href="{{ url('admin/auction-groups/'.$group->id) }}">View</a>
                    						&nbsp;|&nbsp;
                    						<a href="{{ url('admin/auction-groups/'.$group->id.'/edit') }}">Edit</a>
                    					</th>
                    				</tr>
                    				@endforeach
                    			</tbody>
                    		</table>
                    		{{ $groups->links() }}
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection