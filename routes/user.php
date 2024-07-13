<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\UserController;

Route::get('/signup',[UserController::class,'getSignup'])->name('user.signup');
Route::get('/login',[UserController::class,'getLogin'])->name('user.login');


Route::post('/signup',[UserController::class,'signup'])->name('user.signup');
Route::middleware(['auth:user'])->group(function () {
    Route::post('/login',[UserController::class,'login'])->name('user.login');
});
Route::post('/verifyOTP',[UserController::class,'verifyOTP'])->name('user.verify');