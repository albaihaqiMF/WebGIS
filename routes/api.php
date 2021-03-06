<?php

use App\Http\Controllers\MasterController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('disaster/kabupaten',[MasterController::class,'showByLocation']);
Route::get('disaster/kabupaten/length/{master:code}',[MasterController::class,'showByLocationLength']);
Route::get('disaster/type',[MasterController::class,'showByType']);
Route::get('disaster/type/length/{master:code}',[MasterController::class,'showByType']);
