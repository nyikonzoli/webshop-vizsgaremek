<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Message routes
Route::get('messages', [MessageController::class, 'index'])->name('messages.name');
Route::post('messages', [MessageController::class, 'store'])->name('messages.store');
Route::get('messages/{id}', [MessageController::class, 'show'])->name('messages.show');
Route::put('messages/{id}', [MessageController::class, 'update'])->name('messages.update');
Route::delete('messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');