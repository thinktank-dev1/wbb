<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Create Auction Group</h4>
			</div>
			<div class="card-body">
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
					<div class="col-md-12">
						<div class="mb-3">
							<label class="form-label">Group Name</label>
							<input type="text" class="form-control" name="name" value="{{ old('name') ?? $auctionGroup->name }}">
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<label class="form-label">Auction Date</label>
							<input type="date" class="form-control" name="date" value="{{ old('date') ?? $auctionGroup->date }}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-3">
							<label class="form-label">Start Time</label>
							<input type="time" class="form-control" name="start_time" value="{{ old('start_time') ?? $auctionGroup->start_time }}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-3">
							<label class="form-label">End Time</label>
							<input type="time" class="form-control" name="end_time" value="{{ old('end_time') ?? $auctionGroup->end_time }}">
						</div>
					</div>
					<div class="col-md-12">
						<div class="d-grid gap-2">
							<input type="submit" class="btn btn-primary" value="SAVE GROUP">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>