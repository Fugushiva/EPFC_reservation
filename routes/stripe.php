<?php

use App\Http\Controllers\Stripe\StripeController;
use Illuminate\Support\Facades\Route;

Route::get('/stripe', [StripeController::class, 'index'])->name('stripe.index');
Route::post('/checkout', [StripeController::class, 'checkout'])->name('stripe.checkout');
Route::get('/success', [StripeController::class, 'success'])->name('stripe.success');
