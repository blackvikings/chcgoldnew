@extends('layouts.app')
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title" style="color:white; background:black; padding:10px;">Fire Assay Section</h4>
        <div class="feed-widget">
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
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
     <script>
      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $('#datebtn').click(function(){   
          $.ajax({
              type: 'POST',
              url: '{{ route('fireassay.bills') }}',
              data: { start_date: $('#start_date').val(), end_date: $('#end_date').val() },
              success: function(html)
              {
                  $('#firedetails').html(html);
                  $('#firedetails').show();
              }                  
          });
        });
     </script>
@endpush