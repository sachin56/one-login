<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <!-- Left navbar links -->


        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <ul class="navbar-nav">
                @if (Auth::user()->id == 1)
                <li class="nav-item">
                    <a href="register_user" class="nav-link {{ Route::current()->getName() == 'register_user' ? 'active' : '' }}">Add User</a>
                  </li>
                  <li class="nav-item">
                    <a href="register_system" class="nav-link {{ Route::current()->getName() == 'register_system' ? 'active' : '' }}">Add System</a>
                  </li>
                  @endif
                  <li class="nav-item">
                    <a href="user_systems" class="nav-link {{ Route::current()->getName() == 'user_systems' ? 'active' : '' }}">Systems</a>
                  </li>
                  <li class="nav-item">
                    {{-- <a href="user_systems" class="nav-link {{ Route::current()->getName() == 'user_systems' ? 'active' : '' }}">Projects</a>
                  </li>
                  <li class="nav-item">
                    <a href="user_systems" class="nav-link {{ Route::current()->getName() == 'user_systems' ? 'active' : '' }}">Suppliers</a>
                  </li> --}}
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">{{ Auth::user()->name }}</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                      <li><a href="user_profile" class="dropdown-item {{ Route::current()->getName() == 'user_profile' ? 'active' : '' }}">Profile</a></li>
                      <li><a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a></li>
                    </ul>
                </li>
                </ul>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                class="d-none">
                @csrf
                </form>
        </ul>




    </div>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
{{-- <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">User Login</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!--optionally can add the user -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->

                @if (Auth::user()->id == 1)
                    <li class="nav-item">
                        <a href="register_system"
                            class="nav-link {{ Route::current()->getName() == 'register_system' ? 'active' : '' }}">
                            <i class="fa fa-file"></i> &nbsp;
                            <p>
                                Systems
                            </p>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->id == 1)
                    <li class="nav-item">
                        <a href="register_user"
                            class="nav-link {{ Route::current()->getName() == 'register_user' ? 'active' : '' }}">
                            <i class="fa fa-users"></i> &nbsp;
                            <p>
                                Users

                            </p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="user_systems"
                        class="nav-link {{ Route::current()->getName() == 'user_systems' ? 'active' : '' }}">
                        <i class="fa fa-users"></i> &nbsp;
                        <p>
                            User Systems
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="user_profile"
                        class="nav-link {{ Route::current()->getName() == 'user_profile' ? 'active' : '' }}">
                        <i class="fa fa-user-circle"></i> &nbsp;
                        <p>
                            User Profile
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside> --}}
