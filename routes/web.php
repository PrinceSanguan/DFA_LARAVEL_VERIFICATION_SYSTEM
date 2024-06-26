<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\VerificationController;
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

Route::get('/', [IndexController::class, 'index'])->name('welcome');
Route::get('auth/signup', [SignupController::class, 'create'])->name('register');
Route::post('auth/signup', [SignupController::class, 'store'])->name('register.post');
Route::post('/', [LoginController::class, 'login'])->name('login.post');

Route::get('verification/verification', [VerificationController::class, 'index'])->name('verification');
Route::post('verification/verification', [VerificationController::class, 'verify'])->name('verify.post');

// Sign-out route
Route::post('logout', function () {
  Auth::logout();
  session()->invalidate();
  session()->regenerateToken();
  
  return redirect('/');
})->name('logout');