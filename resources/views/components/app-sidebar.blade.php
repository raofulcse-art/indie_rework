<aside class="app-sidebar" aria-label="Account details">
    <div class="account-avatar" aria-hidden="true">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
    <p class="app-kicker">Account details</p>
    <h1>{{ auth()->user()->name }}</h1>
    <p class="account-email">{{ auth()->user()->email }}</p>

    <div class="account-roles">
        <span class="account-label">Role{{ auth()->user()->roles->count() === 1 ? '' : 's' }}</span>
        @foreach (auth()->user()->getRoleNames() as $role)
            <span class="role-tag">{{ ucfirst($role) }}</span>
        @endforeach
    </div>

    <a class="sidebar-profile-link" href="{{ route('profile.edit') }}">Manage profile <span aria-hidden="true">&rarr;</span></a>
</aside>
