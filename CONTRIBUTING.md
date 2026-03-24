# Contributing

Thank you for considering contributing to `laravel-adminlte-auth`! All contributions are welcome — bug fixes, new features, documentation improvements, and more.

---

## Code of Conduct

Please be respectful and constructive in all interactions. This project follows a simple rule: treat others as you'd like to be treated.

---

## How to Contribute

### Reporting Bugs

1. Search [existing issues](https://github.com/ChamikaSamaraweera/laravel-adminlte-auth/issues) to avoid duplicates.
2. Open a new issue with the **Bug Report** template.
3. Include your Laravel version, PHP version, and steps to reproduce.

### Suggesting Features

1. Open an issue with the **Feature Request** template.
2. Describe the use case clearly — what problem does it solve?
3. If possible, sketch out the proposed API or command signature.

### Submitting a Pull Request

**1. Fork and clone the repo:**

```bash
git clone https://github.com/YOUR-USERNAME/laravel-adminlte-auth.git
cd laravel-adminlte-auth
```

**2. Create a feature branch:**

```bash
git checkout -b feat/my-feature
# or
git checkout -b fix/my-bug-fix
```

**3. Install dependencies:**

```bash
composer install
```

**4. Make your changes**, following the coding standards below.

**5. Test your changes** by symlinking or path-requiring the package in a local Laravel app:

```json
"repositories": [
    { "type": "path", "url": "../laravel-adminlte-auth" }
],
"require": {
    "chamikasamaraweera/laravel-adminlte-auth": "dev-main"
}
```

**6. Commit using a clear message:**

```bash
git commit -m "feat: add two-factor auth view stub"
git commit -m "fix: correct card class on reset password view"
```

**7. Push and open a PR** against the `stable` branch.

---

## Coding Standards

- Follow **PSR-12** for PHP code style.
- Use **Laravel conventions** — service providers, artisan commands, Blade templates.
- Keep Blade stubs clean — no inline `<style>` blocks, no hardcoded content beyond sensible defaults.
- Use `__()` for all user-facing strings to support localization.
- Keep the `UiCommand` lean — it publishes files, nothing more.

---

## Branch Strategy

| Branch | Purpose |
|---|---|
| `stable` | Latest stable release — all PRs target here |
| `dev` | Active development, experimental features |
| `feat/*` | Feature branches |
| `fix/*` | Bug fix branches |

---

## Releasing (Maintainer Notes)

1. Update `CHANGELOG.md` under a new version heading.
2. Tag the release: `git tag v1.x.x && git push --tags`
3. GitHub Actions will handle Packagist sync automatically (once configured).

---

## Questions?

Open a [discussion](https://github.com/ChamikaSamaraweera/laravel-adminlte-auth/discussions) or reach out via the issue tracker.