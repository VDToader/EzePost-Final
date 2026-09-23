@extends('layouts.app')

@section('title', 'Admin | EZE POST')

@section('content')

<section class="admin-dashboard">

    <div class="container">

        <div class="admin-dashboard-header">

            <div>
                <span class="eyebrow">ADMIN AREA</span>

                <h1>EZE POST administration</h1>

                <p>
                    Manage plans and review recent account and transfer activity.
                </p>
            </div>

            <a
                href="{{ route('dashboard') }}"
                class="button secondary"
            >
                Customer dashboard
            </a>

        </div>


        {{-- Statistics --}}
        <div class="admin-stat-grid">

            <article class="admin-stat-card">

                <div class="admin-stat-icon admin-blue">
                    👥
                </div>

                <div>
                    <span>Total users</span>

                    <strong>
                        {{ $userCount }}
                    </strong>
                </div>

            </article>


            <article class="admin-stat-card">

                <div class="admin-stat-icon admin-purple">
                    ◈
                </div>

                <div>
                    <span>Subscriptions</span>

                    <strong>
                        {{ $subscriptionCount }}
                    </strong>
                </div>

            </article>


            <article class="admin-stat-card">

                <div class="admin-stat-icon admin-green">
                    ↗
                </div>

                <div>
                    <span>Transfer records</span>

                    <strong>
                        {{ $transferCount }}
                    </strong>
                </div>

            </article>

        </div>


        {{-- Plans --}}
        <section class="admin-panel admin-plans-panel">

            <div class="admin-panel-heading">

                <div>
                    <span class="eyebrow">PLAN MANAGEMENT</span>

                    <h2>Plans and Top-up</h2>

                    <p>
                        Enable or disable the options currently available
                        to EZE POST customers.
                    </p>
                </div>

            </div>


            <div class="admin-plan-grid">

                @foreach ($plans as $plan)

                    <article
                        class="
                            admin-plan-card
                            {{ strtolower($plan->name) === 'premium'
                                ? 'admin-plan-featured'
                                : ''
                            }}
                        "
                    >

                        <div class="admin-plan-top">

                            <div class="admin-plan-icon">

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


                            <span
                                class="
                                    admin-status-pill
                                    {{ $plan->active
                                        ? 'admin-status-active'
                                        : 'admin-status-disabled'
                                    }}
                                "
                            >
                                {{ $plan->active ? 'Active' : 'Disabled' }}
                            </span>

                        </div>


                        <h3>
                            {{ $plan->name }}
                        </h3>


                        <p>
                            {{ $plan->description }}
                        </p>


                        <div class="admin-plan-meta">

                            <span>Billing</span>

                            <strong>
                                {{ $plan->billing_type === 'one_off'
                                    ? 'One-off'
                                    : ucfirst($plan->billing_type)
                                }}
                            </strong>

                        </div>


                        <div class="admin-plan-meta">

                            <span>Price</span>

                            <strong>
                                {{ $plan->price !== null
                                    ? '£'.number_format((float) $plan->price, 2)
                                    : 'TBC'
                                }}
                            </strong>

                        </div>


                        <form
                            method="POST"
                            action="{{ route('admin.plans.toggle', $plan) }}"
                        >
                            @csrf

                            <button
                                class="
                                    button
                                    full
                                    {{ $plan->active ? 'secondary' : '' }}
                                "
                                type="submit"
                            >
                                {{ $plan->active
                                    ? 'Disable plan'
                                    : 'Enable plan'
                                }}
                            </button>

                        </form>

                    </article>

                @endforeach

            </div>

        </section>


        {{-- Users and Transfers --}}
        <div class="admin-main-grid">


            {{-- Recent users --}}
            <section class="admin-panel">

                <div class="admin-panel-heading">

                    <div>
                        <span class="eyebrow">USERS</span>

                        <h2>Recent users</h2>
                    </div>

                    <span class="admin-count-badge">
                        Latest {{ $users->count() }}
                    </span>

                </div>


                <div class="admin-user-list">

                    @forelse ($users as $user)

                        <div class="admin-user-row">

                            <div class="admin-user-info">

                                <div class="admin-user-avatar">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>


                                <div>

                                    <strong>
                                        {{ $user->name }}
                                    </strong>

                                    <span>
                                        {{ $user->email }}
                                    </span>

                                    <small>
                                        {{ ucfirst($user->account_type) }}

                                        @if ($user->organisation_name)
                                            • {{ $user->organisation_name }}
                                        @endif
                                    </small>

                                </div>

                            </div>


                            <span
                                class="
                                    admin-role
                                    {{ $user->role === 'admin'
                                        ? 'admin-role-admin'
                                        : ''
                                    }}
                                "
                            >
                                {{ ucfirst($user->role) }}
                            </span>

                        </div>

                    @empty

                        <div class="admin-empty">
                            No users found.
                        </div>

                    @endforelse

                </div>

            </section>


            {{-- Summary panel --}}
            <aside class="admin-panel admin-summary-panel">

                <span class="eyebrow">OVERVIEW</span>

                <h2>Platform summary</h2>

                <p>
                    Current database activity for the EZE POST MVP.
                </p>


                <div class="admin-summary-item">

                    <span>Users</span>

                    <strong>
                        {{ $userCount }}
                    </strong>

                </div>


                <div class="admin-summary-item">

                    <span>Subscriptions</span>

                    <strong>
                        {{ $subscriptionCount }}
                    </strong>

                </div>


                <div class="admin-summary-item">

                    <span>Transfers</span>

                    <strong>
                        {{ $transferCount }}
                    </strong>

                </div>


                <div class="admin-summary-item">

                    <span>Available plans</span>

                    <strong>
                        {{ $plans->where('active', true)->count() }}
                    </strong>

                </div>


                <p class="admin-summary-note">
                    Additional reporting and management functions can be
                    added once final admin requirements are confirmed.
                </p>

            </aside>

        </div>


        {{-- Recent transfers --}}
        <section class="admin-panel admin-transfers-panel">

            <div class="admin-panel-heading">

                <div>
                    <span class="eyebrow">TRANSFER ACTIVITY</span>

                    <h2>Recent transfer records</h2>
                </div>

                <span class="admin-count-badge">
                    Latest {{ $transfers->count() }}
                </span>

            </div>


            <div class="admin-table-wrap">

                <table class="admin-table">

                    <thead>

                        <tr>
                            <th>User</th>
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

                                    <div class="admin-table-user">

                                        <strong>
                                            {{ $transfer->user->name }}
                                        </strong>

                                        <small>
                                            {{ $transfer->user->email }}
                                        </small>

                                    </div>

                                </td>


                                <td>
                                    {{ $transfer->file_name }}
                                </td>


                                <td>
                                    {{ $transfer->recipient }}
                                </td>


                                <td>

                                    <span
                                        class="
                                            admin-transfer-status
                                            admin-transfer-{{ $transfer->status }}
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
                                    colspan="5"
                                    class="admin-empty-table"
                                >
                                    No transfer records yet.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </section>

    </div>

</section>

@endsection