# Security Policy

## Supported Versions

| Version | Supported |
|---|---|
| 1.x | ✅ Active support |

Older versions are not supported. Please upgrade to the latest release.

---

## Reporting a Vulnerability

**Please do not open a public GitHub issue for security vulnerabilities.**

If you discover a security issue in this package, please report it responsibly by emailing:

**chamika@teaminfinity.lk**

Include as much detail as possible:

- A clear description of the vulnerability
- Steps to reproduce
- Potential impact
- Your suggested fix (optional but appreciated)

You can expect an acknowledgement within **48 hours** and a resolution or status update within **7 days**.

---

## Scope

This package publishes Blade view stubs and registers an Artisan command. Security considerations relevant to this package include:

- CSRF token presence on all form stubs
- No raw output of unescaped user data in views
- No package-level routes or middleware
- No database interaction

If you find a view stub that outputs unescaped data (`{!! !!}` where `{{ }}` should be used) or is missing `@csrf`, that qualifies as a security issue.

---

## Out of Scope

- Vulnerabilities in AdminLTE, Bootstrap, or Font Awesome (report to those projects directly)
- Vulnerabilities in Laravel's auth system itself (report to [laravel/framework](https://github.com/laravel/framework/security))