<!DOCTYPE html>
<html dir="ltr" lang="en">

  <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/assets/chc.jpg') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Chhattisgarh Hallmarking Center</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{ asset('public/assets/admin/assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/assets/admin/dist/css/style.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/assets/admin/datepiker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" media="screen">
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
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
	label{
		color:black;
	}
</style>	
	@stack('css')	
</head>
<body>
<div class="topnav navbar" id="myTopnav">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ route('manage.party') }}"><img src="{{ asset('public/assets/chc.jpg') }}" width="150px"/></a>
  	</div>
  @if(Auth::check())
      <a href="{{ route('manage.party') }}">Manage Party</a>
      <a href="{{ route('receiving') }}">Receiving</a>
      <a href="{{ route('edit.receiving') }}">Edit Receiving</a>
      <a href="{{ route('fireassay') }}">Fireassay</a>
      <a href="{{ route('refine') }}">Refine</a>
      <a href="{{ route('stock') }}">Stock</a>
      <a href="{{ route('ledger') }}">Ledger</a>
      <a href="{{ route('logout') }}"  class="btn btn-danger" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">Logout</a>
                                                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                @csrf
                                                              </form>
      <a href="javascript:void(0);" style="font-size:18px;" class="icon" onclick="myFunction()">&#9776;</a>
  @endif
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
                      <!--<div id="result_here"></div>-->
  					<div id="result_here"></div>
          </div>
        </div>
      </div>
      <div class="container-fluid">	
        @yield('content') 
      </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center" hidden>
                Powered by <a href="http://www.hackshade.com">Hackshade Technologies, Raipur</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    {{-- <script src="ass assets/libs/jquery/dist/jquery.min.js"></script> --}}
    <!-- Bootstrap tether Core JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>  
    <script src="{{ asset('public/assets/admin/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/dist/js/app-style-switcher.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('public/assets/admin/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('public/assets/admin/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('public/assets/admin/dist/js/custom.js') }}"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="{{ asset('public/assets/admin/assets/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/dist/js/pages/dashboards/dashboard1.js') }}"></script>
    
<script type="text/javascript" src="{{ asset('public/assets/admin/datepiker/jquery/jquery-1.8.3.min.js') }}" charset="UTF-8"></script>
{{-- <script type="text/javascript" src="{{ asset('public/assets/admin/datepiker/bootstrap/js/bootstrap.min.js') }}"></script> --}}
<script type="text/javascript" src="{{ asset('public/assets/admin/datepiker/js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
<script type="text/javascript" src="{{ asset('public/assets/admin/datepiker/js/locales/bootstrap-datetimepicker.fr.js') }}" charset="UTF-8"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@stack('scripts')
<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        //language:  "fr",
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
  $(".form_date").datetimepicker({
        language:  "en",
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
  $(".form_time").datetimepicker({
        language:  "en",
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });
</script>
@if(Session::has('message'))
<script>
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
</script>
@endif
</body>

</html>

