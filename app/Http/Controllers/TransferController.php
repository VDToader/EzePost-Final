<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'file_name' => ['required', 'string', 'max:255'],
            'file_size' => ['nullable', 'integer', 'min:0'],
            'recipient' => ['required', 'email', 'max:255'],
            'status' => ['required', 'in:pending,sent,received,failed'],
        ]);

        $request->user()->transfers()->create([
            ...$validated,
            'sent_at' => $validated['status'] === 'sent' ? now() : null,
        ]);

        return back()->with('success', 'Transfer record added.');
    }
}
