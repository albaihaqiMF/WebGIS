<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MapController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/',[MapController::class,'index'])->name('maps');


//User Pages
Route::group(['middleware'=>['auth', 'rolePermissions:1,2']],function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});

//Admin Pages
Route::group(['middleware'=>['auth','rolePermissions:2']],function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

});
