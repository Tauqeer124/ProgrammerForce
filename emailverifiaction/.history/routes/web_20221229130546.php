<?php

use App\Http\Controllers\ApiController1;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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
Route::get('/login11/{email?}',function ($email) {
    $user = User::where('email', $email)->first();
    if($user && $user->'is_verified'==) {
        $user->update([
            'is_verified' => 1,
        ]);
        $user->save();
        echo "Email Verified";
    }
});