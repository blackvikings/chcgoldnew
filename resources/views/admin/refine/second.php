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