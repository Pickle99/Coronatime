<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('language/{locale}', [LanguageController::class, 'update'])->name('language');

Route::get('login', [AuthController::class, 'create'])->name('login.create')->middleware('guest');
Route::post('sessions', [AuthController::class, 'store'])->name('login.store');
Route::get('forgot-password', [ResetController::class, 'forgot'])->name('password.request')->middleware('guest');
Route::post('forgot-password', [ResetController::class, 'reset'])->name('password.email')->middleware('guest');
Route::get('verify-sent', [ResetController::class, 'sent'])->middleware('guest')->name('password.sent');

Route::get('register', [UserController::class, 'create'])->name('register.create')->middleware(['guest']);
Route::post('register', [UserController::class, 'store'])->name('register.store');
Route::get('email/verify', [UserController::class, 'verifyEmail'])->middleware('auth')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [UserController::class, 'verified'])->middleware(['auth', 'signed'])->name('verification.verify');

//test
Route::get('dashboard', [AuthController::class, 'check'])->middleware(['auth', 'verified']);
Route::post('logout', [AuthController::class, 'see'])->middleware('auth');

Route::get('/reset-password/{token}={email}', [ResetController::class, 'edit'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [ResetController::class, 'update'])->middleware('guest')->name('password.update');
