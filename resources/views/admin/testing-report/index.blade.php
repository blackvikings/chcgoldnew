@extends('layouts.app')
@section('title', 'Chhattisgarh Hallmarking Center')
@section('content')
<div class="row"> 
	<div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:white; background:black; padding:10px;">Testing Voucher / Receipt</h4>
                <div class="feed-widget" id="section-to-print">                
                    <form class="form-horizontal form-material" action="{{ route('store.testing.voucher') }}" method="POST">
        				@csrf
                        <div class="form-group">
							<label class="col-md-12">Date</label>
							<div class="col-md-12">
								<input type="date" id = "date" name="date" class="form-control form-control-line" readonly="" value="@php echo date('Y-m-d'); @endphp" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-12">Receipt No.</label>
							<div class="col-md-12">
								<input type="text" id = "rnumber" name="rnumber" class="form-control form-control-line" readonly="" value="{{ $invoiceno }}" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-12">Party Name</label>
							<div class="col-md-12">
								<select id="partyId" name="partyId" class="form-control form-control-line">
									@foreach ($parties as $party)
										<option value="{{ $party->id }}">{{ $party->partyName }}</option>
									@endforeach
								</select>
							</div>
						</div>
                    
						<div class="form-group">
							<label class="col-md-12">In Figures</label>
							<div class="col-md-12">
								<input type="number" id = "figures" name="figures" placeholder="Enter in figures." step="1" value="0" class="form-control form-control-line" required>
							</div>
						</div>
                    
						<div class="form-group">
							<label class="col-md-12">In Words</label>
							<div class="col-md-12">
								<input type="text" id = "words" name="words" placeholder="Enter in Words."  class="form-control form-control-line">
							</div>
						</div>
                    
						<div class="form-group">
							<label class="col-md-12">Amount</label>
							<div class="col-md-12">
								<input type="number" id = "amount" name="amount" step="1" value="1" class="form-control form-control-line" required>
							</div>
						</div>
                    
						<div class="form-group" style="align:center;">
							<div class="col-sm-12">
								<button class="btn btn-primary" id = "submitreceipt" name="submitreceipt" type="submit" value="submitreceipt">Submit receipt</button>
							</div>
						</div>
					</form>
                </div>
            </div>
        </div>
	</div> 
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title" style="color:white; background:black; padding:10px;">Testing Voucher / Receipt Search & Print</h4>
				<div class="feed-widget" id="section-to-print">
					<form class="form-horizontal form-material" action="javascript:void(0)" method="POST">
						<div class="form-group">
							<label class="col-sm-12">Party name</label>
							<div class="col-sm-12">
								<select id="voucher_partyId" name="voucher_partyId" class="form-control">
									@foreach ($parties as $party)
										<option value="{{ $party->id }}">{{ $party->partyName }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12">Date</label>
							<div class="col-sm-12">
								<input type="date" data-date="" data-date-format="DD-MM-YYYY" name="voucherdate" id="voucherdate" class="date-input form-control" value="@php echo date('Y-m-d'); @endphp" required="required">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<button type="submit" id="voucher_Search" class="btn btn-primary">Search</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-12" id="vouchers_Search_results"></div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
	$('#voucher_Search').click(function(){
		var partyId = $('#voucher_partyId').val();
		var voucherdate = $('#voucherdate').val();
	    $.ajaxSetup({
          	headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          	}
	    });
		$.ajax({
	        type: 'POST',
	        url: '{{ route('get.tesing.vouchers') }}',
	        data: { partyId: partyId, voucherdate:voucherdate },
	        success: function(html)
	        {
	        	$('#vouchers_Search_results').html(html);
	           	// console.log(html);
	        } 
	    });		 
	 });
</script>
@endpush