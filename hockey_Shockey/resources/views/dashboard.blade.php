<!DOCTYPE html>
@include('layouts.main')
    <div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class='sidebar-brand' href='/'>
            <span class="align-middle"><img src="images/logo_white.png" alt="Logo"></span>
        </a>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <!--<a class='sidebar-link' data-bs-toggle="collapse" href="{{ route('admin.category.index') }}">-->
                <a class='sidebar-link' href="{{ route('admin.category.index') }}">    
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Category</span>
                </a>
                
            </li>
            <li class="sidebar-item">
                <!--<a class='sidebar-link' data-bs-toggle="collapse" href="{{ route('admin.category.index') }}">-->
                <a class='sidebar-link' href="{{ route('users.index') }}">    
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Users</span>
                </a>
                
            </li>
            
        </ul>
    </div>
</nav>
      <div class="main">
        <nav class="navbar navbar-expand navbar-light navbar-bg">
          <a class="sidebar-toggle js-sidebar-toggle">
            <i class="hamburger align-self-center"></i>
          </a>
          <div class="navbar-collapse collapse">
            <ul class="navbar-nav navbar-align">
              
             
              <li class="nav-item dropdown">
               
                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                  <span class="text-dark">Charles Hall</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                  <a class='dropdown-item' href='/pages-profile'>
                    <i class="align-middle me-1" data-feather="user"></i> Profile </a>
                  <a class="dropdown-item" href="#">
                    <i class="align-middle me-1" data-feather="pie-chart"></i> Analytics </a>
                  <div class="dropdown-divider"></div>
                  <a class='dropdown-item' href='/'>
                    <i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy </a>
                  <a class="dropdown-item" href="#">
                    <i class="align-middle me-1" data-feather="help-circle"></i> Help Center </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </nav>
        <main class="content">
          <div class="container-fluid p-0">
            
            </div>
          </div>
        </main>
        
      </div>
    </div>
    <script src="https://demo-basic.adminkit.io/js/app.js"></script>

  </body>
</html>