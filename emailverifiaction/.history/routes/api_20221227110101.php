<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\C
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
Route::post('/registernewuser',[ApiController1::class,'registerserrrr']); 

Route::post('/login',[ApiController1::class,'login']);

Route::get('/login',[ApiController1::class,'login'])->name('login');
Route::middleware('auth:api')->post('/logout',[ApiController1::class,'logout']);     

// Route::middleware('auth:api')->get('/detailsssssss',[ApiController1::class,'getTaskList']);