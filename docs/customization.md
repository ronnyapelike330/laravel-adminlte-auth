# Customization

All views are published directly into your application's `resources/views/` directory. You own them completely — edit freely.

---

## Changing the App Name / Logo

The app name is pulled from `config('app.name')` automatically. To use an image logo instead of text, edit `resources/views/layouts/auth.blade.php` and any individual view's logo section:

```blade
{{-- Text logo (default) --}}
<div class="login-logo">
    <a href="{{ url('/') }}"><b>{{ config('app.name') }}</b></a>
</div>

{{-- Image logo --}}
<div class="login-logo">
    <a href="{{ url('/') }}">
        <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" height="50">
    </a>
</div>
```

---

## Changing Card Accent Colors

Each view uses AdminLTE's `card-outline` with a color modifier. Change the color class on the `<div class="card card-outline card-primary">` line:

| Color class | Use case |
|---|---|
| `card-primary` | Login, Register (default) |
| `card-warning` | Forgot Password (default) |
| `card-success` | Email Verify (default) |
| `card-danger` | Error states |
| `card-dark` | Dark theme |
| `card-info` | Informational |

Example — change login to dark:

```blade
<div class="card card-outline card-dark">
```

---

## Using Local Assets Instead of CDN

The default layout loads AdminLTE and Bootstrap from CDN. To use local assets via Vite:

**1. Install via npm:**

```bash
npm install bootstrap admin-lte@next @fortawesome/fontawesome-free
```

**2. In `resources/js/app.js`:**

```js
import 'bootstrap';
import 'admin-lte';
```

**3. In `resources/css/app.css`:**

```css
@import '@fortawesome/fontawesome-free/css/all.min.css';
@import 'admin-lte/dist/css/adminlte.min.css';
```

**4. Replace CDN links in `layouts/auth.blade.php`:**

```blade
{{-- Remove all CDN <link> and <script> tags --}}
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

---

## Adding Extra Fields to Register

Open `resources/views/auth/register.blade.php` and add your field before the submit button:

```blade
{{-- Phone number example --}}
<div class="mb-3">
    <div class="input-group">
        <input id="phone" type="tel" name="phone"
               value="{{ old('phone') }}"
               placeholder="{{ __('Phone Number') }}"
               class="form-control @error('phone') is-invalid @enderror">
        <div class="input-group-text">
            <span class="fas fa-phone"></span>
        </div>
        @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
```

Then add the field to your `RegisterController` (or `RegisteredUserController` for Breeze) validation and create logic.

---

## Localization

All user-facing strings are wrapped in `__()` so they are translatable. Add your translations to `lang/{locale}/auth.php` or use a package like [laravel-lang](https://github.com/Laravel-Lang/lang).

Example `lang/si/auth.php`:

```php
return [
    'failed'   => 'මෙම අක්තපත්‍ර වාර්තාවට ගැලපෙන්නේ නැත.',
    'throttle' => 'ප්‍රවේශ වීමේ උත්සාහයන් ඉතා වැඩිය. :seconds තත්පර කොටසක් අනතුරු ආ...',
];
```

---

## Adding Social Login Buttons

After the form's submit button, add your OAuth provider buttons:

```blade
<div class="text-center mt-3">
    <p class="text-muted small mb-2">— or sign in with —</p>
    <a href="{{ route('auth.google') }}" class="btn btn-outline-danger btn-sm me-1">
        <i class="fab fa-google me-1"></i> Google
    </a>
    <a href="{{ route('auth.github') }}" class="btn btn-outline-dark btn-sm">
        <i class="fab fa-github me-1"></i> GitHub
    </a>
</div>
```

Pair with [laravel/socialite](https://github.com/laravel/socialite) for the backend.