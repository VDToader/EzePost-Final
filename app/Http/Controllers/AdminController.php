<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Subscription;
use App\Models\Transfer;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        return view('admin.index', [
            'userCount' => User::count(),
            'transferCount' => Transfer::count(),
            'subscriptionCount' => Subscription::count(),
            'users' => User::latest()->limit(10)->get(),
            'transfers' => Transfer::with('user')->latest()->limit(10)->get(),
            'plans' => Plan::orderBy('id')->get(),
        ]);
    }

    public function togglePlan(Plan $plan): RedirectResponse
    {
        $plan->update(['active' => ! $plan->active]);

        return back()->with('success', $plan->name.' plan updated.');
    }
}
