<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;

Route::get('/signup',[UserController::class,'getSignup'])->middleware('guest:user')->name('user.signup');
Route::get('/login',[UserController::class,'getLogin'])->middleware('guest:user')->name('user.login');
Route::get('/reset-password',[UserController::class,'getResetPassword'])->middleware('guest:user')->name('user.reset.password');


Route::post('/signup',[UserController::class,'signup'])->name('user.signup');
// Route::middleware(['login.check:user'])->group(function () {
//     Route::post('/login',[UserController::class,'login'])->middleware('login.check')->name('user.login');
// });

// login.check:user in here 'user' is the parameter of that middleware as a guard
Route::post('/login',[UserController::class,'login'])->middleware('login.check:user')->name('user.login');
Route::post('/verifyOTP',[UserController::class,'verifyOTP'])->name('user.verify');

Route::get('/logout',[UserController::class,'logout'])->middleware('auth.check:user')->name('user.logout');

Route::post('/reset-password-email',[UserController::class,'resetPasswordEmail'])->middleware('guest:user')->name('reset.password.email');
Route::post('/reset-password-code',[UserController::class,'resetPasswordCode'])->middleware('guest:user')->name('reset.password.code');
Route::post('/reset-password',[UserController::class,'resetPassword'])->middleware('guest:user')->name('reset.password');

// Messaging
// Route::post('/save-message',[ChatController::class,'saveMessage'])->middleware('auth.check:user')->name('user.save.message');
// Route::post('/broadcasting/auth', function () {
//     return Auth::guard('user')->user();
// })->middleware('auth.check:user');