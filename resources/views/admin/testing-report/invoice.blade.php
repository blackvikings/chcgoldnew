<!DOCTYPE html>
<html>
<head>
	<title>Invoice</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
	<style type="text/css">
		.border-div{
			border: 5px solid darkblue; 
			margin-top: 20px;
		}
		body {
			color: darkblue;
		}
		.logo {
			width: 60%;
    		padding-top: 25px;
    		padding-left: 15px;
    		margin: 0px;
		}
		@media print {
		  #printPageButton {
		    display: none;
		  }
		}
		.text-buttom{
   			margin-top: 40%; 
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="border-div">
					<div class="row">
						<div class="col-md-3">
							<img src="{{ asset('public/assets/chc.jpg') }}" class="logo">
						</div>
						<div class="col-md-6">
							<h4><strong>CHHATTISGARH&nbsp;HALLMARKING&nbsp;CENTER</strong></h4>
							<p style="margin-bottom: 0px !important;"><b>SADAR BAZAR, RAIPUR(C.G.) 492 001</b></p>
							<p style="margin-bottom: 0px !important;">Ph.:0771-4030033, 2555577</p>
							<h3><u>GOLD SAMPLE TESTING REPORT</u></h3>
							<p style="margin-bottom: 0px !important;">TESTED BY CARATO METER (GOLD XRF TESTING PIN)</p>
						</div>
						<div class="col-md-3">
							<div class="text-buttom">
								<p>Date&nbsp;@php echo date("d-m-Y", strtotime($testingVoucher->issueDate)); @endphp</p>
							</div>
						</div>
					</div>
					<hr style="border-top: 1px solid rgb(11, 29, 239);">
					<div class="row">
						<div class="col-md-12">
							<p class="text-center" style="font-size: 30px;"><i>Certified that finaness of the sample discribed by the tennderr</i></p>
							<p class="text-center" style="font-size: 30px;" ><i>Shri/Ms.&nbsp;...........................................................................................................</i></p><p class="text-center" style="font-size: 30px;" ><i>to by .............................................................................................(in figures)<br>
							...........................................................................................................(in words)</i></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<p class="ml-4" style="font-size: 25px; margin-bottom: 0px !important;">Rs. .................................................</p>
						</div>
						<div class="col-md-4 offset-md-4">
							<p style="margin-bottom: 0px !important;" class="text-center mt-3">For Chhattsigarh Hallmarking Center</p>
						</div>
					</div>
					<hr style="border-top: 1px solid rgb(11, 29, 239);">
					<div class="row">
						<div class="col-md-12">
							<p class="ml-4">Note :- This is not athentic report, for complite satisfation please tested by fire assay system</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-md-12">
				<div class="border-div">
					<div class="row">
						<div class="col-md-3">
							<img src="{{ asset('public/assets/chc.jpg') }}" class="logo">
						</div>
						<div class="col-md-6">
							<h4><strong>CHHATTISGARH&nbsp;HALLMARKING&nbsp;CENTER</strong></h4>
							<p style="margin-bottom: 0px !important;"><b>SADAR BAZAR, RAIPUR(C.G.) 492 001</b></p>
							<p style="margin-bottom: 0px !important;">Ph.:0771-4030033, 2555577</p>
							<h3><u>GOLD SAMPLE TESTING REPORT</u></h3>
							<p style="margin-bottom: 0px !important;">TESTED BY CARATO METER (GOLD XRF TESTING PIN)</p>
						</div>
						<div class="col-md-3">
							<div class="text-buttom">
								<p>Date&nbsp;@php echo date("d-m-Y", strtotime($testingVoucher->issueDate)); @endphp</p>
							</div>
						</div>
					</div>
					<hr style="border-top: 1px solid rgb(11, 29, 239);">
					<div class="row">
						<div class="col-md-12">
							<p class="text-center" style="font-size: 30px;"><i>Certified that finaness of the sample discribed by the tennderr</i></p>
							<p class="text-center" style="font-size: 30px;" ><i>Shri/Ms.&nbsp;...........................................................................................................</i></p><p class="text-center" style="font-size: 30px;" ><i>to by .............................................................................................(in figures)<br>
							...........................................................................................................(in words)</i></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<p class="ml-4" style="font-size: 25px; margin-bottom: 0px !important;">Rs. .................................................</p>
						</div>
						<div class="col-md-4 offset-md-4">
							<p style="margin-bottom: 0px !important;" class="text-center mt-3">For Chhattsigarh Hallmarking Center</p>
						</div>
					</div>
					<hr style="border-top: 1px solid rgb(11, 29, 239);">
					<div class="row">
						<div class="col-md-12">
							<p class="ml-4">Note :- This is not athentic report, for complite satisfation please tested by fire assay system</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-md-12">
				<button onclick="window.print();" id="printPageButton" class="btn btn-primary text-right">Print</button>
			</div>
		</div>
	</div>
</body>
</html>