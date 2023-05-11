@extends('layouts.admin')
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Options</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Auctions</a></li>
                                <li class="breadcrumb-item active">{{ ucwords(str_replace('-', ' ',$type)) }}</li>
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
                    		    <h4 class="card-title">Create {{ ucwords(str_replace('-', ' ',$type)) }}</h4>
                    		</div>
                    	</div>
                    	<div class="card-body">
                    	    <form method="post" action="{{ url('admin/saveOption') }}">
                    	        @csrf
                    	        <input type="hidden" name="type" value="{{ $type }}">
                    	        @if($option->name)
                    	            <input type="hidden" name="action" value="{{ $option->id }}">
                	            @else
                	                <input type="hidden" name="action" value="create">
                    	        @endif
                    	        <div class="mb-3">
                    	            <label class="form-label">Name</label>
                    	            <input type="text" class="form-control" name="name" value="{{ old('name') ?? $option->name }}">
                	            </div>
                	            <div class="mb-3">
                	                <div class="d-grid">
                	                    <input type="submit" class="btn btn-primary" value="SAVE">
                	                </div>
                	            </div>
                    	    </form>
                	    </div>
            	    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                    	    <div class="d-flex">
                    		    <h4 class="card-title">{{ ucwords(str_replace('-', ' ',$type)) }}</h4>
                    		</div>
                    	</div>
                    	<div class="card-body">
                    	    <table class="table">
                    	        <thead>
                    	            <tr>
                    	                <th>Name</th>
                    	                <th>Type</th>
                    	                <th></th>
                    	            </tr>
                    	        </thead>
                    	        <tbody>
                    	            @foreach($options AS $option)
                    	            <tr>
                    	                <td>{{ $option->name }}</td>
                    	                <td>{{ ucwords(str_replace('-', ' ', $option->type)) }}</td>
                    	                <td class="text-end">
                    	                    <a href="{{ url('admin/options/'.$option->type.'/'.$option->id) }}">Edit</a>
                    	                    &nbsp;|&nbsp;
                    	                    <a href="{{ url('admin/delete-option/'.$option->id) }}" class="text-danger"><i class="mdi mdi-trash-can-outline"></i></a>
                    	                </td>
                    	            </tr>
                    	            @endforeach
                    	        </tbody>
                    	    </table>
                    	    {{ $options->links() }}
                    	</body>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection