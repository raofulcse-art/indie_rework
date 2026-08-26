<x-guest-layout>
    <div class="auth-heading">
        <p class="auth-kicker">One last step</p>
        <h1>Check your inbox.</h1>
        <p>{{ __('We sent a verification link to your email. Confirm it to unlock your TeamArena dashboard.') }}</p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="auth-status" role="status">
            {{ __('A fresh verification link is on its way.') }}
        </div>
    @endif

    <div class="verification-recipient">
        <span class="verification-icon" aria-hidden="true">@</span>
        <span>
            <small>Verification email sent to</small>
            <strong>{{ request()->user()->email }}</strong>
        </span>
    </div>

    <div class="verification-actions">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <button type="submit" class="auth-submit">{{ __('Resend verification link') }}</button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="auth-link verification-logout">
                {{ __('Use a different account') }}
            </button>
        </form>
    </div>
</x-guest-layout>
