<nav class="navbar custom-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('user.index') }}">
            <span class="brand-name">Userapp</span>
        </a>

        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('user.index') }}"
               class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}">
                User
            </a>

            <a href="{{ route('user.create') }}" class="btn btn-add">
                + Tambah User
            </a>
        </div>
    </div>
</nav>