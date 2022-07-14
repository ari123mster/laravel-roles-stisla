<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img src="{{ asset('assets/img/logo.png') }}" alt="logo" width="75">
            <b>Admin<b>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('dashboard') }}">SSM</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="active"><a class="nav-link" href="{{ url('dashboard') }}"><i class="fas fa-fire"></i>
                    <span>Dashboard</span></a></li>

            <li class="menu-header">Users</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i>
                    <span>Users</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link beep beep-sidebar" href="{{ route('user.index') }}">Users</a>
                    </li>
                    <li><a class="nav-link beep beep-sidebar" href="{{ route('roles.index') }}">Hak Akses</a>
                    </li>
                </ul>
            </li>

            <li class="menu-header">Logout</li>
            <li class="active"><a class="nav-link" href="{{ route('logout') }}"><i class="fas fa-door-open"></i>
                    <span>Logout</span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>




    </aside>
</div>
