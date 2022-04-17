<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\SettingsController;

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

//Register
Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

//Login
Route::post('/login', [AuthController::class, 'authentication'])->name('auth.login');

//Profile
Route::get('/profile/{id}', [UserController::class, 'index'])->name('profile.index');

//Dashboard
Route::get('/profile/{id}/dashboard', [UserController::class, 'dashboard'])->name('profile.dashboard');

//Product
Route::post('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');

//Messages
Route::get('/messages', [ConversationController::class, 'messages'])->middleware('auth')->name('messages');

//Settings
Route::get('/settings', [SettingsController::class, 'index'])->middleware('auth')->name('settings.index');