@extends('layouts.app')

@section('title', 'Sign up | EZE POST')

@section('content')

<section class="auth-section register-page">
    <div class="container auth-grid auth-grid-refined">

        <div class="auth-info auth-visual-panel">

            <span class="eyebrow">CREATE YOUR ACCOUNT</span>

            <h1>Join EZE POST</h1>

            <p class="lead">
                Create an account to access subscription or Top-up options
                and manage your EZE POST transfer records.
            </p>

            <div class="signup-illustration" aria-hidden="true">

                <div class="signup-cloud">
                    ☁️
                </div>

                <div class="signup-folder">
                    📁
                </div>

                <div class="signup-check">
                    ✓
                </div>

            </div>

            <ul class="check-list refined-check-list">
                <li>Secure file-transfer account access</li>
                <li>Choose a subscription or Top-up option</li>
                <li>View and manage transfer records</li>
            </ul>

        </div>


        <form
            class="form-card register-form-card"
            method="POST"
            action="{{ route('register') }}"
        >
            @csrf

            <span class="eyebrow">GET STARTED</span>

            <h2>Create an account</h2>

            <p class="muted register-intro">
                Fill in your details below to create your EZE POST account.
            </p>


            <div class="register-account-type">

                <label>
                    <input
                        type="radio"
                        name="account_type"
                        value="individual"
                        {{ old('account_type', 'individual') === 'individual' ? 'checked' : '' }}
                    >
                    <span>Individual</span>
                </label>

                <label>
                    <input
                        type="radio"
                        name="account_type"
                        value="organisation"
                        {{ old('account_type') === 'organisation' ? 'checked' : '' }}
                    >
                    <span>Organisation</span>
                </label>

            </div>


            <label>
                Full name

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Enter your full name"
                    required
                >
            </label>


            <div
                id="organisation-name-group"
                class="organisation-name-group"
            >
                <label>
                    Organisation name

                    <span class="field-note">
                        Required for organisation accounts
                    </span>

                    <input
                        type="text"
                        name="organisation_name"
                        value="{{ old('organisation_name') }}"
                        placeholder="Enter organisation name"
                    >
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
                >
            </label>


            <label>
                Password

                <div class="password-field">
                    <input
                        id="register-password"
                        type="password"
                        name="password"
                        placeholder="Create a password"
                        required
                    >

                    <button
                        type="button"
                        class="password-toggle"
                        onclick="
                            const input = document.getElementById('register-password');
                            input.type = input.type === 'password' ? 'text' : 'password';
                            this.textContent = input.type === 'password' ? 'Show' : 'Hide';
                        "
                    >
                        Show
                    </button>
                </div>
            </label>


            <label>
                Confirm password

                <div class="password-field">
                    <input
                        id="register-password-confirmation"
                        type="password"
                        name="password_confirmation"
                        placeholder="Confirm your password"
                        required
                    >

                    <button
                        type="button"
                        class="password-toggle"
                        onclick="
                            const input = document.getElementById('register-password-confirmation');
                            input.type = input.type === 'password' ? 'text' : 'password';
                            this.textContent = input.type === 'password' ? 'Show' : 'Hide';
                        "
                    >
                        Show
                    </button>
                </div>
            </label>


            <label class="checkbox-row terms-row">
                <input
                    type="checkbox"
                    name="terms"
                    value="1"
                    required
                >

                <span>
                    I agree to the Terms of Service and Privacy Policy
                </span>
            </label>


            <button class="button full register-submit" type="submit">
                Sign up
            </button>


            <p class="form-foot">
                Already have an account?

                <a href="{{ route('login') }}">
                    Log in
                </a>
            </p>

        </form>

    </div>
</section>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const typeInputs = document.querySelectorAll(
            'input[name="account_type"]'
        );

        const organisationGroup = document.getElementById(
            'organisation-name-group'
        );

        const organisationInput = organisationGroup.querySelector('input');

        function updateOrganisationField() {
            const selected = document.querySelector(
                'input[name="account_type"]:checked'
            );

            const isOrganisation =
                selected && selected.value === 'organisation';

            organisationGroup.classList.toggle(
                'active',
                isOrganisation
            );

            organisationInput.required = isOrganisation;
        }

        typeInputs.forEach(function (input) {
            input.addEventListener(
                'change',
                updateOrganisationField
            );
        });

        updateOrganisationField();
    });
</script>

@endsection