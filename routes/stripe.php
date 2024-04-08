<?php
namespace App\Http\Controllers\stripes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeController; 

/*
|--------------------------------------------------------------------------
| Stripe Routes
|--------------------------------------------------------------------------
|
*/


Route::get('/stripe', [StripeController::class, 'index'])->name('stripe.index');
Route::post('/stripe/payment', [StripeController::class, 'payment'])->name('stripe.payment');

Route::get('stripe/success',[StripeController::class,'success'])->name('stripe.success');
Route::get('stripe/cancel',[StripeController::class,'cancel'])->name('stripe.cancel');

 