  @if (Auth::check())
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">Creative Tim</a>
      </div>
        <div class="sidebar-wrapper">
          <ul class="nav">
              <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                  <i class="material-icons">dashboard</i>
                  <p>Dashboard</p>
                </a>
              </li>
            @can('manage-user')
              <li class="nav-item {{ request()->is('manage-user') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('manage.user') }}">
                  <i class="material-icons">person</i>
                  <p>Users</p>
                </a>
              </li>
            @endcan
            @can('permissions')
              <li class="nav-item {{ request()->is('permissions') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('manage.permissions') }}">
                  <i class="material-icons">pan_tool</i>
                  <p>Permissons</p>
                </a>
              </li>
            @endcan
            @can('roles')
              <li class="nav-item {{ request()->is('roles') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('manage.roles') }}">
                  <i class="material-icons">supervisor_account</i>
                  <p>Roles</p>
                </a>
              </li>
            @endcan
          </ul>
        </div>
    </div>
  @endif