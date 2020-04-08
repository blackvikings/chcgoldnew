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
                                
                                <div id="contact_results"></div>
                                
                                <h4 class="card-title" style="color:white; background:black; padding:10px;">Client Ledger</h4>
                                <div class="feed-widget">
                    <form class="form-horizontal form-inline" action="" method="POST" enctype='multipart/form-data'>
                        
                        <div class="form-group">
                                        <div class="col-md-12">
                                            <select class="form-control form-control-line" name="editparty_selector" id="editparty_selectorledger">
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
						
									<div class="form-group"><label>From :</label>
                                            <div class="col-md-4">
                                                <input type="date" name="start_date" id="start_date">
                                            </div>
                                        </div>
						
                                        <div class="form-group"><label>Till :</label>
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
                                  
                                   <div id="xledger"> </div>
                                    
                                    
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
                                 	<?php $conn = new mysqli($servername, $username, $password, $dbname);
    									if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}
											$sql = "SELECT * FROM stockledger GROUP BY financialyear";
   											$result = $conn->query($sql);
											if ($result->num_rows > 0) {
        										while($row = $result->fetch_assoc()) {
            										echo'<option value="'.$row["financialyear"].'">'.$row["financialyear"].'</option>';
												}
    										} else {echo'<option>No Data Available !!</option>';}
										$conn->close();?>
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
 
 
 <script>
	 
	 $( '#showParty_detailsledger' ).click(function() {
              
               $.ajax({
        
  type: 'POST',
  url: 'ajax.php',
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
		 
		 //alert($('#fyyear').val());
		 
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
 
 
 
<?php include 'footer.php';?>
