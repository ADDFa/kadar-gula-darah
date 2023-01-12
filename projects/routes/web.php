<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers\SugarLevel;
use App\Http\Middleware\Auth as MiddlewareAuth;
use App\Http\Middleware\Admin;

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

Route::controller(Auth::class)->group(function () {
    Route::get('', 'index');
    Route::post('', 'login');
    Route::get('registration', 'create');
    Route::post('registration', 'store');
    Route::get('logout', 'logout');
});

Route::middleware(MiddlewareAuth::class)->controller(SugarLevel::class)->group(function () {
    Route::get('sugar', 'index');
    Route::post('sugar', 'store');
    Route::get('all/sugar', 'showAll')->middleware(Admin::class);
});

// Route::