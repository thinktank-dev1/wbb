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
	<div class="col-md-6">
		<div class="row">
			<div class="col-md-12">
				<h5>User Information</h5>
			</div>
			<div class="col-md-6">
				<div class="mb-3">
					<label class="form-label">First Name</label>
					<input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}">
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-3">
					<label class="form-label">Last Name</label>
					<input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}">
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-3">
					<label class="form-label">Primary Contact</label>
					<input type="text" class="form-control" name="contact_primary" value="{{ $user->contact_primary }}">
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-3">
					<label class="form-label">Secondary Contact</label>
					<input type="text" class="form-control" name="contact_secondary" value="{{ $user->contact_secondary }}">
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-3">
					<label class="form-label">ID Type</label>
					<input type="text" class="form-control" name="id_type" value="{{ $user->id_type }}">
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-3">
					<label class="form-label">ID Number</label>
					<input type="text" class="form-control" name="id_number" value="{{ $user->id_number }}">
				</div>
			</div>
			<div class="col-md-12">
				<div class="mb-3">
					<label class="form-label">Email</label>
					<input type="email" class="form-control" name="email" value="{{ $user->email }}">
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-3">
					<label class="form-label">Password</label>
					<input type="password" class="form-control" name="password">
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-3">
					<label class="form-label">Confirm Password</label>
					<input type="password" class="form-control" name="password_confirmation">
				</div>
			</div>

		</div>
	</div>
	<div class="col-md-6">
		<div class="row">
			<div class="col-md-12">
				<h5>Company Information</h5>
			</div>
			<div class="col-md-12">
				<div class="mb-3">
					<label class="form-label">Company Name</label>
					<input type="text" class="form-control" name="company_name" value="@if($user->company) {{ $user->company->company_name }} @endif" >
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-3">
					<label class="form-label">Company Type</label>
					<input type="text" class="form-control" name="company_type" value="@if($user->company) {{ $user->company->company_type }} @endif" >
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-3">
					<label class="form-label">Registration Number</label>
					<input type="text" class="form-control" name="company_registration_number" value="@if($user->company) {{ $user->company->registration_number }} @endif" >
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-3">
					<label class="form-label">Tel</label>
					<input type="text" class="form-control" name="company_contact_number" value="@if($user->company) {{ $user->company->contact_number }} @endif" >
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-3">
					<label class="form-label">Email</label>
					<input type="text" class="form-control" name="company_email" value="@if($user->company) {{ $user->company->email }} @endif" >
				</div>
			</div>
			<div class="col-md-4">
				<div class="mb-3">
					<label class="form-label">Street</label>
					<input type="text" class="form-control" name="street" value="@if($user->company) {{ $user->company->street }} @endif" >
				</div>
			</div>
			<div class="col-md-4">
				<div class="mb-3">
					<label class="form-label">Suburb</label>
					<input type="text" class="form-control" name="suburb" value="@if($user->company) {{ $user->company->suburb }} @endif" >
				</div>
			</div>
			<div class="col-md-4">
				<div class="mb-3">
					<label class="form-label">City</label>
					<input type="text" class="form-control" name="city" value="@if($user->company) {{ $user->company->city }} @endif" >
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-3">
					<label class="form-label">Province</label>
					<input type="text" class="form-control" name="province" value="@if($user->company) {{ $user->company->province }} @endif" >
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-3">
					<label class="form-label">Postal Code</label>
					<input type="text" class="form-control" name="code" value="@if($user->company) {{ $user->company->code }} @endif" >
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<hr />
	</div>
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12">
				<h5>Billing Information</h5>
			</div>
			<div class="col-md-12">
				<div class="mb-3">
					<label class="form-label">VAT Number</label>
					<input type="text" class="form-control" name="payment_vat_number" value="@if($user->company) @if($user->company->payment) {{ $user->company->payment->vat_number }} @endif  @endif">
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-3">
					<label class="form-label">Street</label>
					<input type="text" class="form-control" name="payment_street" value="@if($user->company) @if($user->company->payment) {{ $user->company->payment->street }} @endif  @endif">
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-3">
					<label class="form-label">suburb</label>
					<input type="text" class="form-control" name="payment_suburb" value="@if($user->company) @if($user->company->payment) {{ $user->company->payment->suburb }} @endif  @endif">
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-3">
					<label class="form-label">City</label>
					<input type="text" class="form-control" name="payment_city" value="@if($user->company) @if($user->company->payment) {{ $user->company->payment->city }} @endif  @endif">
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-3">
					<label class="form-label">Province</label>
					<input type="text" class="form-control" name="payment_province" value="@if($user->company) @if($user->company->payment) {{ $user->company->payment->province }} @endif  @endif">
				</div>
			</div>
			<div class="col-md-12">
				<div class="mb-3">
					<label class="form-label">Code</label>
					<input type="text" class="form-control" name="payment_code" value="@if($user->company) @if($user->company->payment) {{ $user->company->payment->code }} @endif  @endif">
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="d-grid gap-2">
			<input type="submit" class="btn btn-primary" value="SAVE">
		</div>
	</div>
</div>