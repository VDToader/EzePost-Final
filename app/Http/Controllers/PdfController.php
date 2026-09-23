<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PdfController extends Controller
{
    public function summary(Request $request): Response
    {
        $user = $request->user();

        $subscription = $user->subscriptions()->with('plan')->latest()->first();
        $transfers = $user->transfers()->latest()->limit(50)->get();

        return Pdf::loadView('pdf.account-summary', compact('user', 'subscription', 'transfers'))
            ->download('eze-post-account-summary.pdf');
    }
}
