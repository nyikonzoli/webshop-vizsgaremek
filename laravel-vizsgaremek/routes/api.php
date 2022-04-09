<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConversationController;

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

//Middlewares
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Message routes
Route::post('message', [MessageController::class, 'store'])->middleware('auth:sanctum')->name('message.store');

//Conversation routes
Route::get('conversation/buys', [ConversationController::class, 'buys'])->middleware('auth:sanctum')->name('conversation.buys');
Route::get('conversation/sales', [ConversationController::class, 'sales'])->middleware('auth:sanctum')->name('conversation.sales');
Route::get('conversation/{id}', [ConversationController::class, 'show'])->middleware('auth:sanctum')->name('conversation.show');

//Admin routes
Route::get('users/{name}', [UserController::class, 'show'])->name('user.show');