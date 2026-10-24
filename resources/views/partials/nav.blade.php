{{-- Navigation shared by all four pages. routeIs() marks the current page. --}}
<header class="topbar">
    <div class="container topbar__inner">
        <a href="{{ route('home') }}" class="brand">
            <span class="brand__mark">S</span>
            <span class="brand__name">Sari<strong>POS</strong></span>
        </a>

        <nav class="nav" aria-label="Main navigation">
            <a href="{{ route('home') }}" class="nav__link {{ request()->routeIs('home') ? 'is-active' : '' }}">Home</a>
            <a href="{{ route('about') }}" class="nav__link {{ request()->routeIs('about') ? 'is-active' : '' }}">About</a>
            <a href="{{ route('customers.index') }}" class="nav__link {{ request()->routeIs('customers.*') ? 'is-active' : '' }}">Customers</a>
            <a href="{{ route('users.index') }}" class="nav__link {{ request()->routeIs('users.*') ? 'is-active' : '' }}">Users</a>
        </nav>
    </div>
</header>
