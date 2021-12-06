<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\guestController;
use App\Http\Controllers\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:admin-api')->group(function() {
    Route::group(['prefix' => 'admin'], function() {
        Route::get('/', function() {
            return response()->json(request()->user());
        });
    });
});

Route::middleware('auth:user-api')->group(function() {
    Route::group(['prefix' => 'user'], function() {

        Route::get('/', function() {
            return response()->json(request()->user());
        });

        Route::group(['prefix' => 'cart'], function() {
            Route::get('/', [userController::class,'cart']);
            Route::put('add',[userController::class,'addToCart']);
            Route::delete('remove',[userController::class,'removeFromCart']);
            Route::delete('clear',[userController::class,'clearCart']);
        });


    });
});

Route::post('register',[userController::class,'register']);
Route::post('login',[userController::class,'login']);
Route::get('product',[guestController::class,'product']);