<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'TeamArena') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="auth-page">
        <div class="auth-shell">
            <a class="auth-brand" href="{{ url('/') }}" aria-label="TeamArena home">
                <span class="brand-mark" aria-hidden="true"><span></span><span></span><span></span><span></span></span>
                <span>Team<span>Arena</span></span>
            </a>

            <div class="auth-card">
                {{ $slot }}
            </div>

            <p class="auth-footer">The game starts here.</p>
        </div>
    </body>
</html>
