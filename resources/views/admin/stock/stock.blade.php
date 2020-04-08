<?php
// Initialize the session
session_start();
$mystatus = ".";

                                        date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
                                        $currentdate = date('Y-m-d');

// If session variable is not set it will redirect to login page
                            if(!isset($_SESSION['Contact']) && !isset($_SESSION['Branch'])){
                                 header("location: ../");
                                 exit;
                            }
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>HEADERs
include 'config.php';
include 'header.php';
?>



 <div class="row">
 
	<div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                               <!-- <form action="" method="POST">
                                <input type="text" name="enquiry_id" value="'.$enqid.'" hidden/>
                                <button type="submit" class="btn waves-effect ml-auto close" name="close_enquiry">&times;</button>
                                </form>-->
                                <h4 class="card-title" style="color:white; background:black; padding:10px;">Refine To Coin</h4>
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
        <table class="table-stock" id="table-stripedxyz" style="font-weight:bold;">
    <thead>
    
        <tr>
            <th>Batch Date</th>
            <th>Batch</th>
            <th>Received With with ss</th>
            <th>Coin Stock</th>
            <th>Coin Type</th>
            <th>Loss</th>
            <th>Update Data</th>
        </tr>
        
        
    </thead>
    <tbody>
    ';
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        
        $qqio = $qqio + 1;
        
    echo '
     
      <tr class="mnkliop" id="'.$qqio.'"><form id="my_form">
        <td><input type="text" id="batchdatex" name="party_name" value="'.$row["batchdate"].'" class="form-control" style="width: auto;" required readonly=""></td>
        <td><input type="text" id="batchkramank" name="party_name" value="'.$row["batch"].'" class="form-control" style="width: auto;" required readonly=""></td>
        <td><input type="number" id="receivedwithss" name="party_name" value="'.$row["receivedweightwithss"].'" class="form-control" style="width: auto;" required readonly=""></td>
        <td><input type="number" id="stockcoin" name="party_name" value="'.$row["coinstock"].'" step="0.001"  class="form-control" style="width: auto;" required></td>
        
        <!--<td><input type="number" id="cointype" name="party_name" value="$row["cointype"]" class="form-control" style="width: auto;" required></td>-->
        <td>
            <select id="cointype" class="form-control" style="width: auto;" required>
                <option '; if(($row["cointype"]!="99.5")||($row["cointype"]!="100")) echo 'selected="selected"'; echo ' disbaled>- Select Coin Type -</option>
                <option value="99.5" '; if($row["cointype"]=="99.5") echo 'selected="selected"'; echo '>995</option>
                <option value="100" '; if($row["cointype"]=="100") echo 'selected="selected"'; echo '>999</option>
            </select>
        </td>
        
        <td><input type="number" id="expectedloss" name="party_name" value="'.$row["loss"].'" step="0.001" class="form-control" style="width: auto;" required></td>
        <td><button type="button" id="update_datax" name="update_datax" class="btn btn-primary" style="width: auto;">Update Data</button></td>
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
                                                <?php

    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM partytable";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            
            //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            
            echo'<option value="'.$row["partyid"].'">'.$row["partyname"].'</option>';
            
        }
    } else {
        echo'<option>No Data Available !!</option>';
    }
$conn->close();
                                                ?>
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


<script>
        $('.table-stock tr:not(:first)').each(function (i,E) {
    
    
            $(E).find('#expectedloss').focus(function(){
                
                var a = $(E).find('#receivedwithss ').val();
                var b = $(E).find('#stockcoin ').val();
                var c = $(E).find('#cointype ').val();
                var total = parseFloat(Number(a).toFixed(3)) - (parseFloat(Number(b).toFixed(3) * parseFloat(Number(c).toFixed(2))/100));
                $(E).find('#expectedloss ').val(parseFloat(Number(total).toFixed(3)));
                
            });
    
             
          $(E).find('#update_datax ').click(function(){
    
    //alert($(E).find('#collectiondata').val());
    
    $.ajax({
        
  type: 'POST',
  url: 'ajax.php',
  data: { batchdatexy: $(E).find('#batchdatex').val(), receivedwithss: $(E).find('#receivedwithss').val(), batchkramank: $(E).find('#batchkramank').val(), stockdata: $(E).find('#stockcoin').val(), cointype: $(E).find('#cointype').val(), lossx: $(E).find('#expectedloss').val()},
  success: function(html)
  {
      $('#result_here').html(html);
      $('#result_here').show();
      $('#result_here').fadeOut(3000);
  }
        
    });
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
			
			//alert("clicked");
			
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
 
 
<?php include 'footer.php';?>
