<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Stripe\Webhook;
use Symfony\Component\HttpFoundation\Response;

class StripeController extends Controller
{
    public function checkout(Request $request, Plan $plan): RedirectResponse
    {
        if (! $plan->active || ! $plan->stripe_price_id) {
            return back()->withErrors([
                'payment' => 'Stripe checkout is not configured for this plan yet.',
            ]);
        }

        $secret = config('services.stripe.secret');

        if (! $secret) {
            return back()->withErrors([
                'payment' => 'Stripe test credentials are not configured.',
            ]);
        }

        Stripe::setApiKey($secret);

        $session = Session::create([
            'mode' => $plan->billing_type === 'one_off' ? 'payment' : 'subscription',
            'line_items' => [[
                'price' => $plan->stripe_price_id,
                'quantity' => 1,
            ]],
            'success_url' => route('stripe.success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('stripe.cancel'),
            'customer_email' => $request->user()->email,
            'metadata' => [
                'user_id' => (string) $request->user()->id,
                'plan_id' => (string) $plan->id,
            ],
        ]);

        Subscription::updateOrCreate(
            [
                'user_id' => $request->user()->id,
                'plan_id' => $plan->id,
                'status' => 'pending',
            ],
            [
                'stripe_session_id' => $session->id,
                'starts_at' => null,
                'ends_at' => null,
            ]
        );

        return redirect()->away($session->url);
    }

    public function success(): RedirectResponse
    {
        return redirect()->route('dashboard')->with(
            'success',
            'Payment returned successfully. The webhook will confirm the subscription.'
        );
    }

    public function cancel(): RedirectResponse
    {
        return redirect()->route('pricing')->withErrors([
            'payment' => 'Checkout was cancelled.',
        ]);
    }

    public function webhook(Request $request): Response
    {
        $secret = config('services.stripe.webhook_secret');

        if (! $secret) {
            return response('Webhook secret not configured.', 503);
        }

        try {
            $event = Webhook::constructEvent(
                $request->getContent(),
                (string) $request->header('Stripe-Signature'),
                $secret
            );
        } catch (\Throwable $e) {
            return response('Invalid webhook.', 400);
        }

        if ($event->type === 'checkout.session.completed') {
            $session = $event->data->object;
            $userId = $session->metadata->user_id ?? null;
            $planId = $session->metadata->plan_id ?? null;

            if ($userId && $planId && User::find($userId) && Plan::find($planId)) {
                Subscription::updateOrCreate(
                    ['stripe_session_id' => $session->id],
                    [
                        'user_id' => $userId,
                        'plan_id' => $planId,
                        'status' => 'active',
                        'starts_at' => now(),
                    ]
                );
            }
        }

        return response('OK', 200);
    }
}
