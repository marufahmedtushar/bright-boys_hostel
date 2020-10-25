
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
      <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/dashboard" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
                <a href="/dashboard" class="nav-link {{ 'dashboard' == request()->path() ? 'active' : '' }}">
                  <i class="fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
          </li>
          <li class="nav-item ">
            <a href="/rooms" class="nav-link {{ 'rooms' == request()->path() ? 'active' : '' }}">
              <i class="fas fa-building"></i>
              <p>
               Rooms
        
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="/users" class="nav-link {{ 'users' == request()->path() ? 'active' : '' }}">
              <i class="fas fa-user"></i>
              <p>
               Users
        
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="/students" class="nav-link {{ 'students' == request()->path() ? 'active' : '' }}">
              <i class="fas fa-user-graduate"></i>
              <p>
               Students
        
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="/categories" class="nav-link {{ 'categories' == request()->path() ? 'active' : '' }}">
             <i class="fas fa-utensils"></i>
              <p>
               Categories of Meal
        
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="/item" class="nav-link {{ 'item' == request()->path() ? 'active' : '' }}">
             <i class="fas fa-drumstick-bite"></i>
              <p>
               List of Meal
        
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="/bills" class="nav-link {{ 'bills' == request()->path() ? 'active' : '' }}">
              <i class="fas fa-file-invoice-dollar"></i>
              <p>
               Bill
        
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="/contactlist" class="nav-link {{ 'contactlist' == request()->path() ? 'active' : '' }}">
              <i class="fas fa-id-card-alt"></i>
              <p>
               Contact lists
        
              </p>
            </a>
          </li>

          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>