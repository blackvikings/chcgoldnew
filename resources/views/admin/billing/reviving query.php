 <?php if(isset($_POST['submit_newbill'])){
		$serialnumber = $_POST['serial_inc'];
        $billdate = $_POST['bill_date'];
        $partyid = $_POST['party_selector'];
        $partypercent = $_POST['partyxpercent'];
        $itemname = $_POST['item_name'];
        $before_melting_weight = $_POST['before_weight'];
        $after_melting_weight = $_POST['after_weight'];
        $sampe_weight = $_POST['sample_weight'];
        $recieved_weight = $_POST['recieved_weight'];
        $fire_assay_weight = $_POST['fire_assay_weight'];
        $refine_weight = $_POST['refine_weight'];
        $purity_percent = $_POST['purity_percentage'];
        $cgst_percent = $_POST['cgst_percent'];
        $sgst_percent = $_POST['sgst_percent'];
        $total_amount = $_POST['total_amount'];
        $remarks = $_POST['remarks'];
        
        $billidx=md5($partyid.$refine_weight.$total_amount.$purity_percent);
        
        $partyid = explode("|",$partyid);
        $partyid = $partyid[2];
		
		// Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "INSERT INTO billtable (billserial, billdate, partyid, partypercentnew, itemname, beforemeltingweight, aftermeltingweight, sampleweight, receivedweight, fireassayweight, refineweight, assaypurity, cgst, sgst, labour, totalamount, remark, billid, batchnumber, clientpurity, puritydifference, refinecharge, puresample, refinedweight, pureweight, tothecustomer, gain, fineweight, fineweightwithcharge, cointype, coinissuedweight, totalbalance, description) 
		VALUES ('$serialnumber', '$billdate', '$partyid','$partypercent','$itemname','$before_melting_weight','$after_melting_weight','$sampe_weight','$recieved_weight','$fire_assay_weight','$refine_weight','$purity_percent','$cgst_percent','$sgst_percent','7','$total_amount','$remarks','$billidx', '1', '0', '0', '0.25', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'Gold refining & issuing')";

        if ($conn->query($sql) === TRUE) {
            
            echo'<div class="alert alert-success"><strong>Bill Created Successfully !!</strong></div>';
            
        }else{
            echo'<div class="alert alert-danger"><strong>Error: ' . $sql . '<br>' . $conn->error.'</strong></div>';
        }
        $conn->close();
 } else if(isset($_POST['update_newbill'])){
        
        $serial_number = $_POST['serial_n'];
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
            
        }else{
            echo'<div class="alert alert-danger"><strong>Error: ' . $sql . '<br>' . $conn->error.'</strong></div>';
        }
		$conn->close();		
	};

 ?>