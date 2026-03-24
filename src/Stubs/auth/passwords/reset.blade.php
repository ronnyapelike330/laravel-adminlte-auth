@extends('layouts.auth')

@section('title', __('Reset Password') . ' — ' . config('app.name'))

@section('content')
<div class="login-box">

    <div class="login-logo">
        <a href="{{ url('/') }}"><b>{{ config('app.name') }}</b></a>
    </div>

    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <p class="login-box-msg mb-0">{{ __('Reset Your Password') }}</p>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                {{-- Email --}}
                <div class="mb-3">
                    <div class="input-group">
                        <input id="email" type="email" name="email"
                               value="{{ $email ?? old('email') }}"
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

                {{-- New Password --}}
                <div class="mb-3">
                    <div class="input-group">
                        <input id="password" type="password" name="password"
                               placeholder="{{ __('New Password') }}"
                               required autocomplete="new-password"
                               class="form-control @error('password') is-invalid @enderror">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Confirm New Password --}}
                <div class="mb-3">
                    <div class="input-group">
                        <input id="password_confirmation" type="password"
                               name="password_confirmation"
                               placeholder="{{ __('Confirm New Password') }}"
                               required autocomplete="new-password"
                               class="form-control">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-key me-1"></i> {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection