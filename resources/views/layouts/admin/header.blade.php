<header class="main-header">
  <!-- Logo -->
  <a href="/admin" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>W&S</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>BookShelf</b></span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">

        <!-- Notifications Menu -->
        <li class="dropdown notifications-menu">
          <!-- Menu toggle button -->
          <a href="/admin/books?status=2">
            Request <i class="fa fa-bell-o"></i>
            <span class="label label-warning">{{ $request }}</span>
          </a>
          {{-- <ul class="dropdown-menu">
            <li class="header">You have 10 requests</li>
            <li>
              <!-- Inner Menu: contains the notifications -->
              <ul class="menu">
                <li><!-- start notification -->
                  <a href="#">
                    <i class="fa fa-users text-aqua"></i> 5 request to book
                  </a>
                </li>
                <!-- end notification -->
              </ul>
            </li>
          </ul> --}}
        </li>
        <!-- Tasks Menu -->

        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="">
            <span class="hidden-xs">{{ (Auth::check()) ? Auth::user()->name : "" }}</span>
          </a>
        </li>
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="{{ route('logout') }}" class=""  onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <span class="hidden-xs">Log Out</span>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </li>
        <!-- Control Sidebar Toggle Button -->
      </ul>
    </div>
  </nav>
</header>