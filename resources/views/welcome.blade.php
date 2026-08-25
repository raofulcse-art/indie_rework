<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="TeamArena is the home for amateur football teams, players, and matches.">
    <title>{{ config('app.name', 'TeamArena') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="landing-page">
    <header class="site-header">
        <a class="brand" href="{{ url('/') }}" aria-label="TeamArena home">
            <span class="brand-mark" aria-hidden="true"><span></span><span></span><span></span><span></span></span>
            <span>Team<span>Arena</span></span>
        </a>

        @if (Route::has('login'))
            <nav class="site-nav" aria-label="Primary navigation">
                @auth
                    <a class="button button-outline" href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a class="button button-outline" href="{{ route('login') }}">Log in</a>
                    @if (Route::has('register'))
                        <a class="button button-primary" href="{{ route('register') }}">Register now</a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <main>
        <section class="hero" aria-labelledby="hero-title">
            <div class="hero-content">
                <p class="availability"><span></span> Live beta available</p>
                <p class="kicker">Football</p>
                <h1 id="hero-title">Find your<br> squad.<br><strong>Own the pitch.</strong></h1>
                <p class="hero-copy">The ultimate indie platform for amateur footballers. Register, find local teams, book pitches, and track your stats - all in one place.</p>

                <div class="hero-actions">
                    @guest
                        @if (Route::has('register'))
                            <a class="button button-primary button-large" href="{{ route('register') }}"><span aria-hidden="true">&rarr;</span> Create free account</a>
                        @endif
                        @if (Route::has('login'))
                            <a class="button button-outline button-large" href="{{ route('login') }}">Sign in</a>
                        @endif
                    @else
                        <a class="button button-primary button-large" href="{{ url('/dashboard') }}">Go to dashboard <span aria-hidden="true">&rarr;</span></a>
                    @endguest
                </div>
            </div>
        </section>

        <section class="proof-bar" aria-label="Community statistics">
            <div class="stat"><strong>12K<span>+</span></strong><small>Players</small></div>
            <div class="stat"><strong>840<span>+</span></strong><small>Teams</small></div>
            <p class="proof-note">Built for the game<br>between the games.</p>
        </section>
    </main>

    <footer class="site-footer">
        <p>&copy; {{ date('Y') }} <span>TeamArena</span>. All rights reserved.</p>
        <nav aria-label="Footer navigation">
            <a href="#">Privacy policy</a>
            <a href="#">Terms of service</a>
            <a href="#">Contact</a>
        </nav>
    </footer>
</body>
</html>
