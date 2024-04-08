<?php
namespace App\Http\Controllers\cards;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Business\BusinessUserController;

/*
|--------------------------------------------------------------------------
| Business  Routes
|--------------------------------------------------------------------------
|
*/
//business 

Route::get('business/registration',[BusinessUserController::class,'index'])->name('business.registration');
Route::post('business/registration/store',[BusinessUserController::class,'store'])->name('business.registration.store');




