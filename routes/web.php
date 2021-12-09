<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RankController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserLikeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('/user/{user}', [UserLikeController::class, 'index'])->name('user');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/dashboard', [DashboardController::class, 'store'])->name('dashboard');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/ranks', [RankController::class, 'index'])->name('ranks');

Route::post('/ranks/{user}/likes', [UserLikeController::class, 'store'])->name('ranks.likes');
Route::delete('/ranks/{user}/likes', [UserLikeController::class, 'destroy'])->name('ranks.likes');
