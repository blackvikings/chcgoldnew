@extends('layouts.app')
@section('title', 'Chhattisgarh Hallmarking Center')
@section('content')

<div class="row"> 
	<div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:white; background:black; padding:10px;">Testing Voucher / Receipt</h4>
                <div class="feed-widget" id="section-to-print">                
                    <form class="form-horizontal form-material" action="" method="POST">
        
                        <div class="form-group">
							<label class="col-md-12">Date</label>
							<div class="col-md-12">
								<input type="date" id = "date" name="date" class="form-control form-control-line" readonly="" value="@php echo date('Y-m-d'); @endphp" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-12">Receipt No.</label>
							<div class="col-md-12">
								<input type="text" id = "rnumber" name="rnumber" class="form-control form-control-line" readonly="" value="" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-12">Party Name</label>
							<div class="col-md-12">
								<input type="text" id = "partyname" name="partyname" placeholder="Enter Full Name." class="form-control form-control-line" required>
							</div>
						</div>
                    
						<div class="form-group">
							<label class="col-md-12">In Figures</label>
							<div class="col-md-12">
								<input type="number" id = "figures" name="figures" placeholder="Enter in figures." step="1" value="0" class="form-control form-control-line" required>
							</div>
						</div>
                    
						<div class="form-group">
							<label class="col-md-12">In Words</label>
							<div class="col-md-12">
								<input type="text" id = "words" name="words" placeholder="Enter in Words."  class="form-control form-control-line">
							</div>
						</div>
                    
						<div class="form-group">
							<label class="col-md-12">Amount</label>
							<div class="col-md-12">
								<input type="number" id = "amount" name="amount" step="1" value="1" class="form-control form-control-line" required>
							</div>
						</div>
                    
						<div class="form-group" style="align:center;">
							<div class="col-sm-12">
								<button class="btn btn-primary" id = "submitreceipt" name="submitreceipt" type="submit" value="submitreceipt">Submit receipt</button>
							</div>
						</div>
					</form>
					<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Print Voucher</button>
                </div>
            </div>
        </div>
	</div> <!--edit blling-->
</div>
@endsection
@push('scripts')
@endpush

@push('modal')

<div id="myModal" class="modal fade" role="dialog">
  	<div class="modal-dialog modal-lg">
    	<!-- Modal content-->
    	<div class="modal-content">
	    <div class="modal-header">
     	   <h4 class="modal-title">Voucher</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	    </div>
      	<div class="modal-body" id="section-to-print">
    		<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="border-divx"><br/>
							<div class="row">
								<div class="col-md-3">
									<img src="./image/—Pngtree—label picture_718811.png" class="logo">
								</div>
								<div class="col-md-6 text-center">
									<h4><strong>CHHATTISGARH&nbsp;HALLMARKING&nbsp;CENTER</strong></h4>
									<p style="margin-bottom: 0px !important;"><b><small>SADAR BAZAR, RAIPUR(C.G.) 492 001</small></b></p>
									<p style="margin-bottom: 0px !important;"><small>Ph.:0771-4030033, 2555577</small></p><br/>
									<h5><u>GOLD SAMPLE TESTING REPORT</u></h5>
									<p style="margin-bottom: 0px !important;"><small>TESTED BY CARATO METER (GOLD XRF TESTING PIN)</small></p>
								</div>
								<div class="col-md-3">
									<div class="text-center">
										<p>Date:&nbsp;<u><?php //echo $mxdate;?></u></p>
										<p>Sr.No.&nbsp;<u><?php //echo $inv;?></u></p>
									</div>
								</div>
							</div>
						<!--<hr style="border-top: 1px solid rgb(11, 29, 239);">-->
							<div class="row">
								<div class="col-md-12">
									<p class="text-center" style="font-size: 14px;"><i>Certified that fineness of the sample discribed by the tennderr</i></p>
									<p class="text-center" style="font-size: 14px;" >
									    <i>Shri/Ms.&nbsp;<u><?php // echo $party;?></u>&emsp;
									    to by &nbsp;<u><?php // echo $isremark;?></u>&nbsp;(in figures)&emsp;
									    <u><?php // echo $particular;?></u>&nbsp;(in words)</i></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<p class="ml-4" style="font-size: 14px; margin-bottom: 0px !important;">Testing Charges<br/>Rs. <u><?php // echo $type;?></u></p>
								</div>
								<div class="col-md-4 offset-md-4"><br/>
									<p style="margin-bottom: 0px !important;" class="text-right mt-3">For Chhattsigarh Hallmarking Center</p>
								</div>
							</div>
						<!--<hr style="border-top: 1px solid rgb(11, 29, 239);">-->
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
						<div class="border-divx"><br/>
							<div class="row">
								<div class="col-md-3">
									<img src="./image/—Pngtree—label picture_718811.png" class="logo">
								</div>
								<div class="col-md-6 text-center">
									<h4><strong>CHHATTISGARH&nbsp;HALLMARKING&nbsp;CENTER</strong></h4>
									<p style="margin-bottom: 0px !important;"><b><small>SADAR BAZAR, RAIPUR(C.G.) 492 001</small></b></p>
									<p style="margin-bottom: 0px !important;"><small>Ph.:0771-4030033, 2555577</small></p><br/>
									<h5><u>GOLD SAMPLE TESTING REPORT</u></h5>
									<p style="margin-bottom: 0px !important;"><small>TESTED BY CARATO METER (GOLD XRF TESTING PIN)</small></p>
								</div>
								<div class="col-md-3">
									<div class="text-center">
										<p>Date:&nbsp;<u><?php // echo $mxdate;?></u></p>
										<p>Sr.No.&nbsp;<u><?php // echo $inv;?></u></p>
									</div>
								</div>
							</div>
							<!--<hr style="border-top: 1px solid rgb(11, 29, 239);">-->
							<div class="row">
								<div class="col-md-12">
									<p class="text-center" style="font-size: 14px;"><i>Certified that fineness of the sample discribed by the tennderr</i></p>
									<p class="text-center" style="font-size: 14px;" >
									    <i>Shri/Ms.&nbsp;<u><?php // echo $party;?></u>&emsp;
									    to by &nbsp;<u><?php // echo $isremark;?></u>&nbsp;(in figures)&emsp;
									    <u><?php // echo $particular;?></u>&nbsp;(in words)</i></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<p class="ml-4" style="font-size: 14px; margin-bottom: 0px !important;">Testing Charges<br/>Rs. <u><?php // echo $type;?></u></p>
								</div>
								<div class="col-md-4 offset-md-4"><br/>
									<p style="margin-bottom: 0px !important;" class="text-right mt-3">For Chhattsigarh Hallmarking Center</p>
								</div>
							</div>
							<!--<hr style="border-top: 1px solid rgb(11, 29, 239);">-->
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
    	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-primary" onclick="window.print();" id="printPageButton">Print</button>
      	</div>
    	</div>
  	</div>
</div>
@endpush