<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\ServicesController;

/*
|--------------------------------------------------------------------------
| services Routes
|--------------------------------------------------------------------------
|
*/





Route::get('/services',[ServicesController::class,'index'])->name('services.index');
Route::get('/services/edit',[ServicesController::class,'edit']) ;//->middleware(['auth', 'verified','isAdmin'])->name('services.edit');

 

// Route::group(['middleware' => ['auth', 'isAdmin']], function () {
//     Route::get('/services/edit',[ServicesController::class,'edit'])->name('services.edit');

// });

