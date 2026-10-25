<x-layouts.app>
    <section class="menu-heading">
        <p class="app-kicker">Main menu</p>
        <h2>Welcome back, {{ auth()->user()->name }}.</h2>
        <p>Choose an area to continue with your football community.</p>
    </section>

    <nav class="permission-menu" aria-label="Available features">
        @if (auth()->user()->canAny(['create team', 'join team', 'edit team', 'delete team', 'manage team staff', 'manage team roster']))
            <section class="permission-group permission-group--teams">
                <div class="permission-group-icon" aria-hidden="true">&#9917;</div>
                <div>
                    <p class="permission-group-label">Teams</p>
                    <h3>Find your squad.</h3>
                    <p>Build, join, and manage the teams available to you.</p>
                </div>
                <a class="permission-group-link" href="{{ route('dashboard') }}">Explore teams <span aria-hidden="true">&rarr;</span></a>
            </section>
        @endif

        @if (auth()->user()->canAny(['create tournament', 'schedule tournament matches']))
            <section class="permission-group permission-group--tournaments">
                <div class="permission-group-icon" aria-hidden="true">&#9733;</div>
                <div>
                    <p class="permission-group-label">Tournaments</p>
                    <h3>Own the pitch.</h3>
                    <p>Organise competitions and keep every match moving.</p>
                </div>
                <a class="permission-group-link" href="{{ route('dashboard') }}">View tournaments <span aria-hidden="true">&rarr;</span></a>
            </section>
        @endif

        @if (auth()->user()->canAny(['submit team result', 'resolve dispute', 'correct published result']))
            <section class="permission-group permission-group--results">
                <div class="permission-group-icon" aria-hidden="true">&#10003;</div>
                <div>
                    <p class="permission-group-label">Match results</p>
                    <h3>Keep score.</h3>
                    <p>Submit results and resolve the details that matter.</p>
                </div>
                <a class="permission-group-link" href="{{ route('dashboard') }}">Manage results <span aria-hidden="true">&rarr;</span></a>
            </section>
        @endif
    </nav>

    @if (! auth()->user()->canAny([
        'create team', 'join team', 'edit team', 'delete team', 'manage team staff',
        'manage team roster', 'create tournament', 'schedule tournament matches',
        'submit team result', 'resolve dispute', 'correct published result',
    ]))
        <p class="empty-menu">No features are currently assigned to your account.</p>
    @endif
</x-layouts.app>
