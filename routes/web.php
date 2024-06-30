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
    // return view('app');
})->name('home');

Route::get('/login',function(){
    return view('pages.auth.login');
})->name('login');
Route::get('/registration',function(){
    return view('pages.auth.registration');
})->name('registration');


Route::post('/register',[UserController::class,'register'])->name('user.registration');
Route::post('/login',[UserController::class,'login'])->name('user.login');