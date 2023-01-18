<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('/order', OrderController::class)->middleware('auth:api','admin');
Route::apiResource('/product', ProductController::class)->middleware('auth:api','admin');
Route::apiResource('/category', CategoryController::class)->middleware('auth:api','admin');
Route::apiResource('/user', UserController::class);
Route::post('/changepassword',[UserController::class,'updatepassword'])->middleware('auth:api');
Route::get('/loginuser',[UserController::class,'login']);
Route::post('/logoutuser',[UserController::class,'logout'])->middleware('auth:api');
Route::post('/forgetpassword',[ForgetPaController::class,'forgetpassword'])
