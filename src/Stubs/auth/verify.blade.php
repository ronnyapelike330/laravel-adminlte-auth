@extends('layouts.auth')

@section('title', __('Verify Your Email Address') . ' — ' . config('app.name'))

@section('content')
<div class="login-box">

    <div class="login-logo">
        <a href="{{ url('/') }}"><b>{{ config('app.name') }}</b></a>
    </div>

    <div class="card card-outline card-success">
        <div class="card-header text-center">
            <p class="login-box-msg mb-0">{{ __('Verify Your Email Address') }}</p>
        </div>

        <div class="card-body">

            {{-- Success: resend confirmation --}}
            @if (session('resent'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-1"></i>
                    {{ __('A fresh verification link has been sent to your email address.') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Info message --}}
            <div class="text-center mb-4">
                <span class="fa-stack fa-2x text-success">
                    <i class="fas fa-circle fa-stack-2x opacity-25"></i>
                    <i class="fas fa-envelope fa-stack-1x"></i>
                </span>
            </div>

            <p class="text-center text-muted">
                {{ __('Before proceeding, please check your email for a verification link.') }}
            </p>

            <p class="text-center text-muted small">
                {{ __('If you did not receive the email') }},
            </p>

            {{-- Resend form --}}
            <form method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <div class="d-grid">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-paper-plane me-1"></i>
                        {{ __('Resend Verification Email') }}
                    </button>
                </div>
            </form>

        </div>

        <div class="card-footer text-center">
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-link btn-sm text-muted p-0">
                    <i class="fas fa-sign-out-alt me-1"></i>{{ __('Sign out') }}
                </button>
            </form>
        </div>
    </div>

</div>
@endsection