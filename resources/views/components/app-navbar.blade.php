<header class="app-navbar">
    <a class="brand" href="{{ route('dashboard') }}" aria-label="TeamArena main menu">
        <span class="brand-mark" aria-hidden="true"><span></span><span></span><span></span><span></span></span>
        <span>Team<span>Arena</span></span>
    </a>

    <div class="app-navbar-meta">
        <span class="app-status"><span aria-hidden="true"></span> Account active</span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="app-logout">Log out</button>
        </form>
    </div>
</header>
