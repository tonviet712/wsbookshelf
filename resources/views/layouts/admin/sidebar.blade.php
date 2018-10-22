<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <!-- Optionally, you can add icons to the links -->
      <li class="treeview menu-open">
        <a href="#"><i class="fa fa-link"></i> <span>Account List</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="display: block;">
          <li><a href="/admin/accounts">All</a></li>
          <li><a href="/admin/accounts?sort=admin">Admin</a></li>
          <li><a href="/admin/accounts?sort=user">User</a></li>
        </ul>
      </li>
      {{-- <li><a href="/admin/admin-user"><i class="fa fa-link"></i> <span>Account List</span></a></li> --}}
      <li class="treeview menu-open">
        <a><i class="fa fa-link"></i>
          <span>Book</span>
        </a>
        <ul class="treeview-menu" style="display: block;">
          <li><a href="/admin/books">All</a></li>
          <li><a href="/admin/books?status=0">Borrowed</a></li>
          <li><a href="/admin/books?status=1">Available</a></li>
          <li><a href="/admin/books?status=2">Ordering</a></li>
          <li><a href="/admin/books?status=3">Canceled</a></li>
          <li><a href="/admin/books?status=4">Out Of Stock</a></li>
        </ul>
      </li>
      <li><a href="/admin/history"><i class="fa fa-link"></i> <span>History</span></a></li>
      <li><a href="#"><i class="fa fa-link"></i> <span>Registration</span></a></li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>