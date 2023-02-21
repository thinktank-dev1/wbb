@extends('layouts.main')
@section('content')
<section class="login">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-5 text-center">
                <div class="card login-card">
                    <div class="card-body">
                        <h5 class="card-title login-title">PASSWORD RESET</h5>
                        <h6 class="card-subtitle login-subtitle">Create new password.</h6>
                        <div class="mt-5">
                            @if ($errors->any())
                            <div class="alert alert-warning">
                                <strong>{{ $errors->first() }}</strong> 
                            </div>
                            @endif
                        </div>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="email" name="email" :value="old('email')" required autofocus placeholder="Email"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="password" name="password"  required autofocus placeholder="New Password"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="password" name="password_confirmation"  required autofocus placeholder="Confirm New Password"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-sm">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
