<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Agnis | Courses</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('public/assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,400,600,700,900&display=swap" rel="stylesheet">
	
	
    <!--<script src="https://kit.fontawesome.com/0fa7669ae6.js"></script>-->

      <!-- Custom styles for this template -->
    <link href="{{ asset('public/assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/assets/css/navigation.css') }}">
	
	
	
    <!-- All Custom Css -->
    <link href="{{ asset('public/assets/css/custom.css') }}" rel="stylesheet">
  
    <link href="{{ asset('public/assets/css/responsive.css') }}" rel="stylesheet">
	
	<link href="{{ asset('public/assets/fontawesome/fontAwesome.css') }}" rel="stylesheet">
  
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    <link rel="stylesheet" href="{{ asset('public/assets/css/tabs.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/sweetalert2.css') }}">
	
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css">
	
    <style type="text/css">
        a.disabled {
        pointer-events: none;
    }
    .error{
        color: red;
    }
    </style>
    @stack('css')
</head>
<body id="page-top">

    <!----==== Banner ====---->
    <header class="masthead">

       <div class="nav-container">
    
        <nav class="sina-nav mobile-sidebar navbar-transparent navbar-fixed" data-top="0" data-md-top="0" data-xl-top="0">
        
            <div class="container-fluid nopadding">

                <div class="search-box">
                
                    <!--<form role="search" method="get" action="#">
                    
                        <span class="search-addon close-search"><i class="fa fa-times"></i></span>
                        
                        <div class="search-input">
                        
                            <input type="search" class="form-control" placeholder="Search here" value="" name="">
                            
                        </div>
                        
                        <span class="search-addon search-icon"><i class="fa fa-search"></i></span>
                        
                    </form>-->
                    
                </div>

                <div class="extension-nav">
                
                    <ul>
                    
                        <li class="dropdown">
                        
                            <a href="#" class="dropdown-toggle header-admin-dropdown" data-toggle="dropdown"> 
                                <div class="admin-caret-icon"></div>
                                <div class="admin-ima-area"> <div class="admin-icon"></div> </div>
                            </a>
                            
                            <ul class="dropdown-menu">
                            @guest
                                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            @else
                                @can('roles')
                                    <li><a href="{{ route('manage.roles') }}">Manage Role</a></li>
                                @endcan
                                
                                @can('manage-user')
                                    <li><a href="{{ route('manage.user') }}">Manage Users</a></li>
                                @endcan
                                @can('permissions')
                                    <li><a href="{{ route('manage.permissions') }}">Manage Permissions</a></li>
                                @endcan
                                <li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            @endguest
                            </ul>
                            
                        </li>
                        
                        <li class="dropdown">
                        
                            <a href="#" class="dropdown-toggle bell-dropdown" data-toggle="dropdown">
                            
                                <span class="bell-icon"></span>
                                
                                <span class="shop-badge">2</span>
                                
                            </a>
                            
                        </li>
                        
                    </ul>
                    
                </div>
                

                <div class="sina-nav-header social-on">
                
                    <div class="collapse-menu">
                    
                        <div class="widget-bar-btn"><a href="#" class="bars-button-area"><span></span></a></div>
                    
                    </div>
                    
                    <a class="sina-brand" href="#">
                    
                        <img src="{{ asset('public/assets/images/logo.png') }}" alt="" class="logo-primary">
                        
                        <img src="{{ asset('public/assets/images/logo.png') }}" alt="" class="logo-secondary">
                        
                    </a>
                    
                </div>


                <div class="collapse navbar-collapse" id="navbar-menu">
                
                    <ul class="sina-menu" data-in="fadeInTop" data-out="fadeInTop">
                    
                    @guest
                        <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @else
                        <li><a href="{{ url('/') }}" class="uppercase {{ request()->is('/') ? 'current' : '' }}">Dashboard</a></li>
                        @can('categories')
                                <li><a href="{{ route('manage.terms') }}" class="uppercase {{ request()->is('categories') ? 'current' : '' }}">Categories</a></li>
                        @endcan
                        @can('tags')
                            <li><a href="{{ route('manage.tags') }}" class="uppercase {{ request()->is('tags') ? 'current' : '' }}" >Tags</a></li>
                        @endcan 
                    @endguest
                    </ul>
                    
                </div>
                
            </div>

            
            
            <div class="sina-nav-overlay off"></div>
            
            <div class="widget-bar">
            
                <a href="#" class="close-widget-bar"><i class="fa fa-times"></i></a>
                
                <div class="widget">
                
                    <ul class="link">
                    
                    @guest
                        <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @else
                        <li><a href="{{ url('/') }}" class="uppercase">Dashboard</a></li>
                        @can('categories')
                                <li><a href="{{ route('manage.terms') }}">Categories</a></li>
                        @endcan
                        @can('tags')
                            <li><a href="{{ route('manage.tags') }}">Tags</a></li>
                        @endcan
                    @endguest
                    </ul>
                    
                </div>
                
            </div>
            
        </nav>
        
    </div>
        
    </header>
    
  <!----==== Content ====---->
    @yield('content')  


    <script src="{{ asset('public/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/bootstrap.min.js') }}"></script>

    {{-- Sweet Alert 2 --}}
    <script src="{{ asset('public/assets/js/sweetalert2.js') }}"></script>
    <!-- For Meagmenu -->
    <script src="{{ asset('public/assets/js/navigation.js') }}"></script>
    <script src="{{ asset('public/assets/js/tabs.js') }}"></script>
	
	<script src="{{ asset('public/assets/fontawesome/fontAwesome.js') }}"></script>
  
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    @stack('scripts')
    <script type="text/javascript">
        function archiveFunction() {
            event.preventDefault();
            var form = event.target.form;
            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.value) {
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
                form.submit(); 
              }
              else
              {
                swal("Cancelled", "Course not deleted!!", "error");
              }
            })
        }
    </script>
</body>
</html>