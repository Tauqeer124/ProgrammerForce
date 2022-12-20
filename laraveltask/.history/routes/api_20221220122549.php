<?php
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GradeController;
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
Route::get('/allstudent',[StudentController::class,'index']);
Route::get('/student{id}',[StudentController::class,'show']);
Route::get('deletestudent/{id?}',[StudentController::class,'destroy']);
Route::post('addstudent',[StudentController::class,'store']);
http://localhost:8000/api/updatestudent/14

//grade routes
Route::post('addgrade',[GradeController::class,'store']);
Route::get('/allgrades',[GradeController::class,'index']);
Route::get('deletegrade/{id?}',[GradeController::class,'destroy']);


