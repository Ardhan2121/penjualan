<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar justify-content-between">
    <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
    <img src="" alt="" width="150">
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="https://ui-avatars.com/api/?name={{ Auth::user()->username }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->username }}</div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
        </li>
    </ul>
</nav>
