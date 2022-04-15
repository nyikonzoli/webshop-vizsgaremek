<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\ProductController;

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
Route::post('conversation', [ConversationController::class, 'store'])->middleware('auth:sanctum')->name('conversation.store');

//User routes
Route::put('user/profile-picture', [UserController::class, 'profilePictureUpdate'])->middleware('auth:sanctum')->name('user.profile-picture.update');

//Admin routes
Route::get('users/{id}', [UserController::class, 'show'])->name('user.show');
Route::put('users/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('users', [UserController::class, 'showByName'])->name('user.show-by-name');
Route::get('users/{id}/products', [ProductController::class, 'showByUserId'])->name('product.show-by-user-id');
Route::get('users/{id}/transactions/buys', [UserController::class, 'show'])->name('user.show');
Route::get('users/{id}/transactions/sales', [UserController::class, 'show'])->name('user.show');
Route::get('users/{id}/categories', [UserController::class, 'show'])->name('user.show');
Route::get('users/{id}/favourites', [UserController::class, 'show'])->name('user.show');
Route::get('users/{id}/reviews', [UserController::class, 'show'])->name('user.show');
Route::get('users/{id}/conversations/buys', [UserController::class, 'show'])->name('user.show');
Route::get('users/{id}/conversations/sales', [UserController::class, 'show'])->name('user.show');
Route::get('users/{user_id}/conversations/{conv_id}/messages', [UserController::class, 'show'])->name('user.show');


