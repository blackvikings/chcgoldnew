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
 
		
					
					
					
					 <?php //if(isset($_POST['update_newbill'])){
                            
                            /*$serial_number = $_POST['serial_n'];
                            $billdate = $_POST['bill_d'];
                            $partyid = $_POST['party_n'];
                            $partypercent = $_POST['party_p'];
                            $itemname = $_POST['item_n'];
                            $before_melting_weight = $_POST['before_melting_w'];
                            $after_melting_weight = $_POST['after_melting_w'];
                            $sampe_weight = $_POST['sample_w'];
                            $recieved_weight = $_POST['recieved_w'];
                            $fire_assay_weight = $_POST['fire_assay_w'];
                            $refine_weight = $_POST['refine_w'];
                            $purity_percent = $_POST['purity_p'];
                            $cgst_percent = $_POST['cgst_p'];
                            $sgst_percent = $_POST['sgst_p'];
                            $total_amount = $_POST['total_a'];
                            $remarks = $_POST['remark_n'];
                            $billidxo = $_POST['bill_idxo'];
							// Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}
                            $sql = "UPDATE billtable SET partypercentnew='$partypercent', itemname='$itemname', beforemeltingweight='$before_melting_weight',  aftermeltingweight='$after_melting_weight',sampleweight='$sampe_weight', receivedweight='$recieved_weight', fireassayweight='$fire_assay_weight', refineweight='$refine_weight', assaypurity='$purity_percent', cgst='$cgst_percent', sgst='$sgst_percent', totalamount='$total_amount', remark ='$remarks' WHERE billserial='$serial_number' AND partyid='$partyid'";
                            if ($conn->query($sql) === TRUE) {
								echo'<div class="alert alert-success"><strong>Bill Updated Successfully !!</strong></div>';
								//$mystatus = '<div class="alert alert-success"><strong>Bill Updated Successfully !!</strong></div>';
                                
                            }else{
                                echo'<div class="alert alert-danger"><strong>Error: ' . $sql . '<br>' . $conn->error.'</strong></div>';
								//$mystatus = '<div class="alert alert-danger"><strong>Error: ' . $sql . '<br>' . $conn->error.'</strong></div>';
                            }
							$conn->close();		
						};*/
    
					 ?>
					
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