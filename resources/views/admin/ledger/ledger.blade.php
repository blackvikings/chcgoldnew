@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
    <div class="card">
      <div class="card-body">                                
        <div id="contact_results"></div>                        
        <h4 class="card-title" style="color:white; background:black; padding:10px;">Client Ledger</h4>
        <div class="feed-widget">
          <form class="form-horizontal form-inline" action="" method="POST" enctype='multipart/form-data'>
            <div class="form-group">
              <div class="col-md-12">
                <select class="form-control form-control-line" name="editparty_selector" id="editparty_selectorledger">
                  @forelse ($parties as $party)
                      <option value="{{ $party->id }}">{{ $party->partyName }}</option>
                  @empty
                      <option>No Data Available !!</option>
                  @endforelse 
                </select>
              </div>
            </div>
            <div class="form-group"><label>From :</label>
              <div class="col-md-4">
                <input type="date" name="start_date" id="start_date">
              </div>
            </div>
						<div class="form-group">
              <label>Till :</label>
              <div class="col-md-4">
                  <input type="date" name="end_date" id="end_date">
              </div>
            </div>
            <div class="form-group" style="align:center;">
              <div class="col-sm-12">
                <button class="btn btn-primary" name="showParty_details" id="showParty_detailsledger" type="button">Get details</button>
              </div>
            </div>
          </form>
          <br/>
          <div id="xledger"></div>
        </div>
      </div>
    </div>
  </div> <!--ledger client total-->
	<div class="col-md-12">
  	<div class="card">
    	<div class="card-body">             
      	<h4 class="card-title" style="color:white; background:black; padding:10px;">Financial Year Overview</h4>
          <div class="feed-widget">
					<form class="form-horizontal form-inline">
            <div class="form-group">
            	<div class="col-md-12">
                <select class="form-control form-control-line" id="fyyear">
                  <option value="@php echo date('Y', strtotime('-1 year')); @endphp-@php echo date('Y', strtotime('-1 year')); @endphp">@php echo date('Y', strtotime('-1 year')); @endphp-@php echo date('Y'); @endphp</option>
                </select>
              </div>
           	</div>
						<div class="form-group">
            	<div class="col-md-12">
								<button type="button" class="btn btn-primary" id="overall">Refresh Details</button>
							</div>
						</div>
					</form><br/>
				  <div id="stockex"></div>
				</div>
			</div>
		</div>
	</div><!--overall stock-->
</div>
@endsection
@push('scripts')
 <script>
	 
	$( '#showParty_detailsledger' ).click(function() {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    $.ajax({  
      type: 'POST',
      url: '{{ route('get.party.ledgers') }}',
      data: { showParty_detailsledger: $('#showParty_detailsledger').val(), start_date: $('#start_date').val(), end_date: $('#end_date').val(), editparty_selectorledger: $('#editparty_selectorledger').val()},
      success: function(html)
      {
        $('#xledger').html(html);
        $('#xledger').show();
        //$('#contact_results').fadeOut(3000);
      }  
    });   
  });
  $('#overall').click(function(){
	 	$.ajax({
  			type: 'POST',
  			url: 'ajax.php',
  			data: { stockcomplete: 'stockdetails', fyyear:$('#fyyear').val()},
  			success: function(html)
  			{
				$('#stockex').html(html);
				$('#stockex').show();
			}
		});
	 });
</script>
@endpush