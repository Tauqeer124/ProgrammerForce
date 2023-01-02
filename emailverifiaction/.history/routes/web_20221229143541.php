<?php

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController1;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('abc', [ApiController1::class,'verify']);
Route::get('/login11/{email?}',function ($email){
    $user=User::where('email',$email)->get();
    if(count($user)>0){
        dd($user)
    $user=User::find($user[0]['id']);
    $datetime=Carbon::now()->timezone('Asia/Karachi');
    $user->is_verified=true;
    $user->email_verified_at=$datetime;
        $user->save();
        echo "Email Verified";
    }
});