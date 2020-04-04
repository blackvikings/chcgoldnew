@extends('layouts.app')
@section('content')
  	<div class="col-md-12">
        <div class="card">
            <div class="card-body">
				<h4 class="card-title" style="color:white; background:black; padding:10px;">Add New Bill</h4>
				<div class="feed-widget">
					<form class="form-material" action="" method="POST" enctype='multipart/form-data'>
                        <div class="table-responsive"> 
                            <table class="table table-striped">
							
								<tr>
                                    <td>
										<div class="form-group">
											<label>Serial Number</label>
											<div class="col-md-8">
												{{-- <input type="text" name="serial_inc" class="form-control " value='' required readonly > --}}
												<input type="text" name="serial_inc" class="form-control " value="1" required readonly >
											</div>
										</div>
									</td>
									<td>
										<div class="form-group"><label>Date</label>
											<div class="col-md-8">
												<input type="text" name="bill_date" value="@php echo date('Y-m-d'); @endphp" class="form-control " readonly  required>
											</div>
										</div>
									</td>
                                    <td>
										<div class="form-group"><label>Select Party</label>
											<div class="col-md-8">
												<select class="form-control" name="party_selector" id="pcs" required>
													<option value="" selected disabled hidden> Select Party </option> 
												</select>
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
										</div>
									</td>
									<td>
										<div class="form-group"><label>Before Melting Weight</label>
											<div class="col-md-8">
												<input type="number" name="before_weight" id="BFMW" placeholder="Weight in Grams." step="0.001" value="0.000" class="form-control " required>
											</div>
										</div>
									</td>
                                    <td>
										<div class="form-group"><label>After Melting Weight</label>
											<div class="col-md-8">
												<input type="number" name="after_weight" id="AFMW" placeholder="Weight in Grams." step="0.001" value="0.000" class="form-control " required>
											</div>
										</div>
									</td>
									<td>
										<div class="form-group"><label>Sample Weight</label>
											<div class="col-md-8">
												<input type="number" name="sample_weight" id="SW" placeholder="Weight in Grams." step="0.001" value="0.000" class="form-control" required>
											</div>
										</div>
									</td>
                                </tr>
                    
                                <tr>
                                    <td>
										<div class="form-group"><label>Recieved Weight</label>
											<div class="col-md-8">
												<input type="number" name="recieved_weight" id="RCDW" placeholder="Weight in Grams." step="0.001" value="0.000" class="form-control" required>
											</div>
										</div>
									</td>
									<td>
										<div class="form-group"><label>Fire Assay Weight</label>
											<div class="col-md-8">
												<input type="number" name="fire_assay_weight" id="FAW" placeholder="Weight in Grams." step="0.001" value="0.000" class="form-control " required>
											</div>
										</div>
									</td>
									<td>
										<div class="form-group"><label>Refine Weight</label>
											<div class="col-md-8">
												<input type="number" name="refine_weight" id="RFNW" placeholder="Weight in Grams." step="0.001" value="0.000" class="form-control " required>
											</div>
										</div>
									</td>
									<td>
										<div class="form-group"><label>Purity %</label>
											<div class="col-md-8">
												<input type="number" name="purity_percentage" id="PUPT" step="0.01" value="0.00" class="form-control " required>
											</div>
										</div>
									</td>
                                </tr>
                                <tr>
                                    <td>
										<div class="form-group ">
											<label>CGST %</label>
											<div class="col-md-8">
												<input type="number" name="cgst_percent" id="CGST" step="0.01" value="2.50" class="form-control" required>
											</div>
										</div>
									</td>
									<td> 
										<div class="form-group">
											<label>SGST %</label>
											<div class="col-md-8">
												<input type="number" name="sgst_percent" id="SGST" step="0.01" value="2.50" class="form-control" required>
											</div>
										</div>
									</td>
                                   <td>
										<div class="form-group"><label>Total amount</label>
											<div class="col-md-8">
												<input type="numer" name="total_amount" id="TAMNT" step="0.001" value="0.000" class="form-control" required>
											</div>
										</div>
									</td>
									<td>
										<div class="form-group"><label>Remarks</label>
											<div class="col-md-8">
												<textarea type="text" name="remarks" id="REMARKS" placeholder="Type here . ." class="form-control" rowspan="3" required></textarea>
											</div>
										</div>
									</td>
                               </tr>
								
								<tr>
                                   <td colspan="4">
										<div class="form-group">
											<div class="col-md-12">
												<button type="submit" class="form-control btn btn-primary" name="submit_newbill">Submit New Bill</button>
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
	$.ajax({
        type: 'GET',
        url: 'ajax.php',
        data: { searchxxzquery: $('#searchxxzquery').val()},
        success: function(html)
        {
            //alert(html);
            $('#xnm').html(html);
            $('#xnm').show();
        }
    });
});

$( ".viewxyx" ).click(function() {
    var rdx = $(this).attr('id');
    //alert( rdx );
    $.ajax({
        type: 'GET',
        url: 'ajax.php',
        data: { q: rdx},
        success: function(html)
        {
            //alert(html);
            $('#secondxyz').html(html);
            $('#editable').show();
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