@extends('layouts.app')

@section('title', 'EZE POST | Secure File Transfer')

@section('content')

<section class="hero">
    <div class="container hero-grid">
        <div>
            <span class="eyebrow">
                SECURE TRANSFER FOR INDIVIDUALS AND ORGANISATIONS
            </span>

            <h1>Secure File Transfer Made Simple</h1>

            <p class="lead">
                Send, track and manage file transfers through a secure,
                reliable and easy-to-use EZE POST account.
            </p>

            <div class="button-row">
                <a class="button" href="{{ route('register') }}">
                    Sign up
                </a>

                <a class="button secondary" href="{{ route('download') }}">
                    Download EZE POST
                </a>
            </div>

            <p class="muted">
                Available for Windows, macOS and Linux.
            </p>
        </div>

        <div class="hero-art" aria-hidden="true">
            <div class="hero-file hero-file-one">📄</div>
            <div class="laptop left-laptop">▣</div>
            <div class="shield">🔒</div>
            <div class="laptop right-laptop">▣</div>
            <div class="hero-file hero-file-two">📁</div>
        </div>
    </div>
</section>


<section class="section">
    <div class="container">

        <div class="feature-grid">

            <article class="card feature-card">
                <div class="icon">🛡️</div>

                <div>
                    <h3>Encrypted transfers</h3>
                    <p>
                        Account controls and server-side validation help
                        provide a safer transfer-management workflow.
                    </p>
                </div>
            </article>

            <article class="card feature-card">
                <div class="icon">⚡</div>

                <div>
                    <h3>Fast and reliable</h3>
                    <p>
                        Quickly access transfer records, subscription
                        information and account functionality.
                    </p>
                </div>
            </article>

            <article class="card feature-card">
                <div class="icon">👥</div>

                <div>
                    <h3>Built for everyone</h3>
                    <p>
                        Create either an Individual or Organisation account
                        using the same EZE POST platform.
                    </p>
                </div>
            </article>

        </div>
    </div>
</section>


<section class="section soft">
    <div class="container centered">

        <span class="eyebrow">HOW IT WORKS</span>

        <h2>Get started in three simple steps</h2>

        <p class="lead narrow">
            Create your account, choose the appropriate plan and
            start managing your EZE POST transfer activity.
        </p>

        <div class="steps">

            <div class="step-card">
                <span>01</span>
                <strong>Create your account</strong>
                <p>
                    Register as an Individual or Organisation user.
                </p>
            </div>

            <div class="step-card">
                <span>02</span>
                <strong>Choose your plan</strong>
                <p>
                    Review Starter, Basic, Premium or Top-up options.
                </p>
            </div>

            <div class="step-card">
                <span>03</span>
                <strong>Download EZE POST</strong>
                <p>
                    Choose your desktop platform and manage transfer records
                    from your online account.
                </p>
            </div>

        </div>
    </div>
</section>


<section class="section">
    <div class="container centered">

        <span class="eyebrow">PRICING</span>

        <h2>Flexible plans for every user</h2>

        <p class="lead narrow">
            Choose from subscription plans or Top-up access.
            Final commercial prices remain subject to client confirmation.
        </p>

        <div class="home-pricing-grid">

            <article class="home-plan-card">
                <div class="plan-icon">🌱</div>
                <h3>Starter</h3>
                <p>For individuals getting started with secure transfers.</p>
                <strong>Price to be confirmed</strong>
            </article>

            <article class="home-plan-card">
                <div class="plan-icon">💼</div>
                <h3>Basic</h3>
                <p>For regular users who need more flexibility.</p>
                <strong>Price to be confirmed</strong>
            </article>

            <article class="home-plan-card featured-home-plan">
                <div class="plan-icon">★</div>
                <h3>Premium</h3>
                <p>Advanced features for professional transfer activity.</p>
                <strong>Price to be confirmed</strong>
            </article>

            <article class="home-plan-card">
                <div class="plan-icon">＋</div>
                <h3>Top-up</h3>
                <p>Add extra transfer allowance when required.</p>
                <strong>Price to be confirmed</strong>
            </article>

        </div>

        <div class="button-row center">
            <a class="button secondary" href="{{ route('pricing') }}">
                View all pricing options
            </a>
        </div>

    </div>
</section>


<section class="home-cta">
    <div class="container home-cta-inner">

        <div>
            <span class="eyebrow">READY TO GET STARTED?</span>
            <h2>Start transferring securely with EZE POST</h2>
            <p>
                Create your account, choose a plan and download
                the desktop application for your platform.
            </p>
        </div>

        <div class="button-row">
            <a class="button" href="{{ route('register') }}">
                Create account
            </a>

            <a class="button secondary" href="{{ route('download') }}">
                Download EZE POST
            </a>
        </div>

    </div>
</section>

@endsection