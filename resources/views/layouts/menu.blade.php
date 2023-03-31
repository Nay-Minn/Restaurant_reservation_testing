<li class="nav-item">
    <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
        <i class="far fa-chart-bar"></i>
        <p>Dashboard</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('restaurants') }}" class="nav-link {{ Request::is('restaurants') ? 'active' : '' }}">
        <i class="fas fa-store"></i>
        <p>Restaurant List</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('restaurant_groups') }}" class="nav-link {{ Request::is('restaurant-groups') ? 'active' : '' }}">
        <i class="fas fa-sitemap"></i>
        <p>Restaurant Group</p>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link {{ Request::is('menu-categories') ? 'active' : '' }}">
        <i class="fas fa-list"></i>
        <p>Menu Category List</p>
    </a>
</li>

<li class="nav-item">
    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt"></i>
        <p>Sign out </p>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</li>