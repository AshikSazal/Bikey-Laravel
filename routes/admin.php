<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/dashboard',[AdminController::class,'getAdminLandingPage'])->name('admin.dashboard');
Route::get('/admin/login',[AdminController::class,'getAdminLogin'])->name('admin.login');