@extends('layouts.app')

@section('title', 'About EZE POST | Secure File Transfer')

@section('content')

<!-- hero section -->
<section class="hero">
    <div class="container hero-grid">
        <div>
            <span class="eyebrow">
                OUR STORY
            </span>

            <h1>About EZE POST</h1>

            <p class="lead">
                Secure file transfer for individuals and organisations.
            </p>

            <p class="muted" style="margin-bottom: 2rem; max-width: 500px;">
                EZE POST is a secure file transfer platform designed to help individuals and organisations send, receive and manage files safely. We make file sharing simple, reliable and secure, so you can focus on what matters.
            </p>

            <div class="button-row">
                <a class="button" href="{{ route('register') }}">
                    Get started
                </a>

                <a class="button secondary" href="{{ route('download') }}">
                    Download EZE POST
                </a>
            </div>
        </div>

        <div class="hero-art" aria-hidden="true">
            <div class="shield" style="font-size: 4rem;">☁️</div>
        </div>
    </div>
</section>

<!-- key principles section -->
<section class="section soft">
    <div class="container">
        <div class="feature-grid">

            <article class="card feature-card">
                <div class="icon">🛡️</div>
                <div>
                    <h3>Secure by design</h3>
                    <p>
                        Your files are encrypted and protected at every step, giving you complete peace of mind.
                    </p>
                </div>
            </article>

            <article class="card feature-card">
                <div class="icon">👤</div>
                <div>
                    <h3>Easy to use</h3>
                    <p>
                        A simple, intuitive experience for sending and receiving files in just a few clicks.
                    </p>
                </div>
            </article>

            <article class="card feature-card">
                <div class="icon">👥</div>
                <div>
                    <h3>Built for organisations</h3>
                    <p>
                        Flexible options for teams and businesses with the security and control you need.
                    </p>
                </div>
            </article>

        </div>
    </div>
</section>

<!-- offers section -->
<section class="section">
    <div class="container centered">

        <h2>What EZE POST offers</h2>

        <p class="lead narrow" style="margin-bottom: 2.5rem;">
            Everything you need for secure and efficient file transfer.
        </p>

        <div class="feature-grid">

            <article class="card feature-card">
                <div class="icon">🔒</div>
                <div>
                    <h3>Encrypted transfers</h3>
                    <p>
                        Files are encrypted in transit and at rest, ensuring your data stays private and secure.
                    </p>
                </div>
            </article>

            <article class="card feature-card">
                <div class="icon">⚙️</div>
                <div>
                    <h3>Flexible subscriptions</h3>
                    <p>
                        Choose a plan that fits your needs, whether you are an individual or part of an organisation.
                    </p>
                </div>
            </article>

            <article class="card feature-card">
                <div class="icon">💻</div>
                <div>
                    <h3>Access anywhere</h3>
                    <p>
                        Use EZE POST on Windows, macOS and Linux to send and receive files securely across all your devices.
                    </p>
                </div>
            </article>

        </div>

    </div>
</section>

@endsection