<!-- Sidebar user panel (optional) -->
<!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
        <a href="#" class="d-block">Admin</a>
    </div>
</div>
-->
<!-- SidebarSearch Form
<div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
            </button>
        </div>
    </div>
</div>-->

<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-header">GET STARTED</li>
        <li class="nav-item">
            <a href="{{ route('admin.getStarted.index') }}" class="nav-link {{ request()->is('admin/get-started*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-file"></i>
                <p>Integration [process]</p>
            </a>
        </li>
        <li class="nav-header">DASHBOARD</li>
        <li class="nav-item">
            <a href="{{ route('admin.main.index') }}" class="nav-link {{ request()->is('admin/main*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-file"></i>
                <p>Dashboard [soon]</p>
            </a>
        </li>
        <li class="nav-header">POST MANAGER</li>
        <li class="nav-item">
            <a href="{{ route('admin.post.index') }}" class="nav-link {{ request()->is('admin/post*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-file"></i>
                <p>Posts</p>
            </a>
        </li>
        <li class="nav-header">SOURCE MANAGER</li>
        <li class="nav-item">
            <a href="{{ route('admin.source.index') }}" class="nav-link {{ request()->is('admin/source*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-file"></i>
                <p>Source</p>
            </a>
        </li>
        <li class="nav-header">OFFER MANAGER</li>
        <li class="nav-item">
            <a href="{{ route('admin.offer.index') }}" class="nav-link {{ request()->is('admin/offer*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-file"></i>
                <p>Offers</p>
            </a>
        </li>
        <li class="nav-header">ACCOUNTS MANAGER</li>
        <li class="nav-item">
            <a href="{{ route('admin.user.index') }}" class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-file"></i>
                <p>Users [process]</p>
            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
