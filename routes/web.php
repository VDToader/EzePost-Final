<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\TransferController;
use App\Models\Plan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'plans' => Plan::query()->where('active', true)->orderBy('id')->get()->keyBy('slug'),
    ]);
})->name('home');

Route::get('/pricing', function () {
    return view('pricing', [
        'plans' => Plan::query()->where('active', true)->orderBy('id')->get()->keyBy('slug'),
    ]);
})->name('pricing');


// Static routes for EzePost navigation & footer
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::view('/features', 'features')->name('features');
Route::view('/privacy-policy', 'privacy-policy')->name('privacy-policy');
Route::view('/help-centre', 'help-centre')->name('help-centre');
Route::view('/terms-of-service', 'terms-of-service')->name('terms-of-service');
Route::view('/cookie-policy', 'cookie-policy')->name('cookie-policy');
Route::view('/refund-policy', 'refund-policy')->name('refund-policy');
Route::view('/download', 'download')->name('download');

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/transfers', [TransferController::class, 'store'])->name('transfers.store');
    Route::get('/account/summary.pdf', [PdfController::class, 'summary'])->name('account.summary.pdf');

    Route::post('/checkout/{plan}', [StripeController::class, 'checkout'])->name('stripe.checkout');
    Route::get('/checkout/success', [StripeController::class, 'success'])->name('stripe.success');
    Route::get('/checkout/cancel', [StripeController::class, 'cancel'])->name('stripe.cancel');
});

Route::post('/contact', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    return back()->with('success', 'Thank you for reaching out! Your message has been sent successfully.');
})->name('contact.send');

Route::post('/stripe/webhook', [StripeController::class, 'webhook'])
    ->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class])
    ->name('stripe.webhook');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::post('/plans/{plan}/toggle', [AdminController::class, 'togglePlan'])->name('plans.toggle');
});

