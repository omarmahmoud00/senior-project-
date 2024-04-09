<?php
namespace App\Http\Controllers\cards;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;

/*
|--------------------------------------------------------------------------
| Cards Routes
|--------------------------------------------------------------------------
|
*/







Route::get('/cards/{name}', [CardController::class, 'index'])->name('card.index');
Route::get('/cards', [CardController::class, 'test'])->name('card.test');
 
 