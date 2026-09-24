@extends('layouts.app')

@section('title', 'Help Centre | EZE POST')

@section('content')
<section class="hero">
    <div class="container">
        <span class="eyebrow">SUPPORT</span>
        <h1>Help Centre</h1>
        <p class="lead">Guides, tutorials, and frequently asked questions.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="feature-grid">
            <article class="card">
                <h3>Getting Started</h3>
                <p class="muted">Learn how to create an account and install the desktop app.</p>
            </article>
            <article class="card">
                <h3>Account & Billing</h3>
                <p class="muted">Manage your subscription, Top-up credits, and invoicing.</p>
            </article>
            <article class="card">
                <h3>Troubleshooting</h3>
                <p class="muted">Solutions for common connectivity and file upload questions.</p>
            </article>
        </div>
    </div>
</section>
@endsection