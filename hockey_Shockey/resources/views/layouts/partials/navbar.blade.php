    <header>
    <nav class="navbar navbar-light promotion-nav">
        <div class="container">
            <p>Summer Sale For All Swim Suits And Free Express Delivery - OFF 50%!</p>
            <p>Shop Now</p>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-fixed-top border-bottom border-2">
        <a class="navbar-brand" href="#">
            <img src="images/logo.png" alt="" width="150" height="53">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/products">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact Us</a>
                </li>
            </ul>
            <div class="navbar-nav navbar-info">
                <ul class="navbar-nav justify-content-end me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="#"><i class="bi bi-search" style="font-size: 1.2rem;"></i></a>
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
                    @if (Auth::user()->role_id == 0)
                    <ul class="navbar-nav justify-content-end me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="#"><i class="bi bi-cart" style="font-size: 1.2rem;"></i></a>
                    </li>
                </ul>
                @endif
                @endauth
                    @auth
                    @if (Auth::user()->role_id == 1)
                        <!-- Show Dashboard link for admin -->
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard">Dashboard</a>
                        </li>
                    @endif
                @endauth

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Profile
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
