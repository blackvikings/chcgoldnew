@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title" style="color:white; background:black; padding:10px;">Refine To Coin</h4>
          <div class="feed-widget">
            <div id="contact_results"></div>
              <form class="form-inline" method="POST" action="javascript:void(0)">
                <div class="form-group"><label>Select Month :</label>
                  <div class="col-md-4">
                    <select name="D_Month" id="D_Month">
                        <!--<option selected disbaled>- Select Month -</option>-->
                        <option value="01">January</option>
                        <option value="02">Febuary</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary" name="Monthdatebtn" id="Monthdatebtn">List details</button>
                    </div>
                </div>
              </form>
              <div class="row">
                <div class="col-md-12" id="listdata">

                </div>
              </div>
            </div>
        </div>
    </div>
  </div> <!-- stock coin refine-->
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
          <div id="contact_results"></div>
          <h4 class="card-title" style="color:white; background:black; padding:10px;">Journal Section</h4>
          <div class="feed-widget">
               <form class="form-horizontal form-inline">
                <div class="form-group">
                    <div class="col-md-12">
                        <select class="form-control form-control-line" name="editparty_selector" id="party_selector">
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
</div>
@endsection
@push('scripts')
<script>
      $('#Monthdatebtn').click(function(){
        var D_Month = $("#D_Month").val();
         $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          type: 'POST',
          url: '{{ route('get.stocks') }}',
          data: {month: D_Month},
          success: function(html)
          {
            $('#listdata').html(html);
            $('.table-stock tr:not(:first)').each(function (i,E) {
                $(E).find('#expectedloss').focus(function(){
                    var a = $(E).find('#receivedwithss ').val();
                    var b = $(E).find('#stockcoin ').val();
                    var c = $(E).find('#cointype ').val();
                    var total = parseFloat(Number(a).toFixed(3)) - (parseFloat(Number(b).toFixed(3) * parseFloat(Number(c).toFixed(2))/100));
                    $(E).find('#expectedloss ').val(parseFloat(Number(total).toFixed(3)));
                });
                $(E).find('#update_datax ').click(function(){
                  var id = $(this).attr("data-id");
                  $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                  });
                  $.ajax({
                    type: 'POST',
                    url: '{{ route('update.stocks') }}',
                    data: { id: id, stockdata: $(E).find('#stockcoin').val(), cointype: $(E).find('#cointype').val(), lossx: $(E).find('#expectedloss').val()},
                    success: function(html)
                    {
                      // console.log(html);
                        toastr.success(html);
                    }
                          
                  });
                });   
            });
          }
        });
      });
     </script>
	 
	 
	 
	 <script>
	 
	 	$('.table-depositxyz tr:not(:first)').each(function (i,E) {
		
  		$(E).find( '#LedgerBalance' ).focus(function() {
              var a = $(E).find('#Refine_chwt').val();
              var b = $(E).find('#cointype').val();
              var c = $(E).find('#CoinIssued').val();
              var total =  parseFloat(Number(a).toFixed(3)) - (parseFloat(Number(c).toFixed(3)) * parseFloat(Number(b).toFixed(2))/100);
              $(E).find('#LedgerBalance ').val(parseFloat(Number(total).toFixed(3)));
            });
  		$(E).find('#ledgerentrybtn').click(function() {
        $.ajax({
          type: 'POST',
          url: 'ajax.php',
          data: { cointype: $(E).find('#cointype').val(), CoinIssued: $(E).find('#CoinIssued').val(), LedgerBalance: $(E).find('#LedgerBalance').val(), 
          billidx: $(E).find('#billidx').val(), coinissuex: 'coinissuex'},
          success: function(html)
          {
        	  //alert(html);
              $('#result_here').html(html);
              $('#result_here').show();
              $('#result_here').fadeOut(3000);
          }   
        });
      });		
	  });
		 
		$('#accounttype').change(function(){
      var a = $('#party_selector ').val();
      var b = $('#accounttype ').val();
			$.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { party: a, type: b},
        success: function(html)
        {
          $('#accountjournal').html(html);
          $('#accountjournal').show(function(){
  		      $('#mfine').focus(function() {
              var a = $('#mdeposit').val();
              var b = $('#mpurity').val();
              var total = parseFloat(Number(a).toFixed(3)) * parseFloat(Number(b).toFixed(2))/100;
              $('#mfine').val(parseFloat(Number(total).toFixed(3)));
            });
            $('#cfine').focus(function() {
              var b = $('#cputiry').val();
              var a = $('#cissued').val();
              var total = parseFloat(Number(a).toFixed(3)) * parseFloat(Number(b).toFixed(2))/100;
              $('#cfine').val(parseFloat(Number(total).toFixed(3)));
            });
  		      $('#msubmit').click(function() {
              $.ajax({
                type: 'POST',
                url: 'ajax.php',
                data: { msubmit: $('#msubmit').val(), remark: $('#coinremark').val(), mfine: $('#mfine').val(), mdeposit: $('#mdeposit').val(), mpurity: $('#mpurity').val(), mparty: $('#party_selector').val()},
                success: function(html)
                {
                  $('#contact_results').html('<p class=\"alert alert-success\">'+html+'</p>');
                  $('#contact_results').show();
                  $('#contact_results').fadeOut(3000);
                }
              });
            });
  		      $( '#csubmit' ).click(function() {
              $.ajax({
                type: 'POST',
                url: 'ajax.php',
                data: { csubmit: $('#csubmit').val(), remark: $('#coinremark').val(), cfine: $('#cfine').val(), cissued: $('#cissued').val(), cputiry: $('#cputiry').val(), mparty: $('#party_selector').val()},
                success: function(html)
                {
                  $('#contact_results').html('<p class=\"alert alert-success\">'+html+'</p>');
                  $('#contact_results').show();
                  $('#contact_results').fadeOut(3000);
                }
              });
            });
	        });
        }
      });    
    });
</script>
@endpush
