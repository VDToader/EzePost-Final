@extends('layouts.app')

@section('title', 'Log in | EZE POST')

@section('content')

<section class="auth-section login-page">
    <div class="container auth-grid auth-grid-refined">

        <div class="auth-info auth-visual-panel">

            <span class="eyebrow">WELCOME BACK</span>

            <h1>Welcome back!</h1>

            <p class="lead">
                Log in to manage your EZE POST account,
                transfer records and subscription information.
            </p>

            <div class="auth-illustration" aria-hidden="true">

                <div class="auth-laptop">
                    <div class="auth-screen">
                        <span class="auth-user-icon">👤</span>
                    </div>
                </div>

                <div class="auth-lock">
                    🔒
                </div>

                <div class="auth-cloud">
                    ☁️
                </div>

            </div>

            <ul class="check-list refined-check-list">
                <li>Secure account access</li>
                <li>View your transfer history</li>
                <li>Manage your subscription or Top-up</li>
            </ul>

        </div>


        <form
            class="form-card login-form-card"
            method="POST"
            action="{{ route('login') }}"
        >
            @csrf

            <span class="eyebrow">ACCOUNT ACCESS</span>

            <h2>Log in to EZE POST</h2>

            <p class="muted login-intro">
                Enter your details to access your account.
            </p>


            <div class="login-account-type">
                <label>
                    <input
                        type="radio"
                        name="login_account_type"
                        value="individual"
                        checked
                    >
                    <span>Individual</span>
                </label>

                <label>
                    <input
                        type="radio"
                        name="login_account_type"
                        value="organisation"
                    >
                    <span>Organisation</span>
                </label>
            </div>


            <label>
                Email address

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter your email address"
                    required
                    autofocus
                >
            </label>


            <label>
                Password

                <div class="password-field">
                    <input
                        id="login-password"
                        type="password"
                        name="password"
                        placeholder="Enter your password"
                        required
                    >

                    <button
                        type="button"
                        class="password-toggle"
                        onclick="
                            const input = document.getElementById('login-password');
                            input.type = input.type === 'password' ? 'text' : 'password';
                            this.textContent = input.type === 'password' ? 'Show' : 'Hide';
                        "
                    >
                        Show
                    </button>
                </div>
            </label>


            <div class="login-options">

                <label class="checkbox-row remember-row">
                    <input
                        type="checkbox"
                        name="remember"
                        value="1"
                    >
                    <span>Remember me</span>
                </label>

                <span class="forgot-password-placeholder">
                    Forgot your password?
                </span>

            </div>


            <button class="button full login-submit" type="submit">
                Log in
            </button>


            <p class="form-foot">
                Don't have an account?
                <a href="{{ route('register') }}">
                    Sign up
                </a>
            </p>

        </form>

    </div>
</section>

@endsection