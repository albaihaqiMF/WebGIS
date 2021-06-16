<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DisasterController;
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



//User Pages
Route::group(['middleware' => ['auth', 'rolePermissions:1,2']], function () {
    Route::get('/', [MapController::class, 'index'])->name('maps');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

//Admin Pages
Route::group(['middleware' => ['auth', 'rolePermissions:2']], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/disaster', [DisasterController::class, 'index'])->name('admin.disaster');
    Route::post('/admin/disaster/post', [DisasterController::class, 'store'])->name('admin.disaster.store');
    Route::get('/admin/user_detail', [AdminController::class, 'user_detail'])->name('admin.user');
});
