<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'getAdminLandingPage'])->middleware('auth.check:admin')->name('admin.dashboard');
    Route::get('/login', [AdminController::class, 'getAdminLogin'])->name('admin.login');
    
    Route::post('/login', [AdminController::class, 'postAdminLogin'])->middleware('auth.check:admin')->name('admin.login.submit');

    Route::get('/chat',[AdminController::class,'getAdminChat'])->middleware('auth.check:admin')->name('admin.chat');
    Route::get('/chat/{id}', [AdminController::class, 'getUserChat'])->middleware('auth.check:admin')->name('admin.chat.user');
    Route::get('/logout',[AdminController::class,'logout'])->middleware('auth.check:admin')->name('admin.logout');
});
