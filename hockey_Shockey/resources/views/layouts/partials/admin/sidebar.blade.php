<!-- resources/views/layouts/sidebar.blade.php -->

<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class='sidebar-brand' href='/'>
            <span class="align-middle"><img src="{{ asset('images/logo_white.png') }}" alt="Logo"></span>
        </a>
        <ul class="sidebar-nav">
        <li class="sidebar-item">
                <a class='sidebar-link' href="#">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Users</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class='sidebar-link' href="{{ route('admin.products.index') }}">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Products</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class='sidebar-link' href="{{ route('admin.category.index') }}">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Category</span>
                </a>
            </li>
            
        </ul>
    </div>
</nav>
