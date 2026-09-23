<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();

        $transfers = $user->transfers()->latest()->limit(20)->get();
        $subscription = $user->subscriptions()
            ->with('plan')
            ->whereIn('status', ['active', 'pending'])
            ->latest()
            ->first();

        $plans = Plan::query()->where('active', true)->orderBy('id')->get();

        return view('dashboard', compact('user', 'transfers', 'subscription', 'plans'));
    }
}
