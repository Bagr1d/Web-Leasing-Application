<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ asset('images/LOGOL.png') }}" alt="Logo" style="height: 50px;">
    </a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="{{ route('cars.index') }}">Cars</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('offers.index') }}">Offers</a></li>
            @auth
                @if(!Auth::user()->is_admin)
                    <li class="nav-item"><a class="nav-link" href="{{ route('cart.index') }}">My Leasings</a></li>
                @endif
                @if(Auth::user()->is_admin)
                    <li class="nav-item"><a class="nav-link" href="{{ route('cart.manage') }}">New Contracts</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contracts.index') }}">Contracts</a></li>
                @endif
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </li>
            @else
                <li class="nav-item"><a class="nav-link"  href="{{ route('login') }}">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
            @endauth
        </ul>
    </div>
</nav>
