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
                                <h4 class="card-title" style="color:white; background:black; padding:10px;">Fire Assay Section</h4>
                                <div class="feed-widget">
                                    
                                    <!--<form class="form-material">-->
                                    <!--    <div class="form-group"><label>Search by name / bill number / remark / date (format : <b>DD-MM-YYYY</b> )</label>-->
                                            
                                    <!--        <div class="col-md-12">-->
                                    <!--            <input type="text" size="30"  class="form-control" placeholder=" 🔍 Search bill details here" onkeyup="showResult(this.value)"></input>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</form>-->
                                    
                                    <!--<div id="livesearch"></div>-->
                                    
                                    <form class="form-inline" action="" method="POST">
                                        
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
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <button type="button" class="btn btn-primary" name="datebtn" id="datebtn">List details</button>
                                            </div>
                                        </div>
                                        
                                    </form>
                                    
                                    <div id="firedetails"> </div>

                                    
                                     <script>
                                         
                                         $('#datebtn').click(function(){
                                             
                                                 $.ajax({
        
  type: 'POST',
  url: 'ajax.php',
  data: { datebtn: $('#datebtn').val(), start_date: $('#start_date').val(), end_date: $('#end_date').val() },
  success: function(html)
  {
      $('#firedetails').html(html);
      $('#firedetails').show();
      //$('#contact_results').fadeOut(3000);
  }
        
    });
});
                                     </script>
                                    
                                    
                                </div>
                            </div>
                        </div>
</div> <!--edit blling-->




</div>
<?php include 'footer.php';?>





