@extends('layouts.app')
@section('content')
 <div class="row">
 
	<div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:white; background:black; padding:10px;">Refine Section</h4>
                <div class="feed-widget">
				
					<form class="form-inline" action="" method="POST">
                        <div class="form-group"><label>Select Date :</label>
                            <div class="col-md-4">
                                <input type="date" name="Single_Date" id="singledatewa">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary" name="Singledatebtn" id="Singledatebtn">List details</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <button type="button" class="btn btn-primary" name="refreshbatches" id="refreshbatches">Load Batch</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <div id="showex"></div>
                            </div>
                        </div>
                    </form>
					
					<div class="form-group" id="haidex2">
						<div class="col-md-12">
							<div id="batch_results"></div>
						</div>
                    </div>
					
					<?php
                                     
                                     $typeArray = array();
                                     
                                     if(isset($_POST["Singledatebtn"])){

                            $startdate = date_create($_POST["Single_Date"]);
                            $startdate = date_format($startdate,"Y-m-d");
                            // $enddate = date_create($_POST["end_date"]);
                            // $enddate =  date_format($enddate,"Y-m-d");

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM billtable WHERE billdate = '$startdate' AND billserial!='' ORDER BY batchnumber ASC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    
    $qty= 0;
    $srno= 0;
    $collectionsum = 0;
    $samplesum = 0;
    $puresamplesum = 0;
    $expectedweightsum = 0;
    $tocustomersum = 0;
    $fromcustomersum = 0;
    $refinecweightsum = 0;
	
	
    
    
    echo'   <br/>
        
         <div class="table-responsive">

        <table class="table-striped" style="text-align:center; font-weight:bold;"> 
    <thead>
    
        <tr>
            <th>Batch</th>
            <th>Serial No.</th>
            <th>Party Name</th>
            <th>Recieved Weight</th>
            <th>Fire Assay Weight</th>
            <th>Refine Weight</th>
            <th>Assay Purity %</th>
            <th>Purity %</th>
            <th>Difference %</th>
            <th>Refine Charge %</th>
            <th>Pure Sample</th>
            <th>Refined Weight</th>
            <th>Pure Weight</th>
            <th>To the customer</th>
            <th>Gain</th>			
			<th>Fine weight</th>
			<th>Fine with Charge</th>
			<th>Total Balance</th>
            <th>Submit Details</th>
        </tr>
        
        
    </thead>
    <tbody>
    ';
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        
        
        $fne = ($row["fireassayweight"] * $row["assaypurity"])/100;
        
        $qty += number_format($fne, 3);
        
        $srno = $srno+1;
        
        $collectionsum = $collectionsum+$row['receivedweight'];
        $samplesum = $samplesum+$row['fireassayweight'];
        $puresamplesum = $puresamplesum+$row['puresample'];
        $expectedweightsum = $expectedweightsum+$row['pureweight'];
        $tocustomersum = $tocustomersum+$row['tothecustomer'];
        $fromcustomersum = $fromcustomersum+$row['gain'];
        $refinecweightsum = $refinecweightsum+$row['refinedweight'];

        $typeArray[] = $row['batchnumber'];
        
         //array_push($typeArray,$row['batchnumber']);
        
       
        if($row["batchnumber"] != null){
            $batchxnum = $row["batchnumber"];
        }else{
            $batchxnum = 0;
        }
		
		
		$plid = $row["partyid"];
	
	$sql2 = "SELECT * FROM partytable WHERE partyid = '$plid'";
		$result2 = mysqli_query($conn, $sql2);
		if (mysqli_num_rows($result2) > 0) {
			while($row2 = mysqli_fetch_assoc($result2)) {
			$partynmkrn = $row2["partyname"];	
			}
		}
		
    echo '
    
    <script>
    $("#singledatewa").val("'.$startdate.'");
    </script>
     
      <tr style="text-align:center;"><form id="my_form">
        <td><input type="number" id="batchnumber" name="batchnumber" step="1" value="'.$batchxnum.'" style="width:100%;" required></td>
        <td>'.$srno.'<input type="text" id="rowid" name="rowid" value="'.$row["id"].'" style="width:100%;"  required hidden></td>
        <td><input type="text" id="party_name" name="party_name" value="'.$partynmkrn.'" class="form-control" style="width:auto;"  required readonly=""></td>
        <td><input type="number" id="recieved_weight" name="recieved_weight" step="0.001" value="'.$row["receivedweight"].'" style="width:100%;"  required readonly=""></td>
        <td><input type="number" id="fire_assay_weight" name="fire_assay_weight" step="0.001" value="'.$row["fireassayweight"].'" style="width:100%;"   required readonly=""></td>
        <td><input type="number" id="refine_weight" name="refine_weight" step="0.001" value="'.$row["refineweight"].'" style="width:100%;"  required readonly=""></td>
        <td><input type="number" id="assay_purity" name="assay_purity" step="0.01" value="'.$row["assaypurity"].'" style="width:100%;"   required readonly=""></td>
        <td><input type="number" id="told_purity" name="told_purity" step="0.01" value="'.$row["clientpurity"].'" style="width:100%;"  required></td>
        <td><input type="number" id="purity_difference" name="purity_difference" step="0.01" value="'.$row["puritydifference"].'" style="width:100%;"  required></td>
        <td><input type="number" id="refine_charge" name="refine_charge" step="0.01" value="'.$row["refinecharge"].'" style="width:100%;"  required></td>
        <td><input type="number" id="pure_sample" name="pure_sample" step="0.001" value="'.$row["puresample"].'" style="width:100%;"  required></td>
        <td><input type="number" id="refined_weight" name="refined_weight" step="0.001" value="'.$row["refinedweight"].'" style="width:100%;"  required></td>
        <td><input type="number" id="pure_weight" name="pure_weight" step="0.001" value="'.$row["pureweight"].'" style="width:100%;"  required></td>
        <td><input type="number" id="to_customer_weight" name="to_customer_weight" step="0.001" value="'.$row["tothecustomer"].'" style="width:100%;"  required></td>
        <td><input type="number" id="gain" name="gain" step="0.001" value="'.$row["gain"].'" style="width:100%;"  required></td>
		
		<td><input type="number" id="fineweight" name="gain" step="0.001" value="'.$row["fineweight"].'" style="width:100%;"  required></td>
		<td><input type="number" id="fineweightwithcharges" name="gain" step="0.001" value="'.$row["fineweightwithcharge"].'" style="width:100%;"  required></td>
		<td><input type="number" id="totalbalance" name="gain" step="0.001" value="'.$row["totalbalance"].'" style="width:100%;"  required></td>
		
        <td><button class="btn btn-primary" name="submit_day_refine" type="button" id="submit_btn" >Submit details</button></td>
        </form>
      </tr>
      
   ';
        
    }
    
    $refineweightsum = $collectionsum - $samplesum;
    //$json_array = json_encode($results_array);
    // echo $json_array;

    echo'
    </tbody>
 </table>
<br/><br/>
                </div>
                
                
                 <br/>

                                    
        ';
} else {
    echo "0 results";
}

mysqli_close($conn);}
?> 
				
				</div>
			</div>
		</div>
	</div>
	
	
	
	<div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                               <!-- <form action="" method="POST">
                                <input type="text" name="enquiry_id" value="'.$enqid.'" hidden/>
                                <button type="submit" class="btn waves-effect ml-auto close" name="close_enquiry">&times;</button>
                                </form>-->
                                <h4 class="card-title" style="color:white; background:black; padding:10px;">Monthly Refine Detail</h4>
                                <div class="feed-widget">
                                    <!--<form class="form-material">-->
                                    <!--    <div class="form-group"><label>Search by name / bill number / remark / date (format : <b>DD-MM-YYYY</b> )</label>-->
                                            
                                    <!--        <div class="col-md-12">-->
                                    <!--            <input type="text" size="30"  class="form-control" placeholder=" 🔍 Search bill details here" onkeyup="showResult(this.value)"></input>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</form>-->
                                    
                                    <div id="contact_results"></div>
                                    
                                    
                                    
                                    <form class="form-inline" method="POST" action="">
                                        
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
                                    
                                    <?php
                                    
                                      if(isset($_POST["D_Month"])){

                            $startdate = $_POST["D_Month"];
                            //$startdate = date_create($_POST["D_Month"]);
                            //$startdate = date_format($startdate,"m");
                            // $enddate = date_create($_POST["end_date"]);
                            // $enddate =  date_format($enddate,"Y-m-d");

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM refinetotal WHERE MONTH(batchdate) = '$startdate' AND YEAR(batchdate) = YEAR(CURDATE())";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    
    $qqio = 0;
    
    echo'   <br/>
        
        <div class="table-responsive">
        <table class="table-kklop" id="table-stripedxyz" style="font-weight:bold;">
    <thead>
    
        <tr>
            <th>Batch Date</th>
            <th>Batch</th>
            <th>Collection</th>
            <th>Sample</th>
            <th>Pure Sample</th>
            <th>Refine Weight</th>
            <th>995</th>
            <th>Expected Inc.</th>
            <th>Refine Short</th>
            <th>To Be Recovered</th>
            <th>Delete Data</th>
        </tr>
        
        
    </thead>
    <tbody>
    ';
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        
        $qqio = $qqio + 1;
        
    echo '
     
      <tr class="mnkliop" id="tablexxy'.$qqio.'"><form id="my_form">
        <td><input type="text" id="batchdatex" name="party_name" value="'.$row["batchdate"].'" class="form-control" style="width: auto;" required readonly=""></td>
        <td><input type="text" id="batchkramank" name="party_name" value="'.$row["batch"].'" class="form-control" style="width: auto;" required readonly=""></td>
        <td><input type="text" id="collectiondata" name="party_name" value="'.$row["collection"].'" class="form-control" style="width: auto;" required readonly=""></td>
        <td><input type="text" id="yyyyyyyyy" name="party_name" value="'.$row["sample"].'" class="form-control" style="width: auto;" required readonly=""></td>
        <td><input type="text" id="eeeeeee" name="party_name" value="'.$row["puresample"].'" class="form-control" style="width: auto;" required readonly=""></td>
        <td><input type="text" id="ddffee" name="party_name" value="'.$row["refineweight"].'" class="form-control" style="width: auto;" required readonly=""></td>
        <td><input type="text" id="vvxxvv" name="party_name" value="'.$row["nineninefive"].'" class="form-control" style="width: auto;" required readonly=""></td>
        <td><input type="text" id="xxvvxx" name="party_name" value="'.$row["expectedinc"].'" class="form-control" style="width: auto;" required readonly=""></td>
        <td><input type="text" id="xxxvvv" name="party_name" value="'.$row["refineshort"].'" class="form-control" style="width: auto;" required readonly=""></td>
        <td><input type="text" id="xxvv" name="party_name" value="'.$row["toberecovered"].'" class="form-control" style="width: auto;" required readonly=""></td>
        <td><button type="button" id="'.$qqio.'" name="delete_datax" class="btn btn-danger delete_datax" style="width: auto;">Delete Data</button></td>
        </form>
      </tr>
      
   ';
        
    }

    echo'   
    
    
    </tbody>
 </table>

                </div>
        ';
} else {
    echo "0 results";
}

mysqli_close($conn);}

                                    ?>

                                </div>
                            </div>
                        </div>
</div> <!--edit monthly refine-->
	
	
	
 
</div>

<script>

        $('.table-kklop tr:not(:first)').each(function (i,E) {
            
           
             
           $(E).find('.delete_datax ').click(function(){
               
               var id = $(this).attr('id');
                
    
                //alert(id);
    
    $.ajax({
        
  type: 'POST',
  url: 'ajax.php',
  data: { batchdatex: $(E).find('#batchdatex').val(), batchkramank: $(E).find('#batchkramank').val(), collectiondata: $(E).find('#collectiondata').val()},
  success: function(html)
  
  {
      
      
        var hideId =  'table#table-stripedxyz tr#tablexxy' + id;
                    $(hideId).remove(); // delete 
                    $(hideId).hide(); // hide
      
      $('#result_here').html(html);
      $('#result_here').show();
      $('#result_here').fadeOut(3000);
  }
        
    });
            });
             
         });





    $('#refreshbatches').click(function(){
        $.ajax({
  type: 'POST',
  url: 'ajax.php',
  data: { qmdatewa: $('#singledatewa').val()},
  success: function(html)
  {
      
     $('#showex').html(html);
     $("#batchxyzssnm").on("change", function () {
    //var myDate = new Date($(this).val());
    var myDate = $(this).val();
    //alert(myDate);
    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: { datesort: $('#singledatewa').val(), batchnumber: $(this).val()},
        success: function(html)
        {
            $('#batch_results').html(html);
            $('.table-mmnn tr:not(:first)').each(function (i,E) {
    
    
    $(E).find( '#toberecovered' ).focus(function() {
    var a = $(E).find('#refineshort').val();
    var b = $(E).find('#puresamplesum').val();
    var total = parseFloat(Number(a).toFixed(3)) + parseFloat(Number(b).toFixed(3));
    $(E).find('#toberecovered ').val(parseFloat(Number(total).toFixed(3)));
});

$(E).find( '#refineshort' ).focus(function() {
    var a = $(E).find('#refinecweightsum').val();
    var b = $(E).find('#recievedweight').val();
    var c = $(E).find('#purerecievedshort').val();
    var total = parseFloat(Number(a).toFixed(3)) - parseFloat(Number(b).toFixed(3)) + parseFloat(Number(c).toFixed(3));
    $(E).find('#refineshort ').val(parseFloat(Number(total).toFixed(3)));
    
    //alert(a+" / "+b+" / "+c);
});



$(E).find( '#expectedinc' ).focus(function() {
        var a = $(E).find('#fromcustomersum').val();
        var b = $(E).find('#silver').val();
        var c = $(E).find('#purerecievedshort').val();
        var d = $(E).find('#nineninefive').val();
        var total = parseFloat(Number(a).toFixed(3)) + parseFloat(Number(b).toFixed(3)) + parseFloat(Number(c).toFixed(3)) - parseFloat(Number(d).toFixed(3));
        $(E).find('#expectedinc ').val(parseFloat(Number(total).toFixed(3)));
});


$(E).find( '#recievedweight' ).focus(function() {
    var a = $(E).find('#receivedweightss ').val();
    var b = $(E).find('#silver ').val();
    var total = parseFloat(Number(a).toFixed(3)) - parseFloat(Number(b).toFixed(3));
    $(E).find('#recievedweight ').val(parseFloat(Number(total).toFixed(3)));
});

$(E).find( '#purerecievedshort' ).focus(function() {
    var a = $(E).find('#recievedweight ').val();
    var b = $(E).find('#refinepurity ').val();
    var total = parseFloat(Number(a).toFixed(3)) - (parseFloat(Number(a).toFixed(3) * parseFloat(Number(b).toFixed(2))/100));
    $(E).find('#purerecievedshort ').val(parseFloat(Number(total).toFixed(3)));
});


$(E).find('#submit_btn_day_Totalrefine').click(function(){
    
    //alert($('#batchxyzssnm').val());
    
    $.ajax({
        
  type: 'POST',
  url: 'ajax.php',
  data: { totalrefineforday: 'totalrefineforday', batch_date: $(E).find('#startdatex ').val() , Batchnumx: $('#batchxyzssnm').val() , Collection: $(E).find('#collectionsum ').val(), Sample: $(E).find('#samplesum ').val(), 
  Pure_Sample: $(E).find('#puresamplesum ').val(), Refine_Weight: $(E).find('#refineweightsum ').val(), nineninefivepointzero: $(E).find('#nineninefive ').val(), 
  Expected_INC: $(E).find('#expectedinc ').val(), Refine_Short: $(E).find('#refineshort ').val(), To_Be_Recovered: $(E).find('#toberecovered ').val(), receivedweightss: $(E).find('#receivedweightss ').val()  },
  success: function(html)
  {
      $('#result_here').html('<p class=\"alert alert-success\">'+html+'</p>');
      $('#result_here').show();
      $('#result_here').fadeOut(3000);
  }
        
    });
});
    
    
});
            //alert(html);
        }
    });
});
  }
    }); 
    });
     

$('.table-striped tr:not(:first)').each(function (i,E) {
	
		$(E).find('#fineweightwithcharges' ).focus(function() {
    var a = $(E).find('#recieved_weight').val();
    var b = $(E).find('#refine_charge ').val();
	var c = $(E).find('#fineweight ').val();
    var total = ((parseFloat(Number(a).toFixed(3)) * parseFloat(Number(b).toFixed(2))) / 100) + parseFloat(Number(c).toFixed(3));
    $(E).find('#fineweightwithcharges').val(parseFloat(Number(total).toFixed(3)));
	 $(E).find('#totalbalance').val(parseFloat(Number(total).toFixed(3)));
    
});
	
	$(E).find('#fineweight' ).focus(function() {
    var a = $(E).find('#recieved_weight').val();
    var b = $(E).find('#told_purity ').val();
    var total = (parseFloat(Number(a).toFixed(3)) * parseFloat(Number(b).toFixed(2))) / 100;
    $(E).find('#fineweight').val(parseFloat(Number(total).toFixed(3)));
    
});
	
	
$(E).find('#purity_difference' ).focus(function() {
    var a = $(E).find('#assay_purity').val();
    var b = $(E).find('#told_purity ').val();
    var total = a - b;
    $(E).find('#purity_difference').val(parseFloat(Number(total).toFixed(2)));
    
});

$(E).find( '#gain ' ).focus(function() {
    var a = $(E).find('#pure_weight ').val();
    var b = $(E).find('#to_customer_weight ').val();
    var total = parseFloat(Number(a).toFixed(3)) - parseFloat(Number(b).toFixed(3));
    $(E).find('#gain ').val(parseFloat(Number(total).toFixed(3)));
});


$(E).find( '#refined_weight ' ).focus(function() {
    var a = $(E).find('#refine_weight ').val();
    var b = $(E).find('#assay_purity ').val();
    var total = (parseFloat(Number(a).toFixed(3))*parseFloat(Number(b).toFixed(3)))/100;
    $(E).find('#refined_weight ').val(parseFloat(Number(total).toFixed(3)));
});

$(E).find( '#pure_weight ' ).focus(function() {
    var a = $(E).find('#refined_weight ').val();
    var b = $(E).find('#pure_sample ').val();
    var total = (parseFloat(Number(a).toFixed(3))+parseFloat(Number(b).toFixed(3)));
    $(E).find('#pure_weight ').val(parseFloat(Number(total).toFixed(3)));
});

$(E).find( '#pure_sample ' ).focus(function() {
    var a = $(E).find('#fire_assay_weight ').val();
    var b = $(E).find('#assay_purity ').val();
    var total = (parseFloat(Number(a).toFixed(3))*parseFloat(Number(b).toFixed(3)))/100;
    $(E).find('#pure_sample ').val(parseFloat(Number(total).toFixed(3)));
});

$(E).find( '#to_customer_weight ' ).focus(function() {
    var a = $(E).find('#recieved_weight ').val();
    var b = $(E).find('#told_purity ').val();
    var c = $(E).find('#refine_charge ').val();
    var total = parseFloat(Number(a).toFixed(3))*(parseFloat(Number(b).toFixed(3))-parseFloat(Number(c).toFixed(3)))/100;
    $(E).find('#to_customer_weight ').val(parseFloat(Number(total).toFixed(3)));
});


$(E).find('#submit_btn ').click(function(){
    
    $.ajax({
        
  type: 'POST',
  url: 'ajax.php',
  data: { rowid: $(E).find('#rowid ').val(), batchnumber: $(E).find('#batchnumber').val(), told_purity: $(E).find('#told_purity ').val(), 
  purity_difference: $(E).find('#purity_difference ').val(), refine_charge: $(E).find('#refine_charge ').val(), pure_sample: $(E).find('#pure_sample ').val(), 
  refined_weight: $(E).find('#refined_weight ').val(), pure_weight: $(E).find('#pure_weight ').val(), to_customer_weight: $(E).find('#to_customer_weight ').val(), 
  gain: $(E).find('#gain ').val(), fineweight: $(E).find('#fineweight').val(), fineweightwithcharges: $(E).find('#fineweightwithcharges').val(), totalbalance: $(E).find('#totalbalance').val()},
  success: function(html)
  {
      $('#result_here').html('<p class=\"alert alert-success\">'+html+'</p>');
      $('#result_here').show();
      $('#result_here').fadeOut(3000);
  }
        
    });
});


});








     
</script>
@endsection
