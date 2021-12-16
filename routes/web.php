<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TempatController;

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
    return view('auth.login');
});

Auth::routes();

//Admin
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function(){
        Route::resource('/users', UserController::class);
    });
//auth
Route::middleware(['auth'])
    ->group(function(){
        Route::resource('/dashboard', DashboardController::class);
        Route::resource('/kegiatan', KegiatanController::class);
        Route::resource('/laporan', LaporanController::class);
        Route::resource('/tempat', TempatController::class);
        // profile
        Route::resource('/profile', ProfileController::class);
        // changePassword
        Route::put('/changePassword/{id}', [UserController::class, 'changePassword'])->name('profile.changePassword');
        // logout
        Route::get('/logout', [LoginController::class, 'logout']);
    });
