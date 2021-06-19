<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('content.index')}}">
        <div class="sidebar-brand-icon">
            <i class="fab fa-laravel"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Laravel</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if(Request::segment(2) == 'content') active @endif">
        <a class="nav-link" href="{{route('content.index')}}">
            <i class="fab fa-buffer"></i>
            <span>İçerikler</span></a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if(Request::segment(2) == 'settings') active @endif">
        <a class="nav-link" href="{{route('settings.index')}}">
            <i class="fas fa-cog"></i>
            <span>Ayarlar</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
