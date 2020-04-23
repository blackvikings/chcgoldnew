@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:white; background:black; padding:10px;">Refine Section</h4>
                <div class="feed-widget">
				
					<form class="form-inline" action="" method="POST">
                        <div class="form-group"><label>Select Date :</label>
                            <div class="col-md-3">
                                <input type="date" name="Single_Date" id="singledatewa">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">
                                <button type="button" class="btn btn-primary" name="Singledatebtn" id="Singledatebtn">List details</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">
                                <button type="button" class="btn btn-primary" name="refreshbatches" id="refreshbatches">Load Batch</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3" id="showex"></div>
                        </div>
                        <div class="row">
                            <div class="form-group" style="width: 100%;">
                                <div class="col-md-12" id="bills"></div>
                            </div>
                        </div>
                    </form>
					
					<div class="form-group" id="haidex2">
						<div class="col-md-12">
							<div id="batch_results"></div>
						</div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	{{-- <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="color:white; background:black; padding:10px;">Monthly Refine Detail</h4>
                <div class="feed-widget">
                    <div id="contact_results"></div>
                    <form class="form-inline" method="POST" action="">
                        <div class="form-group"><label>Select Month :</label>
                            <div class="col-md-4">
                                <select name="D_Month" id="D_Month">
                                    <option selected disbaled>- Select Month -</option>
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
                </div>
            </div>
        </div>
    </div>  --}}
</div>
@endsection
@push('scripts')
<script>

    $('#Singledatebtn').click(function(){
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
            type: 'POST',
            url: '{{ route('refine.single') }}',
            data: {'billdate': $('#singledatewa').val() },
            success: function(html)
            {      
                $("#bills").html(html);
                $('.table-striped tr:not(:first)').each(function (i,E) {
                    $(E).find('#fineweightwithcharges' ).focus(function() {
                        var a = $(E).find('#recieved_weight').val();
                        var b = $(E).find('#refine_charge ').val();
                        var c = $(E).find('#fineweight ').val();
                        var total = ((parseFloat(Number(a).toFixed(3)) * parseFloat(Number(b).toFixed(2))) / 100) + parseFloat(Number(c).toFixed(3));
                        $(E).find('#fineweightwithcharges').val(parseFloat(Number(total).toFixed(3)));
                        $(E).find('#totalbalance').val(parseFloat(Number(total).toFixed(3)));
                    });
        
                    $(E).find('#fineweight' ).focus(function() {
                        var a = $(E).find('#recieved_weight').val();
                        var b = $(E).find('#told_purity ').val();
                        var total = (parseFloat(Number(a).toFixed(3)) * parseFloat(Number(b).toFixed(2))) / 100;
                        $(E).find('#fineweight').val(parseFloat(Number(total).toFixed(3)));
                    });
                    $(E).find('#purity_difference' ).focus(function() {
                        var a = $(E).find('#assay_purity').val();
                        var b = $(E).find('#told_purity ').val();
                        var total = a - b;
                        $(E).find('#purity_difference').val(parseFloat(Number(total).toFixed(2)));
                        
                    });
                    $(E).find( '#gain ' ).focus(function() {
                        var a = $(E).find('#pure_weight ').val();
                        var b = $(E).find('#to_customer_weight ').val();
                        var total = parseFloat(Number(a).toFixed(3)) - parseFloat(Number(b).toFixed(3));
                        $(E).find('#gain ').val(parseFloat(Number(total).toFixed(3)));
                    });
                    $(E).find( '#refined_weight ' ).focus(function() {
                        var a = $(E).find('#refine_weight ').val();
                        var b = $(E).find('#assay_purity ').val();
                        var total = (parseFloat(Number(a).toFixed(3))*parseFloat(Number(b).toFixed(3)))/100;
                        $(E).find('#refined_weight ').val(parseFloat(Number(total).toFixed(3)));
                    });
                    $(E).find( '#pure_weight ' ).focus(function() {
                        var a = $(E).find('#refined_weight ').val();
                        var b = $(E).find('#pure_sample ').val();
                        var total = (parseFloat(Number(a).toFixed(3))+parseFloat(Number(b).toFixed(3)));
                        $(E).find('#pure_weight ').val(parseFloat(Number(total).toFixed(3)));
                    });
                    $(E).find( '#pure_sample ' ).focus(function() {
                        var a = $(E).find('#fire_assay_weight ').val();
                        var b = $(E).find('#assay_purity ').val();
                        var total = (parseFloat(Number(a).toFixed(3))*parseFloat(Number(b).toFixed(3)))/100;
                        $(E).find('#pure_sample ').val(parseFloat(Number(total).toFixed(3)));
                    });
                    $(E).find( '#to_customer_weight ' ).focus(function() {
                        var a = $(E).find('#recieved_weight ').val();
                        var b = $(E).find('#told_purity ').val();
                        var c = $(E).find('#refine_charge ').val();
                        var total = parseFloat(Number(a).toFixed(3))*(parseFloat(Number(b).toFixed(3))-parseFloat(Number(c).toFixed(3)))/100;
                        $(E).find('#to_customer_weight ').val(parseFloat(Number(total).toFixed(3)));
                    });
                    $(E).find('#submit_btn ').click(function(){
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({    
                            type: 'POST',
                            url: '{{ route('update.bill') }}',
                            data: { rowid: $(E).find('#rowid ').val(), batchnumber: $(E).find('#batchnumber').val(), told_purity: $(E).find('#told_purity ').val(), purity_difference: $(E).find('#purity_difference ').val(), refine_charge: $(E).find('#refine_charge ').val(), pure_sample: $(E).find('#pure_sample ').val(), refined_weight: $(E).find('#refined_weight ').val(), pure_weight: $(E).find('#pure_weight ').val(), to_customer_weight: $(E).find('#to_customer_weight ').val(), gain: $(E).find('#gain ').val(), fineweight: $(E).find('#fineweight').val(), fineweightwithcharges: $(E).find('#fineweightwithcharges').val(), totalbalance: $(E).find('#totalbalance').val()},
                            success: function(html)
                            {
                                toastr.success(html);
                            }
                        });
                    });
                });
            }
        });
    });



    $('.table-kklop tr:not(:first)').each(function (i,E) { 
        $(E).find('.delete_datax ').click(function(){
           var id = $(this).attr('id');
            $.ajax({
                type: 'POST',
                url: 'ajax.php',
                data: { batchdatex: $(E).find('#batchdatex').val(), batchkramank: $(E).find('#batchkramank').val(), collectiondata: $(E).find('#collectiondata').val()},
                success: function(html)
                {      
                    var hideId =  'table#table-stripedxyz tr#tablexxy' + id;
                    $(hideId).remove(); // delete 
                    $(hideId).hide(); // hide
                    $('#result_here').html(html);
                    $('#result_here').show();
                    $('#result_here').fadeOut(3000);
                }
            });
        });     
    });

    $('#refreshbatches').click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '{{ route('load.batch') }}',
            data: { qmdatewa: $('#singledatewa').val()},
            success: function(html)
            {
                // console.log(html);
                $('#showex').html(html);
                $("#batchxyzssnm").on("change", function () {
                    var myDate = $(this).val();
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('total.batch') }}',
                        data: { datesort: $('#singledatewa').val(), batchnumber: $(this).val()},
                        success: function(html)
                        {
                            $('#batch_results').html(html);
                            $('.table-mmnn tr:not(:first)').each(function (i,E) {
                                $(E).find( '#toberecovered' ).focus(function() {
                                    var a = $(E).find('#refineshort').val();
                                    var b = $(E).find('#puresamplesum').val();
                                    var total = parseFloat(Number(a).toFixed(3)) + parseFloat(Number(b).toFixed(3));
                                    $(E).find('#toberecovered ').val(parseFloat(Number(total).toFixed(3)));
                                });
                                $(E).find( '#refineshort' ).focus(function() {
                                    var a = $(E).find('#refinecweightsum').val();
                                    var b = $(E).find('#recievedweight').val();
                                    var c = $(E).find('#purerecievedshort').val();
                                    var total = parseFloat(Number(a).toFixed(3)) - parseFloat(Number(b).toFixed(3)) + parseFloat(Number(c).toFixed(3));
                                    $(E).find('#refineshort ').val(parseFloat(Number(total).toFixed(3)));
                                });
                                $(E).find( '#expectedinc' ).focus(function() {
                                    var a = $(E).find('#fromcustomersum').val();
                                    var b = $(E).find('#silver').val();
                                    var c = $(E).find('#purerecievedshort').val();
                                    var d = $(E).find('#nineninefive').val();
                                    var total = parseFloat(Number(a).toFixed(3)) + parseFloat(Number(b).toFixed(3)) + parseFloat(Number(c).toFixed(3)) - parseFloat(Number(d).toFixed(3));
                                    $(E).find('#expectedinc ').val(parseFloat(Number(total).toFixed(3)));
                                });
                                $(E).find( '#recievedweight' ).focus(function() {
                                    var a = $(E).find('#receivedweightss ').val();
                                    var b = $(E).find('#silver ').val();
                                    var total = parseFloat(Number(a).toFixed(3)) - parseFloat(Number(b).toFixed(3));
                                    $(E).find('#recievedweight ').val(parseFloat(Number(total).toFixed(3)));
                                });
                                $(E).find( '#purerecievedshort' ).focus(function() {
                                    var a = $(E).find('#recievedweight ').val();
                                    var b = $(E).find('#refinepurity ').val();
                                    var total = parseFloat(Number(a).toFixed(3)) - (parseFloat(Number(a).toFixed(3) * parseFloat(Number(b).toFixed(2))/100));
                                    $(E).find('#purerecievedshort ').val(parseFloat(Number(total).toFixed(3)));
                                });
                                $(E).find('#submit_btn_day_Totalrefine').click(function(){
                                    $.ajax({   
                                        type: 'POST',
                                        url: '{{ route('save.refine') }}',
                                        data: { totalrefineforday: 'totalrefineforday', batch_date: $(E).find('#startdatex ').val() , Batchnumx: $('#batchxyzssnm').val() , Collection: $(E).find('#collectionsum ').val(), Sample: $(E).find('#samplesum ').val(), 
                                        Pure_Sample: $(E).find('#puresamplesum ').val(), Refine_Weight: $(E).find('#refineweightsum ').val(), nineninefivepointzero: $(E).find('#nineninefive ').val(), 
                                        Expected_INC: $(E).find('#expectedinc ').val(), Refine_Short: $(E).find('#refineshort ').val(), To_Be_Recovered: $(E).find('#toberecovered ').val(), receivedweightss: $(E).find('#receivedweightss ').val()  },
                                        success: function(html)
                                        {
                                            $('#result_here').html('<p class=\"alert alert-success\">'+html+'</p>');
                                            $('#result_here').show();
                                            $('#result_here').fadeOut(3000);
                                        }
                                    });
                                });
                            });
                        }
                    });
                });
            }
        });
    }); 
</script>
@endpush