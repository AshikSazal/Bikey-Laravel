<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'getAdminLandingPage'])->name('admin.dashboard');
    Route::get('/login', [AdminController::class, 'getAdminLogin'])->name('admin.login');
    
    Route::post('/login', [AdminController::class, 'postAdminLogin'])->name('admin.login.submit');
});
