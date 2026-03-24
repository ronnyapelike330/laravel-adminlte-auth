@extends('layouts.auth')

@section('title', __('Register') . ' — ' . config('app.name'))

@section('content')
<div class="register-box">

    <div class="register-logo">
        <a href="{{ url('/') }}">
            <b>{{ config('app.name') }}</b>
        </a>
    </div>

    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <p class="register-box-msg mb-0">{{ __('Register a new membership') }}</p>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Name --}}
                <div class="mb-3">
                    <div class="input-group">
                        <input id="name"
                               type="text"
                               name="name"
                               value="{{ old('name') }}"
                               placeholder="{{ __('Full name') }}"
                               required autofocus autocomplete="name"
                               class="form-control @error('name') is-invalid @enderror">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <div class="input-group">
                        <input id="email"
                               type="email"
                               name="email"
                               value="{{ old('email') }}"
                               placeholder="{{ __('Email') }}"
                               required autocomplete="username"
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

                {{-- Confirm Password --}}
                <div class="mb-3">
                    <div class="input-group">
                        <input id="password_confirmation"
                               type="password"
                               name="password_confirmation"
                               placeholder="{{ __('Confirm Password') }}"
                               required autocomplete="new-password"
                               class="form-control">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-user-plus me-1"></i> {{ __('Register') }}
                    </button>
                </div>

            </form>
        </div>

        @if (Route::has('login'))
            <div class="card-footer text-center">
                <a href="{{ route('login') }}" class="small">
                    {{ __('Already have an account? Sign in') }}
                </a>
            </div>
        @endif
    </div>

</div>
@endsection