<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Auction Monitor</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Auctions</a></li>
                                <li class="breadcrumb-item active">Auction Monitor</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            @if($auction_group)
            <div class="row">
                <div class="col-4">
                    <div class="card">
                    	<div class="card-header">
                		    <h4 class="card-title">Cars</h4>
                    	</div>
                    	<div class="card-body">
                    	    <div class="mb-2 ms-2"><p>Click on a lot below to view bids</p></div>
                	        <div class="list-group">
                    	        @foreach($auction_group->lots AS $lot)
                    	            <a href="#" wire:poll class="list-group-item list-group-item-action d-flex" wire:click.prevent="showLotBids({{ $lot->id }})">
                    	                <span>{{ str_pad($lot->id,4,"0",STR_PAD_LEFT).' - '.$lot->vehicle->year.' '.$lot->vehicle->make.' '.$lot->vehicle->model }} @if($lot->bids->count() > 0)</span>
                    	                <span class="badge bg-secondary ms-auto">{{ $lot->bids->count() }}</span>@endif
                	                </a>
                	            @endforeach
            	            </div>
                	    </div>
            	    </div>
        	    </div>
        	    @if($cur_lot)
        	    <div class="col-8" wire:poll>
                    <div class="card">
                    	<div class="card-header">
                		    <h4 class="card-title">Lot #{{ str_pad($cur_lot->id,4,"0",STR_PAD_LEFT).' - '.$cur_lot->vehicle->year.' '.$cur_lot->vehicle->make.' '.$cur_lot->vehicle->model }}</h4>
                    	</div>
                    	<div class="card-body">
                	        <table class="table">
                	            <thead>
                	                <tr>
                	                    <th>Bidder</th>
                	                    <th>Bid Type</th>
                	                    <th class="text-end">Bid Amount</th>
                	                </tr>
                	            </thead>
                	            <tbody>
                	                @foreach($cur_lot->bids AS $bid)
                	                <tr>
                	                    <td> @if($bid->bidder->company) {{ $bid->bidder->company->company_name}} @endif {{ '('.$bid->bidder->first_name.' '.$bid->bidder->last_name.')' }}</td>
                	                    <td>{{ $bid->bid_type }}</td>
                	                    <td class="text-end">R {{ number_format($bid->bid_amount, 2) }}</td>
                	                </tr>
                	                @endforeach
                	            </tbody>
                	        </table>
                	    </div>
            	    </div>
        	    </div>
        	    @endif
            </div>
            @else
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body text-center pt-5 pb-5">
                            <h1>NO ACTIVE AUCTION</h1>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>