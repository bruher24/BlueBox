<ul class="nav nav-pills mx-5">
    <li class="nav-item"><a href="/" class="nav-link
        @if( request()->routeIs('home') )
            active" aria-current="page"
        @else
        @endif
        ">Главная</a></li>
    <li class="nav-item"><a href="{{ route('products.index') }}" class="nav-link
        @if( request()->routeIs('products.*') )
            active" aria-current="page"
        @else
        @endif
        ">Товары</a></li>
    <li class="nav-item"><a href="{{ route('orders.index') }}" class="nav-link
        @if( request()->routeIs('orders.*') )
            active" aria-current="page"
        @else
        @endif
        ">Заказы</a></li>
</ul>
