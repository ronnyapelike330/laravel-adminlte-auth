@extends('layouts.auth')

@section('title', __('Forgot Password') . ' — ' . config('app.name'))

@section('content')
<div class="login-box">

    <div class="login-logo">
        <a href="{{ url('/') }}"><b>{{ config('app.name') }}</b></a>
    </div>

    <div class="card card-outline card-warning">
        <div class="card-header text-center">
            <p class="login-box-msg mb-0">{{ __('Forgot your password?') }}</p>
        </div>

        <div class="card-body">

            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <p class="text-center text-muted small mb-3">
                {{ __('Enter your email to receive a password reset link.') }}
            </p>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-3">
                    <div class="input-group">
                        <input id="email" type="email" name="email"
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

                <div class="d-grid mb-2">
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-paper-plane me-1"></i> {{ __('Send Reset Link') }}
                    </button>
                </div>
            </form>
        </div>

        <div class="card-footer text-center">
            <a href="{{ route('login') }}" class="small">
                <i class="fas fa-arrow-left me-1"></i> {{ __('Back to Login') }}
            </a>
        </div>
    </div>

</div>
@endsection

