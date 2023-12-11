
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link ml-3">
      <img src="assets/img/CSU.png" alt="AdminLTE Logo" style="opacity: .8;width:30px;">
      <span class="brand-text font-weight-light">CSU Library</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

      @auth
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>
      @endauth

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          

          <li class="nav-item menu-close">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-book-open"></i>
              <p>
                Available Books
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="/dashboard" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Books</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/sciencebooks" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Science Books</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="englishbooks" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>English Books</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="mathematicsbooks" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mathematics Books</p>
                </a>
              </li>
            </ul>
          </li>

            @auth
              @if(auth()->user()->role  === 'admin')
            <li >
            <a href="/booksmanagement" class="nav-link ">
            <i class="nav-icon fas fa-book"></i>
              <p class="ml-2">
              Book Management
              </p>
            </a>
          </li>


          <li >
            <a href="/transactions" class="nav-link ">
            <i class="nav-icon fas fa-list"></i>
              <p class="ml-2">
              Transactions
              </p>
            </a>
          </li>
             

              @else
            <li >
            <a href="/booksborrowed" class="nav-link ">
            <i class="nav-icon fas fa-bookmark"></i>
              <p class="ml-2">
                Borrowed Books
              </p>
            </a>
          </li>

          <li >
            <a href="/returnedbooks" class="nav-link ">
            <i class="nav-icon fas fa-book"></i>
              <p class="ml-2">
              Returned Books
              </p>
            </a>
          </li>
          @endif
            @endauth

         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>