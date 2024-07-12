<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.landing-page.landing-page');
})->name('home');

Route::get('/signup',[UserController::class,'getSignup'])->name('user.signup');
Route::get('/login',[UserController::class,'getLogin'])->name('user.login');


Route::post('/signup',[UserController::class,'registration'])->name('user.signup');
Route::post('/login',[UserController::class,'login'])->name('user.login');
Route::post('/verifyOTP',[UserController::class,'verifyOTP'])->name('user.verify');