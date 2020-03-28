<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <title>Material Dashboard by Creative Tim</title>
  @include('layouts.css')
  @stack('css')
</head>

<body class="">
  <div class="wrapper ">
    @include('layouts.sidebar')
        <!-- Navbar -->
          @if(Auth::check())
          <div class="main-panel">
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
              <div class="container-fluid">
                <div class="navbar-wrapper">
                  <a class="navbar-brand" href="#pablo">@yield('title')</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="navbar-toggler-icon icon-bar"></span>
                  <span class="navbar-toggler-icon icon-bar"></span>
                  <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                  <form class="navbar-form">
                    <div class="input-group no-border">
                      <input type="text" value="" class="form-control" placeholder="Search...">
                      <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                      </button>
                    </div>
                  </form>
                  <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link" href="#pablo">
                          <i class="material-icons">dashboard</i>
                          <p class="d-lg-none d-md-block">
                            Stats
                          </p>
                        </a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="material-icons">notifications</i>
                          <span class="notification">5</span>
                          <p class="d-lg-none d-md-block">
                            Some Actions
                          </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item" href="#">Mike John responded to your email</a>
                          <a class="dropdown-item" href="#">You have 5 new tasks</a>
                          <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                          <a class="dropdown-item" href="#">Another Notification</a>
                          <a class="dropdown-item" href="#">Another One</a>
                        </div>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="material-icons">person</i>
                          <p class="d-lg-none d-md-block">
                            Account
                          </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                          <a class="dropdown-item" href="#">Profile</a>
                          <a class="dropdown-item" href="#">Settings</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">Log out</a>
                                                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                @csrf
                                                              </form>
                        </div>
                      </li>
                  </ul>
                </div>
              </div>
            </nav>
            @yield('content') 
          </div>
          @endif
        @yield('logincontent')
  </div>
  <!--   Core JS Files   -->
  @include('layouts.script')
  @stack('scripts')
</body>

</html>
