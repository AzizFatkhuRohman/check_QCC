<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{asset('asset/img/logo.png')}}" alt="">
        <span class="d-none d-lg-block">{{config('app.name')}}</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">


        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{asset('asset/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth::user()->name}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{Auth::user()->name}}</h6>
              <span>{{Auth::user()->email}}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <form action="{{route('logout')}}" class="dropdown-item d-flex align-items-center" id="logoutForm" method="POST">
                @csrf
                <button class="btn btn-danger btn-sm" id="logoutButton"><i class="bi bi-box-arrow-right"></i> Logout</button>
              </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ request()->is('/') ? '' : 'collapsed' }}" href="{{route('home')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      @if (Auth::user()->role == 'admin')
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/user') || request()->is('admin/user/*') ? '' : 'collapsed' }}" href="{{url('admin/user')}}">
          <i class="bi bi-people"></i>
          <span>User</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/car-type') || request()->is('admin/car-type/*') ? '' : 'collapsed' }}" href="{{url('admin/car-type')}}">
          <i class="bi bi-car-front-fill"></i>
          <span>Car Type</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/machine') || request()->is('admin/machine/*') ? '' : 'collapsed' }}" href="{{url('admin/machine')}}">
          <i class="bi bi-cpu"></i>
          <span>Machine</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/line') || request()->is('admin/line/*') ? '' : 'collapsed' }}" href="{{url('admin/line')}}">
          <i class="bi bi-calendar-range-fill"></i>
          <span>Line</span>
        </a>
      </li>
      @elseif(Auth::user()->role == 'supplier')
      <li class="nav-item">
        <a class="nav-link {{ request()->is('supplier/tabel-de') || request()->is('supplier/tabel-de/*') ? '' : 'collapsed' }}" href="{{url('supplier/tabel-de')}}">
          <i class="bi bi-file-earmark-check-fill"></i>
          <span>Tabel DE</span>
        </a>
      </li>
      @endif

    </ul>

  </aside><!-- End Sidebar-->