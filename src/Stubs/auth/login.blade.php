@extends('layouts.auth')

@section('title', __('Login') . ' — ' . config('app.name'))

@section('content')
<div class="login-box">

    {{-- Logo --}}
    <div class="login-logo">
        <a href="{{ url('/') }}">
            <b>{{ config('app.name') }}</b>
        </a>
    </div>

    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <p class="login-box-msg mb-0">{{ __('Sign in to start your session') }}</p>
        </div>

        <div class="card-body">

            {{-- Session Status --}}
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-3">
                    <div class="input-group">
                        <input id="email"
                               type="email"
                               name="email"
                               value="{{ old('email') }}"
                               placeholder="{{ __('Email') }}"
                               required autofocus autocomplete="username"
                               class="form-control @error('email') is-invalid @enderror">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <div class="input-group">
                        <input id="password"
                               type="password"
                               name="password"
                               placeholder="{{ __('Password') }}"
                               required autocomplete="current-password"
                               class="form-control @error('password') is-invalid @enderror">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Remember + Forgot --}}
                <div class="d-flex justify-content-between mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                               name="remember" id="remember"
                               {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="small">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-sign-in-alt me-1"></i> {{ __('Sign In') }}
                    </button>
                </div>
            </form>

        </div>

        @if (Route::has('register'))
            <div class="card-footer text-center">
                <a href="{{ route('register') }}" class="small">
                    {{ __("Don't have an account? Register") }}
                </a>
            </div>
        @endif
    </div>

</div>
@endsection