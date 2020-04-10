@extends('layouts.app')
@section('title', 'Chhattisgarh Hallmarking Center')
@push('css')
<style type="text/css">
  .error {
    color: red;
  }
</style>
@endpush
@section('content')
  <div class="row"> 
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title" style="color:white; background:black; padding:10px;">Add party</h4>
          <div class="feed-widget">
          <form class="form-horizontal form-material" id="addParty" action="javascript::void(0)">
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
              <button class="btn btn-primary" id="addpartybtn" name="addpartybtn" type="submit" value="addpartybtn">Submit details</button>
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
            <form class="form-horizontal form-inline" id="partyNameform" action="javascript:void(0);">
              <div class="form-group">
                <div class="col-md-8">
                  <select class="form-control form-control-line" name="partyName">
                    @forelse($parties as $party)
                      <option value="{{ $party->id }}">{{ $party->partyName }}</option>
                    @empty
                      <option>Party not found</option>
                    @endforelse
                  </select>
                </div>
              </div>
              <div class="form-group" style="align:center;">
                <div class="col-sm-12">
                  <button class="btn btn-primary" name="showParty_details" id="getPartydetails" type="submit">Get details</button>
                </div>
              </div>
            </form>
            
            <form class="form-horizontal form-material" id="editForm" action="javascript::void(0)" style="display: none;">
              <div class="form-group">
                <label class="col-md-12">Party Name</label>
                <div class="col-md-12">
                  <input type="text" name="editparty_name" id="xname"  placeholder="Enter Full Name." class="form-control form-control-line" value="" required>
                </div>
              </div> 
              <div class="form-group">
                <label class="col-md-12">Party Contact</label>
                <div class="col-md-12">
                  <input type="text" name="editparty_contact" id="xcontact" placeholder="Enter Mobile Number." minlength="10" maxlength="10" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" class="form-control form-control-line" value="" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12">Party GSTIN</label>
                <div class="col-md-12">
                  <input type="text" name="editparty_gst" id="xgst" placeholder="Enter GST Number."  minlength="15" maxlength="15" class="form-control form-control-line" value="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12">Party % Parameter</label>
                <div class="col-md-12">
                  <input type="number" name="editparty_percent" id="xpercent" step="0.01" class="form-control form-control-line" value="" required>
                </div>
              </div>
              <div class="form-group">
                <input type="hidden" name="xid" id="xid" class="form-control" value="">
              </div>
              <div class="form-group" style="align:center;">
                <div class="col-sm-12">
                  <button class="btn btn-primary" type="submit" id="editparty_btn" name="editparty_btn" id="xbtn">Submit details</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>        
  </div>
@endsection
@push('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#addpartybtn').click(function(){
      //   alert('hello world');

        $("form#addParty").validate({
          rules: {
              partyname: {
                      required: true,
                  },
              partycontact: {
                  required: true,
              },          
              partygst: {
                  required: true,
              },
              partypercent: {
                required:true,
              },

          },
          messages: {
              partyname: {
                      required: "Please enter pary name.",
                  },
              partycontact: {
                  required: "Please enter pary's contact number.",
              },          
              partygst: {
                  required: "Please enter GSTIN Number.",
              },
              partypercent:{
                required:"Please party percentage parameter."
              }
          },
          submitHandler: function(form) {
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            var formData = {
                partyname:    $('#partyname').val(),
                partycontact: $('#partycontact').val(),
                partygst:     $('#partygst').val(),
                partypercent: $('#partypercent').val(),
            }
            console.log(formData);
            $.ajax({  
              type: 'POST',
              url: '{{ route('store.party') }}',
              data: formData,
              dataType: 'json',
              success: function(html)
              { 
                toastr.success(html);
              }
          });
        }
      });
    });

    $('#getPartydetails').click(function(){
      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({  
          type: 'POST',
          url: '{{ route('edit.party') }}',
          data: $('#partyNameform').serialize(),
          dataType: 'json',
          success: function(data)
          { 
            $("#xname").val(data.partyName);
            $("#xcontact").val(data.partyContact);
            $("#xgst").val(data.partyGstin);
            $("#xpercent").val(data.partyPercentage);
            $("#xid").val(data.id);
            $("#editForm").show();
          }
        });
    });




    $('#editparty_btn').click(function(){

      $("form#editForm").validate({
          rules: {
              xname: {
                      required: true,
                  },
              xcontact: {
                  required: true,
              },          
              xgst: {
                  required: true,
              },
              xpercent: {
                required:true,
              },

          },
          messages: {
              xname: {
                      required: "Please enter pary name.",
                  },
              xcontact: {
                  required: "Please enter pary's contact number.",
              },          
              xgst: {
                  required: "Please enter GSTIN Number.",
              },
              xpercent:{
                required:"Please party percentage parameter."
              }
          },
          submitHandler: function(form) {

            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });

              var formData = {
                  partyname:    $('#xname').val(),
                  partycontact: $('#xcontact').val(),
                  partygst:     $('#xgst').val(),
                  partypercent: $('#xpercent').val(),
                  partyid: $("#xid").val(),
              };
              console.log(formData);
              $.ajax({  
                type: 'POST',
                url: '{{ route('update.party') }}',
                data: formData,
                dataType: 'json',
                success: function(html)
                {           
                  swal("Party data update successfully!.")
                  .then((value) => {
                    window.location.reload();
                  });  
                },
                error: function(data) {
                  $('#result_here').html(data);
                  $('#result_here').show();
                  $('#result_here').fadeOut(3000);
                }
              });
            }
          });



    });
  });
</script>
@endpush