<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'EZE POST')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<header class="site-header">
    <div class="container nav-wrap" style="display: flex; justify-content: space-between; align-items: center;">
        
        <div style="display: flex; align-items: center; gap: 40px;">
            <a class="brand" href="{{ route('home') }}">
                <span class="brand-mark">E</span>
                <span>EZE POST</span>
            </a>

            <nav class="main-nav" aria-label="Main navigation" style="display: flex; gap: 20px;">
                <a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                <a class="{{ request()->routeIs('pricing') ? 'active' : '' }}" href="{{ route('pricing') }}">Pricing</a>
                <a class="{{ request()->routeIs('download') ? 'active' : '' }}" href="{{ route('download') }}">Download</a>
                <a class="{{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                <a class="{{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
            </nav>
        </div>

        <div class="auth-nav" style="display: flex; align-items: center; gap: 20px;">
            @auth
                <a href="{{ auth()->user()->isAdmin() ? route('admin.index') : route('dashboard') }}">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="inline-form">
                    @csrf
                    <button class="nav-link-button" type="submit">Log out</button>
                </form>
            @else
                <a href="{{ route('login') }}">Log in</a>
                <a class="button button-small" href="{{ route('register') }}">Sign up</a>
            @endauth
        </div>

    </div>
</header>

@if (session('success'))
    <div class="container alert success">{{ session('success') }}</div>
@endif

@if ($errors->any())
    <div class="container alert error">
        <strong>Please check the following:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<main>
    @yield('content')
</main>

<footer class="site-footer">
    <div class="container footer-grid" style="display: grid !important; grid-template-columns: 2fr repeat(4, 1fr) 1.5fr !important; align-items: start; gap: 1.5rem;">
        <div>
            <a class="brand footer-brand" href="{{ route('home') }}">
                <span class="brand-mark">E</span>
                <span>EZE POST</span>
            </a>
            <p>Secure file transfer for individuals and organisations.</p>
            <div style="display: flex; gap: 0.5rem; margin-top: 0.75rem;">
                <a href="#" style="background: #2563eb; color: #fff; width: 24px; height: 24px; border-radius: 4px; display: inline-flex; align-items: center; justify-content: center; font-size: 0.7rem; font-weight: bold; text-decoration: none;">in</a>
                <a href="#" style="background: #2563eb; color: #fff; width: 24px; height: 24px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-size: 0.7rem; font-weight: bold; text-decoration: none;">t</a>
                <a href="#" style="background: #2563eb; color: #fff; width: 24px; height: 24px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-size: 0.7rem; font-weight: bold; text-decoration: none;">f</a>
            </div>
        </div>
        <div>
            <strong>Product</strong>
            <a href="{{ route('pricing') }}">Pricing</a>
            <a href="{{ route('download') }}">Download</a>
            <a href="{{ route('features') }}">Features</a>
        </div>
        <div>
            <strong>Company</strong>
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('contact') }}">Contact</a>
            <a href="{{ route('privacy-policy') }}">Privacy Policy</a>
        </div>
        <div>
            <strong>Support</strong>
            <a href="{{ route('help-centre') }}">Help Centre</a>
            <a href="{{ route('terms-of-service') }}">Terms of Service</a>
        </div>
        <div>
            <strong>Legal</strong>
            <a href="{{ route('cookie-policy') }}">Cookie Policy</a>
            <a href="{{ route('refund-policy') }}">Refund Policy</a>
        </div>
        <div style="text-align: right; font-size: 0.75rem; color: #64748b; line-height: 1.4;">
            © {{ date('Y') }} EZE POST.<br>All rights reserved.
        </div>
    </div>
</footer>
</body>
</html>
