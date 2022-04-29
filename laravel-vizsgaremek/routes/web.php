<?php

use App\Http\Controllers\HomeController;
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

//Home
Route::get('/', [HomeController::class, 'index'])->name('homepage');

//Register
Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

//Login
Route::post('/login', [AuthController::class, 'authentication'])->name('auth.login');

//Logout
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('auth.logout');

//Profile
Route::get('/profile/{id}', [UserController::class, 'index'])->name('profile.index');
Route::get('/profile/{id}/upload', [UserController::class, 'upload'])->middleware('auth')->name('profile.upload');

//Dashboard
Route::get('/profile/{id}/dashboard', [UserController::class, 'dashboard'])->name('profile.dashboard');

//Settings
Route::get('/settings', [SettingsController::class, 'index'])->middleware('auth')->name('settings.index');

//Product
Route::post('/products/{product}/edit', [ProductController::class, 'edit'])->middleware('auth')->name('product.edit');
Route::post('/products/upload', [ProductController::class, 'store'])->middleware('auth')->name('product.upload');

//Messages
Route::get('/messages', [ConversationController::class, 'messages'])->middleware('auth')->name('messages');

