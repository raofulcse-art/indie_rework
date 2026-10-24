<x-app-layout>
    <section class="menu-heading">
        <p class="app-kicker">Main menu</p>
        <h2>Choose your next move.</h2>
        <p>Access the parts of TeamArena available to your account.</p>
    </section>

    <nav class="permission-menu" aria-label="Available features">
        @can('create team')
            <a class="permission-link" href="{{ route('dashboard') }}"><span>Create team</span><span aria-hidden="true">&rarr;</span></a>
        @endcan
        @can('join team')
            <a class="permission-link" href="{{ route('dashboard') }}"><span>Join team</span><span aria-hidden="true">&rarr;</span></a>
        @endcan
        @can('edit team')
            <a class="permission-link" href="{{ route('dashboard') }}"><span>Edit team</span><span aria-hidden="true">&rarr;</span></a>
        @endcan
        @can('delete team')
            <a class="permission-link" href="{{ route('dashboard') }}"><span>Delete team</span><span aria-hidden="true">&rarr;</span></a>
        @endcan
        @can('manage team staff')
            <a class="permission-link" href="{{ route('dashboard') }}"><span>Manage team staff</span><span aria-hidden="true">&rarr;</span></a>
        @endcan
        @can('manage team roster')
            <a class="permission-link" href="{{ route('dashboard') }}"><span>Manage team roster</span><span aria-hidden="true">&rarr;</span></a>
        @endcan
        @can('create tournament')
            <a class="permission-link" href="{{ route('dashboard') }}"><span>Create tournament</span><span aria-hidden="true">&rarr;</span></a>
        @endcan
        @can('schedule tournament matches')
            <a class="permission-link" href="{{ route('dashboard') }}"><span>Schedule tournament matches</span><span aria-hidden="true">&rarr;</span></a>
        @endcan
        @can('submit team result')
            <a class="permission-link" href="{{ route('dashboard') }}"><span>Submit team result</span><span aria-hidden="true">&rarr;</span></a>
        @endcan
        @can('resolve dispute')
            <a class="permission-link" href="{{ route('dashboard') }}"><span>Resolve dispute</span><span aria-hidden="true">&rarr;</span></a>
        @endcan
        @can('correct published result')
            <a class="permission-link" href="{{ route('dashboard') }}"><span>Correct published result</span><span aria-hidden="true">&rarr;</span></a>
        @endcan
    </nav>

    @if (! auth()->user()->getAllPermissions()->isNotEmpty())
        <p class="empty-menu">No features are currently assigned to your account.</p>
    @endif
</x-app-layout>
