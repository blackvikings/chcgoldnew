@extends('layouts.app')
@section('content')
 	<div class="row">
		<div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title" style="color:white; background:black; padding:10px;">Monthly Refine Detail</h4>
                    <div class="feed-widget"> 
                        <div id="contact_results"></div>
                        <form class="form-inline" method="POST" action="javascript:void(0)">
                            <div class="form-group"><label>Select Month :</label>
                                <div class="col-md-4">
                                    <select name="D_Month" id="D_Month" >
                                        {{-- <option selected disbaled>- Select Month -</option> --}}
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
                        <br/>
		        		<div class="table-responsive" id="listdata"></div>
                    </div>
                </div>
            </div>
		</div> 
	</div>
@endsection
@push('scripts')
<script>

	$('#Monthdatebtn').click(function(){
		$.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
            type: 'POST',
            url: '{{ route('get.refines') }}',
            data: {'D_Month': $('#D_Month').val() },
            success: function(html)
            {
                $('#listdata').html(html);
                $('.table-kklop tr:not(:first)').each(function (i,E) { 
                    $(E).find('.delete_datax ').click(function(){
                       var id = $(this).attr('id');
                       var token = $("meta[name='csrf-token']").attr("content");
                        $.ajax({
                            type: 'DELETE',
                            url: '{{ url('admin/delete-refine') }}/'+id,
                            data: { 'id': id, '_token': token},
                            success: function(html)
                            {     
                                // console.log(html); 
                                toastr.success(html);
                                $('#Monthdatebtn').trigger('click');
                            }
                        });
                    });     
                });
            }
        });
	});


    // $('.table-kklop tr:not(:first)').each(function (i,E) {
    //    $(E).find('.delete_datax ').click(function(){
    //      	var id = $(this).attr('id');
    // 		$.ajax({
  		// 		type: 'POST',
  		// 		url: 'ajax.php',
  		// 		data: { batchdatex: $(E).find('#batchdatex').val(), batchkramank: $(E).find('#batchkramank').val(), collectiondata: $(E).find('#collectiondata').val()},
				// success: function(html)
			 //  	{
    //     			var hideId =  'table#table-stripedxyz tr#tablexxy' + id;
    //                 $(hideId).remove(); // delete 
    //                 $(hideId).hide(); // hide
    //   				$('#result_here').html(html);
    //   				$('#result_here').show();
    //   				$('#result_here').fadeOut(3000);
  		// 		} 
    // 		});
    //     });
             
    // }); 
</script>
@endpush