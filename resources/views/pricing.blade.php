@extends('layouts.app')

@section('title', 'Pricing | EZE POST')

@section('content')

<section class="page-hero pricing-hero">
    <div class="container centered">
        <span class="eyebrow">PLANS AND TOP-UP</span>

        <h1>Flexible plans for every user</h1>

        <p class="lead narrow">
            Choose the option that best suits your needs.
            Upgrade, change or manage your access from your account.
        </p>

        <div class="pricing-switch">
            <span class="active">Monthly</span>
            <span>Yearly</span>
        </div>

        <p class="pricing-note">
            Final prices and billing options are subject to client confirmation.
        </p>
    </div>
</section>


<section class="section pricing-section">
    <div class="container pricing-grid">

        <article class="pricing-card pricing-starter">
            <div class="pricing-top">
                <span class="plan-icon plan-green">🌱</span>
                <span class="plan-label">Starter</span>
            </div>

            <h2>Starter</h2>

            <p>
                Ideal for individuals getting started with secure file transfers.
            </p>

            <div class="price">
                Price to be confirmed
            </div>

            <ul>
                <li>✓ Secure transfer records</li>
                <li>✓ Personal account dashboard</li>
                <li>✓ Transfer history</li>
                <li>✓ Desktop application access</li>
            </ul>

            @auth
                <a class="button plan-button" href="{{ route('dashboard') }}">
                    View in dashboard
                </a>
            @else
                <a class="button plan-button" href="{{ route('register') }}">
                    Choose Starter
                </a>
            @endauth
        </article>


        <article class="pricing-card pricing-basic">
            <div class="pricing-top">
                <span class="plan-icon plan-blue">💼</span>
                <span class="plan-label">Basic</span>
            </div>

            <h2>Basic</h2>

            <p>
                Designed for regular users who need additional flexibility.
            </p>

            <div class="price">
                Price to be confirmed
            </div>

            <ul>
                <li>✓ Everything in Starter</li>
                <li>✓ Subscription management</li>
                <li>✓ Extended transfer history</li>
                <li>✓ Account plan management</li>
            </ul>

            @auth
                <a class="button plan-button" href="{{ route('dashboard') }}">
                    View in dashboard
                </a>
            @else
                <a class="button plan-button" href="{{ route('register') }}">
                    Choose Basic
                </a>
            @endauth
        </article>


        <article class="pricing-card featured pricing-premium">

            <div class="popular-badge">
                Recommended
            </div>

            <div class="pricing-top">
                <span class="plan-icon plan-purple">★</span>
                <span class="plan-label">Premium</span>
            </div>

            <h2>Premium</h2>

            <p>
                Advanced access for professional and higher-volume use.
            </p>

            <div class="price">
                Price to be confirmed
            </div>

            <ul>
                <li>✓ Everything in Basic</li>
                <li>✓ Advanced account options</li>
                <li>✓ Organisation-ready access</li>
                <li>✓ Premium plan features</li>
            </ul>

            @auth
                <a class="button plan-button premium-button"
                   href="{{ route('dashboard') }}">
                    View in dashboard
                </a>
            @else
                <a class="button plan-button premium-button"
                   href="{{ route('register') }}">
                    Choose Premium
                </a>
            @endauth

        </article>


        <article class="pricing-card pricing-topup">
            <div class="pricing-top">
                <span class="plan-icon plan-orange">＋</span>
                <span class="plan-label">Top-up</span>
            </div>

            <h2>Top-up</h2>

            <p>
                Add additional transfer allowance without changing your plan.
            </p>

            <div class="price">
                Price to be confirmed
            </div>

            <ul>
                <li>✓ One-off purchase option</li>
                <li>✓ No recurring plan assumed</li>
                <li>✓ Add additional allowance</li>
                <li>✓ Flexible access option</li>
            </ul>

            @auth
                <a class="button secondary plan-button"
                   href="{{ route('dashboard') }}">
                    View in dashboard
                </a>
            @else
                <a class="button secondary plan-button"
                   href="{{ route('register') }}">
                    Choose Top-up
                </a>
            @endauth
        </article>

    </div>
</section>


<section class="pricing-cta">
    <div class="container pricing-cta-inner">

        <div>
            <span class="eyebrow">EZE POST DESKTOP</span>
            <h2>Ready to start transferring securely?</h2>

            <p>
                Create your account, choose the appropriate option
                and download EZE POST for your computer.
            </p>
        </div>

        <a href="{{ route('download') }}" class="button">
            Download EZE POST
        </a>

    </div>
</section>

@endsection