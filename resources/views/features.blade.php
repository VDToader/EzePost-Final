@extends('layouts.app')

@section('title', 'Features | EZE POST')

@section('content')
<section class="hero">
    <div class="container">
        <span class="eyebrow">PRODUCT FEATURES</span>
        <h1>EZE POST Features</h1>
        <p class="lead">Everything you need for secure and efficient file transfer management.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="feature-grid">
            <article class="card feature-card">
                <div class="icon">🔒</div>
                <div>
                    <h3>End-to-End Encryption</h3>
                    <p>Files are protected during transfer and stored securely in chunks.</p>
                </div>
            </article>
            <article class="card feature-card">
                <div class="icon">⚡</div>
                <div>
                    <h3>Fast Transfer Speed</h3>
                    <p>Optimized data delivery for both large and small transfers.</p>
                </div>
            </article>
            <article class="card feature-card">
                <div class="icon">💻</div>
                <div>
                    <h3>Cross-Platform Support</h3>
                    <p>Desktop application available for Windows, macOS, and Linux.</p>
                </div>
            </article>
        </div>
    </div>
</section>
@endsection