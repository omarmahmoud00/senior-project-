<?php 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; 
// use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\AdminAuthenticated;
use App\Http\Controllers\Event\EventController;

/*
|--------------------------------------------------------------------------
| Admin  Routes
|--------------------------------------------------------------------------
|
*/
Route::middleware('guest')->group(function () {
   
    Route::get('/admin/login', [AdminController::class, 'create'])->name('login');
    Route::post('/admin/login/enter', [AdminController::class, 'store'])->name('admin.login');
});

Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.index'); //->middleware('is_BusinessUser')

Route::post('/admin/logout', [AdminController::class, 'destroy'])
->name('admin.logout');

// Route::get('/admin/login',[AdminController::class,'loginAdmin']);
Route::middleware('auth:is_BusinessUser')->group(function () {
   
    Route::get('all/event/Reservation',[EventController::class,'index'])->name('event.index');
    Route::get('create/event/Reservation',[EventController::class,'create'])->name('event.create');
    Route::post('insert/event/Reservation',[EventController::class,'insert'])->name('event.insert');
});

