<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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
Route::put('user', [UserController::class, 'update'])->middleware('auth:sanctum')->name('user.update');
Route::post('user/password', [UserController::class, 'passwordUpdate'])->middleware('auth:sanctum')->name('user.password.update');

//Product routes
Route::get('products', [ProductController::class, 'index'])->name('product.index');
Route::get('products/{id}', [ProductController::class, 'indexOf'])->name('product.indexOf');
Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

//Admin routes
Route::get('admin/users/{id}', [UserController::class, 'show'])->name('user.show');
Route::put('admin/users/{id}', [UserController::class, 'updateAdmin'])->name('admin.user.update');
Route::get('admin/users', [UserController::class, 'showByName'])->name('user.show-by-name');
Route::get('admin/users/{id}/products', [ProductController::class, 'showByUserId'])->name('product.show-by-user-id');
Route::put('admin/users/{id}/products', [ProductController::class, 'update'])->name('product.show-by-user-id');
//Route::get('users/{id}/transactions/buys', [UserController::class, 'show'])->name('user.show');
//Route::get('users/{id}/transactions/sales', [UserController::class, 'show'])->name('user.show');
//Route::get('users/{id}/categories', [UserController::class, 'show'])->name('user.show');
//Route::get('users/{id}/favourites', [UserController::class, 'show'])->name('user.show');
//Route::get('users/{id}/reviews', [UserController::class, 'show'])->name('user.show');
//Route::get('users/{id}/conversations/buys', [UserController::class, 'show'])->name('user.show');
//Route::get('users/{id}/conversations/sales', [UserController::class, 'show'])->name('user.show');
//Route::get('users/{user_id}/conversations/{conv_id}/messages', [UserController::class, 'show'])->name('user.show');

Route::get('admin/categories', [CategoryController::class, 'index'])->name('category.index');

