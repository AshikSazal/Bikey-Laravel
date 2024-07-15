<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\UserController;

Route::get('/signup',[UserController::class,'getSignup'])->name('user.signup');
Route::get('/login',[UserController::class,'getLogin'])->name('user.login');


Route::post('/signup',[UserController::class,'signup'])->name('user.signup');
// Route::middleware(['login.check:user'])->group(function () {
//     Route::post('/login',[UserController::class,'login'])->middleware('login.check')->name('user.login');
// });

// login.check:user in here 'user' is the parameter of that middleware as a guard
Route::post('/login',[UserController::class,'login'])->middleware('login.check:user')->name('user.login');
Route::post('/verifyOTP',[UserController::class,'verifyOTP'])->name('user.verify');

Route::get('/logout',[UserController::class,'logout'])->middleware('auth.check:user')->name('user.logout');