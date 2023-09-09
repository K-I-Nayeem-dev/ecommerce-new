<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

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

Auth::routes();
//Home Route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Home Route

//Profile Routes
Route::post('/profile/photo/upload', [App\Http\Controllers\HomeController::class, 'profile_photo_upload']);

Route::post('/cover/photo/upload', [App\Http\Controllers\HomeController::class, 'cover_photo_upload']);

Route::post('/profile/password/changed', [App\Http\Controllers\HomeController::class, 'password_changed']);

Route::post('/profile/Named/changed', [App\Http\Controllers\HomeController::class, 'name_changed']);

Route::post('/profile/Email/changed', [App\Http\Controllers\HomeController::class, 'email_changed']);

Route::post('/profile/phone/number/add', [App\Http\Controllers\HomeController::class, 'phone_add']);

Route::post('/profile/phone/number/update', [App\Http\Controllers\HomeController::class, 'phone_number_update']);

Route::post('/profile/phone/otp/check', [App\Http\Controllers\HomeController::class, 'phone_otp_check']);

Route::get('/profile/phone/verify', [App\Http\Controllers\HomeController::class, 'phone_verify']);

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'profile'])->name('profile');
//Profile Routes

//Frontend Routes
Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('index');
Route::get('/about', [App\Http\Controllers\FrontendController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\FrontendController::class, 'contact'])->name('contact');
Route::get('/account', [App\Http\Controllers\FrontendController::class, 'account'])->name('account');
//FrontEnd Routes

//Customer Routes
Route::post('/customer/account', [App\Http\Controllers\CustomerController::class, 'customerreg'])->name('customerreg');
//Customer Routes

//Seller Routes
Route::post('/seller/account', [App\Http\Controllers\SellerController::class, 'sellerreg'])->name('sellerreg');
Route::get('/seller', [App\Http\Controllers\SellerController::class, 'seller'])->name('seller');
//Seller Routes

//Login Routes
Route::get('/login/account', [App\Http\Controllers\LoginController::class, 'login'])->name('accountlogin');
Route::post('/login/accounts', [App\Http\Controllers\LoginController::class, 'accounts_login'])->name('accounts_login');
//Login Routes
