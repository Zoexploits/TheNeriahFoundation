<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('user_dashboard') }}">User Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('user_dashboard') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('user/dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('user_dashboard') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

            

        </ul>
    </aside>
</div>