<header>
  <nav class="navbar navbar-light promotion-nav">
    <div class="container">
      <p style="margin:5px auto;">Summer Sale For All Swim Suits And Free Express Delivery - OFF 50%!</p>
    </div>
  </nav>
  <div class=border-bottom border-2>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-fixed-top">
        <a class="navbar-brand" href="/">
          <img src="/images/logo.png" alt="" width="150" height="53">
        </a>

        <div class="mob-icons">
          <ul class="navbar-nav mb-2 mb-lg-0 nav-icons">
            <li class="nav-item">
              <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i
                  class="bi bi-search" style="font-size: 1.2rem;"></i></a>
            </li>
            <li class="nav-item">
              <a href="/cart" class="position-relative">
                <i class="bi bi-cart" style="font-size: 1.5rem;"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                  id="cartCounter"></span>
              </a>
            </li>
            <li class="nav-item">
              <a href="/wishlist" class="position-relative">
                <i class="bi bi-heart" style="font-size: 1.5rem;"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                  id="wishlistCounter"></span>
              </a>
            </li>
          </ul>
        </div>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <i class="bi bi-list"></i>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/product">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/contact">Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/about">About Us</a>
            </li>
          </ul>
          <div class="navbar-nav navbar-info">
            <ul class="navbar-nav justify-content-end me-auto mb-2 mb-lg-0 desktop-nav-icons">
              <li class="nav-item">
                <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                  aria-controls="offcanvasRight"><i class="bi bi-search" style="font-size: 1.2rem;"></i></a>
              </li>
              <li class="nav-item">
                <a href="/cart" class="position-relative">
                  <i class="bi bi-cart" style="font-size: 1.5rem;"></i>
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                    id="cartCounter"></span>
                </a>
              </li>
              <li class="nav-item">
                <a href="/wishlist" class="position-relative">
                  <i class="bi bi-heart" style="font-size: 1.5rem;"></i>
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                    id="wishlistCounter"></span>
                </a>
              </li>
            </ul>
            <ul class="navbar-nav ms-auto">
              <!-- Authentication Links -->
              @guest
              @if (Route::has('login'))
              <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
              </li>
              @endif

              @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="/register">Register</a>
              </li>
              @endif
              @else

              @auth
              @if (Auth::user()->role_id == 1)
              <!-- Show Dashboard link for admin -->
              <li class="nav-item">
                <a class="nav-link" href="/dashboard">Dashboard</a>
              </li>
              @endif
              @endauth

              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false" v-pre>
                  Profile
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <!-- Profile Link -->
                  <a class="dropdown-item" href="/userprofile">
                    {{ __('Your Profile') }}
                  </a>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </li>
              @endguest
            </ul>
          </div>
        </div>

      </nav>
    </div>
  </div>
</header>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Search Products</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <form id="searchForm" method="GET">
      <div class="input-group mb-3">
        <input type="text" class="form-control" id="searchInput" placeholder="Search for products" name="query">
        <button class="btn btn-outline-secondary" type="submit">Search</button>
      </div>
    </form>
    <ul id="searchResults"></ul>

  </div>
</div>