<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('admin.dashboard') }}">
            <span class="align-middle">Admin Panel</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('admin.projects.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.projects.index') }}">
                    <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Projects</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('admin.contacts.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.contacts.index') }}">
                    <i class="align-middle" data-feather="message-square"></i> <span class="align-middle">Contact</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->routeIs('admin.profile.show') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.profile.show') }}">
                    <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Profile Setting</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-cta">
            <div class="sidebar-cta-content">
                <div class="d-grid">
                    <a href="{{ route('logout') }}" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="align-middle me-1" data-feather="log-out"></i>Log out
                        <form action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
