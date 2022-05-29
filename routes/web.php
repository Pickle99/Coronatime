<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\LanguageController;
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

Route::get('language/{locale}', [LanguageController::class, 'setLocale'])->name('language');
Route::get('/', [UserController::class, 'home'])->name('home');

Route::prefix('/')->middleware('guest')->group(function () {
	Route::view('login', 'components.user.login')->name('login.view');

	Route::post('login', [AuthController::class, 'login'])->name('login');

	Route::view('register', 'components.user.register')->name('register.view');
	Route::post('register', [UserController::class, 'store'])->name('register.store');

	Route::view('forgot/password', 'components.user.forgot-password')->name('password.view');
	Route::post('forgot/password', [ResetPasswordController::class, 'reset'])->name('password.email');
	Route::view('password/{token}/reset', 'components.user.confirmation-email')->name('password.sent');
	Route::get('reset/password/{token}={email}', [ResetPasswordController::class, 'edit'])->name('password.reset');
	Route::post('reset/password/{token}', [ResetPasswordController::class, 'update'])->name('password.update');
	Route::view('forgot/password/sent', 'components.user.reset-success')->name('reset.success');
});

Route::get('dashboard', [StatisticsController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);

Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::view('email/verify', 'components.user.confirmation-email')->name('verification.notice')->middleware('auth');

Route::get('user/verify/{token}', [UserController::class, 'verifyEmail'])->name('user.verify');

Route::view('verification/success/{token}', 'components.user.verification-success')->name('verify.success');
Route::post('verification/success/{token}', [UserController::class, 'verified'])->name('verify.sign_in');
