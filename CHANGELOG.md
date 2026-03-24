# Changelog

All notable changes to `chamikasamaraweera/laravel-adminlte-auth` will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

---

## [Unreleased]

---

## [1.0.0] — 2025-03-24

### Added

- `php artisan ui:adminlte --auth` command to scaffold all auth views
- `php artisan ui:adminlte --views` flag to publish views only
- `layouts/auth.blade.php` — AdminLTE 4 + Bootstrap 5 CDN base layout
- `auth/login.blade.php` — login form with remember me and forgot password link
- `auth/register.blade.php` — registration form with name, email, and password
- `auth/verify.blade.php` — email verification page with resend button
- `auth/passwords/email.blade.php` — forgot password form
- `auth/passwords/reset.blade.php` — reset password form with token
- Overwrite confirmation prompt when view files already exist
- Laravel 11, 12, and 13 support
- Font Awesome 6 icons on all input fields and buttons
- Bootstrap 5 `@error` / `is-invalid` validation integration

---

[Unreleased]: https://github.com/ChamikaSamaraweera/laravel-adminlte-auth/compare/v1.0.0...HEAD
[1.0.0]: https://github.com/ChamikaSamaraweera/laravel-adminlte-auth/releases/tag/v1.0.0