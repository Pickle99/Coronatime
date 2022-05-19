<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('login', [LoginController::class, 'create'])->name('login.create')->middleware('guest');
Route::post('sessions', [LoginController::class, 'store'])->name('login.store');
Route::get('reset-password', [LoginController::class, 'edit'])->name('reset.password');

Route::get('register', [RegisterController::class, 'create'])->name('register.create')->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');

//test
Route::get('dashboard', [LoginController::class, 'check'])->middleware('auth');
Route::post('logout', [LoginController::class, 'see'])->middleware('auth');
