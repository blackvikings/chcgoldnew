<!DOCTYPE html>
<html>
<head>
	<title>Voucher</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
	<style type="text/css">
		.border-div{
			border: 5px solid red; 
			margin-top: 20px;
		}
		body {
			color: red;
		}
		.logo {
			width: 70%;
    		padding: 15px;
    		margin: 0px;
		}
		table, th, td {
  			border: 1px solid red !important;
  			color: red;
		}
		@media print {
		  #printPageButton {
		    display: none;
		  }
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
								<h4 class="text-center"><strong>GREEN GOLD JEWELLERY<br>WORKS LLP</strong></h4>
								<p>2nd&nbsp;Floor&nbsp;Hotel&nbsp;Maduban&nbsp;Parisar,&nbsp;Sadar&nbsp;Bazar,&nbsp;Raipur&nbsp;(C.G.)&nbsp;492001
									<br>Tel&nbsp;No.&nbsp;+771&nbsp;4030033,&nbsp;2555577,&nbsp;Email:greengoldjwindia@gmail.com</p>
						</div>
						<div class="col-md-3">
							<span class="mt-3 ml-5" style="margin-left: 60px;">
								<h6><u>Issued Voucher</u></h6>
								<p>No. <span style="color: red;">{{ $issued->invoiceno }}</span></p>
								<p>Date&nbsp;@php echo date("d-m-Y", strtotime($issued->issueDate)); @endphp</p>
							</span>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<div class="ml-4" style="display: inline-block;"><strong>Issue to :- </strong>&nbsp;&nbsp; {{ $issued->issueto }}</div>
							<br>
							<div class="ml-4" style="display: inline-block;"><strong>Party name :- </strong>&nbsp;&nbsp; {{ $partyName }}</div>
						</div>
					</div>

					<div class="row mt-3">
						<div class="col-md-12">
							<table class="table table-bordered">
								<thead class="text-center">
									<tr>
										<th>Particular</th>
										<th>Qty.</th>
										<th>Pure Weight</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>{{ $issued->particular }}</td>
										<td>{{ $issued->coinweight }}</td>
										<td>{{ $issued->purity }}%</td>
									</tr>
								</tbody>
							</table>
							<div class="row">
								<div class="col-md-12 text-right">
									<p class="mr-3">For, GREEN GOLD JEWELLERY WORKS LLP</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row mt-5">
			<div class="col-md-12">
				<div class="border-div">
					<div class="row">
						<div class="col-md-3">
							<img src="{{ asset('public/assets/chc.jpg') }}" class="logo">
						</div>
						<div class="col-md-6">
								<h4 class="text-center"><strong>GREEN GOLD JEWELLERY<br>WORKS LLP</strong></h4>
								<p>2nd&nbsp;Floor&nbsp;Hotel&nbsp;Maduban&nbsp;Parisar,&nbsp;Sadar&nbsp;Bazar,&nbsp;Raipur&nbsp;(C.G.)&nbsp;492001
									<br>Tel&nbsp;No.&nbsp;+771&nbsp;4030033,&nbsp;2555577,&nbsp;Email:greengoldjwindia@gmail.com</p>
						</div>
						<div class="col-md-3">
							<span class="mt-3 ml-5" style="margin-left: 60px;">
								<h6><u>Issued Voucher</u></h6>
								<p>No. <span style="color: red;">{{ $issued->invoiceno }}</span></p>
								<p>Date&nbsp;@php echo date("d-m-Y"); @endphp</p>
							</span>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<div class="ml-4" style="display: inline-block;"><strong>Issue to :- </strong>&nbsp;&nbsp; {{ $issued->issueto }}</div>
							<br>
							<div class="ml-4" style="display: inline-block;"><strong>Party name :- </strong>&nbsp;&nbsp; {{ $partyName }}</div>
						</div>
					</div>

					<div class="row mt-3">
						<div class="col-md-12">
							<table class="table table-bordered">
								<thead class="text-center">
									<tr>
										<th>Particular</th>
										<th>Qty.</th>
										<th>Tunch</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>{{ $issued->particular }}</td>
										<td>{{ $issued->coinweight }}</td>
										<td>{{ $issued->purity }}%</td>
									</tr>
								</tbody>
							</table>
							<div class="row">
								<div class="col-md-12 text-right">
									<p class="mr-3">For, GREEN GOLD JEWELLERY WORKS LLP</p>
								</div>
							</div>
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