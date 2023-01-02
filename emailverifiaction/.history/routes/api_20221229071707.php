<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController1;
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
Route::post('/registernewuser',[ApiController1::class,'register_user']); 



Route::get('/loginuser',[ApiController1::class,'login'])->name('login');
Route::post('/logout',[ApiController1::class,'logout'])->middleware('auth:api');     


Route::middleware('auth:api')->get('/details',[ApiController1::class,'getTaskList']);