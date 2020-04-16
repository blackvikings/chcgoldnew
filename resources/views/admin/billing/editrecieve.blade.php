 @extends('layouts.app')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
			<h4 class="card-title" style="color:white; background:black; padding:10px;">Edit Bill</h4>
                <div class="feed-widget">
                    <form class="form-inline">
                        <div class="form-group"><label>Search by bill number / remark / date (format : <b>DD-MM-YYYY</b> )</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="q" id="searchxxzquery" placeholder=" Enter bill query here"/>
                                <button type="button" name="searchbtn" id="searchxxz" class="btn btn-primary" value="submit">🔍 Search</button>
                            </div>
                        </div>
                    </form>
					
					<div id="xnm"></div>
					
				</div>
			</div>
		</div>
	</div>					
	<div class="col-md-12" id="editable">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:white; background:black; padding:10px;">Editting section</h4>
                <div class="feed-widget">     
					<div id="secondxyz"></div>                                    
                </div>
            </div>
        </div>
     </div>	
</div>
					
@endsection
@push('scripts')
<script>
 $(document).ready(function(){
    $("#pcs").on('change', function(){
        var pcs_val  = $(this).val();
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: { pcs: pcs_val},
            success: function(theResponse) {$('#outputDiv').html(theResponse);}                   
        });
    });
	 
});
</script>
 
<script>
$(document).ready(function(){
    $('#editable').hide();
});
$('#searchxxz').click(function(){
    $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
	$.ajax({
        type: 'POST',
        url: '{{ route('bill.edit') }}',
        data: { searchxxzquery: $('#searchxxzquery').val()},
        success: function(html)
        {
            //alert(html);
            $('#xnm').html(html);
            $('#xnm').show();
			$( ".viewxyx" ).click(function() {
                var rdx = $(this).attr('id');
                //alert( rdx );
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                $.ajax({
                    type: 'POST',
                    url: '{{ route('full.details') }}',
                    data: { q: rdx},
                    success: function(html)
                    {
                        //alert(html);
                        $('#secondxyz').html(html);
                        $('#editable').show();
                    }
                });
            });
        } 
    });		 
});




$( "#RCDW" ).focus(function() {
 // alert( "Handler for .focus() called." );
    var a = $('#AFMW').val();
    var b = $('#SW').val();
    var total = a - b;
    $('#RCDW').val(total);
});



$( "#RFNW" ).focus(function() {
 // alert( "Handler for .focus() called." );
    var a = $('#RCDW').val();
    var b = $('#FAW').val();
    var total = a - b;
    $('#RFNW').val(total);
});


$( "#TAMNT" ).focus(function() {
 // alert( "Handler for .focus() called." );
    var a = $('#CGST').val();
    var b = $('#SGST').val();
    var c = $('#RCDW').val();
    a = parseFloat(Number(a).toFixed(4));
    b = parseFloat(Number(b).toFixed(4));
    var d = c*7;
    var total = ((a + b)*((7*c)/100))+(7*c);
    total = parseFloat(Number(total).toFixed(4));
    $('#TAMNT').val(total);
   // alert(total);
});
</script>
@endpush