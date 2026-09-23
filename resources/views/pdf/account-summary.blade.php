<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>EZE POST Account Summary</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; color: #172033; font-size: 12px; }
        h1 { color: #2157e8; margin-bottom: 4px; }
        h2 { margin-top: 24px; }
        .meta { color: #64748b; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #dbe2ef; padding: 7px; text-align: left; }
        th { background: #eef3ff; }
    </style>
</head>
<body>
<h1>EZE POST</h1>
<div class="meta">Account summary generated {{ now()->format('d M Y H:i') }}</div>

<h2>Account</h2>
<p><strong>Name:</strong> {{ $user->name }}</p>
<p><strong>Email:</strong> {{ $user->email }}</p>
<p><strong>Account type:</strong> {{ ucfirst($user->account_type) }}</p>
@if ($user->organisation_name)
    <p><strong>Organisation:</strong> {{ $user->organisation_name }}</p>
@endif

<h2>Subscription</h2>
<p>
    {{ $subscription?->plan?->name ?? 'No plan' }}
    — {{ ucfirst($subscription?->status ?? 'none') }}
</p>

<h2>Recent transfer records</h2>
<table>
    <thead><tr><th>File</th><th>Recipient</th><th>Status</th><th>Date</th></tr></thead>
    <tbody>
    @forelse ($transfers as $transfer)
        <tr>
            <td>{{ $transfer->file_name }}</td>
            <td>{{ $transfer->recipient }}</td>
            <td>{{ ucfirst($transfer->status) }}</td>
            <td>{{ $transfer->created_at->format('d M Y') }}</td>
        </tr>
    @empty
        <tr><td colspan="4">No transfer records.</td></tr>
    @endforelse
    </tbody>
</table>
</body>
</html>
