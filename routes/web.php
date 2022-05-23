<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\StatisticsController;
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
//sessions
Route::get('language/{locale}', [SessionsController::class, 'setLocale'])->name('language');

Route::get('login', [AuthController::class, 'create'])->name('login.create')->middleware('guest');
Route::post('sessions', [AuthController::class, 'store'])->name('login.store')->middleware('guest');
Route::get('dashboard', [StatisticsController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('register', [UserController::class, 'create'])->name('register.create')->middleware('guest');
Route::post('register', [UserController::class, 'store'])->name('register.store')->middleware('guest');
Route::get('email/verify', [UserController::class, 'verifyEmail'])->name('verification.notice')->middleware('auth');
Route::get('email/verify/{id}/{hash}', [UserController::class, 'verified'])->name('verification.verify')->middleware(['auth', 'signed']);

Route::get('forgot-password', [ResetController::class, 'forgot'])->name('password.request')->middleware('guest');
Route::post('forgot-password', [ResetController::class, 'reset'])->name('password.email')->middleware('guest');
Route::get('verify-sent', [ResetController::class, 'sent'])->name('password.sent')->middleware('guest');
Route::get('/reset-password/{token}={email}', [ResetController::class, 'edit'])->name('password.reset')->middleware('guest');
Route::post('/reset-password', [ResetController::class, 'update'])->name('password.update')->middleware('guest');

//test
