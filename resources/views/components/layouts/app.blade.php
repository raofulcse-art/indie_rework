<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'TeamArena') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="app-page">
        <div class="app-shell">
            <x-app-navbar />

            <div class="app-body">
                <x-app-sidebar />

                <main class="app-main">
                    {{ $slot }}
                </main>
            </div>

            <x-app-footer />
        </div>
    </body>
</html>
