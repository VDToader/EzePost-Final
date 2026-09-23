@extends('layouts.app')

@section('title', 'Download | EZE POST')

@section('content')

<section class="download-hero">
    <div class="container download-hero-grid">

        <div>
            <span class="eyebrow">EZE POST DESKTOP APPLICATION</span>

            <h1>Download EZE POST</h1>

            <p class="lead">
                Get the desktop application and manage your secure
                file-transfer activity through EZE POST.
            </p>

            <div class="download-benefits">

                <div>
                    <span class="download-benefit-icon">🛡️</span>
                    <strong>Secure</strong>
                    <p>Account-based access and protected workflows.</p>
                </div>

                <div>
                    <span class="download-benefit-icon">⚡</span>
                    <strong>Fast</strong>
                    <p>Designed for simple and efficient transfer management.</p>
                </div>

                <div>
                    <span class="download-benefit-icon">☁️</span>
                    <strong>Reliable</strong>
                    <p>Keep your transfer activity organised in one account.</p>
                </div>

            </div>
        </div>

        <div class="download-illustration" aria-hidden="true">
            <div class="download-laptop">
                <div class="download-screen">
                    <span class="download-app-logo">E</span>
                    <strong>EZE POST</strong>
                </div>
            </div>

            <div class="download-circle">
                ↓
            </div>
        </div>

    </div>
</section>


<section class="section download-platform-section">
    <div class="container centered">

        <span class="eyebrow">DOWNLOAD</span>

        <h2>Choose your platform</h2>

        <p class="lead narrow">
            Installer files will be connected when the final
            download links are confirmed by the client.
        </p>


        <div class="platform-grid">

            <article class="platform-card">

                <div class="platform-icon windows-icon">
                    ⊞
                </div>

                <h3>Windows</h3>

                <p>
                    Download EZE POST for compatible Windows computers.
                </p>

                <button
                    class="button platform-button disabled-button"
                    type="button"
                    disabled
                >
                    Download for Windows
                </button>

                <small>
                    Installer link to be confirmed by the client.
                </small>

            </article>


            <article class="platform-card">

                <div class="platform-icon apple-icon">
                    ●
                </div>

                <h3>macOS</h3>

                <p>
                    Download EZE POST for compatible Apple computers.
                </p>

                <button
                    class="button platform-button disabled-button"
                    type="button"
                    disabled
                >
                    Download for macOS
                </button>

                <small>
                    Installer link to be confirmed by the client.
                </small>

            </article>


            <article class="platform-card">

                <div class="platform-icon linux-icon">
                    ♙
                </div>

                <h3>Linux</h3>

                <p>
                    Download EZE POST for supported Linux distributions.
                </p>

                <button
                    class="button platform-button disabled-button"
                    type="button"
                    disabled
                >
                    Download for Linux
                </button>

                <small>
                    Installer link to be confirmed by the client.
                </small>

            </article>

        </div>
    </div>
</section>


<section class="section soft">
    <div class="container">

        <div class="how-download-works">

            <div>
                <span class="eyebrow">HOW IT WORKS</span>
                <h2>Simple account-based access</h2>

                <p>
                    Download and install the EZE POST desktop application.
                    After signing in, your account provides access to the
                    services available for your plan.
                </p>
            </div>

            <div class="download-flow">

                <div class="flow-item">
                    <span>1</span>
                    <strong>Create account</strong>
                </div>

                <div class="flow-arrow">→</div>

                <div class="flow-item">
                    <span>2</span>
                    <strong>Install EZE POST</strong>
                </div>

                <div class="flow-arrow">→</div>

                <div class="flow-item">
                    <span>3</span>
                    <strong>Sign in</strong>
                </div>

            </div>

        </div>
    </div>
</section>


<section class="download-help">
    <div class="container download-help-inner">

        <div>
            <span class="eyebrow">NEED HELP?</span>

            <h2>Need help getting started?</h2>

            <p>
                Installation guidance and support information can be added
                when the final Help Centre content is supplied.
            </p>
        </div>

        @guest
            <a href="{{ route('register') }}" class="button secondary">
                Create an account
            </a>
        @else
            <a href="{{ route('dashboard') }}" class="button secondary">
                Go to dashboard
            </a>
        @endguest

    </div>
</section>

@endsection