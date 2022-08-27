<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\VaccineController;
use App\Http\Controllers\PoskoController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\VaccineEventsController;

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

Route::get('/login', function () {
    return view('auth.login');
});

// Route::get('/', [IndexController::class, 'index']);

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin/admin', [AdminController::class, 'admin'])->name('admin')->middleware('Roles');
    Route::get('/admin/spasial', [AdminController::class, 'spasial'])->name('spasial');
    Route::get('/admin/report', [AdminController::class, 'report']);
    Route::resource('/admin/region', RegionController::class);
    Route::resource('/admin/vaccine', VaccineController::class);
    Route::resource('/admin/posko', PoskoController::class);
    Route::resource('/admin/event', EventController::class);
    Route::resource('/admin/results', VaccineEventsController::class);
    
    Route::get('/user/user', [UserController::class, 'user'])->name('user')->middleware('Roles');
    Route::get('/user/region', [UserController::class, 'region'])->name('region');
    Route::get('/user/vaccine', [UserController::class, 'vaccine'])->name('vaccine');
    Route::get('/user/posko', [UserController::class, 'posko'])->name('posko');
    Route::get('/user/event', [UserController::class, 'event'])->name('event');
    Route::get('/user/graphic', [UserController::class, 'graphic'])->name('graphic');
    
});



