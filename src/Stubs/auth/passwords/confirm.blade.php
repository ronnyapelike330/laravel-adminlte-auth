@extends('layouts.auth')

@section('title', __('Confirm Password') . ' — ' . config('app.name'))

@section('content')
<div class="login-box">

    <div class="login-logo">
        <a href="{{ url('/') }}"><b>{{ config('app.name') }}</b></a>
    </div>

    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <p class="login-box-msg mb-0">{{ __('Confirm Password') }}</p>
        </div>

        <div class="card-body">
            <p class="text-center text-muted small mb-3">
                {{ __('Please confirm your password before continuing.') }}
            </p>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                {{-- Password --}}
                <div class="mb-3">
                    <div class="input-group">
                        <input id="password" type="password" name="password"
                               value="{{ $password ?? old('password') }}"
                               placeholder="{{ __('Password') }}"
                               required autofocus autocomplete="current-password"
                               class="form-control @error('password') is-invalid @enderror">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-key me-1"></i> {{ __('Confirm Password') }}
                    </button>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('login') }}" class="small">
                        <i class="fas fa-arrow-left me-1"></i> {{ __('Back to Login') }}
                    </a>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection