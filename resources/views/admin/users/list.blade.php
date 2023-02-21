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
                                <li class="breadcrumb-item active">List Users</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List Users</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Role</th>
                                        <th>Cars Bought</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users AS $user)
                                    <tr>
                                        <td>{{ $user->first_name.' '.$user->last_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->contact_primary }}</td>
                                        <td>{{ $user->roles->description }}</td>
                                        <td>{{ $user->boughtCars() }}</td>
                                        @if($user->status == NULL)
                                            <td> In-Active</td>
                                        @else
                                            <td>{{ $user->status }}</td>
                                        @endif
                                        <td style="color:#8cd50a" class="text-end">
                                            <a style="color:#8cd50a" href="{{ url('admin/users/'.$user->id) }}"><i class="mdi mdi-account-eye-outline"></i> View</a>
                                            &nbsp;|&nbsp;
                                            <a style="color:#8cd50a" href="{{ url('admin/users/'.$user->id.'/edit') }}"><i class="mdi mdi-account-edit-outline"></i> Edit</a>
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