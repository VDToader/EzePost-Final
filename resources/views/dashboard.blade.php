@extends('layouts.app')

@section('title', 'Dashboard | EZE POST')

@section('content')

<section class="customer-dashboard">

    <div class="container">

        {{-- Dashboard header --}}
        <div class="customer-dashboard-header">

            <div>
                <span class="eyebrow">CUSTOMER AREA</span>

                <h1>
                    Welcome back, {{ $user->name }}
                </h1>

                <p class="dashboard-account-details">
                    {{ ucfirst($user->account_type) }} account

                    @if ($user->organisation_name)
                        <span>•</span>
                        {{ $user->organisation_name }}
                    @endif
                </p>
            </div>

            <div class="dashboard-header-actions">

                <a
                    class="button secondary"
                    href="{{ route('account.summary.pdf') }}"
                >
                    Download PDF summary
                </a>

            </div>

        </div>


        {{-- Stats --}}
        <div class="dashboard-stat-grid">

            <article class="dashboard-stat">

                <div class="dashboard-stat-icon dashboard-stat-blue">
                    ◈
                </div>

                <div>
                    <span>Current plan</span>

                    <strong>
                        {{ $subscription?->plan?->name ?? 'No active plan' }}
                    </strong>
                </div>

            </article>


            <article class="dashboard-stat">

                <div class="dashboard-stat-icon dashboard-stat-purple">
                    ✓
                </div>

                <div>
                    <span>Subscription status</span>

                    <strong>
                        {{ ucfirst($subscription?->status ?? 'none') }}
                    </strong>
                </div>

            </article>


            <article class="dashboard-stat">

                <div class="dashboard-stat-icon dashboard-stat-green">
                    ↗
                </div>

                <div>
                    <span>Transfer records</span>

                    <strong>
                        {{ $transfers->count() }}
                    </strong>
                </div>

            </article>

        </div>


        {{-- Main dashboard content --}}
        <div class="customer-dashboard-grid">

            {{-- Transfer history --}}
            <section class="dashboard-panel transfer-panel">

                <div class="dashboard-panel-heading">

                    <div>
                        <span class="eyebrow">
                            TRANSFER HISTORY
                        </span>

                        <h2>
                            Recent transfers
                        </h2>
                    </div>

                    <span class="dashboard-panel-count">
                        {{ $transfers->count() }} records
                    </span>

                </div>


                <div class="dashboard-table-wrap">

                    <table class="dashboard-table">

                        <thead>
                            <tr>
                                <th>File</th>
                                <th>Recipient</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($transfers as $transfer)

                                <tr>

                                    <td>

                                        <div class="file-cell">

                                            <span class="file-icon">
                                                📄
                                            </span>

                                            <div>
                                                <strong>
                                                    {{ $transfer->file_name }}
                                                </strong>

                                                @if ($transfer->file_size)
                                                    <small>
                                                        {{ number_format($transfer->file_size) }}
                                                        bytes
                                                    </small>
                                                @endif
                                            </div>

                                        </div>

                                    </td>


                                    <td>
                                        {{ $transfer->recipient }}
                                    </td>


                                    <td>

                                        <span
                                            class="
                                                dashboard-status
                                                status-{{ $transfer->status }}
                                            "
                                        >
                                            {{ ucfirst($transfer->status) }}
                                        </span>

                                    </td>


                                    <td>
                                        {{ $transfer->created_at->format('d M Y') }}
                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="4"
                                        class="empty-transfer-state"
                                    >

                                        <div class="empty-transfer-icon">
                                            ↗
                                        </div>

                                        <strong>
                                            No transfer records yet
                                        </strong>

                                        <p>
                                            Add your first transfer record
                                            using the form on this page.
                                        </p>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </section>


            {{-- Add transfer --}}
            <aside class="dashboard-panel add-transfer-panel">

                <span class="eyebrow">
                    ADD RECORD
                </span>

                <h2>
                    New transfer record
                </h2>

                <p class="dashboard-panel-description">
                    Record transfer metadata associated with your
                    EZE POST account.
                </p>


                <form
                    method="POST"
                    action="{{ route('transfers.store') }}"
                    class="dashboard-transfer-form"
                >

                    @csrf


                    <label>
                        File name

                        <input
                            type="text"
                            name="file_name"
                            placeholder="example-document.pdf"
                            required
                        >
                    </label>


                    <label>
                        File size

                        <div class="input-with-suffix">

                            <input
                                type="number"
                                min="0"
                                name="file_size"
                                placeholder="0"
                            >

                            <span>
                                bytes
                            </span>

                        </div>

                    </label>


                    <label>
                        Recipient email

                        <input
                            type="email"
                            name="recipient"
                            placeholder="recipient@example.com"
                            required
                        >
                    </label>


                    <label>
                        Status

                        <select name="status">

                            <option value="pending">
                                Pending
                            </option>

                            <option value="sent">
                                Sent
                            </option>

                            <option value="received">
                                Received
                            </option>

                            <option value="failed">
                                Failed
                            </option>

                        </select>

                    </label>


                    <button
                        class="button full dashboard-add-button"
                        type="submit"
                    >
                        Add transfer record
                    </button>

                </form>


                <p class="dashboard-form-note">
                    This website records transfer information.
                    The desktop transfer engine remains a separate workflow.
                </p>

            </aside>

        </div>


        {{-- Subscription / Plans --}}
        <section class="dashboard-panel dashboard-plans-panel">

            <div class="dashboard-panel-heading">

                <div>
                    <span class="eyebrow">
                        SUBSCRIPTIONS
                    </span>

                    <h2>
                        Plans and Top-up options
                    </h2>

                    <p class="dashboard-panel-description">
                        Review the currently available EZE POST options.
                    </p>
                </div>

                <a
                    href="{{ route('pricing') }}"
                    class="dashboard-text-link"
                >
                    View pricing →
                </a>

            </div>


            <div class="dashboard-plan-grid">

                @foreach ($plans as $plan)

                    <article
                        class="
                            dashboard-plan-card
                            {{ strtolower($plan->name) === 'premium'
                                ? 'dashboard-plan-featured'
                                : ''
                            }}
                        "
                    >

                        @if (strtolower($plan->name) === 'premium')

                            <div class="dashboard-plan-badge">
                                Recommended
                            </div>

                        @endif


                        <div class="dashboard-plan-icon">
                            @switch(strtolower($plan->name))

                                @case('starter')
                                    🌱
                                    @break

                                @case('basic')
                                    💼
                                    @break

                                @case('premium')
                                    ★
                                    @break

                                @default
                                    ＋

                            @endswitch
                        </div>


                        <h3>
                            {{ $plan->name }}
                        </h3>


                        <p>
                            {{ $plan->description }}
                        </p>


                        <strong class="dashboard-plan-price">

                            {{ $plan->price !== null
                                ? '£'.number_format((float) $plan->price, 2)
                                : 'Price TBC'
                            }}

                        </strong>


                        @if ($plan->stripe_price_id)

                            <form
                                method="POST"
                                action="{{ route('stripe.checkout', $plan) }}"
                            >
                                @csrf

                                <button
                                    class="button full"
                                    type="submit"
                                >
                                    Continue to checkout
                                </button>

                            </form>

                        @else

                            <button
                                class="button secondary full"
                                type="button"
                                disabled
                            >
                                Stripe not configured
                            </button>

                        @endif

                    </article>

                @endforeach

            </div>

        </section>


        {{-- Account summary --}}
        <section class="dashboard-account-section">

            <div>

                <span class="eyebrow">
                    ACCOUNT
                </span>

                <h2>
                    Your EZE POST account
                </h2>

                <p>
                    Download a summary containing your account,
                    subscription and transfer information.
                </p>

            </div>

            <a
                href="{{ route('account.summary.pdf') }}"
                class="button"
            >
                Download PDF summary
            </a>

        </section>

    </div>

</section>

@endsection