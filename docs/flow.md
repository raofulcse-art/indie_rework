# Application flow

This document traces how the current Laravel application moves through its files.
Update it whenever a code change alters an entry point, dependency, data path,
rendering path, or build path.

## Request lifecycle

```text
Browser request
    -> public/index.php
    -> bootstrap/app.php
    -> routes/web.php or routes/auth.php
    -> middleware and controller/closure
    -> request validation, model/database work, or authorization
    -> Blade view in resources/views/
    -> Vite-built CSS/JS assets in public/build/
    -> HTML response
```

Laravel bootstraps the application from `public/index.php`. The application is
configured in `bootstrap/app.php`, which registers the web routes, console routes,
and health endpoint. Web route definitions live in `routes/web.php`; authentication
routes are loaded from `routes/auth.php`.

## Current web routes

### Public home

`GET /` is defined in `routes/web.php`. It returns the `welcome` Blade view, which
is rendered from `resources/views/welcome.blade.php`. The welcome page uses the
styles registered through `resources/css/welcome.css`.

### Dashboard

`GET /dashboard` is defined in `routes/web.php` and requires `auth` and `verified`
middleware. The route returns `resources/views/dashboard.blade.php`.

The dashboard:

1. Uses the authenticated user supplied by Laravel's authentication layer.
2. Checks the user's permissions with `canAny(...)`.
3. Shows the Teams, Tournaments, and Match results sections only when the relevant
   permissions are present.
4. Shows the empty state when no supported permission is assigned.
5. Uses the application layout and dashboard stylesheet for the final response.

### Profile

The authenticated profile routes in `routes/web.php` delegate to
`App\Http\Controllers\ProfileController`:

- `GET /profile` opens the edit form.
- `PATCH /profile` validates and saves profile changes.
- `DELETE /profile` removes the account.

The associated request validation classes live under `app/Http/Requests/`, and the
profile templates live under `resources/views/profile/`.

### Authentication

`routes/web.php` loads `routes/auth.php`. Authentication requests flow through the
controllers and request classes under `app/Http/Controllers/` and
`app/Http/Requests/`, then render the templates under `resources/views/auth/`.

## View and asset flow

Blade components and layouts under `resources/views/components/` and
`resources/views/layouts/` provide shared page structure. Feature views compose those
shared pieces and may reference named routes defined in `routes/web.php` or
`routes/auth.php`.

Vite is configured in `vite.config.js`. Its input list includes:

- `resources/css/app.css`
- `resources/css/welcome.css`
- `resources/css/dashboard.css`
- `resources/js/app.js`

`resources/js/app.js` loads `resources/js/bootstrap.js`, starts Alpine.js, and is
compiled by Vite into `public/build/`. Blade layouts reference the built assets using
Laravel's Vite integration.

## Data and authorization flow

```text
Route/controller
    -> Form Request validation (when applicable)
    -> Eloquent model in app/Models/
    -> migration-defined database schema in database/migrations/
    -> database connection from config/database.php
```

Migrations define the executable schema. `database/database.sql` is a design
reference, not the migration runner. Seed data enters through
`database/seeders/DatabaseSeeder.php` and related factories under
`database/factories/`.

Authorization combines Laravel authentication, application policies/controllers,
and Spatie Permission roles and permissions. The intended split between global
permissions and team-scoped membership is documented in
`docs/decisions/0002-authorization-strategy.md`.

## Change tracing checklist

When changing code, trace and update the affected path in this order:

1. Identify the route, command, job, view, asset entry point, or migration that
   starts the behavior.
2. Follow the next file that validates, authorizes, transforms, persists, or renders
   the data.
3. Update this document with the changed path and update `docs/descions.md` with
   the decision and tradeoffs.
4. Add or update the narrowest relevant automated test.
