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
    <a href="{{route('menu_categories')}}" class="nav-link {{ Request::is('menu-categories') ? 'active' : '' }}">
        <i class="fas fa-list"></i>
        <p>Menu Category List</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('payment_method')}}" class="nav-link {{ Request::is('payment-method') ? 'active' : '' }}">
        <p>Payment Method</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('discount_type')}}" class="nav-link {{ Request::is('discount_type') ? 'active' : '' }}">
        <p>Discount Type</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('discount_group')}}" class="nav-link {{ Request::is('discount_group') ? 'active' : '' }}">
        <p>Discount Group</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('menu')}}" class="nav-link {{ Request::is('menu') ? 'active' : '' }}">
        <i class="fas fa-list"></i>
        <p>Menu</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('table')}}" class="nav-link {{ Request::is('table') ? 'active' : '' }}">
        <p>Table</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('discount')}}" class="nav-link {{ Request::is('discount') ? 'active' : '' }}">
        <p>Discount</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('order')}}" class="nav-link {{ Request::is('order') ? 'active' : '' }}">
        <p>Order</p>
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