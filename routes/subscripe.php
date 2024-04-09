<?php
namespace App\Http\Controllers\cards;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\SubscribeController;  
use App\Http\Controllers\subscriptions\SubscriptionCheckerController;

/*
|--------------------------------------------------------------------------
| subscripe  Routes
|--------------------------------------------------------------------------
|
*/
//business 

// subscripe 
Route::post('/subscribe', [SubscribeController::class, 'store']); 

Route::get('test/sub',[SubscriptionCheckerController::class,'index']);

