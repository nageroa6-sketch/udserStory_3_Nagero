<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold fs-2" href="/">⚡ Presto.it</a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                            @if(auth()->user()->is_revisor)
                                <li><a class="dropdown-item" href="{{ route('revisor.dashboard') }}">Dashboard Revisore</a></li>
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" style="display:inline">
                                    @csrf
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link me-3" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registrati</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
