@extends('layouts.app')
@section('title', 'Chhattisgarh Hallmarking Center')
@section('content')
  <div class="row"> 
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title" style="color:white; background:black; padding:10px;">Add party</h4>
          <div class="feed-widget">
          <form class="form-horizontal form-material">
            <div class="form-group">
            <label class="col-md-12">Party Name</label>
            <div class="col-md-12">
              <input type="text" id = "partyname" name="partyname" placeholder="Enter Full Name." class="form-control form-control-line" required>
            </div>
            </div>        
            <div class="form-group">
            <label class="col-md-12">Party Contact</label>
            <div class="col-md-12">
              <input type="text" id = "partycontact" name="partycontact" placeholder="Enter Mobile Number." minlength="10" maxlength="10" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" class="form-control form-control-line" required>
            </div>
            </div>             
            <div class="form-group">
            <label class="col-md-12">Party GSTIN</label>
            <div class="col-md-12">
              <input type="text" id = "partygst" name="partygst" placeholder="Enter GST Number."  minlength="15" maxlength="15" class="form-control form-control-line">
            </div>
            </div>            
            <div class="form-group">
            <label class="col-md-12">Party % Parameter</label>
            <div class="col-md-12">
              <input type="number" id = "partypercent" name="partypercent" step="0.01" value="0.00" class="form-control form-control-line" required>
            </div>
            </div> 
            <div class="form-group" style="align:center;">
            <div class="col-sm-12">
              <button class="btn btn-primary" id = "addpartybtn" name="addpartybtn" type="button" value="addpartybtn">Submit details</button>
            </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title" style="color:white; background:black; padding:10px;">Edit party</h4>
          <div class="feed-widget">
            <form class="form-horizontal form-inline" action="" method="POST" enctype='multipart/form-data'>
              <div class="form-group">
                <div class="col-md-8">
                  <select class="form-control form-control-line" name="editparty_selector">
                    <?php
                        //$conn = new mysqli($servername, $username, $password, $dbname);
                        //if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}
                          //  $sql = "SELECT * FROM partytable";
                            //$result = $conn->query($sql);
                            //if ($result->num_rows > 0) {
                            //while($row = $result->fetch_assoc()) {
                              //echo'<option value="'.$row["id"].'">'.$row["partyname"].'</option>'; 
                            //}
                              //} else {
                                //echo'<option>No Data Available !!</option>';
                              //}
                            //$conn->close();
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group" style="align:center;">
                <div class="col-sm-12">
                  <button class="btn btn-primary" name="showParty_details" type="submit">Get details</button>
                </div>
              </div>
            </form>
                                    

@endsection

@push('script')

  <script>
    $(document).ready(function() {
      $('#addpartybtn').click(function(){
        if(!$('#partypercent').val() || !$('#partycontact').val() || !$('#partyname').val()) {
          alert("Party details can not be empty !");
        }else{
        //alert("addpartybtn");
          $.ajax({  
            type: 'POST',
            url: 'ajax.php',
            data: { addpartybtn: $('#addpartybtn').val(), partypercent: $('#partypercent').val(), partygst: $('#partygst').val(), 
            partycontact: $('#partycontact').val(), partyname: $('#partyname').val()},
            success: function(html)
            { //alert(html);
              $('#result_here').html(html);
              $('#result_here').show();
              $('#result_here').fadeOut(3000);
            }
          });
        }
    });


    $('#editparty_btn').click(function(){
      if(!$('#xid').val() || !$('#xpercent').val() || !$('#xcontact').val() || !$('#xname').val()) {
        alert("Party details can not be empty !");
      }else{
        $.ajax({  
          type: 'POST',
          url: 'ajax.php',
          data: { editparty_btn: $('#editparty_btn').val(), xid: $('#xid').val(), xpercent: $('#xpercent').val(), 
          xgst: $('#xgst').val(), xcontact: $('#xcontact').val(), xname: $('#xname').val()},
          success: function(html)
          { 
            $('#result_here').html(html);
            $('#result_here').show();
            $('#result_here').fadeOut(3000);
          }
        });
      }
    });
  });
</script>
@endpush