

<!DOCTYPE html>
<html dir="ltr" lang="en">

    <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../chc.jpg">
    <title>Chhattisgarh Hallmarking Center</title>
			
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link href="./datepiker/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="./datepiker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
		
		<style>
body {margin:0;font-family:Arial}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 17px;    
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: #555;
  color: white;
}

.dropdown-content a:hover {
  background-color: #ddd;
  color: black;
}

.dropdown:hover .dropdown-content {
  display: block;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}
			
</style>	
		
		<style type="text/css">
		.border-divx{
			border: 5px solid red; 
			margin-top: 20px;
		}
		/*body {*/
		/*	color: red;*/
		/*}*/
		.logo {
			width: 70%;
    		padding: 15px;
    		margin: 20px;
		}
		tbleprint {
  			border: 1px solid red !important;
  			color: red;
		}
		@media print {
		    body * {
                visibility: hidden;
            }
            #section-to-print, #section-to-print * {
              visibility: visible;
            }
            #section-to-print {
              width: 21cm;
              height: 29.7cm;
            }
		  #printPageButton {
		    display: none;
		  }
		}
	</style>
</head>
<body>

   	
<div class="topnav navbar" id="myTopnav">
	<div class="navbar-header">
		<a class="navbar-brand" href="index.php"><img src="../chc.jpg" width="150px"/></a>
  </div>
  <a href="index.php">Party</a>
  <a href="receiving1.php">Reception</a>
  <a href="receiving.php">Receiving</a>
  <a href="issue.php">Issuing</a>
  <a href="#">Batch Overview</a>
  <a href="refine.php">Refine Monthly Overview</a>
  <a href="ledger.php">Ledger</a>
  <a href="fireassay.php">Testing Report</a>
  <a href="logout.php"  class="btn btn-danger">Logout</a>
  <a href="javascript:void(0);" style="font-size:18px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
	
	
	
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav navbar") {
    x.className = "topnav responsive";
  } else {
    x.className = "topnav navbar";
  }
}
</script>
	<div class="page-wrapper">
    <div class="page-breadcrumb">
      <div class="row align-items-center">
        <div class="col-md-12">        
			    <div id="result_here"></div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
		


