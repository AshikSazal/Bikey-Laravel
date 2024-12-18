<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProductController;

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

// test start
// Route::get('/', function () {
//     return redirect('/login');
// });
// Route::get('/login', function () {
//     return view('login');
// });
// Route::get('/registration', function () {
//     return view('registration');
// });
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware('auth.check');

// Route::post('/signup',[UserController::class,'signup'])->name('user.signup');
// Route::post('/login',[UserController::class,'login'])->name('user.login');
// Route::get('/logout',[UserController::class,'logout'])->name('user.logout');
// Route::post('/save-message',[ChatController::class,'saveMessage'])->middleware('auth.check:user')->name('user.save.message');
// test end


Route::post('/save-chat',[ChatController::class,'saveChat'])->middleware(['auth.check:user', 'auth.check:admin'])->name('save.message');
Route::post('/delete-chat',[ChatController::class,'deleteChat'])->middleware('auth.check:user')->name('delete.message');
Route::post('/load-chats',[ChatController::class,'loadChats'])->middleware('auth.check:user')->name('load.chats');
Route::get('/', function () {
    return view('pages.landing-page.landing-page');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
Route::get('/brand', [ProductController::class,'showAllProduct'])->name('brand');


require __DIR__.'/user.php';
require __DIR__.'/admin.php';