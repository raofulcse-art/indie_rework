<aside class="app-sidebar" aria-label="Primary navigation">
    <div class="sidebar-heading">
        <div class="account-avatar" aria-hidden="true">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
        <div>
            <p class="app-kicker">Your account</p>
            <h1>{{ auth()->user()->name }}</h1>
        </div>
    </div>

    <nav class="sidebar-navigation">
        <a class="sidebar-link sidebar-link--active" href="{{ route('dashboard') }}"><span aria-hidden="true">&#8962;</span> Dashboard</a>
        @canany(['create team', 'join team', 'edit team', 'delete team', 'manage team staff', 'manage team roster'])
            <a class="sidebar-link" href="{{ route('dashboard') }}"><span aria-hidden="true">&#9823;</span> Teams</a>
        @endcanany
        @canany(['create tournament', 'schedule tournament matches'])
            <a class="sidebar-link" href="{{ route('dashboard') }}"><span aria-hidden="true">&#9733;</span> Tournaments</a>
        @endcanany
        @canany(['submit team result', 'resolve dispute', 'correct published result'])
            <a class="sidebar-link" href="{{ route('dashboard') }}"><span aria-hidden="true">&#10003;</span> Match results</a>
        @endcanany
        <a class="sidebar-link" href="{{ route('profile.edit') }}"><span aria-hidden="true">&#9679;</span> Profile</a>
    </nav>

    <div class="sidebar-account">
        <p class="account-email">{{ auth()->user()->email }}</p>
        <a class="sidebar-profile-link" href="{{ route('profile.edit') }}">Manage profile <span aria-hidden="true">&rarr;</span></a>
    </div>
</aside>
