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
    <div class="container nav-wrap">
        <a class="brand" href="{{ route('home') }}">
            <span class="brand-mark">E</span>
            <span>EZE POST</span>
        </a>
        <nav class="main-nav" aria-label="Main navigation">
            <a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
            <a class="{{ request()->routeIs('pricing') ? 'active' : '' }}" href="{{ route('pricing') }}">Pricing</a>
            <a class="{{ request()->routeIs('download') ? 'active' : '' }}" href="{{ route('download') }}">Download</a>
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
        </nav>
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
    <div class="container footer-grid">
        <div>
            <a class="brand footer-brand" href="{{ route('home') }}">
                <span class="brand-mark">E</span>
                <span>EZE POST</span>
            </a>
            <p>Secure file transfer for individuals and organisations.</p>
        </div>
        <div>
            <strong>Product</strong>
            <a href="{{ route('pricing') }}">Pricing</a>
            <a href="{{ route('download') }}">Download</a>
        </div>
        <div>
            <strong>Account</strong>
            <a href="{{ route('login') }}">Log in</a>
            <a href="{{ route('register') }}">Sign up</a>
        </div>
        <div>
            <strong>Project</strong>
            <span>Industrial Consulting Project</span>
            <span>Laravel MVP</span>
        </div>
    </div>
    <div class="container copyright">© {{ date('Y') }} EZE POST. Academic project prototype.</div>
</footer>
</body>
</html>
