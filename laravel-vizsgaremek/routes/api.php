<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminAuth;

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
Route::post('/message', [MessageController::class, 'store'])->middleware('auth:sanctum')->name('message.store');

//Conversation routes
Route::get('/conversation/buys', [ConversationController::class, 'buys'])->middleware('auth:sanctum')->name('conversation.buys');
Route::get('/conversation/sales', [ConversationController::class, 'sales'])->middleware('auth:sanctum')->name('conversation.sales');
Route::get('/conversation/{id}', [ConversationController::class, 'show'])->middleware('auth:sanctum')->name('conversation.show');
Route::post('/conversation', [ConversationController::class, 'store'])->middleware('auth:sanctum')->name('conversation.store');

//User routes
Route::put('/user', [UserController::class, 'update'])->middleware('auth:sanctum')->name('user.update');
Route::post('/user/password', [UserController::class, 'passwordUpdate'])->middleware('auth:sanctum')->name('user.password.update');
Route::delete('/user', [UserController::class, 'deleteAccount'])->middleware('auth:sanctum')->name('user.delete');

//Product routes
Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/{id}', [ProductController::class, 'indexOf'])->name('product.indexOf');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');


//////////////
//Admin routes
//////////////

//Auth
Route::post('admin/login', [AuthController::class, 'adminAuthentication'])->name('admin.login');
Route::middleware([AdminAuth::class])->group(function (){
    //User routes
    Route::get('admin/users/{id}', [UserController::class, 'showAdmin'])->name('admin.users.show');
    Route::put('admin/users/{id}', [UserController::class, 'updateAdmin'])->name('admin.users.update');
    Route::get('admin/users', [UserController::class, 'showByNameAdmin'])->name('admin.users.show-by-name');
    Route::delete('admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::post('admin/users/{id}/promote', [UserController::class, 'promote'])->name('admin.users.promote');
    Route::post('admin/users/{id}/demote', [UserController::class, 'demote'])->name('admin.users.demote');

    //Product routes
    Route::get('admin/users/{id}/products', [ProductController::class, 'showByUserId'])->name('admin.products.show-by-user-id');
    Route::put('admin/products/{id}', [ProductController::class, 'updateAdmin'])->name('admin.products.update');
    Route::get('admin/products', [ProductController::class, 'showByName'])->name('admin.products.show-by-name');
    Route::delete('admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

    //Category routes
    Route::get('admin/categories', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::put('admin/categories/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::post('admin/categories', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::delete('admin/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

    //Review routes
    Route::get('admin/users/{userId}/reviews/made', [ReviewController::class, 'showMade'])->name('admin.reviews.show-made');
    Route::get('admin/users/{userId}/reviews/received', [ReviewController::class, 'showReceived'])->name('admin.reviews.show-received');
    Route::delete('admin/reviews/{id}', [ReviewController::class, 'destroy'])->name('admin.reviews.destroy');;
});



