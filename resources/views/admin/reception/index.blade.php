@extends('layouts.app')
@section('title', 'Chhattisgarh Hallmarking Center')
@section('content')
<div class="row">
	<div class="col-md-12">
        <div class="card">
            <div class="card-body">
				<h4 class="card-title" style="color:white; background:black; padding:10px;">Add New Bill</h4>
				<div class="feed-widget">
					<form class="form-material" action="{{ route('reception.store') }}" method="POST" enctype='multipart/form-data'>
						@csrf
                        <div class="table-responsive"> 
                            <table class="table table-striped">
								<tr>
                                    <td>
										<div class="form-group">
											<label>Serial Number</label>
											<div class="col-md-8">
												@if($bill)
													<input type="text" name="serial_inc" class="form-control @error('serial_inc') is-invalid @enderror " value='{{ $bill->billserial+1 }}' readonly >
													@error('serial_inc')
							                            <span class="invalid-feedback" role="alert">
							                                <strong>{{ $message }}</strong>
							                            </span>
							                        @enderror
												@else
													<input type="text" name="serial_inc" class="form-control @error('serial_inc') is-invalid @enderror " value="1" readonly >
													@error('serial_inc')
							                            <span class="invalid-feedback" role="alert">
							                                <strong>{{ $message }}</strong>
							                            </span>
							                        @enderror
												@endif
											</div>
										</div>
									</td>
									<td>
										<div class="form-group"><label>Date</label>
											<div class="col-md-8">
												<input type="text" name="bill_date" value="@php echo date('Y-m-d'); @endphp" class="form-control " readonly  required>
												@error('bill_date')
						                            <span class="invalid-feedback" role="alert">
						                                <strong>{{ $message }}</strong>
						                            </span>
						                        @enderror
											</div>
										</div>
									</td>
                                    <td>
										<div class="form-group"><label>Select Party</label>
											<div class="col-md-8">
												<select class="form-control " name="party_selector" id="pcs" required>
													<option value="" selected disabled hidden> Select Party </option>
													@foreach($parties as $party)
														<option value="{{ $party->id }}">{{ $party->partyName }}</option>
													@endforeach 
												</select>
												@error('party_selector')
						                            <span class="invalid-feedback" role="alert">
						                                <strong>{{ $message }}</strong>
						                            </span>
						                        @enderror
											</div>
										</div>
									</td>
									<td><!--<div id="outputDiv">--output here--</div> -->
										<div class="form-group" id="outputDiv"></div>
									</td>
                                 </tr>
								
								
								<tr>
                                    <td>
										<div class="form-group"><label>Item Name</label>
											<div class="col-md-8">
												<input type="text" name="item_name" placeholder="Enter item name here . ." class="form-control " required>
											</div>
											@error('item_name')
					                            <span class="invalid-feedback" role="alert">
					                                <strong>{{ $message }}</strong>
					                            </span>
			                        		@enderror
										</div>
									</td>
									<td>
										<div class="form-group"><label>Before Melting Weight</label>
											<div class="col-md-8">
												<input type="number" name="before_weight" id="BFMW" placeholder="Weight in Grams." step="0.001" value="0.000" class="form-control " required>
											</div>
											@error('before_weight')
					                            <span class="invalid-feedback" role="alert">
					                                <strong>{{ $message }}</strong>
					                            </span>
			                        		@enderror
										</div>
									</td>
                                    <td>
										<div class="form-group"><label>After Melting Weight</label>
											<div class="col-md-8">
												<input type="number" name="after_weight" id="AFMW" placeholder="Weight in Grams." step="0.001" value="0.000" class="form-control " required>
											</div>
											@error('after_weight')
					                            <span class="invalid-feedback" role="alert">
					                                <strong>{{ $message }}</strong>
					                            </span>
			                        		@enderror
										</div>
									</td>
									<td>
										<div class="form-group"><label>Submit Entry</label>
											<div class="col-md-8">
												<button type="submit" class="form-control btn btn-primary" name="submit_newbill">Submit New Entry</button>	
											</div>
										</div>
									</td>
                                </tr>
							</table>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
	$(document).ready(function(){
      $("#pcs").on('change', function(){
        // alert('hello world');
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        var pcs_val  = $(this).val();
        console.log(pcs_val);
        $.ajax({  
          type: 'POST',
          url: '{{ route('party.parameter') }}',
          data: {pcs: pcs_val},
          dataType: 'json',
          success: function(data)
          { 
          	// console.log(data);
            $('#outputDiv').html('<label>Party % parameter</label><div class="col-md-8"><input type="number" name="partyxpercent" step="0.01" class="form-control" value="'+data.partyPercentage+'" required></div>');
          }
        });
    }); 
});
</script>
@endpush