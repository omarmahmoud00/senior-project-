<?php

// use App\Http\Controllers\userRegister\NewUserController;
 
use Illuminate\Support\Facades\Route;
 
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SubscribeController;
use App\Http\Subscribes\Subscribe; 
use App\Models\EventReservation;


 
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    // return view('test');
    return view('userProfile.index');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/Login', function () {
    return view('userLayouts.Login');
})->name('Login');

Route::get('/test', function () {
    return "tesssssssssssssssss";
})->name('test');

Route::get('testSub',[SubscribeController::class,'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
 

Route::get('/test-model', function () {
    $event = new EventReservation();
    dd($event);
});








require 'subscripe.php';

require 'business.php';

require 'stripe.php';

require 'services.php';
 
require 'cards.php';
require 'admin.php';
require __DIR__.'/auth.php';




// Route::post('userStore',[NewUserController::class,'store'])->name('userStore');
// Route::post('userStore', [NewUserController::class, 'store'])->name('userStore');

// Route::post('userStore', [RegisteredUserController::class, 'store'])->name('userStore');


