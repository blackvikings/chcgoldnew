@extends('layouts.app')
@section('title', 'Chhattisgarh Hallmarking Center')
@section('content')
<div class="row">
 	<div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div id="contact_results"></div>
                <h4 class="card-title" style="color:white; background:black; padding:10px;">Coin Issue / Deposit Section</h4>
                <div class="feed-widget">
                 	<form class="form-horizontal form-inline">
                        <div class="form-group">
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name="editparty_selector" id="party_selector">
                                	<option selected="selected" disabled="disabled">SELECT</option>
                                	@foreach ($parties as $party)
                                		<option value="{{ $party->id }}">{{ $party->partyName }}</option>
                                	@endforeach
                                </select>
                            </div>
                        </div>
	                    <select id="accounttype" class="form-control" style="width: auto;" required>
	                        <option selected disbaled>- Select Account Type -</option>
	                        <option value="Debit">Deposit Gold</option>
	                        <option value="Credit">Lend Coins</option>
	                    </select>
                    </form>	
                    <div id="accountjournal"></div>
                </div>
            </div>
        </div>
	</div> <!--Maintain deposit / credit-->

 	<div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:white; background:black; padding:10px;">Print Issue / Deposit Voucher</h4>
                <div class="feed-widget">
                  <a class="btn btn-info btn-lg" href="{{ route('print.issued.voucher') }}">Print Voucher</a>
                </div>
            </div>
        </div>
</div>
@endsection
@push('scripts')
<script>
$('#accounttype').change(function(){
    var a = $('#party_selector ').val();
    var b = $('#accounttype ').val();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
	$.ajax({
	  	type: 'POST',
	  	url: '{{ route('issue.voucher') }}',
  		data: { party: a, type: b},
	  	success: function(html)
	  	{
        // console.log(html);
      		$('#accountjournal').html(html);
      		$('#accountjournal').show(function(){
	           	$( '#mfine' ).focus(function() {
	            	var a = $('#mdeposit').val();
	            	var b = $('#mpurity').val();
	        		var total = parseFloat(Number(a).toFixed(3)) * parseFloat(Number(b).toFixed(2))/100;
	            	$('#mfine').val(parseFloat(Number(total).toFixed(3)));
	          	});          
	           	$( '#cfine' ).focus(function() {
	            	var b = $('#cputiry').val();
	            	var a = $('#cissued').val();
	            	var total = parseFloat(Number(a).toFixed(3)) * parseFloat(Number(b).toFixed(2))/100;
	            	$('#cfine ').val(parseFloat(Number(total).toFixed(3)));
	          	});
	          	$( '#msubmit' ).click(function() {
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
               	$.ajax({
				  	      type: 'POST',
				 	        url: '{{ route('issue.voucher.store') }}',
			  	        data: { msubmit: $('#msubmit').val(), remark: $('#coinremark').val(), mfine: $('#mfine').val(), mdeposit: $('#mdeposit').val(),      mpurity: $('#mpurity').val(), mparty: $('#party_selector').val()},
    	  					success: function(html)
    	  					{
                    toastr.success(html);
    	  					}
    	    			});
	          	});
	            $( '#csubmit' ).click(function() {
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                }); 
              	$.ajax({
    	  					type: 'POST',
    	  					url: '{{ route('issue.voucher.store') }}',
    	  					data: { csubmit: $('#csubmit').val(), remark: $('#coinremark').val(), cfine: $('#cfine').val(), cissued: $('#cissued').val(),       cputiry: $('#cputiry').val(), mparty: $('#party_selector').val()},
  	  					success: function(html)
  	  					{
                  toastr.success(html);
  	  					}
	    			  });
	          });
        	});
  		}    
   	});
});
</script>
@endpush
