<!-- resources/views/layouts/partials/admin/main.blade.php -->

<html lang="en">

@include('layouts.partials.admin.header') <!-- Include header template -->

<body>
    <div class="wrapper">
        @include('layouts.partials.admin.sidebar') <!-- Include sidebar template -->

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                data-bs-toggle="dropdown">
                                <span class="text-dark">{{$user->first_name}} {{$user->last_name}}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class='dropdown-item' href='/userprofile'>
                                    <i class="align-middle me-1" data-feather="user"></i> Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Log out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content">
                <div class="container-fluid p-0">
                    @if(session('success'))
                    <div style="text-align:center; background-color:#1CBB8C; color:white;padding:10px;margin-bottom:10px;">
                        {{ session('success') }}
                    </div>
                    @endif

                    <!-- Display Error Flash Message -->
                    @if(session('error'))
                    <div style="text-align:center; background-color:#DC3545; color:white;padding:10px;margin-bottom:10px;">
                        {{ session('error') }}
                    </div>
                    @endif
                    @yield('content') <!-- Dynamic content section -->
                </div>
            </main>
        </div>
    </div>

    <!-- Include Bootstrap JavaScript and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://demo-basic.adminkit.io/js/app.js"></script>

    <!-- Add this script for dropdown initialization -->
    <script>
        $(document).ready(function () {
            // Initialize Bootstrap dropdowns
            var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
            var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
                return new bootstrap.Dropdown(dropdownToggleEl);
            });
        });
    </script>
</body>

</html>