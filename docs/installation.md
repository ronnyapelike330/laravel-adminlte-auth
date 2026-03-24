# Installation

## Requirements

Before installing, make sure your environment meets these requirements:

| Requirement | Version |
|---|---|
| PHP | ^8.2 |
| Laravel | ^11.0 \| ^12.0 \| ^13.0 |
| Composer | ^2.x |
| laravel/ui | ^4.x |

---

## Step 1 — Install via Composer

```bash
composer require chamikasamaraweera/laravel-adminlte-auth
```

The package auto-discovers its service provider via Laravel's package discovery. No manual registration needed.

---

## Step 2 — Install laravel/ui

This package publishes views only. Auth controllers and routes are provided by `laravel/ui`:

```bash
composer require laravel/ui
php artisan ui:auth
```

> Skip this step if you already have auth controllers and routes in your project.

---

## Step 3 — Scaffold AdminLTE auth views

```bash
php artisan ui:adminlte --auth
```

This publishes the following files to your `resources/views/` directory:

```
resources/views/
├── layouts/
│   └── auth.blade.php
└── auth/
    ├── login.blade.php
    ├── register.blade.php
    ├── verify.blade.php
    └── passwords/
        ├── email.blade.php
        └── reset.blade.php
```

> If any of these files already exist, you will be asked to confirm before they are overwritten.

---

## Step 4 — Configure auth routes

In `routes/web.php`, ensure your auth routes are registered. For full feature support including email verification:

```php
Auth::routes(['verify' => true]);
```

For basic auth without verification:

```php
Auth::routes();
```

---

## Step 5 — Run migrations

If you haven't already:

```bash
php artisan migrate
```

---

## Step 6 — Visit your app

Navigate to `/login` in your browser. You should see the AdminLTE styled login page.

---

## Local Development Install

If you are working on the package itself and want to test it inside a Laravel app:

```json
// In your Laravel app's composer.json
"repositories": [
    {
        "type": "path",
        "url": "/absolute/path/to/laravel-adminlte-auth"
    }
],
"require": {
    "chamikasamaraweera/laravel-adminlte-auth": "dev-main"
}
```

Then set `"minimum-stability": "dev"` and `"prefer-stable": true` in your app's `composer.json`, and run:

```bash
composer update
```